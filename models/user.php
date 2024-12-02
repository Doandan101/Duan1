<?php
require_once '../connect/connect.php';
class User extends connect{
    public function register($name, $email, $password, $role_id = 1) {
        $hash_password = password_hash($password, PASSWORD_DEFAULT); // Hash password
        $sql = 'INSERT INTO users(name, email, password, role_id) VALUES (?, ?, ?, ?)';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$name, $email, $hash_password, $role_id]);
    }
    
    public function checkEmail($email){
        $sql = 'SELECT * FROM users WHERE email = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->rowCount();
    }
    public function login($email, $password)
{
    $sql = 'SELECT * FROM users WHERE email = ?';
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        return $user;
    }
    return false;
}
public function getUserByEmail($email)
{
    $sql = 'SELECT * FROM users WHERE email = ?';
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$email]);
    return $stmt->fetch();
}
public function getRoleById($roleId) {
    $sql = 'SELECT * FROM `roles` WHERE `role_Id` = ?';
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$roleId]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function updateUser($name, $address, $email, $phone, $gender){
    $sql = 'UPDATE users SET name= ?, address = ?, email = ?, phone = ?, gender = ? WHERE user_Id =?';
    $stmt = $this->connect()->prepare($sql);
    return $stmt->execute([$name, $address, $email, $phone, $gender, $_SESSION['user']['user_Id']]);
}
    
public function GetUserById($id){
    $sql = 'SELECT * FROM users WHERE user_Id = ?';
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

}