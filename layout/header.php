<!DOCTYPE html>
<html>
<head>
    <title>DIGITAL STORE</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="<?php echo base_url() ?>"/>
    <link rel="shortcut icon" href="public/images/favicon.png" type="image/png">
    <link href="public/reset.css" rel="stylesheet" type="text/css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet"
          type="text/css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
          integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href="public/style.css" rel="stylesheet" type="text/css"/>
    <link href="public/responsive.css" rel="stylesheet" type="text/css"/>
    <link href="public/carousel/dist/assets/owl.carousel.min.css" rel="stylesheet" type="text/css"/>
    <link href="public/carousel/dist/assets/owl.theme.default.min.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div id="site">
    <div id="header-wp">
        <div class="row ml-0 mr-0">
            <div class="col-md-12 pr-0 pl-0">
                <div id="head-top" class="clearfix">
                    <div class="wp-inne d-flex justify-content-around align-items-center">
                        <div class="d-flex align-items-center">
                            <a href="" title="" id="payment-link" class="">Office Time : 9 AM TO 6 PM </a>
                            <a href="" title="" id="contact-link" class="">nguyendev2001@gmail.com</a>
                        </div>
                        <div id="main-menu-wp" class="">
                            <ul id="sub-menu" class="mb-0 clearfix">
                                <li class="d-flex justify-content-center align-items-center">
                                    <i class="fa-solid fa-car-burst "></i>
                                    <a href="" title="">Chính sách bảo hành</a>
                                </li>
                                <li class="d-flex justify-content-center align-items-center">
                                    <i class="fa-sharp fa-solid fa-tags"></i>
                                    <a href="" title="">Khuyến mãi</a>
                                </li>
                                <li class="d-flex justify-content-center align-items-center">
                                    <i class="fa-solid fa-person-chalkboard"></i>
                                    <a href="" title="">Công nghệ</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row ml-0 mr-0">
            <div class="col-md-12 pr-0 pl-0">
                <div id="head-body" class="clearfix">
                    <div class="wp-inner d-flex">
                        <a href="" title="" id="logo">
                            <img src="public/images/logo-main.png"/>
                        </a>
                        <div class="nav-megamenu">
                            <ul class="list-megamenu">
                                <li class="list-megamenu__item">
                                    <a href="<?php echo base_url() ?>" class="listmegamenu__item-link">
                                        Trang chủ
                                    </a>
                                </li>
                                <li class="list-megamenu__item">
                                    <a href="<?php echo base_url("danh-muc") ?>" class="listmegamenu__item-link"> Danh
                                        mục</a>
                                    <?php echo menu(findAll("categories"), 0, "sub-menu") ?>
                                </li>
                                <li class="list-megamenu__item">
                                    <a href="" class="listmegamenu__item-link">Liên hệ</a>
                                </li>
                                <li class="list-megamenu__item">
                                    <a href="" class="listmegamenu__item-link">blog</a>
                                </li>
                            </ul>
                        </div>
                        <div id="action-wp">
                            <div class="box-search">
                                <div id="search">
                                    <img class="box-search__icon" src="public/images/search-svgrepo-com.svg" alt="">
                                </div>
                                <div class="input">
                                    <input type="text" placeholder="Search" value="" class="input__search">
                                    <i class="clear fa-solid fa-xmark"></i>
                                </div>
                            </div>
                            <div id="user-wp" class="">
                                <i class="fa-solid fa-user"></i>
                                <div id="user__dropdown">
                                    <ul class="list-infor">
                                        <li class="list-infor__item">
                                            <a href="" class="list-infor__item-link">Đăng nhập</a>
                                        </li>
                                        <li class="list-infor__item">
                                            <a href="" class="list-infor__item-link">Đăng ký</a>
                                        </li>
                                        <li class="list-infor__item">
                                            <a href="" class="list-infor__item-link">Sản phẩm yêu thích</a>
                                        </li>
                                        <li class="list-infor__item">
                                            <a href="" class="list-infor__item-link">Danh sách so sánh</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div id="cart-wp" class="">
                                <div id="btn-cart">
                                    <a href="?mod=carts" class="text-white">
                                        <i class="fa-solid fa-cart-shopping" aria-hidden="true"></i>
                                    </a>
                                    <span id="num">
                                    <?php echo isset($_SESSION["cart"]) ? $_SESSION["cart"]["infor"]["num_order"] : 0; ?>
                                    </span>
                                </div>
                                <div id="dropdown">
                                    <?php if (isset($_SESSION["cart"])) { ?>
                                        <p class="desc">Có
                                            <span><?php echo isset($_SESSION["cart"]) ? $_SESSION["cart"]["infor"]["num_order"] : 0; ?>
                                            sản phẩm </span>trong giỏ hàng
                                        </p>
                                        <ul class="list-cart">
                                            <?php if (isset($_SESSION["cart"])) { ?>
                                                <?php foreach (array_reverse($_SESSION["cart"]["buy"]) as $item) { ?>
                                                    <li class="clearfix">
                                                        <a href="" title="" class="thumb">
                                                            <img src="admin/<?php echo $item["image"] ?>" alt="">
                                                        </a>
                                                        <div class="info">
                                                            <a href="" title=""
                                                               class="product-name"><?php echo $item["name"] ?></a>
                                                            <p class="price mb-0"><?php echo currency_format($item["price"]) ?></p>
                                                            <p class="qty">Số lượng:
                                                                <span><?php echo $item["quantity"] ?></span></p>
                                                        </div>
                                                    </li>
                                                <?php } ?>
                                            <?php } ?>
                                        </ul>
                                        <div class="total-price clearfix">
                                            <p class="title mb-0 ">Tổng:</p>
                                            <p class="price mb-0  ">
                                                <?php echo isset($_SESSION["cart"]) ? currency_format($_SESSION["cart"]["infor"]["total_order"]) : 0; ?>
                                            </p>
                                        </div>
                                        <dic class="action-cart d-flex justify-content-between clearfix">
                                            <a href="?mod=carts" title="Giỏ hàng" class="view-cart">Giỏ hàng</a>
                                            <a href="?mod=checkout" title="Thanh toán" class="checkout">Thanh
                                                toán</a>
                                        </dic>
                                    <?php } ?>
                                    <?php if (!isset($_SESSION["cart"])) { ?>
                                        <div class="cart-empty pb-3">
                                            <img src="public/images/cart-empty.png" alt="">
                                        </div>
                                        <p class="cart-title">Giỏ hàng chưa có sản phẩm nào</p>
                                        <dic class="action-cart d-flex justify-content-center clearfix">
                                            <a href="<?php echo base_url() ?>"
                                               title="Giỏ hàng"
                                               class="buy-now">Mua sắm ngay</a>
                                        </dic>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
