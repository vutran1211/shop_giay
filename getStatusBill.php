<?php

function getStatusBill($status) {
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