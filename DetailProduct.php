<?php

class DetailProduct extends Controller
{
    function __construct()
    {
        $this->products = $this->model('ProductModel');
        $this->categories = $this->model('CategoryModel');
        
    }

    function product($id){
        // echo $id;
        // die();
        $product = $this->products->SelectProduct($id);
        $img_product = $this->products->SelectProductImg($id);
        $products = $this->products->getAll();
        $categories = $this->categories->getAllCl();
        $nameCate = $this->categories->getNameCate($id);
        $infoCart = $this->products->infoCart();

        
        return $this->view("client", [
            'page' => 'detail_product',
            'title' => 'Chi tiết sản phẩm',
            'css' => ['base', 'main'],
            'js' => ['main'],
            'products' => $products,
            'categories' => $categories,
            'product' => $product,
            'img_product' => $img_product,
            'nameCate' => $nameCate,
            'infoCart' => $infoCart

        ]);
    }
}
