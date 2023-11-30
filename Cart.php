<?php

class Cart extends Controller
{
    function __construct()
    {
        $this->products = $this->model('ProductModel');
        $this->categories = $this->model('CategoryModel');
        $this->bills = $this->model('BillModel');
    }

    public function index()
    {
        // unset($_SESSION['cart']);
        $categories = $this->categories->getAllCl();
        $cate = 0;
        $products = $this->products->getAll('', 0, $cate);

        $productNew = [];
        foreach ($products as $item) {
            // $item['detail_img'] = $this->products->getProImg($item['id'])['image'];
            array_push($productNew, $item);
        }


        $infoCart = $this->products->infoCart();
        // show_array($_SESSION['cart']);
        // show_array($_POST['qty']);
        $this->view("client", [
            'page' => 'cart',
            'title' => 'Giỏ hàng',
            'css' => ['base', 'main'],
            'js' => ['main'],
            'categories' => $categories,
            'products' => $productNew,
            'infoCart' => $infoCart
        ]);

    }



    // public function review_bill() {
    //     $status = '';

    //     $categories = $this->categories->getAllCl();

    //     $getAllBill = $this->bills->getAllBill(($status));
    //     $billsNew = [];
    //     foreach($getAllBill as $bill){
    //         $bill['detail'] = $this->bills->getDetailBill($bill['id']);
    //         array_push($billsNew,$bill);
    //     }

    //     $this->view("client", [
    //         'page' => 'review_bill',
    //         'title' => 'Chi tiết đơn hàng',
    //         'css' => ['base', 'main'],
    //         'js' => ['main'],
    //         'getAllBill' => $billsNew,
    //         'categories' => $categories,


    //     ]);
    // }


    public function add_cart()
    {
        $qty = 0;
        $id = 0;

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }

        if (isset($_POST['num_order']) && isset($_SESSION['cart']['buy'][$id])) {
            $qty = $_POST['num_order'] + $_SESSION['cart']['buy'][$id]['qty'];
        } else if (isset($_POST['num_order'])) {
            $qty = $_POST['num_order'];
        }

        $select = "SELECT * FROM products WHERE id = '$id'";

        $product = $this->products->pdo_query_one($select);

        $_SESSION['cart']['buy'][$id] = array(
            'id' => $product['id'],
            'image' => $product['image'],
            'name' => $product['name'],
            'price' => $product['price'],
            'qty' => $qty,
            'dated_at' => date('Y-m-d H:i:s'),
            'sub_total' => $product['price'] * $qty,
        );

        $this->update_cart();

        // redirectTo('cart');
        redirectTo('cart');
    }

    public function update_cart()
    {
        if (isset($_SESSION['cart'])) {
            $num_order = 0;
            $total = 0;

            foreach ($_SESSION['cart']['buy'] as $item) {
                $num_order += $item['qty'];
                $total += $item['sub_total'];
            }

            $_SESSION['cart']['info'] = array(
                'num_order' => $num_order,
                'total' => $total,
            );
        }
    }

    public function delete_cart()
    {
        $id = 0;
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }

        if (isset($_SESSION['cart'])) {
            if (!empty($id)) {
                unset($_SESSION['cart']['buy'][$id]);
            }
            if (!empty($id) && empty($_SESSION['cart']['buy'])) {
                unset($_SESSION['cart']);
            }
        }
        $this->update_cart();

        redirectTo('cart');
    }

    public function update() {
        if(isset($_SESSION['cart']) && isset($_POST['qty'])) {
            foreach($_POST['qty'] as $id => $qty) {
                $select = "SELECT * FROM products WHERE id = '$id'";

                $product = $this->products->pdo_query_one($select);

                $_SESSION['cart']['buy'][$id]['qty'] = $qty;
                $_SESSION['cart']['buy'][$id]['sub_total'] = $qty * $product['price'];
            }

            $this->update_cart();
            redirectTo('cart');
        }
    }
}
