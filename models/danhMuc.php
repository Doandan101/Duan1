<?php

require_once '../connect/connect.php';

class danhMuc extends connect
{

    public function listDanhMuc()
    {
        $sql = 'SELECT * FROM categories';
        $stmt = $this->connect()->prepare(query: $sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function addCategorys($name, $image, $status) {
        $sql = 'INSERT INTO categories(name, image, status) value(?,?,?)';
        $stmt = $this->connect()->prepare(query: $sql);
        return $stmt->execute(params:[$name, $image, $status]);        
    }
    public function deatailCategory() {
        $sql = 'SELECT * FROM categories where category_Id = ?';
        $stmt = $this->connect()->prepare(query: $sql);
        $stmt->execute(params: [$_GET['id']]);
       return $stmt->fetch(PDO::FETCH_ASSOC); 
    }
    public function editCategorys($name, $image, $status) {
        $sql = 'UPDATE categories SET name=?, image=?, status=? WHERE category_Id=?';
        $stmt = $this->connect()->prepare(query: $sql);
        return $stmt->execute(params:[$name, $image, $status, $_GET['id']]);        
    }
    public function deleteCategory($id) {
        $sql = 'DELETE FROM categories WHERE category_Id=?';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$_GET['id']]);
    }
}
