<div class="grid wide">
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= _WEB_ROOT ?>">Trang chủ</a></li>

            <li class="breadcrumb-item ">
                <?php
                if (isset($_GET['cate']) || isset($_GET['search'])) {
                ?>
                    <a href="<?= _WEB_ROOT . '/product/show_product' ?>"><?= $data['title'] ?></a>
                <?php
                } else echo $data['title']
                ?>
            </li>
            <?php
            if (isset($_GET['cate'])) {
            ?>
                <li class="breadcrumb-item ">
                    <?= getNameCate($_GET['cate'])['name'] ?>
                </li>
            <?php
            }
            ?>
            <?php
            if (isset($_GET['search'])) {
            ?>
                <li class="breadcrumb-item ">
                    <?= $_GET['search'] ?>
                </li>
            <?php

            } ?>
        </ol>
    </nav>

    <ul class="category-list row">
        <?php
        foreach ($data['categories'] as $category) {

        ?>
            <li class="category-item col"><a href="?cate=<?php echo $category['id_cate'] ?>" class="category-l <?php if (isset($_GET['cate']) && $category['id_cate'] == $_GET['cate']) echo 'active-cate' ?>"><?php echo $category['name'] ?></a></li>

        <?php
        }

        ?>
    </ul>



    <div id="" class="product-main d-flex flex-wrap">
        <?php
        if (!empty($data['SelectProByPage'])) {
            foreach ($data['SelectProByPage'] as $item) {

        ?>
                <div class="product-item col-lg-3 ">
                    <a href="<?= _WEB_ROOT . '/detailproduct/product/' . $item['id'] ?>" class="home-product-item">
                        <div class="pro-product-item__img">
                            <img src="<?= _PATH_IMG_PRODUCT . $item['image'] ?>" alt="" srcset="">
                        </div>
                        <div class="home-product-item-body">
                            <h4 class="home-product-item__name"><?= $item['name'] ?></h4>
                            <div class="home-product-item__price">

                                <span class="home-product-item__price-current"><?= numberFormat($item['price']) ?></span>
                            </div>

                            <span class="home-product-item__brand">Lining</span>
                        </div>
                    </a>
                </div>
            <?php
            }
        } else {
            ?>
            <div class="text-center p-5 w-100">
                <span class="alert text-center">Không có sản phẩm bạn đang tìm kiếm, vui lòng nhập lại!</span>

            </div>
        <?php
        }
        ?>

    </div>


    <?php
    getPaging($data['count_product'], $data['num_per_page']);
    ?>





</div>