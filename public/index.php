<?php
session_start();
require_once '../controller/admin/adDMController.php';
require_once '../controller/admin/adPRController.php';
require_once '../controller/admin/adCouponController.php';
require_once '../controller/client/AuthController.php';
require_once '../controller/client/HomeController.php';
require_once '../controller/client/Cartcontroller.php';
require_once '../controller/client/myAccController.php';
require_once '../controller/client/OrderController.php';
$actions = isset($_GET['act']) ? $_GET['act'] : 'index';

$adminDanhmuc = new adDMcontroller();
$adminProduct = new AdPRController();
$couponAdmin = new adCounonController();
// client
$auth = new AuThController();
$home = new HomeController();
$cart = new Cartcontroller();
$updateacc = new MyAccController();
$order = new OrderController();
switch ($actions) {
    case 'admin':
        include '../views/admin/index.php';
        break;
    case 'product':
        $adminProduct->index();
        break;
    case 'product-add':
        $adminProduct->addProduct();
        break;
    case 'product-store':
        $adminProduct->PrStore();
        break;
    case 'product-edit':
        $adminProduct->edit();
        break;
    case 'product-update':
        $adminProduct->update();
        break;
    case 'gallery-delete':
        $adminProduct->deleteGallery();
        break;
    case 'product-variant-delete':
        $adminProduct->deleteProductVariant();
        break;
    case 'product-delete':
        $adminProduct->deleteProduct();
        break;
    case 'category':
        $adminDanhmuc->index();
        break;
    case 'category-add':
        $adminDanhmuc->addCategory();
        break;
    case 'category-edit':
        $adminDanhmuc->updateCategory();
        break;
    case 'category-delete':
        $adminDanhmuc->deleteCategorys();
        break;
    case 'coupon-list':
        $couponAdmin->index();
        break;
    case 'coupon-add':
        $couponAdmin->createCp();
        break;
    case 'coupon-edit':
        $couponAdmin->editCoupons();
        break;
    case 'coupon-update':
        $couponAdmin->updateCoupons();
        break;
    case 'coupon-delete':
        $couponAdmin->deleteCoupons();
        break;


        //======================================================
    case 'index':
        $home->index();
        break;
    case 'login':
        $auth->logins();
        break;
    case 'register':
        $auth->registers();
        break;
    case 'logout':
        $auth->logout();
        break;
    case 'product-detail':
        $home->getProductDetail();
        break;
    case 'cart':
        $cart->index();
        break;
    case 'add-cart-byNow':
        $cart->addToCartOrByNow();
        break;
    case 'update-Cart':
        $cart->updateCarts();
        break;
    case 'delete-Cart':
        $cart->deleteCarts();
        break;
    case 'checkout':
        $order->index();
        break;
    case 'order':
        $order->checkout();
        break;
    case 'myaccount':
        include '../views/client/account/account.php';
        break;
    case 'update-acc':
           $updateacc ->updateAcc();
        break;
    case 'product-list':
        $home->productList();
        break;
    case 'about':
        include '../views/client/pages/about.php';
        break;
    case 'contact':
        include '../views/client/pages/contact.php';
        break;
};
