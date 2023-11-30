<?php
class Bill extends Controller
{

	private $bills;
	function __construct()
	{
		$this->users = $this->model('UserModel');
		$this->products = $this->model('ProductModel');
		$this->categories = $this->model('CategoryModel');
		$this->bills = $this->model('BillModel');
	}

	public function index()
	{
		$keyword = '';
		$status = -1;

		if (isset($_POST['status'])) {
			$status = $_POST['status'];
		}
		if (isset($_GET['status'])) {
			$status = $_GET['status'];
		}
		if (isset($_GET['search'])) {
			$keyword = $_GET['search'];
			if($keyword == 'khong co tai khoan') {
				$keyword = 0;
			}
		}

		$getAllBill = $this->bills->getAllBill($status,0, $keyword);
		$count_product = !empty($getAllBill)? count($getAllBill):0;
		// show_array($count_product);

        $num_per_page = 8;
        $page = isset($_GET['page'])?(int)$_GET['page']:1;
        $start = ($page - 1) * $num_per_page;
        $getAllBillAdmin = $this->bills->getAllBillAdmin($status, $keyword, $start, $num_per_page);
		// show_array($getAllBillAdmin);
		$billsNew = [];
		foreach ($getAllBillAdmin as $bill) {
			$bill['detail'] = $this->bills->getDetailBill($bill['id']);
			if ($bill['user_id'] > 0) {
				$bill['email_user'] = $this->users->SelectUser($bill['user_id'])['email'];
				$bill['name_user'] = $this->users->SelectUser($bill['user_id'])['name'];
			} else {
				$bill['email_user'] = '';
				$bill['name_user'] = '';
				$bill['user_id'] = 'Không có tài khoản';
			}
			array_push($billsNew, $bill);
		}
		// show_array($billsNew);
		return $this->view('admin', [
			'page' => 'bill/list',
			// 'getAllBill' => $billsNew,
			'js' => ['deletedata', 'search'],
			'title' => 'DANH SÁCH ĐƠN HÀNG',
			'keyword' => $keyword,
			'billsNew' => $billsNew,
            'num_per_page' => $num_per_page,
            'count_product' => $count_product,
            'keyword' => $keyword,
			'pagePag' => 'bill',
		]);
	}

	public function show_bill()
	{
		// show_array($_SESSION['user']);
		$status = -1;
		if (isset($_GET['type'])) {
			$status = $_GET['type'];
		}
		if (isset($_SESSION['user'])) {
			$user_id = $_SESSION['user']['id'];
		}
		$categories = $this->categories->getAllCl();

		$getAllBill = $this->bills->getAllBill($status, $user_id, '');
		// show_array($getAllBill);
		$billsNew = [];

		foreach ($getAllBill as $bill) {
			$bill['detail'] = $this->bills->getDetailBill($bill['id']);
			array_push($billsNew, $bill);
		}

		$this->view("client", [
			'page' => 'bill',
			'title' => 'Đơn hàng',
			'css' => ['base', 'main'],
			'js' => ['main'],
			'getAllBill' => $billsNew,
			'categories' => $categories,


		]);
	}

	public function add_bill()
	{

		if (isset($_POST['add_bill']) && ($_POST['add_bill']) != " ") {
			$fullname = $_POST['fullname'];
			$tel = $_POST['tel'];
			$email = $_POST['email'];
			$address = $_POST['address'];
			$note = $_POST['note'];
			$total = $_POST['total'];
			$method = $_POST['method'];
			if (isset($_SESSION['user'])) {
				$user_id = $_SESSION['user']['id'];
			} else $user_id = 0;
			$created_at = date('Y-m-d H:i:s');

			$idBill = $this->bills->insertBill($fullname, $tel, $email, $address, $note, $total, $method, $user_id, $created_at);

			if ($idBill) {
				foreach ($_SESSION['cart']['buy'] as $item) {
					if (isset($item['id']) && $item['id']) {

						$this->bills->insertDetailBill($item['id'], $item['image'], $item['name'], $item['price'], $item['qty'],  $item['sub_total'], $idBill, $created_at);
					}
				}
				unset($_SESSION['cart']);
			}

			// show_array($bill);
			redirectTo('bill/show_bill');
		}
	}

	function update_bill($id)
	{
		$bill = $this->bills->SelectOneBill($id);
		// show_array($bill);

		if (!empty($bill)) {
			$updated_at = ('Y-m-d H:i:s');
			$update = $this->bills->editStatus($id, (int)$bill['status'] + 1, $updated_at);
			header('Location:' . _WEB_ROOT . '/bill');
		}
	}

	function delete_bill($id)
	{
		$status = $this->bills->deleteBill($id);
		if ($status) {
			echo -1;
		} else {
			echo -2;
		}
	}
	
}
