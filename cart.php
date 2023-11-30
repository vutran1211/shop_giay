<?php
// desc time
$cart_buy = array();

if (isset($_SESSION['cart']['buy'])) {
	$cart_buy = $_SESSION['cart']['buy'];

	usort($cart_buy, function ($a, $b) {
		return strtotime($b['dated_at']) - strtotime($a['dated_at']);
	});
}
?>

<div class="grid wide">
	<nav>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?= _WEB_ROOT . '/home' ?>">Trang chủ</a></li>
			<li class="breadcrumb-item active"><?= $data['title'] ?></li>
		</ol>
	</nav>


	<div class="intro-heading">
		<span class="title">Giỏ hàng</span>
	</div>


	<?php
	if (isset($_SESSION['cart'])) {
		if (!empty($_SESSION['cart']['buy'])) {


	?>

			<form action="<?= _WEB_ROOT . '/cart/update' ?>" method="POST" class="bg-form-control p-4 border-radius-main border-main">
				<table class="w-100 mb-3" data-aos="fade-down">
					<thead class="fs-3">
						<tr class="">
							<!-- <th>Mã sản phẩm</th> -->
							<th class="text-center">Ảnh sản phẩm</th>
							<th class="text-center">Tên sản phẩm</th>
							<th class="text-center">Giá sản phẩm</th>
							<th class="text-center">Số lượng</th>
							<th class="text-center" colspan="2">Thành tiền</th>
						</tr>
					</thead>
					<tbody class="fs-4 border-bottom-main border-top-main">

						<?php
						if (isset($cart_buy)) {
							foreach ($cart_buy as $item) {
						?>
								<tr class="">
									<td class="text-center">
										<a href="<?= _WEB_ROOT . '/detailproduct/product/' . $item['id']  ?>" title="" class=" m-3">
											<img class="border" width="60px" src="<?= _PATH_IMG_PRODUCT . $item['image'] ?>" alt="">
										</a>
									</td>
									<td>
										<a href="<?= _WEB_ROOT . '/detailproduct/product/' . $item['id']  ?>" title="" class="name-product text-truncate"><?= $item['name'] ?></a>
									</td>
									<td class="text-end pe-5"><?= numberFormat($item['price']) ?></td>
									<td>
										<input type="number" data-id="<?= $item['id'] ?>" name="qty[<?= $item['id'] ?>]" value="<?= $item['qty'] ?>" id="num-order" min="1">
									</td>
									<td class=" text-end pe-5"><?= numberFormat($item['sub_total']) ?></td>
									<td>
										<a href="<?= _WEB_ROOT .  '/cart/delete_cart?id=' . $item['id']  ?>" title="Xoá sản phẩm" class="del-product"><i class="fa-solid fa-trash-can"></i></a>
									</td>
								</tr>
						<?php
							}
						}
						?>



					</tbody>
				</table>
				<div class="fs-3">

					<p id="total-price" class="d-flex justify-content-end gap-3 fs-2 font" data-aos="fade-left">Tổng giá:
						<span class="ml-4 fw-bold">
							<?php if (isset($_SESSION['cart'])) {
								echo numberFormat($data['infoCart']['total']);
							}
							?></span>
					</p>


						<div class="row" data-aos="fade-up">
							<div class="col d-flex justify-content-start gap-3" data-aos="fade-left">
								<a href="<?= _WEB_ROOT . '/bill/show_bill' ?>" title="" id="buy-more" class="outline-main p-3">Đơn hàng của tôi</a>
								<a href="<?= _WEB_ROOT . '/product/show_product' ?>" title="" id="buy-more" class="outline-main p-3">Mua tiếp</a>
							</div>
							<div class="col d-flex justify-content-end gap-3" data-aos="fade-right">
								<button type="submit" name="" id="update-cart" class="outline-main p-3 btn-update-cart">Cập nhật giỏ hàng</button>
								<a href="<?= _WEB_ROOT . '/checkout' ?>" title="" class="fs-3 px-5 btn-main" id="checkout-cart">Thanh toán</a>
							</div>
						</div>

				</div>
			</form>

			<div class="section-detail fs-4 mt-3"headể>
				<p class="title">Click vào <span class="text-color-main">“Cập nhật giỏ hàng”</span> để cập nhật số lượng. Nhấn vào thanh toán để vào trang thanh toán.</p>
				<!-- <a href="" title="" id="delete-cart">Xóa giỏ hàng</a> -->
			</div>

		<?php
		}
	}
	// show_array($_SESSION['cart']['buy']);
	if (empty($_SESSION['cart']['buy'])) {
		?>
		<p class="fs-3">Không có sản phẩm nào trong giỏ hàng, click <a href="home">vào đây</a> để về trang chủ</p>
	<?php
	}
	?>


</div>