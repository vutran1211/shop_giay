<?php

class Home extends Controller
{
    private $products;
    private $categories;

    function __construct()
    {
        $this->products = $this->model('ProductModel');
        $this->categories = $this->model('CategoryModel');
    }

    public function index()
    {
        $categories = $this->categories->getAllCl();
        $cate = 0;
        $products = $this->products->getAll('', 0, $cate);

        $productNew = [];
        foreach ($products as $item) {
            // $item['detail_img'] = $this->products->getProImg($item['id'])['image'];
            array_push($productNew, $item);
        }
        $cate_id = 0;

        $new_product = $this->products->getNewProduct($cate_id);


        // exit;

        // show_array($new_product);
        $this->view("client", [
            'page' => 'home',
            'title' => 'Trang chủ',
            'css' => ['base', 'main'],
            'js' => ['main'],
            'products' => $productNew,
            'categories' => $categories,
            'new_product' => $new_product,
            'cate_id' => $cate_id,



        ]);
    }
}
