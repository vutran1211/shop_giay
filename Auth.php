<?php

class Auth extends Controller {

	private $users;

	function __construct()
    {
        $this->products = $this->model('ProductModel');
        $this->categories = $this->model('CategoryModel');
		$this->users = $this->model('UserModel');
    }

	public function login() {

        $categories = $this->categories->getAllCl();
        $cate = 0;
        $products = $this->products->getAll('',0,$cate);
        
        $productNew = [];
        foreach ($products as $item) {
            if(!empty($this->products->getProImg($item['id']))) {
                $item['detail_img'] = $this->products->getProImg($item['id'])['image'];
            }
            array_push($productNew, $item);
        }

		$this->view("client", [
            'page' => 'login',
            'title' => 'Tài khoản',
            'css' => ['base', 'main'],
            'js' => ['main', 'jquery.validate', 'form_validate'],
            'categories' => $categories,
            'products' => $productNew,

        ]);
	}

	public function register() {

        $categories = $this->categories->getAllCl();

        $cate = 0;
        $products = $this->products->getAll('',0,$cate);
        
        $productNew = [];
        foreach ($products as $item) {
            if(!empty($this->products->getProImg($item['id']))) {
                $item['detail_img'] = $this->products->getProImg($item['id'])['image'];
            }
            array_push($productNew, $item);
        }
		$this->view("client", [
            'page' => 'register',
            'title' => 'Đăng ký',
            'css' => ['base', 'main'],
            'js' => ['main', 'jquery.validate', 'form_validate'],
            'categories' => $categories,
            'products' => $productNew,


        ]);
	}

	function handleRegister()
    {
       
        if (isset($_POST['register']) && $_POST['register'] != '') {
            $name = $_POST['fullname'];
            $email = $_POST['email'];
            $tel = $_POST['tel'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $create_at = date('Y-m-d H:i:s');
            $users = $this->users->getAll();
            $checkEmail = false;
            $message = '';
            if (!empty($users)) {
                foreach ($users as $user) {
                    if ($user['email'] == $email) {
                        $checkEmail = true;
                        break;
                    }
                }
            } else {
                $checkEmail = false;
            }
            $checkLogin = false;
            if ($checkEmail) {
                $message = 'Email đã tồn tại!';
                $checkLogin = false;
                $_SESSION['msg'] = $message;
              
            } else {
                if($password === $confirm_password) {
                    $password = password_hash($password, PASSWORD_DEFAULT);
                $status = $this->users->InsertUser($name, $email, $password, $tel, $create_at);
                if ($status) {
                    $checkLogin = true;

                    $message = 'Đăng ký tài khoản thành công';
                } else {
                    $message = 'Đã xảy ra sự cố với hệ thống, vui lòng thử lại sau';
                    $checkLogin = false;
                }
                } else {
                    $message = 'Mật khẩu không đúng!';
                    $checkLogin = 0;
                }

            }


            if ($checkLogin) {
                $_SESSION['msg'] = $message;
                header('Location: ' . _WEB_ROOT . '/Auth/login');
            } else {
               
                header('Location: ' . _WEB_ROOT . '/Auth/register');
            }
        }
    }

    function handleLogin()
    {
        if (isset($_POST['login']) && $_POST['login']) {

            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = $this->users->SelectOneUser($email);
            $message = '';

            if (!empty($user)) {
                if (password_verify($password, $user['password'])) {
                    $_SESSION['user'] = $user;
                    if((int)$user['gr_id'] ==  1){
                        header('Location: ' . _WEB_ROOT . '/admin');

                    }else{

                        header('Location: ' . _WEB_ROOT . '/home');
                    }
                } else {
                    $_SESSION['msglg'] = 'Mật khẩu không đúng';
                    $_SESSION['typelg'] = 'danger';

                    header('Location: ' . _WEB_ROOT . '/Auth/login');
                }
            } else {
                $_SESSION['msglg'] = 'Email không chính xác';
                $_SESSION['typelg'] = 'danger';

                header('Location: ' . _WEB_ROOT . '/Auth/login');
            }
        }
    }

    function logout()
    {
        unset($_SESSION['user']);
        header('Location: ' . _WEB_ROOT);
    }
}