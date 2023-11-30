<?php

class checkOut extends Controller
{
	private $products;
	private $categories;
	private $bills;

	function __construct()
	{
		$this->products = $this->model('ProductModel');
		$this->categories = $this->model('CategoryModel');
		$this->bills = $this->model('BillModel');
		$this->user = $this->model('UserModel');
	}

	public function index()
	{
		$categories = $this->categories->getAllCl();
		if(isset($_SESSION['user'])) {
			$email = $_SESSION['user']['email'];
			$user = $this->user->SelectOneUser($email);
	  } else $user = '';
		
		if(isset($_SESSION['cart'])) {
			$this->view("client", [
				'page' => 'checkout',
				'title' => 'Thanh toán',
				'css' => ['base', 'main'],
				'js' => ['main'],
				'categories' => $categories,
				'user' => $user,

				'js' => ['main', 'jquery.validate', 'form_validate','vn_pay'],
	
	
	
	
			]);
		} else {
			redirectTo('');
		}
	}


}
