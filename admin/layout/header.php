<!DOCTYPE html>
<html>
<head>
    <title>DIGITAL ADMIN</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="<?php echo base_url() ?>">
    <link rel="shortcut icon" href="public/images/favicon.png" type="image/png">
    <link href="public/reset.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet" type="text/css"/>
    <link href="public/style.css" rel="stylesheet" type="text/css"/>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="public/js/main.js" type="text/javascript"></script>
    <script src="public/js/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
    <script src="public/js/plugins/ckfinder/ckfinder.js" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
</head>
<body>
<div id="site">
    <div id="container">
        <div id="header-wp">
            <div class="wp-inner clearfix">
                <div class="box-head">
                    <a href=" " title="" id="logo" class="">
                        <img src="public/images/footer-logo.png" alt="" class="log__link"></a>
                    <div class="dropdown">
                        <div class="dropdown__select">
                            <span class="dropdown__selected"> <?php echo isset($_SESSION['isLogin']) ? $_SESSION['user_login'] : ''; ?></span>
                            <i class="fa-solid fa-caret-down"></i>
                        </div>
                        <ul class="dropdown__list">
                            <li class="dropdown__item">
                                <a class="dropdown__link" href="?mod=users&action=update">
                                    <span class="dropdown__text">Tài khoản</span>
                                    <i class="fa-solid fa-user-shield dropdown__icon"></i>
                                </a>
                            </li>
                            <li class="dropdown__item">
                                <a class="dropdown__link" href="logout">
                                    <span class="dropdown__text">Thoát</span>
                                    <i class="fa-solid fa-arrow-right-from-bracket dropdown__icon"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>


