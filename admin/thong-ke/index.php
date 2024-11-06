<?php
/*người dùng xem số liệu thống kê sản phẩm, ở định dạng danh sách dạng bảng hoặc ở định dạng biểu đồ, tùy thuộc vào sở thích của họ.*/
require_once "../../global.php";
require_once "../../dao/thong-ke.php";
//--------------------------------//




if (exist_param("chart")) { //Hàm này kiểm tra xem URL có chứa tham số hay không
    $VIEW_NAME = "chart.php";
} else {
    $VIEW_NAME = "list.php";
}

require "../layout.php";