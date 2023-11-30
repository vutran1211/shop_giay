<?php
if (!isset($_SESSION['user'])) {
	redirectTo('auth/login');
}
?>
<div class="grid wide rounded bg-white mt-2">
	<nav>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?= _WEB_ROOT . '/home' ?>">Trang chủ</a></li>
			<li class="breadcrumb-item active"><?= $data['title'] ?></li>
		</ol>
	</nav>
	<form action="<?= _WEB_ROOT . '/user/update_profile' ?>" method="post" enctype="multipart/form-data" class="mb-3">
		<?php
		if (isset($_SESSION['msg']) && !empty($_SESSION['msg'])) {
		?>
			<div id="message" style="position: fixed; top: 130px; right: 100px; z-index: 1; width: 400px;" class="alert alert-success mt-3 fs-3" role="alert">
				<?= $_SESSION['msg'] ?>
			</div>
		<?php
			$_SESSION['msg'] = '';
		}
		?>
		<div class="row">
			<div class="col-4 mb-3 " data-aos="fade-right">
				<div class="d-flex flex-column align-items-center text-center p-3 fs-3"><img style="width: 350px; height: 350px;  max-width: 100%; object-fit: cover; object-position: center;" class="rounded-pill avatar" width="300px" src="
				<?php if (!empty($data['user']['avatar'])) {
					echo _PATH_AVATAR . $data['user']['avatar'];
				} else echo _PATH_IMG_PUBLIC . '/profile.jpg'; ?>">
				</div>
				<div class="col fs-3 text-center">
					<label for="">Cập nhật ảnh đại diện</label>
					<input type="file" name="avatar" id="avatar" value="" class="file-upload">
				</div>
			</div>
			<div class="col-8 fs-3" data-aos="fade-left">
				<div class="p-4 pt-0">
					<div class="d-flex justify-content-between align-items-center mb-3">
						<h4 class="text-right fs-1 fw-bold text-color-main"><?= $data['title'] ?></h4>
					</div>
					<div class="row mt-2">
						<div class="col"><label>Tên</label><input name="name" type="text" class="form-control" placeholder="first name" value="<?= $data['user']['name'] ?? '' ?>"></div>
						<div class="col"><label>Số điện thoại</label><input type="text" name="phone" class="form-control" placeholder="Điền số điện thoại" value="<?= $_SESSION['user']['phone'] ?? '' ?>"></div>
					</div>
					<div class="row mt-3">
						<div class="col mb-3"><label>Email</label><input type="text" name="email" class="form-control" placeholder="" value="<?= $data['user']['email'] ?? '' ?>"></div>
					</div>
					<div class="col-12"><label>Địa chỉ nhận hàng</label><input name="address" type="text" class="form-control" placeholder="Ghi rõ địa chỉ" value="<?= $data['user']['address'] ?? '' ?>"></div>
					<div class="col-12 mt-3"><label>Mô tả</label><textarea rows="3" name="desc" type="text" class="form-control" placeholder="Hãy viết về bản thân của bạn" value=""><?= $data['user']['description'] ?? '' ?></textarea></div>
					<input type="hidden" name="id" value="<?= $data['user']['id'] ?? '' ?>">

					<div class="mt-3 ">
						<button class="fs-3 btn-main" type="submit" name="update_profile" value="update_profile">Cập nhật thông tin</button>
					</div>
				</div>
			</div>

		</div>
	</form>
</div>