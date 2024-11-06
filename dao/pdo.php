<?php

function pdo_get_connection()
{
    $dburl = "mysql:host=localhost;dbname=;charset=utf8";
    $username = 'root';
    $password = '';

    $conn = new PDO($dburl, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
}

// ====================Thực thi một câu lệnh SQL không trả về bất kỳ dữ liệu nào (ví dụ:INSERT,UPDATE,DELETE)======================//
function pdo_execute($sql) //hàm này cho các thao tác như chèn bản ghi mới, cập nhật bản ghi hiện có hoặc xóa bản ghi.
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}
// =================== Thực hiện truy vấn SQL trả về nhiều hàng dữ liệu=======================//
function pdo_query($sql) //hàm này để truy xuất nhiều bản ghi, chẳng hạn như khi hiển thị danh sách người dùng.
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $rows = $stmt->fetchAll();
        return $rows;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}
// ===================Thực hiện truy vấn SQL trả về một hàng dữ liệu=======================//

function pdo_query_one($sql) //hàm này để truy xuất một bản ghi duy nhất, chẳng hạn như khi tìm nạp thông tin chi tiết của một người dùng cụ thể.
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

// ===================Thực thi truy vấn SQL trả về một giá trị duy nhất (ví dụ: đếm hoặc tổng)=======================//
function pdo_query_value($sql) //hàm này khi bạn cần một giá trị duy nhất, chẳng hạn như đếm số lượng người dùng trong cơ sở dữ liệu.
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return array_values($row)[0];
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}