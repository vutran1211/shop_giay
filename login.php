<!-- body -->
<div class="container-fluid d-flex justify-content-center p-5 bg-login-regis">
    <div class="container-sm" data-aos="flip-right">


        <!-- Login Form -->
        <div class="form login">
            <span class="login-title">Đăng nhập</span>
            <form action="<?php echo _WEB_ROOT . '/auth/handleLogin' ?>" method="post" id="form">
                <?php
                if (isset($_SESSION['msg']) && $_SESSION['msg'] != "") {
                ?>
                    <div id="message" class="alert alert-success"><?php echo $_SESSION['msg'] ?></div>
                <?php
                    $_SESSION['msg'] = '';
                }
                ?>

                <?php
                if (isset($_SESSION['msglg']) && $_SESSION['msglg'] != "") {
                ?>
                    <div id="message" class="alert alert-danger"><?php echo $_SESSION['msglg'] ?></div>
                <?php
                    $_SESSION['msglg'] = '';
                }
                ?>
                <div class="input-field">
                    <i class="fa-solid fa-envelope"></i>
                    <input type="email" name="email" id="email" placeholder="Nhập email">
                </div>
                <div class="input-field">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" name="password" id="password" class="password" placeholder="Nhập mật khẩu">

                    <i class="fa-solid fa-eye-slash eye-icon showHidePw"></i>
                </div>

                <!-- <div class="checkbox-text">
                    <div class="checkbox-content">
                        <input type="checkbox" id="logCheck">
                        <label for="logCheck" class="text">Ghi nhớ tôi</label>
                    </div>

                    <a href="#" class="text">Quên mật khẩu?</a>
                </div> -->
                
                <input type="hidden" name="login" value="login">
                <div class="input-field button">
                    <button class="" type="submit">Đăng nhập ngay</button>
                </div>
            </form>


            <div class="login-signup">
                <span class="text">Bạn chưa có tài khoản?
                    <a href="<?= _WEB_ROOT . '/auth/register' ?>" class="text signup-link">Đăng ký ngay</a>
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

</div>