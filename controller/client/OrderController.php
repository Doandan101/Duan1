<?php
require_once '../models/Ship.php';
require_once '../models/Cart.php';
require_once '../models/User.php';
require_once '../models/Order.php';
class OrderController
{
    protected $cart;
    protected $ship;
    protected $user;

    protected $orders;

    public function __construct()
    {
        $this->cart = new Cart();
        $this->ship = new Ship();
        $this->user = new User();
        $this->orders = new Order();
    }


    public function index()
    {
        $user = $this->user->GetUserById($_SESSION['user']['user_Id']);
        $ships = $this->ship->getAllShip();
        $carts = $this->cart->GetallCarts();
        // echo'<pre>';
        // print_r($ships);
        // echo'<pre>';
        include '../views/client/checkout/checkout.php';
    }
    public function checkout()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['checkout'])) {

            $carts = $this->cart->GetallCarts();

            $orderdetail = $this->orders->addOrderDetail(
                $_POST['name'],
                $_POST['email'],
                $_POST['phone'],
                $_POST['address'],
                $_POST['amount'],
                $_POST['note'],
                !empty($_POST['coupon_Id']) ? $_POST['coupon_Id'] : null,
                $_POST['payment_method'],
                $_POST['shipping_Id']
            );
            if ($orderdetail) {
                $orderdetail_id = $this->orders->GetLastId();
                foreach ($carts as $cart) {
                    $this->orders->addOrder(
                        $cart['product_id'],
                        $cart['variant_id'],
                        $orderdetail_id,
                        $cart['cart_quantity']
                    );
                    $this->cart->deleteCart($cart['cart_id']);
                }
                unset($_SESSION['total']);
                unset($_SESSION['coupon_code']);
                unset($_SESSION['totalCp']);
                header('location:index.php?act=index');
                $_SESSION['success'] = 'Đặt hàng thành công';
                exit();
            } else {
                $_SESSION['success'] = 'Đặt hàng không thành công';
                header('location:index.php?act=checkout');
                exit();
            }
        }
    }
}
