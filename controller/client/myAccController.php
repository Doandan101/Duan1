<?php 
require_once '../models/user.php';

class MyAccController extends User{
     
    public function updateAcc(){
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update-acc'])){
            $error = [];
            if(empty($_POST['name'])){
                $error['name'] = 'Vui lòng nhập tên người dùng';
            }
            if(empty($_POST['address'])){
                $error['address'] = 'Vui lòng nhập địa chỉ';
            }
            if(empty($_POST['email'])){
                $error['email'] = 'Vui lòng nhập địa chỉ email';
            }
            if(empty($_POST['phone'])){
                $error['phone'] = 'Vui lòng nhập số điện thoại';
            }
            if(empty($_POST['gender'])){
                $error['gender'] = 'Vui lòng chọn giới tính';
            }
            if(count($error)>0){
                header('location:'. $_SERVER['HTTP_REFERER']);
                exit();
            }
         

            // $_SESSION['error']= $error;
           $user = $this->updateUser($_POST['name'], $_POST['address'],
           $_POST['email'],$_POST['phone'],$_POST['gender']);
           if($user){
            $_SESSION['user'] = $this->GetUserById($_SESSION['user']['user_Id']);
            $_SESSION['success'] = 'Cập nhật thông tin thành công';
            header(header: 'location:' .$_SERVER['HTTP_REFERER']);
            exit();
           }else{
            $_SESSION['error'] = 'Cập nhật thông tin thất bại. Vui lòng kiểm tra lại';
            header('location:' .$_SERVER['HTTP_REFERER']);
            exit();
           }
        }
    }
}

?>