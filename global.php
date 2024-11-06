<?php
/*quản lý phiên, định cấu hình URL, xử lý tải lên tệp, làm việc với cookie và xác minh xác thực người dùng.*/
session_start();
/**
 * Định nghĩa các url cần thiết sử dụng trong website
 */
$ROOT_URL = "/da1"; //URL gốc của dự án:duanmau
$CONTENT_URL = "$ROOT_URL/content"; //URL dẫn xuất cho nội dung
$ADMIN_URL = "$ROOT_URL/admin"; //URL dẫn xuất cho  quản trị viên
$SITE_URL = "$ROOT_URL/site"; // URL dẫn xuất cho thư mục trang web
$SL_PER_PAGE = 10; // Cài đặt để xác định số lượng mục trên mỗi trang, có thể để phân trang

//Định nghĩa đường dẫn chứa ảnh trong upload

$UPLOAD_URL = "../../uploaded";

/**
 * Biến toàn cục cần thiết để chia sẻ giữa controller và view
 */
$VIEW_NAME = 'index.php'; // Một biến để lưu trữ tên của view sẽ được hiển thị
$MESSAGE = ''; //  Một biến để giữ các thông báo có thể cần được hiển thị (ví dụ: thông báo lỗi hoặc thành công).

// Kiểm tra biến có tồn tại trong $_REQUEST hay ko?
function exist_param($fieldname)
{
    return array_key_exists($fieldname, $_REQUEST);
}

/**
 * Lưu file upload vào thư mục 
 */
function save_file($fieldname, $target_dir) // Xử lý việc tải tệp lên
{
    $file_uploaded = $_FILES[$fieldname]; // Truy xuất tệp đã tải lên từ superglobal: $_FILES
    $file_name = basename($file_uploaded['name']);
    $target_path = $target_dir . $file_name; // Xây dựng đường dẫn đích cho tệp.
    move_uploaded_file($file_uploaded['tmp_name'], $target_path); // Di chuyển tệp đã tải lên từ vị trí tạm thời của nó vào thư mục đích.
    return $file_name; // Trả về tên của tệp đã tải lên
}

/**
 * Tạo cookies với tên, giá trị và thời gian hết hạn được chỉ định (tính bằng ngày).
 */
function add_cookie($name, $value, $day) 
{
    setcookie($name, $value, time() + (86400 * $day), "/");
}
/**
 * Xóa cookies bằng cách đặt ngày hết hạn thành quá khứ
 */

function delete_cookie($name)
{
    add_cookie($name, "", -1);
}

/**
 * ĐỌc giá trị cookie-Truy xuất giá trị của cookie theo tên, trả về một chuỗi trống nếu cookie không tồn tại.
 */

function get_cookie($name)
{
    return $_COOKIE[$name] ?? '';
}
