<?php 
require_once '../connect/connect.php';

class Order extends connect{
    public function addOrder($product_id, $variant_id, $order_detail_id, $quantity){
        $sql = 'insert into orders(user_id, product_id, variant_id, order_detail_id,
         quantity,created_at, updated_at ) values(?,?,?,?,?,now(),now())';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$_SESSION['user']['user_Id'], $product_id, $variant_id, $order_detail_id, $quantity]);
        
    }

    public function addOrderDetail($name, $email, $phone, $address, $amount, $note,  $coupon_id, $payment_method, $shipping_id){
        $sql = 'insert into order_details(name, email, phone, address, amount, 
        note, user_id, coupon_id, payment_method, shipping_id, created_at, updated_at)
        values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, now(), now())';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$name, $email, $phone, $address, $amount, $note,
        $_SESSION['user']['user_Id'], !empty($coupon_id) ? $coupon_id : null, $payment_method, $shipping_id]);

    }

    public function GetLastId()
    {
        return $this->connect()->lastInsertId();
    }
}
?>