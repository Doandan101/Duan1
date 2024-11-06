<?php
/*hiển thị danh sách các sản phẩm trên một trang web*/
require '../../global.php';
require '../../dao/hang-hoa.php';
require '../../dao/loai.php';
//-------------------------------//


extract($_REQUEST);
//Lọc sản phẩm theo danh mục
if (exist_param("ma_loai")) {

    
    extract($name_loai);
    $title_site = "Các sản phẩm thuộc loại : '$ten_loai' ";

    //Các sản phẩm thuộc danh mục được chỉ định được truy xuất bằng cách sử dụng và lưu trữ trong mảng
    //Trưng bày các sản phẩm đặc biệt
} else if (exist_param("dac_biet")) {
    $title_site = "Sản phẩm đặc biệt";
    
    //Tìm kiếm sản phẩm theo từ khóa
} else if (exist_param("timkiem")) {
    $kyw = $_POST['kyw'];
    if ($kyw == '') {
        $title_site = "Tất cả sản phẩm";
    } else {
        $title_site = "Các sản phẩm có chứa từ khóa :'$kyw'";
    }
    
    if (count($items) == 0) {
        $title_site = "Không sản phẩm nào chứa từ khóa :'$kyw'";
    }
} else {
    $title_site = "Tất cả sản phẩm";
    
}

$VIEW_NAME = "hang-hoa/liet-ke-ui.php";

require '../layout.php';