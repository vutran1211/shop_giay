<?php
class Product extends Controller
{

    private $products;
    private $categories;

    function __construct()
    {
        $this->products = $this->model('ProductModel');
        $this->categories = $this->model('CategoryModel');
    }

    function show_product()
    {
        $cate = 0;
        if (isset($_GET['cate'])) {

            $cate  = $_GET['cate'];
        }

        $categories = $this->categories->getAllCl();
        $productNew = [];

        $keyword = '';
        $cate = 0;
        if (isset($_GET['search'])) {
            $keyword = $_GET['search'];
            $cate = 0;
        } elseif (isset($_GET['cate'])) {

            $cate  = $_GET['cate'];
            $keyword = '';
        }
        $products = $this->products->getAll($keyword, 0, $cate);
        foreach ($products as $item) {
            if(!empty($this->products->getProImg($item['id']))) {
                $item['detail_img'] = $this->products->getProImg($item['id'])['image'];
            }
            array_push($productNew, $item);
        }

        // show_array($productNew);
        $count_product = !empty($productNew)? count($productNew):0;

        $num_per_page = 8;
        $page = isset($_GET['page'])?(int)$_GET['page']:1;
        $start = ($page - 1) * $num_per_page;
        $SelectProByPage = $this->products->SelectProByPage($start, $num_per_page, $keyword, 0, $cate);
        return $this->view('client', [
            'page' => 'product',
            'css' => ['base', 'main'],
            'js' => ['main'],
            'title' => 'Sản phẩm',
            'products' => $productNew,
            'categories' => $categories,
            'SelectProByPage' => $SelectProByPage,
            'keyword' => $keyword,
            'num_per_page' => $num_per_page,
            'cate' => $cate,
            'count_product' => $count_product,
        ]);
    }

    function index()
    {
        $cate = 0;
        if (isset($_POST['cate'])) {

            $cate  = $_POST['cate'];
        }

        $categories = $this->categories->getAllCl();
        $productNew = [];

        $keyword = '';
        $cate = 0;
        if (isset($_GET['search'])) {
            $keyword = $_GET['search'];
            $cate = 0;
        }
        elseif (isset($_POST['cate'])) {

            $cate  = $_POST['cate'];
            $keyword = '';
        }
        elseif (isset($_GET['cate'])) {

            $cate  = $_GET['cate'];
            $keyword = '';
        }
        $products = $this->products->getAll($keyword, 0, $cate);
        foreach ($products as $item) {
            if(!empty($this->products->getProImg($item['id']))) {
                $item['detail_img'] = $this->products->getProImg($item['id'])['image'];
            }
            array_push($productNew, $item);
        }

        // show_array($productNew);
        $count_product = !empty($productNew)? count($productNew):0;

        $num_per_page = 8;
        $page = isset($_GET['page'])?(int)$_GET['page']:1;
        $start = ($page - 1) * $num_per_page;
        $SelectProByPage = $this->products->SelectProByPage($start, $num_per_page, $keyword, 0, $cate);

        return $this->view('admin', [
            'page' => 'product/list',
            'js' => ['deletedata', 'search'],
            'title' => 'SẢN PHẨM',
            'products' => $productNew,
            'categories' => $categories,
            'SelectProByPage' => $SelectProByPage,
            'keyword' => $keyword,
            'num_per_page' => $num_per_page,
            'cate' => $cate,
            'count_product' => $count_product,
            'keyword' => $keyword,
            'pagePag' => 'product'

        ]);
    }

    function add_product()
    {
        $msg = '';
        $type = '';

        $categories = $this->categories->getAll();

        if (isset($_POST['add_product']) && ($_POST['add_product'])) {
            $image = $this->processImg($_FILES['product']['name'], $_FILES['product']['tmp_name']);
            $name = $_POST['productname'];
            $price = $_POST['price'];

            $category = $_POST['category'];
            $desc = $_POST['description'];
            $detail_img = $_FILES['detail_image'];

            $created_at = date('Y-m-d H:i:s');
            $image_array = array();

            for ($i = 0; $i < count($detail_img['name']); $i++) {
                $img = $this->processImg($detail_img['name'][$i], $detail_img['tmp_name'][$i]);
                array_push($image_array, $img);
            }

            $idProduct = $this->products->insertPro($name, $image, $category, $price, $desc, $created_at);
            if (!empty($image_array) && $image_array[0] != '') {
                foreach ($image_array as $name)
                    $this->products->addImageProduct($idProduct, $name, $created_at);
            }


            if ($idProduct) {
                $type = 'success';
                $msg = 'Added product successfully';
                $_SESSION['msg'] = $msg;
                header('Location: ' . _WEB_ROOT . '/product/list');
            } else {
                $type = 'danger';
                $msg = 'System error';
            }

            unset($_POST['add_product']);
        }
        return $this->view('admin', [
            'page' => 'product/add',
            'categories' => $categories,
            'msg' => $msg,
            'type' => $type,
            'title' => 'SẢN PHẨM',
            'js' => ['uploadImg']
        ]);
    }

    function update_product($id)
    {
        $msg = [];
        $type = [];

        $product = $this->products->SelectProduct($id);
        $productImg = $this->products->SelectProductImg($id);
        $categories = $this->categories->getAll();

        if (isset($_POST['update_product']) && ($_POST['update_product'])) {
            $image = "";
            $updated_at = date('Y-m-d H:i:s');
            $image_array = array();

            $name = $_POST['productname'];
            $price = $_POST['price'];
            $category = $_POST['category'];
            $desc = $_POST['description'];

            $detail_img = $_FILES['detail_image'];

            if (!empty($detail_img))
                for ($i = 0; $i < count($detail_img['name']); $i++) {
                    $img = $this->processImg($detail_img['name'][$i], $detail_img['tmp_name'][$i]);
                    array_push($image_array, $img);
                }

            if (isset($_FILES['product']['name'])){
                $image = $this->processImg($_FILES['product']['name'], $_FILES['product']['tmp_name']);
            }
                
            $status = $this->products->updateProduct($id, $name, $image, $category, $price, $desc, $updated_at);
            // show_array($image_array);
                
            if (!empty($image_array['0'])) {
                $this->products->deleteImgPro($id);
                foreach ($image_array as $name) {
                    $this->products->addImageProduct($id, $name, $updated_at);
                }
            }

            if ($status) {
                $type = 'success';
                $msg = 'Updated product successfully';
                $_SESSION['msg'] = $msg;
                header('Location: ' . _WEB_ROOT . '/product/list');
            } else {
                $type = 'danger';
                $msg = 'System error';
            }

            unset($_POST['update_product']);
        }

        return $this->view('admin', [
            'page' => 'product/update',
            'product' => $product,
            'categories' => $categories,
            'productImg' => $productImg,
            'msg' => $msg,
            'type' => $type,
            'title' => 'SẢN PHẨM',
            'js' => ['uploadImg']
        ]);
    }

    function delete_product($id)
    {
        $this->products->deleteImgPro($id);
        $status = $this->products->deletePro($id);
        if ($status) echo -1;
        else echo -2;
    }



    function processImg($filesName, $tmpName)
    {
        if (isset($filesName) && !empty($filesName)) {
            $date = new DateTimeImmutable();
            $fileNameArr = explode(".", $filesName);
            $name = $date->getTimestamp() . rand();
            $target_file = _UPLOAD . '/product/' .  basename($name . "." . $fileNameArr[1]);

            if (move_uploaded_file($tmpName, $target_file)) {
                return $name . "." . $fileNameArr[1];
            }
        }
    }
}
