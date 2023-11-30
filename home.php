<!-- body -->

<!-- slider -->
<?php
// show_array($_SESSION['user']);

?>

<div id="carouselExampleIndicators" class="carousel slide " data-bs-ride="carousel" data-aos="fade-up">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?= _PATH_IMG_PUBLIC . '/slide/1.png' ?>" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="<?= _PATH_IMG_PUBLIC . '/slide/2.png' ?>" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="<?= _PATH_IMG_PUBLIC . '/slide/3.png' ?>" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>




<!-- body-product -->
<div class="body-product">
    <div class="grid wide">

        <div class="home-product-new mb-5" data-aos="zoom-in">
            <span class="text-center w-100 fw-bold d-block fs-1 text-color-main p-3">SẢN PHẨM MỚI NHẤT</span>
        </div>


        <?php
        if ((isset($data['categories'])) && (!empty($data['categories']))) {


            foreach ($data['categories'] as $category) {
                // show_array($category['id_cate']);
                $count = 0;


        ?>
                <section class="product-tabs" data-aos="fade-up">
                    <div class="row content-heading">
                        <a href="<?= _WEB_ROOT . '/product/show_product?cate=' . $category['id_cate'] ?>" class="content-name col-lg-4"><?php echo $category['name'] ?></a>
                        <div class="product-other-components col-lg-8">
                        </div>
                    </div>
                    <div class="product-section row">
                        <div class="product-guide-use col-lg-3">
                            <div class="product-guide-use-body" style="background-image: url(<?= _PATH_IMG_PUBLIC . 'luachon.png' ?>);">
                                <div class="product-guide-use-heading">
                                    <h2>Hướng dẫn cách chọn vợt cầu lông cho người mới chơi</h2>
                                    <a href="<?= _WEB_ROOT . '/guide?post=1' ?>" class="btn btn-view">Xem ngay</a>

                                </div>
                            </div>
                        </div>
                        <div class="product-list-item col-lg-9">
                            <div id="" class="content-list-item-body">

                                <?php
                                // show_array($data['cate_id']);

                                foreach ($data['new_product'] as $key => $product) {
                                    $data['cate_id'] = $category['id_cate'];
                                    if ($count <= 4 && $product['cate_id'] == $category['id_cate'] && $data['cate_id'] == $category['id_cate']) {
                                        $count++;
                                ?>
                                        <div class="product-item col-lg-3">
                                            <a href="<?= _WEB_ROOT . '/detailproduct/product/' . $product['id'] ?>" class="home-product-item">
                                                <div class="home-product-item__img">
                                                    <img src="<?= _PATH_IMG_PRODUCT . $product['image'] ?>" alt="" srcset="">
                                                </div>
                                                <div class="home-product-item-body">
                                                    <h4 class="home-product-item__name"><?= $product['name'] ?></h4>
                                                    <div class="home-product-item__price">
                                                        <span class="home-product-item__price-current"><?= numberFormat($product['price']) ?></span>
                                                    </div>

                                                    <!-- <div class="home-product-item__origin">
                                                        <span class="home-product-item__brand">Lining</span>
                                                        <div class="home-product-item__origin-name">Korea</div>
                                                    </div> -->
                                                    <div class="home-product-item__favourite">
                                                        <i class="fa-solid fa-check"></i>
                                                        <span>Mới nhất</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                <?php

                                    }
                                }

                                ?>




                            </div>


                        </div>
                    </div>

                </section>
        <?php
            }
        }
        ?>



        <!-- tin tức cầu lông -->
        <!-- <section class="news-tabs">
            <div class="content-heading">
                <div class="content-name">TIN TỨC CẦU LÔNG</div>
            </div>
            <div id="" class="content-list-item-body">
                <div class="product-item col-lg-3">
                    <a href="#" class="home-product-item">
                        <div class="home-product-item__img">
                            <img src="http:\\localhost\nlcs_mvc/public/img/votcaulong/vot-cau-long-lining-axforce-90-xanh-dragon-max-chinh-hang.jpg" alt="" srcset="">
                        </div>
                        <div class="home-product-item-body">
                            <h4 class="home-product-item__name">Vợt Cầu Lông Lining Axforce 90 Xanh
                                Dragon Max Chính Hãng</h4>
                            <div class="home-product-item__price">
                                <span class="home-product-item__price-old">1.200.000₫</span>
                                <span class="home-product-item__price-current">999.000₫</span>
                            </div>

                            <div class="home-product-item__origin">
                                <span class="home-product-item__brand">Lining</span>
                                <div class="home-product-item__origin-name">Korea</div>
                            </div>

                        </div>
                    </a>
                </div>
                <div class="product-item col-lg-3">
                    <a href="#" class="home-product-item">
                        <div class="home-product-item__img">
                            <img src="http:\\localhost\nlcs_mvc/public/img/votcaulong/vot-cau-long-lining-axforce-90-xanh-dragon-max-chinh-hang.jpg" alt="" srcset="">
                        </div>
                        <div class="home-product-item-body">
                            <h4 class="home-product-item__name">Vợt Cầu Lông Lining Axforce 90 Xanh
                                Dragon Max Chính Hãng</h4>
                            <div class="home-product-item__price">
                                <span class="home-product-item__price-old">1.200.000₫</span>
                                <span class="home-product-item__price-current">999.000₫</span>
                            </div>

                            <div class="home-product-item__origin">
                                <span class="home-product-item__brand">Lining</span>
                                <div class="home-product-item__origin-name">Korea</div>
                            </div>


                        </div>
                    </a>
                </div>
                <div class="product-item col-lg-3">
                    <a href="#" class="home-product-item">
                        <div class="home-product-item__img">
                            <img src="http:\\localhost\nlcs_mvc/public/img/votcaulong/vot-cau-long-lining-axforce-90-xanh-dragon-max-chinh-hang.jpg" alt="" srcset="">
                        </div>
                        <div class="home-product-item-body">
                            <h4 class="home-product-item__name">Vợt Cầu Lông Lining Axforce 90 Xanh
                                Dragon Max Chính Hãng</h4>
                            <div class="home-product-item__price">
                                <span class="home-product-item__price-old">1.200.000₫</span>
                                <span class="home-product-item__price-current">999.000₫</span>
                            </div>

                            <div class="home-product-item__origin">
                                <span class="home-product-item__brand">Lining</span>
                                <div class="home-product-item__origin-name">Korea</div>
                            </div>

                        </div>
                    </a>
                </div>
                <div class="product-item col-lg-3">
                    <a href="#" class="home-product-item">
                        <div class="home-product-item__img">
                            <img src="http:\\localhost\nlcs_mvc/public/img/votcaulong/vot-cau-long-lining-axforce-90-xanh-dragon-max-chinh-hang.jpg" alt="" srcset="">
                        </div>
                        <div class="home-product-item-body">
                            <h4 class="home-product-item__name">Vợt Cầu Lông Lining Axforce 90 Xanh
                                Dragon Max Chính Hãng</h4>
                            <div class="home-product-item__price">
                                <span class="home-product-item__price-old">1.200.000₫</span>
                                <span class="home-product-item__price-current">999.000₫</span>
                            </div>

                            <div class="home-product-item__origin">
                                <span class="home-product-item__brand">Lining</span>
                                <div class="home-product-item__origin-name">Korea</div>
                            </div>


                        </div>
                    </a>
                </div>
                <div class="product-item col-lg-3">
                    <a href="#" class="home-product-item">
                        <div class="home-product-item__img">
                            <img src="http:\\localhost\nlcs_mvc/public/img/votcaulong/vot-cau-long-lining-axforce-90-xanh-dragon-max-chinh-hang.jpg" alt="" srcset="">
                        </div>
                        <div class="home-product-item-body">
                            <h4 class="home-product-item__name">Vợt Cầu Lông Lining Axforce 90 Xanh
                                Dragon Max Chính Hãng</h4>
                            <div class="home-product-item__price">
                                <span class="home-product-item__price-old">1.200.000₫</span>
                                <span class="home-product-item__price-current">999.000₫</span>
                            </div>

                            <div class="home-product-item__origin">
                                <span class="home-product-item__brand">Lining</span>
                                <div class="home-product-item__origin-name">Korea</div>
                            </div>


                        </div>
                    </a>
                </div>
                <div class="product-item col-lg-3">
                    <a href="#" class="home-product-item">
                        <div class="home-product-item__img">
                            <img src="http:\\localhost\nlcs_mvc/public/img/votcaulong/vot-cau-long-lining-axforce-90-xanh-dragon-max-chinh-hang.jpg" alt="" srcset="">
                        </div>
                        <div class="home-product-item-body">
                            <h4 class="home-product-item__name">Vợt Cầu Lông Lining Axforce 90 Xanh
                                Dragon Max Chính Hãng</h4>
                            <div class="home-product-item__price">
                                <span class="home-product-item__price-old">1.200.000₫</span>
                                <span class="home-product-item__price-current">999.000₫</span>
                            </div>

                            <div class="home-product-item__origin">
                                <span class="home-product-item__brand">Lining</span>
                                <div class="home-product-item__origin-name">Korea</div>
                            </div>


                        </div>
                    </a>
                </div>
            </div>
        </section> -->
    </div>
</div>