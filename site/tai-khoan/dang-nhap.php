<?php
/*xử lý chức năng đăng nhập và đăng xuất của ứng dụng web. 
Khi người dùng cố gắng đăng nhập, tập lệnh sẽ kiểm tra thông tin đăng nhập của người dùng đối với cơ sở dữ liệu và nếu thông tin đăng nhập hợp lệ, 
tập lệnh sẽ lưu trữ thông tin của người dùng trong phiên và đặt cookie cho chức năng "ghi nhớ tôi". 
Nếu người dùng đăng xuất, tập lệnh sẽ xóa thông tin của người dùng khỏi phiên. 
Tập lệnh cũng kiểm tra mọi cookie hiện có để tự động đăng nhập người dùng nếu chức năng "ghi nhớ tôi" được bật.*/
require '../../global.php';
require '../../dao/khach-hang.php';

extract($_REQUEST);
$VIEW_NAME = "tai-khoan/dang-nhap-form.php";


require '../layout.php';