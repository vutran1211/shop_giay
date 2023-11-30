<?php
class Category extends Controller
{

    private $categories;
    public function __construct()
    {
        $this->categories = $this->model('CategoryModel');
        $this->products = $this->model('ProductModel');
    }

    public function index()
    {
        $keyword = '';
        if (isset($_GET['search']) && ($_GET['search'] != '')) {
            $keyword = $_GET['search'];
        }
        $cate_id = 0;
        $categories = $this->categories->getAll($keyword);
        $getAllCl = $this->categories->getAllCl();

        // show_array($getAllCl);
        return $this->view('admin', [
            'page' => 'category/list',
            'categories' => $categories,
            'getAllCl' => $getAllCl,
            'js' => ['deletedata', 'search'],
            'title' => 'DANH MỤC SẢN PHẨM',
            'keyword' => $keyword,
        ]);
    }

    public function add_category()
    {
        $msg = '';
        $type = '';
        if (isset($_POST['add_category']) && $_POST['add_category']) {
            $name = $_POST['categoryname'];
            $created_at = date('Y-m-d H:i:s');
            $categories = $this->categories->getAll();
            $check = 0;
            foreach ($categories as $category) {
                if ($category['name'] == $name) {
                    $check = 1;
                    break;
                } else {
                    $check = 0;
                }
            }

            if ($check == 1) {
                $type = 'danger';
                $msg = 'Category name already exists';
            } else {
                $status = $this->categories->insertCate($name, $created_at);
                if ($status) {
                    $type = 'success';
                    $msg = 'Added category successfully';
                    $_SESSION['msg'] = $msg;
                    header('Location:' . _WEB_ROOT . '/category/list_category');
                    return;
                } else {
                    $type = 'danger';
                    $msg = 'System error';
                }
            }
        }
        return $this->view('admin', [
            'page' => 'category/add',
            'msg' => $msg,
            'type' => $type,
            'title' => 'DANH MỤC SẢN PHẨM'

        ]);
    }

    public function update_category($id)
    {
        $msg = '';
        $type = '';
        $category = $this->categories->selectOneCate($id);

        if (isset($_POST['update_category']) && ($_POST['update_category'])) {
            $name = $_POST['categoryname'];
            $updated_at = date('Y-m.d H:i:s');
            $categories = $this->categories->getAll();

            $check = 0;
            foreach ($categories as $category) {
                if ($category['name'] == $name) {
                    $check = 1;
                    break;
                } else {
                    $check = 0;
                }
            }
            if ($check == 1) {
                $type = 'danger';
                $msg = 'Category name already exists';
            } else {
                $status = $this->categories->updateCate($id, $name, $updated_at);
                if ($status) {
                    $type = 'success';
                    $msg = 'Updated category successfully';
                    $_SESSION['msg'] = $msg;
                    header('Location:' . _WEB_ROOT . '/category/list_category');
                    return;
                } else {
                    $type = 'danger';
                    $msg = 'System error';
                }
            }
        }
        return $this->view('admin', [
            'page' => 'category/update',
            'category' => $category,
            'msg' => $msg,
            'type' => $type,
            'title' => 'DANH MỤC SẢN PHẨM'
            
        ]);
    }

    public function delete_category($id) {
        $status = $this->categories->deleteCate($id);
        if($status) {
            echo -1;
        }
        else {
            echo -2;
        }
    }
}
