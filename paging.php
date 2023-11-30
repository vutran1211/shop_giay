<?php
if ($count_product > $num_per_page) {
	$num_page = ceil($count_product / $num_per_page);
?>
	<nav class="mb-5 d-flex justify-content-center">
		<ul class="pagination fs-2 gap-4">
			<?php
			if (isset($_GET['page']) && $_GET['page'] != 1) {
			?>
				<li class="page-item">
					<a class="page-link px-4 outline-main" href="
							  <?php echo _WEB_ROOT . '/product/show_product?';
								if (!empty($_GET['cate'])) {
									echo 'cate=' . $_GET['cate'];
								}
								if (!empty($_GET['search'])) {
									echo 'search=' . $_GET['search'];
								}
								if (isset($_GET['page'])) {
									echo '&page=' . (int)($_GET['page'] - 1);
								}
								?>
							  " class="page-link"><i class="fa-solid fa-chevron-left"></i></a>
				</li>
			<?php
			}
			for ($i = 1; $i <= $num_page; $i++) {
			?>
				<li class="page-item"><a class="page-link px-4 outline-main 
						 <?php if ((isset($_GET['page']) && $_GET['page'] == $i) || (!isset($_GET['page']) && $num_page > 1 && $i == 1)) echo ' active-cate' ?> " href="
						 <?php echo _WEB_ROOT . '/product/show_product?';
							if (!empty($_GET['cate'])) {
								echo 'cate=' . $_GET['cate'];
							}
							if (!empty($_GET['search'])) {
								echo 'search=' . $_GET['search'];
							}
							if (!empty($i)) {
								echo '&page=' . $i;
							}
							?>">
						<?= $i ?></a></li>
			<?php
			}
			if ((!isset($_GET['page']) && $num_page > 1) || (isset($_GET['page']) && $num_page > 1 && $_GET['page'] < $num_page)) {
			?>
				<li class="page-item">
					<a class="page-link px-4 outline-main" href="
							  <?php echo _WEB_ROOT . '/product/show_product?';
								if (!empty($_GET['cate'])) {
									echo 'cate=' . $_GET['cate'];
								}
								if (!empty($_GET['search'])) {
									echo 'search=' . $_GET['search'];
								}

								if (isset($_GET['page'])) {
									echo '&page=' . (int)($_GET['page'] + 1);
								} else echo '&page=2';

								?>
							  " class="page-link"><i class="fa-solid fa-chevron-right"></i></a>
				</li>
			<?php
			}
			?>
		</ul>
	</nav>
<?php
}
