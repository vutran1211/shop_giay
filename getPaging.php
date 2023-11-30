<?php

function getPaging($count_product, $num_per_page) {
	require_once './mvc/views/block/client/paging.php';
}
function getPagingAdmin($count_product, $num_per_page, $pagePag) {
	require_once './mvc/views/block/admin/pagingAdmin.php';
}