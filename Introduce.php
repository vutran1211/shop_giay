<?php

class Introduce extends Controller
{
    function __construct()
    {
        $this->products = $this->model('ProductModel');
        $this->categories = $this->model('CategoryModel');
    }

    public function index()
    {
        $categories = $this->categories->getAllCl();
        $cate = 0;
        $products = $this->products->getAll('',0,$cate);
        
        $productNew = [];
        foreach($products as $item) {
            // $item['detail_img'] = $this->products->getProImg($item['id'])['image'];
            array_push($productNew, $item);
        }
        $this->view("client", [
            'page' => 'introduce',
            'title' => 'Giới thiệu',
            'css' => ['base', 'main'],
            'js' => ['main'],
            'categories' => $categories,
            'products' => $productNew,
        ]);
    }
}
