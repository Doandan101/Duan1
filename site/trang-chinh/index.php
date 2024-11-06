<?php
//một phần của ứng dụng web và chịu trách nhiệm kiểm soát nội dung nào được hiển thị cho người dùng dựa trên các tham số URL cụ thể
// Dòng này bao gồm tệp, có khả năng chứa các cài đặt chung, hằng số hoặc hàm cần thiết trên ứng dụng
require '../../global.php'; 
// Dòng này bao gồm tệp, có thể là Đối tượng truy cập dữ liệu (DAO) chứa các hàm để tương tác với bảng cơ sở dữ liệu "hang-hoa" (sản phẩm)
require_once '../../dao/hang-hoa.php';

/*Kiểm tra các thông số cụ thể trong URL */
/*Nếu hàm trả về , nó có nghĩa là tham số có trong yêu cầu.exist_param("gioi-thieu")true"gioi-thieu"
Được đặt để lưu trữ tên trang hiện tại trong phiên.$_SESSION['name_page']'gioi_thieu'
Biến được gán đường dẫn đến trang "Giới thiệu" (Giới thiệu): .$VIEW_NAME"trang-chinh/gioi-thieu.php" */
if (exist_param("gioi-thieu")) {
    $_SESSION['name_page'] = 'gioi_thieu';
    $VIEW_NAME = "trang-chinh/gioi-thieu.php";
    //
} else if (exist_param("san-pham")) {

    $_SESSION['name_page'] = 'san_pham';
    header("location: $SITE_URL/hang-hoa/liet-ke.php");
} else if (exist_param("bai-viet")) {

    $_SESSION['name_page'] = 'bai_viet';

    $VIEW_NAME = "trang-chinh/bai-viet.php";
    //
} else if (exist_param("hoi-dap")) {
    $_SESSION['name_page'] = 'hoi_dap';
    $VIEW_NAME = "trang-chinh/hoi-dap.php";
    //
} else {
    $_SESSION['name_page'] = 'trang_chu';
    
    $VIEW_NAME = "trang-chinh/trang-chu.php";
}

require '../layout.php';
