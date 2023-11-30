<!-- body -->
<div class="container-fluid d-flex justify-content-center p-5 bg-login-regis">
    <div class="container-sm" data-aos="flip-left">


        <!-- Registration Form -->
        <div class="form signup">
            <span class="login-title">Đăng ký</span>

            <form action="<?php echo _WEB_ROOT . '/auth/handleRegister' ?>" method="post" id="form">
                <?php
                if (isset($_SESSION['msg']) && $_SESSION['msg'] != "") {
                ?>
                    <div id="message" class="alert alert-danger"><?php echo $_SESSION['msg'] ?></div>
                <?php
                    $_SESSION['msg'] = '';
                }
                ?>
                <div class="input-field">
                    <input type="text" name="fullname" id="fullname" placeholder="Nhập tên của bạn">
                    <div class="icon-left">
                        <i class="fa-solid fa-user"></i>
                    </div>
                </div>
                <div class="input-field">
                    <input type="email" name="email" id="email" placeholder="Nhập email của bạn">
                    <div class="icon-left">
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                </div>
                <div class="input-field">
                    <input type="text" name="tel" id="tel" placeholder="Nhập số điện thoại">
                    <div class="icon-left">
                        <i class="fa-solid fa-phone"></i>
                    </div>
                </div>
                <div class="input-field">
                    <input type="password" name="password" id="password" class="password" placeholder="Tạo mật khẩu">
                    <div class="icon-left">
                        <i class="fa-solid fa-lock"></i>
                    </div>
                    <i class="fa-solid fa-eye-slash eye-icon showHidePw"></i>
                </div>
                <div class="input-field">
                    <input type="password" name="confirm_password" id="confirm_password" class="password" placeholder="Nhập lại mật khẩu">
                    <div class="icon-left">
                        <i class="fa-solid fa-lock"></i>
                    </div>
                    <i class="fa-solid fa-eye-slash eye-icon showHidePw"></i>

                </div>
                <input type="hidden" name="register" value="register">
                <div class="input-field button">
                    <button type="submit">Đăng ký</button>
                </div>
            </form>

            <div class="login-signup">
                <span class="text">Đã có tài khoản?
                    <a href="<?= _WEB_ROOT . '/auth/login' ?>" class="text login-link">Đăng nhập ngay
                </span>
            </div>

            <!-- <div class="line"></div>

            <div class="media-options">
                <a href="#" class="facebook">
                    <i class="fa-brands fa-facebook"></i>
                    <span>Đăng nhập với Facebook</span>
                </a>
            </div>

            <div class="media-options">
                <a href="#" class="google">
                    <img src="http:\\localhost\nlcs_mvc/public/img/icon/Google__G__Logo.svg.png" alt="">
                    <span>Đăng nhập với Google</span>
                </a>
            </div> -->
        </div>
    </div>

</div>