<?php

require_once '../models/user.php';
class AuThController extends user
{
    public function registers()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
            $error = [];
            if (empty($_POST['name'])) {
                $error['name'] = 'Vui lòng nhập tên';
            }
            if (empty($_POST['email'])){
                $error['email'] = 'Vui lòng nhập email';
            }elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                $error['email'] = 'Email sai định dạng';
            }else{
                $checkEmail = $this->checkEmail($_POST['email']);
                if($checkEmail > 0){
                    $error['email'] = 'Email đã có tài khoản';
                }
            }
            if (empty($_POST['password']) && strlen($_POST['password']) < 6) {
                $error['password'] = 'Vui lòng nhập mật khẩu';
            }


            $_SESSION['error'] = $error;
            if (count($error) > 0) {
                header('location:?act=register');
                exit();
            }
            $register = $this->register($_POST['name'], $_POST['email'],$_POST['password']);
            if($register){
                $_SESSION['success'] = 'Tạo tài khoản thành công. Vui lòng đăng nhập';
                header('location:index.php?act=login');
                exit();
            }else{  
                $_SESSION['error'] = 'Tạo tài khoản thất bại. Vui lòng xem lại';
                header('location:'. $_SERVER['HTTP_REFERER']);
                exit();
            }
        }
        include '../views/client/auth/register.php';
    }

    public function logins()
        {
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
                $error = [];
                if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                    $error['email'] = 'Email sai định dạng';
                }
                if (empty($_POST['password'])){
                    $error['password'] = 'Mật khẩu không để trống';
                }
                // $_SESSION['error'] = $error;
                // if (count($error) > 0) {
                //     header('location:' . $_SERVER['HTTP_REFERER']);
                //     exit();
                // }

                $login = $this->login($_POST['email'], $_POST['password']);
                if ($login) {
                    $_SESSION['user'] = $login;
                    $_SESSION['user_id'] = $login['id']; 
                    $_SESSION['role_id'] = $login['role_id']; 
                    $_SESSION['success'] = 'Đăng nhập thành công';
                    header('location:index.php?act=index');
                    exit();
                } else {
                    $_SESSION['error']['login'] = 'Login thất bại';
                    header('location:' . $_SERVER['HTTP_REFERER']);
                    exit();
                }
            }
            include '../views/client/auth/login.php';
        }
        public function logout()
        {
            session_destroy();
            header('location:index.php');
            exit();
        }

}
