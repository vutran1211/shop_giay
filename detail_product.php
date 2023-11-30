<div class="grid wide">
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= _WEB_ROOT . '/home' ?>">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="<?= _WEB_ROOT . '/product/show_product' ?>">Sản phẩm</a></li>
            <?php
            // show_array($data['nameCate']);
            ?>
            <li class="breadcrumb-item"><a href="<?= _WEB_ROOT . '/product/show_product?cate=' . $data['product']['cate_id'] ?>"><?php echo getNameCate($data['product']['cate_id'])['name'] ?></a></li>

            <li class="breadcrumb-item "><?= $data['product']['name'] ?></li>
        </ol>
    </nav>

    <div class="detail-product">
        <?php
        ?>
        <div class="info-product row">
            <div class="left-product col-5 d-flex" data-aos="fade-right">
                <div thumbsSlider="" class="col-3 swiper mySwiper">
                    <div class="swiper-wrapper d-flex">
                        <div class="swiper-slide swiper-slide-l">
                            <img class="w-100" style="width: 120px; height: 120px; max-width: 100%; object-fit: cover; object-position: center;" src="<?= _PATH_IMG_PRODUCT . $data['product']['image'] ?>" />
                        </div>
                        <?php
                        if (isset($data['img_product']) && $data['img_product'] != '') {
                            foreach ($data['img_product'] as $img_product) {
                        ?>
                                <div class="swiper-slide swiper-slide-l">
                                    <img class="w-100" style="width: 120px; height: 120px; max-width: 100%; object-fit: cover; object-position: center;" src="<?= _PATH_IMG_PRODUCT . $img_product['image'] ?>" />

                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>

                <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="col-9 swiper mySwiper2">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide swiper-slide-r">
                            <img class="col w-100" style="width: 330px; height: 400px; max-width: 100%; object-fit: cover; object-position: center;" src="<?php echo _PATH_IMG_PRODUCT . $data['product']['image'] ?>" alt="">
                        </div>
                        <?php
                        if (isset($data['img_product']) && $data['img_product'] != '') {
                            foreach ($data['img_product'] as $item) {
                        ?>
                                <div class="swiper-slide swiper-slide-r">
                                    <img class="col w-100" style="width: 330px; height: 330px; max-width: 100%; object-fit: cover; object-position: center;" src="<?php echo _PATH_IMG_PRODUCT . $item['image'] ?>" alt="">

                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>


            </div>
            <div class="right-product col-7" data-aos="fade-left">

                <form action="<?= _WEB_ROOT . '/cart/add_cart?id=' . $data['product']['id'] ?>" method="post">

                    <p class="title-product"><?= $data['product']['name'] ?></p>
                    <p class="code-product">Mã sản phẩm:
                        <span><?= $data['product']['id'] ?></span>
                    </p>
                    <p class="price-product"><?php numberFormat($data['product']['price']) ?></p>
                    <div class="num-order-product">
                        <span>Số lượng:</span>
                        <input type="number" id="num-order" name="num_order" value="1" min="1" class="mb-3">
                        <p><input type="submit" name="add-to-cart" href="" title="" class="add-to-cart mt-3" value="Thêm vào giỏ hàng"></p>

                </form>
            </div>
        </div>




    </div>
    <div class="content-detail">
        <p class="mb-5">CHI TIẾT SẢN PHẨM</p>
        <div class="desc-short-product">
            <p><?= $data['product']['description'] ?></p>
        </div>
    </div>


</div>
</div>