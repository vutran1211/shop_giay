<?php
if ((int)$_SESSION['user']['gr_id'] != 1) {
  redirectTo('');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo _PATH_ROOT_PUBLIC . "/admin/" ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo _PATH_ROOT_PUBLIC . "/admin/" ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo _PATH_ROOT_PUBLIC . "/admin/" ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo _PATH_ROOT_PUBLIC . "/admin/" ?>plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo _PATH_ROOT_PUBLIC . "/admin/" ?>dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo _PATH_ROOT_PUBLIC . "/admin/" ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo _PATH_ROOT_PUBLIC . "/admin/" ?>plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo _PATH_ROOT_PUBLIC . "/admin/" ?>plugins/summernote/summernote-bs4.min.css">
  <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-minimal@4/minimal.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />


</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?= _WEB_ROOT . '/admin' ?>" class="nav-link">Quản lý</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Liên hệ</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">




        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="<?= _WEB_ROOT ?>" class="brand-link">
        <!-- <img src="" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
        <span class="brand-text font-weight-light">ZVHSHOP</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <!-- <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div> -->
          <div class="info">
            <a href="#" class="d-block">ADMIN</a>
          </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <li class="nav-item">
              <a href="<?php echo _WEB_ROOT . "/group" ?>" class="nav-link <?php if ($data['page'] == 'group/list') echo 'active' ?>">
                <i class="fas fa-users"></i>
                <p class="pl-3">
                  Nhóm người dùng
                  <!-- <span class="right badge badge-danger">New</span> -->
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?php echo _WEB_ROOT . "/user" ?>" class="nav-link <?php if ($data['page'] == 'user/list') echo 'active' ?>">
                <i class="fas fa-user"></i>
                <p class="pl-3">
                  Người dùng
                  <!-- <span class="right badge badge-danger">New</span> -->
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?php echo _WEB_ROOT . "/category
              " ?>" class="nav-link <?php if ($data['page'] == 'category/list') echo 'active' ?>">
                <i class="fab fa-elementor"></i>
                <p class="pl-3">
                  Danh mục sản phẩm
                  <!-- <span class="right badge badge-danger">New</span> -->
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?php echo _WEB_ROOT . "/product
              " ?>" class="nav-link <?php if ($data['page'] == 'product/list') echo 'active' ?>">
                <i class="fas fa-boxes"></i>
                <p class="pl-3">
                  Sản phẩm
                  <!-- <span class="right badge badge-danger">New</span> -->
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo _WEB_ROOT . "/bill
              " ?>" class="nav-link <?php if ($data['page'] == 'bill/list') echo 'active' ?>">
                <i class="fa-solid fa-list-check"></i>
                <p class="pl-3">
                  Đơn hàng
                  <!-- <span class="right badge badge-danger">New</span> -->
                </p>
              </a>
            </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0"><?php if ($data['title']) echo $data['title'] ?></h1>
            </div><!-- /.col -->
            <?php
            if ($data['page'] != 'manager/list') {
            ?>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="<?= _WEB_ROOT . '/admin' ?>">TRANG CHỦ</a></li>
                  <li class="breadcrumb-item active"><?php if ($data['title']) echo $data['title'] ?></li>
                </ol>
              </div>
            <?php
            }
            ?>
            <!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <?php
          if (file_exists(_VIEW_PATH . '/pages/admin/' . $data['page'] . '.php')) {
            require_once './mvc/views/pages/admin/' . $data['page'] . '.php';
          } else {
            echo '<h1>khong co duong dan ' . _VIEW_PATH . '/pages/admin/' . $data['page'] . '.php' . ' <h1>';
          }
          ?>
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      2022
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="<?php echo _PATH_ROOT_PUBLIC . "/admin/" ?>plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?php echo _PATH_ROOT_PUBLIC . "/admin/" ?>plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo _PATH_ROOT_PUBLIC . "/admin/" ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="<?php echo _PATH_ROOT_PUBLIC . "/admin/" ?>plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="<?php echo _PATH_ROOT_PUBLIC . "/admin/" ?>plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="<?php echo _PATH_ROOT_PUBLIC . "/admin/" ?>plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="<?php echo _PATH_ROOT_PUBLIC . "/admin/" ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="<?php echo _PATH_ROOT_PUBLIC . "/admin/" ?>plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="<?php echo _PATH_ROOT_PUBLIC . "/admin/" ?>plugins/moment/moment.min.js"></script>
  <script src="<?php echo _PATH_ROOT_PUBLIC . "/admin/" ?>plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="<?php echo _PATH_ROOT_PUBLIC . "/admin/" ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="<?php echo _PATH_ROOT_PUBLIC . "/admin/" ?>plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="<?php echo _PATH_ROOT_PUBLIC . "/admin/" ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
  <script src="<?php echo _PATH_ROOT_PUBLIC . "/admin/" ?>dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo _PATH_ROOT_PUBLIC . "/admin/" ?>dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="<?php echo _PATH_ROOT_PUBLIC . "/admin/" ?>dist/js/pages/dashboard.js"></script>



  <?php
  if (isset($data['js'])) {

    foreach ($data['js'] as $item) {
  ?>
      <script src="<?php echo _PATH_ROOT_PUBLIC . '/admin/assets/js/' . $item . '.js' ?>"></script>
  <?php
    }
  }

  ?>
</body>

</html>