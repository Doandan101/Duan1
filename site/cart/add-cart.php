<?php
/*xử lý việc thêm sản phẩm vào giỏ hàng, cập nhật số lượng và tổng số lượng sản phẩm trong giỏ hàng*/
require '../../global.php';
require '../../dao/hang-hoa.php';

extract($_REQUEST);

if (isset($id) && $id > 0) {
    $items = hang_hoa_select_by_id($id);
    $total = 0;
    extract($items);
/*Nếu $_SESSION['cart'] đã tồn tại (nghĩa là giỏ hàng đã được khởi tạo)*/

    if (isset($_SESSION['cart'])) {

        if (isset($_SESSION['cart'][$id]['sl'])) {
            $_SESSION['cart'][$id]['sl'] += 1; //Nếu đã tồn tại, tăng số lượng của sản phẩm đó lên 1.
        } else {
            $_SESSION['cart'][$id]['sl'] = 1; //Nếu chưa tồn tại, thêm sản phẩm đó vào giỏ hàng với số lượng là 1.
        }
        //Cập nhật thông tin của sản phẩm trong giỏ hàng, bao gồm tên, đơn giá và giảm giá.
        $_SESSION['cart'][$id]['ten_hh'] = $ten_hh;
        // $_SESSION['cart'][$id]['hinh'] = $hinh;
        $_SESSION['cart'][$id]['don_gia'] = $don_gia;
        $_SESSION['cart'][$id]['giam_gia'] = $giam_gia;
        //Tính tổng số lượng sản phẩm trong giỏ hàng và lưu vào $_SESSION['total_cart']
        foreach ($_SESSION['cart'] as $key => $value) {
            $total += $_SESSION['cart'][$key]['sl'];
        }
        echo $total;
    } else {
        $_SESSION['cart'][$id]['sl'] = 1;
        $_SESSION['cart'][$id]['ten_hh'] = $ten_hh;
        // $_SESSION['cart'][$id]['hinh'] = $hinh;
        $_SESSION['cart'][$id]['don_gia'] = $don_gia;
        $_SESSION['cart'][$id]['giam_gia'] = $giam_gia;
        foreach ($_SESSION['cart'] as $key => $value) {
            $total += $_SESSION['cart'][$key]['sl'];
        }
        echo $total;
    }
    $_SESSION['total_cart'] = $total;

    header("location:" . $SITE_URL . "/cart/list-cart.php");
}