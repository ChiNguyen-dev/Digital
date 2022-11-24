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
    <link href="public/style.css" rel="stylesheet" type="text/css"/>
    <link href="public/responsive.css" rel="stylesheet" type="text/css"/>
    <link href="public/css/carousel/owl.carousel.css" rel="stylesheet" type="text/css"/>
    <link href="public/css/carousel/owl.theme.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div id="site">
    <div id="container">
        <div id="header-wp">
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
            <div id="head-body" class="clearfix">
                <div class="wp-inner d-flex">
                    <a href="" title="" id="logo" class=""><img src="public/images/logo-main.png"/></a>
                    <div id="search-wp" class="">
                        <form method="POST" action="">
                            <input type="text" name="s" id="s" placeholder="Nhập từ khóa tìm kiếm tại đây!">
                            <button type="submit" id="sm-s">Tìm kiếm</button>
                        </form>
                    </div>
                    <div id="action-wp" class="d-flex">
                        <div id="advisory-wp" class="">
                            <span class="title">Tư vấn</span>
                            <span class="phone">0819.778.801</span>
                        </div>
                        <!--                        <div id="btn-respon" class="">-->
                        <!--                            <i class="fa fa-bars" aria-hidden="true"> </i>-->
                        <!--                        </div>-->
                        <!--                        <a href="?page=cart" title="giỏ hàng" id="cart-respon-wp" class="">-->
                        <!--                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>-->
                        <!--                            <span id="num">2</span>-->
                        <!--                        </a>-->
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
                                        <span> <?php echo isset($_SESSION["cart"]) ? $_SESSION["cart"]["infor"]["num_order"] : 0; ?> sản phẩm</span>
                                        trong giỏ hàng</p>
                                    <ul class="list-cart">
                                        <?php if (isset($_SESSION["cart"])) { ?>
                                            <?php foreach ($_SESSION["cart"]["buy"] as $item) { ?>
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
                                        <p class="title ">Tổng:</p>
                                        <p class="price ">
                                            <?php echo isset($_SESSION["cart"]) ? currency_format($_SESSION["cart"]["infor"]["total_order"]) : 0; ?>
                                        </p>
                                    </div>
                                    <dic class="action-cart d-flex justify-content-between clearfix">
                                        <a href="?mod=carts" title="Giỏ hàng" class="view-cart">Giỏ hàng</a>
                                        <a href="?mod=checkout" title="Thanh toán" class="checkout">Thanh toán</a>
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