<?php
require_once '../models/danhMuc.php';
require_once '../models/product.php';
class HomeController{
    protected $category;
    protected $product;
    public function __construct(){
        $this->category = new danhMuc();
        $this->product = new product();
    }
    public function index() {
        $category = $this->category->listDanhMuc();
        $product = $this->product->listProduct();
        $newProducts = $this->product->newProducts();
        $HotProducts = $this->product->MostViewedPro();
        
    
        $productDetail = null;
        if (isset($_GET['id'])) {
            $productDetail = $this->product->getProductById($_GET['id']);
        }
    
        // echo '<pre>';
        // print_r($productDetail);
        // echo '</pre>';
    
        include '../views/client/index.php';
    }
    
    
    

    public function getProductDetail(){
        $productDetail = $this->product->getProductById($_GET['id']);
        $productDetail = reset($productDetail);
        $category = $this->category->listDanhMuc();
        include '../views/client/product/product-detail.php';
    }
    public function productList(){
        $category = $this->category->listDanhMuc();
        $product = $this->product->listProduct();
        $newProducts = $this->product->newProducts();
        $HotProducts = $this->product->MostViewedPro();
        
    
        $productDetail = null;
        if (isset($_GET['id'])) {
            $productDetail = $this->product->getProductById($_GET['id']);
        }
;
        include '../views/client/pages/product-list.php';
    }
}