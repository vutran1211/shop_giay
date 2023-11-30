<?php
class Controller{

    public function model($model){
        require_once "./mvc/models/".$model.".php";
        return new $model;
    }

    public function view($view, $data=[]){
        require_once "./mvc/views/".$view.".php";
    }
    
    public function numberFormat($price){
        return number_format($price, 0, '', '.') . '₫';
    }

    public function getStatusBill($status) {
        switch($status) {
            case 0:
                echo "Đang xác nhận";
                break;
            case 1:
                echo "Đang vận chuyển";
                break;
            case 2:
                echo "Đã giao";
                break;
        }
    }

}
?>