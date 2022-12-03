<?php get_header(); ?>
<div id="main-content-wp" class="pt-0 home-page clearfix">
    <div class="row mb-3 mr-0 ml-0">
        <div class="col-md-12 pl-0 pr-0">
            <div class="section owl-carousel owl-theme" id="slider-wp">
                <?php if ($sliders != null) { ?>
                    <?php foreach ($sliders as $slider) { ?>
                        <div class="item">
                            <img src="admin/<?php echo $slider["image"]; ?>" alt="<?php echo $slider["image"]; ?>"
                                 style="height: 600px">
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="wp-inner">
            <div class="support-wp">
                <div class="col-md-4">
                    <div class="image-wp">
                        <img src="public/images/shipment.png" alt="">
                    </div>
                    <div class="content-wp">
                        <h6>Free shipment</h6>
                        <p>delivery charges are not hidden charges shipping policy.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="image-wp">
                        <img src="public/images/support.png" alt="">
                    </div>
                    <div class="content-wp">
                        <h6>Free shipment</h6>
                        <p>delivery charges are not hidden charges shipping policy.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="image-wp">
                        <img src="public/images/services-3.png" alt="">
                    </div>
                    <div class="content-wp">
                        <h6>Free shipment</h6>
                        <p>delivery charges are not hidden charges shipping policy.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wp-inner">
        <?php get_sidebar(); ?>
        <div class="main-content">
            <!--            <div class="section" id="support-wp">-->
            <!--                <div class="section-detail">-->
            <!--                    <ul class="list-item clearfix">-->
            <!--                        <li>-->
            <!--                            <div class="thumb">-->
            <!--                                <img src="public/images/icon-1.png">-->
            <!--                            </div>-->
            <!--                            <h3 class="title">Miễn phí vận chuyển</h3>-->
            <!--                            <p class="desc">Tới tận tay khách hàng</p>-->
            <!--                        </li>-->
            <!--                        <li>-->
            <!--                            <div class="thumb">-->
            <!--                                <img src="public/images/icon-2.png">-->
            <!--                            </div>-->
            <!--                            <h3 class="title">Tư vấn 24/7</h3>-->
            <!--                            <p class="desc">1900.9999</p>-->
            <!--                        </li>-->
            <!--                        <li>-->
            <!--                            <div class="thumb">-->
            <!--                                <img src="public/images/icon-3.png">-->
            <!--                            </div>-->
            <!--                            <h3 class="title">Tiết kiệm hơn</h3>-->
            <!--                            <p class="desc">Với nhiều ưu đãi cực lớn</p>-->
            <!--                        </li>-->
            <!--                        <li>-->
            <!--                            <div class="thumb">-->
            <!--                                <img src="public/images/icon-4.png">-->
            <!--                            </div>-->
            <!--                            <h3 class="title">Thanh toán nhanh</h3>-->
            <!--                            <p class="desc">Hỗ trợ nhiều hình thức</p>-->
            <!--                        </li>-->
            <!--                        <li>-->
            <!--                            <div class="thumb">-->
            <!--                                <img src="public/images/icon-5.png">-->
            <!--                            </div>-->
            <!--                            <h3 class="title">Đặt hàng online</h3>-->
            <!--                            <p class="desc">Thao tác đơn giản</p>-->
            <!--                        </li>-->
            <!--                    </ul>-->
            <!--                </div>-->
            <!--            </div>-->
            <div class="section" id="feature-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm nổi bật</h3>
                </div>
                <div class="section-detail owl-carousel">

                </div>
            </div>
            <div class="section" id="list-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Điện thoại</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item mb-0 clearfix">
                        <div class="row pl-2">
                            <?php if (!empty($phones)) { ?>
                                <?php foreach ($phones as $phone) { ?>
                                    <div class="col-md-3 mb-2 pl-1 pr-1">
                                        <li>
                                            <a href="san-pham/<?php echo $phone["slug"] ?>-<?php echo $phone["product_id"] ?>.html"
                                               title="" class="thumb">
                                                <img class="image-size" src="admin/<?php echo $phone["image"]; ?>"></a>
                                            <a href="?page=detail_product" title="image"
                                               class="product-name"> <?php echo $phone["p_name"] ?></a>
                                            <div class="price">
                                                <span class="new"><?php echo currency_format($phone["price"]); ?></span>
                                                <span class="old">8.990.000đ</span>
                                            </div>
                                            <div class="action clearfix">
                                                <button title="Thêm giỏ hàng" class="add-cart add-cart--home"
                                                        data-id="<?php echo $phone["product_id"]; ?>"
                                                        data-color="<?php echo $phone["color_id"]; ?>">Thêm giỏ hàng
                                                </button>
                                                <a href="?page=checkout" title="Mua ngay" class="buy-now">Mua ngay</a>
                                            </div>
                                        </li>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </ul>
                </div>
            </div>
            <div class="section" id="list-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Laptop</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <div class="row pl-2">
                            <?php if (!empty($laptops)) { ?>
                                <?php foreach ($laptops as $laptop) { ?>
                                    <div class="col-md-3 mb-2 pl-1 pr-1">
                                        <li>
                                            <a href="san-pham/<?php echo $laptop["slug"] ?>-<?php echo $laptop["product_id"] ?>.html"
                                               title="" class="thumb">
                                                <img src="admin/<?php echo $laptop["image"]; ?>">
                                            </a>
                                            <a href="" title="" class="product-name"><?php echo $laptop["p_name"] ?></a>
                                            <div class="price">
                                                <span class="new"><?php echo currency_format($laptop["price"]) ?></span>
                                                <span class="old">8.690.000đ</span>
                                            </div>
                                            <div class="action clearfix">
                                                <button title="Thêm giỏ hàng" class="add-cart add-cart--home"
                                                        data-id="<?php echo $laptop["product_id"]; ?>"
                                                        data-color="<?php echo $laptop["color_id"]; ?>">Thêm giỏ hàng
                                                </button>
                                                <a href="?page=checkout" title="Mua ngay" class="buy-now">Mua ngay</a>
                                            </div>
                                        </li>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
