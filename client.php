<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?= _PATH_IMG_PUBLIC ?>logo-bg-white.png">
    <title>ZVH Shop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/> -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


    <?php
    if (isset($data['css'])) {
        foreach ($data['css'] as $item) {
    ?>
            <link rel="stylesheet" href="<?php echo _PATH_ROOT_PUBLIC . '/client/assets/css/' . $item . '.css' ?>">
    <?php
        }
    }

    ?>

</head>

<body>
    <div class="app">
        <?php
        require_once './mvc/views/block/client/header.php';
        ?>
        <div class="content-main">
            <?php
            require_once './mvc/views/pages/client/' . $data['page'] . '.php';

            ?>

        </div>
        <?php

        require_once './mvc/views/block/client/footer.php';
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <?php
    if (isset($data['js'])) {
        foreach ($data['js'] as $item) {
    ?>
            <script type="text/javascript" src="<?php echo _PATH_ROOT_PUBLIC . '/client/assets/js/' . $item . '.js' ?>"></script>
    <?php
        }
    }

    ?>
    <script>
        AOS.init();
    </script>
</body>

</html>