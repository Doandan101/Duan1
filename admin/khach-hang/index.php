<?php
/*exist_param là một hàm được định nghĩa trong mã PHP để kiểm tra xem một tham số có tồn tại trong mảng '$_$_REQUEST hay không. 
Mảng '$_REQUEST$_REQUEST là một siêu biến toàn cục trong PHP, chứa dữ liệu của các biến đã được gửi qua các phương thức GET, POST và COOKIE. */
require_once "../../dao/pdo.php";
require_once "../../dao/khach-hang.php";
require "../../global.php";


extract($_REQUEST);
if (exist_param("btn_list")) {


  
    $VIEW_NAME = "list.php";

} else {
    $VIEW_NAME = "add.php";
}
require "../layout.php";