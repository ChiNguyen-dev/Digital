<!doctype html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="public/images/favicon.png" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="public/reset.css">
    <link rel="stylesheet" href="public/css/import/login.css">
    <title>Login</title>
</head>
<body data-vide-bg="public/js/ocean">
<div class="signin">
    <h1 class="signin__heading">Đăng nhập!</h1>
    <p class="signin__welcome">Chào mừng trở lại! Vui lòng nhập chi tiết của bạn</p>
    <form action="" class="signin__form" method="post">
        <div class="form__group">
            <input type="email" name="email" class="form__input" placeholder=" "
                   value="<?php if (!empty($validation['log_fail']) || !empty($validation['password'])) echo $value_email; ?>">
            <label for="" class="form__label">Email</label>
        </div>
        <?php if (!empty($validation['email'])) echo "<p  style='color: #c0392b; font-size: 14px; margin: 0px 0 15px; padding-left: 8px;font-weight: 400; '>{$validation['email']}</p>" ?>
        <div class="form__group">
            <input type="password" name="password" class="form__input" placeholder=" ">
            <label for="" class="form__label">Mật khẩu</label>
        </div>
        <?php if (!empty($validation['password'])) echo "<p style='color: #c0392b; font-size: 14px; margin: 0px 0 15px;padding-left: 8px;font-weight: 400;'>{$validation['password']}</p>" ?>
        <?php if (!empty($validation['log_fail'])) echo "<p style='color: #c0392b; font-size: 14px; margin: 2px 0 15px;padding-left: 8px;font-weight: 400;'>{$validation['log_fail']}</p>" ?>
        <div class="form__group ">
            <button type="submit" class="form__submit" name="btn_login" value="login">
                <span class="form__submit--text">Sign in</span>
                <i class="fa-solid fa-arrow-right form__submit--icon"></i>
            </button>
        </div>
        <div class="form__tos">
            <input type="checkbox" name="" class="" id="tos">
            <label for="tos" class="form__tos-text">remember me</label>
        </div>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="public/js/jquery.vide.js"></script>
</body>
</html>


