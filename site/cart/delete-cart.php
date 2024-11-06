<?php
/*xử lý các hoạt động liên quan đến giỏ hàng,chẳng hạn như xóa tất cả, xóa một sản phẩm hoặc cập nhật số lượng sản phẩm trong giỏ hàng..*/
require '../../global.php';
extract($_REQUEST);
if (empty($_SESSION['cart'])) {
    header("location:" . $SITE_URL . "/cart/list-cart.php");
} else {
    if ($act == "deleteAll") {
        unset($_SESSION['cart']);
        unset($_SESSION['total_cart']);
        header("location:" . $SITE_URL . "/cart/list-cart.php");
    } else if ($act == "delete") { // xóa sản phẩm có $id khỏi giỏ hàng
        if (array_key_exists($id, $_SESSION['cart'])) {

            $_SESSION['total_cart'] -=   $_SESSION['cart'][$id]['sl'];
            unset($_SESSION['cart'][$id]);
            header("location:" . $SITE_URL . "/cart/list-cart.php");
        }
    } else if ($act == "update_sl") { 

        foreach ($_SESSION['cart'] as $key => $value) {
            if ($key == $_POST['ma_hh']) {
                $_SESSION['cart'][$key]['sl'] = $_POST['update_sl']; // cập nhật số lượng sản phẩm có $_POST['ma_hh'] trong giỏ hàng
            }
        }
        header("location:" . $SITE_URL . "/cart/list-cart.php");
    } else {
        header("location:" . $SITE_URL . "/cart/list-cart.php");
    }
}