<?php
require_once "../../dao/pdo.php";
require_once "../../dao/loai.php";
require "../../global.php";




extract($_REQUEST);
if (exist_param("btn_list")) { 
    $VIEW_NAME = "list.php";
} else {
    $VIEW_NAME = "add.php";
}
require "../layout.php";