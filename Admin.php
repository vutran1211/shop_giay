<?php

class Admin extends Controller
{
    function __construct()
    {
        $this->users = $this->model('UserModel');
        $this->products = $this->model('ProductModel');
        $this->categories = $this->model('CategoryModel');
        $this->bills = $this->model('BillModel');
    }

    function index()
    {
        $countUser = count($this->users->getAll());
        $countCate = count($this->categories->getAllCl());
        $countPro = count($this->products->getAll());
        $countBill = count($this->bills->getAllBill());
        $sumBill = $this->bills->sumBill();
        $sumDetailBill = $this->bills->sumDetailBill();
        // show_array($sumDetailBill);

        return $this->view('admin', [
            'title' => 'QUẢN LÝ',
            'page' => 'manager/list',
            'countUser' => $countUser,
            'countCate' => $countCate,
            'countPro' => $countPro,
            'countBill' => $countBill,
            'sumBill' => $sumBill,
            'sumDetailBill' => $sumDetailBill,
        ]);
    }
}
