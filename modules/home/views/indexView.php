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
    <div id="support-wp">
        <div class="row mr-0 ml-0">
            <div class="col-md-4">
                <div class="box-support">
                    <div class="image-wp">
                        <img src="public/images/shipment.png" alt="">
                    </div>
                    <div class="content-wp">
                        <h6>Free shipment</h6>
                        <p>delivery charges are not hidden charges shipping policy.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box-support box-support--border">
                    <div class="image-wp">
                        <img src="public/images/support.png" alt="">
                    </div>
                    <div class="content-wp">
                        <h6>24*7 Support</h6>
                        <p>Offers A Wide Range Of Services! Look No Further.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box-support">
                    <div class="image-wp">
                        <img src="public/images/services-3.png" alt="">
                    </div>
                    <div class="content-wp">
                        <h6>Gifts and voucher</h6>
                        <p>All Gift Cards Expire 1year From Date Of Their Creation.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mr-0 ml-0">
        <div class="feature-product__title">
            <h2>sản phẩm nổi bật</h2>
            <img src="public/images/Divider.png" alt="">
        </div>
        <div class="list-feature-product owl-carousel owl-theme">
            <?php if ($laptops != null) { ?>
                <?php foreach ($laptops as $key => $laptop) { ?>
                    <div class="item">
                        <div class="cart">
                            <div class="cart__image">
                                <a href="san-pham/<?php echo $laptop["slug"] ?>-<?php echo $laptop["product_id"] ?>.html">
                                    <?php echo images($laptop["product_id"]); ?>
                                    <div class="cart__image-labels">
                                        <span class="new">new</span>
                                        <span class="sale">sale</span>
                                    </div>
                                </a>
                            </div>
                            <div class="cart__content">
                                <div class="cart-evaluation">
                                    <ul class="list-start">
                                        <li><a href=""><i class="fa-solid fa-star"></i></a></li>
                                        <li><a href=""><i class="fa-solid fa-star"></i></a></li>
                                        <li><a href=""><i class="fa-solid fa-star"></i></a></li>
                                        <li><a href=""><i class="fa-regular fa-star"></i></a></li>
                                        <li><a href=""><i class="fa-regular fa-star"></i></a></li>
                                    </ul>
                                </div>
                                <div class="cart__content-row">
                                    <div class="cart__content-row__name">
                                        <a href="san-pham/<?php echo $laptop["slug"] ?>-<?php echo $laptop["product_id"] ?>.html"><?php echo $laptop["p_name"]; ?></a>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="cart__content-price pr-3"><?php echo currency_format($laptop["price"]); ?></div>
                                    <div class="cart__content-discount">-20%</div>
                                </div>
                                <ul class="actions">
                                    <li class="actions__item">
                                        <a href="" title="Yêu thích"><i class="fa-regular fa-heart"></i></a>
                                    </li>
                                    <li class="actions__item">
                                        <a href="san-pham/<?php echo $laptop["slug"] ?>-<?php echo $laptop["product_id"] ?>.html"
                                           title="Chi tiết"><i class="fa-solid fa-eye"></i></a>
                                    </li>
                                    <li class="actions__item">
                                        <a href="" title="So sánh"><i
                                                    class="fa-solid fa-down-left-and-up-right-to-center"></i></a>
                                    </li>
                                    <li class="actions__item">
                                        <button class="add-cart--home"
                                                title="Thêm giỏ hàng"
                                                data-qty="<?php echo isset($_SESSION["cart"]) ? $_SESSION["cart"]["infor"]["num_order"] : 0; ?>"
                                                data-id="<?php echo $laptop["product_id"]; ?>"
                                                data-color="<?php echo $laptop["color_id"]; ?>"
                                        ><i class="fa-solid fa-cart-plus"></i></button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
    <div class="list-product-wp">
        <div class="list-product-wp__title">
            <h2>sản phẩm </h2>
            <img src="public/images/Divider.png" alt="">
        </div>
        <div class="row mr-0 ml-0 mt-4">
            <?php if ($products != null) { ?>
                <?php foreach ($products as $key => $product) { ?>
                    <div class="col-md-3 mb-4">
                        <div class="cart">
                            <div class="cart__image">
                                <a href="san-pham/<?php echo $product["slug"] ?>-<?php echo $product["product_id"] ?>.html">
                                    <?php echo images($product["product_id"]); ?>
                                    <div class="cart__image-labels">
                                        <span class="new">new</span>
                                        <span class="sale">sale</span>
                                    </div>
                                </a>
                            </div>
                            <div class="cart__content">
                                <div class="cart-evaluation">
                                    <ul class="list-start">
                                        <li><a href=""><i class="fa-solid fa-star"></i></a></li>
                                        <li><a href=""><i class="fa-solid fa-star"></i></a></li>
                                        <li><a href=""><i class="fa-solid fa-star"></i></a></li>
                                        <li><a href=""><i class="fa-regular fa-star"></i></a></li>
                                        <li><a href=""><i class="fa-regular fa-star"></i></a></li>
                                    </ul>
                                </div>
                                <div class="cart__content-row">
                                    <div class="cart__content-row__name">
                                        <a href="san-pham/<?php echo $product["slug"] ?>-<?php echo $product["product_id"] ?>.html"><?php echo $product["p_name"]; ?></a>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="cart__content-price pr-3"><?php echo currency_format($product["price"]); ?></div>
                                    <div class="cart__content-discount">-20%</div>
                                </div>
                                <ul class="actions">
                                    <li class="actions__item">
                                        <a href="" title="Yêu thích"><i class="fa-regular fa-heart"></i></a>
                                    </li>
                                    <li class="actions__item">
                                        <a href="san-pham/<?php echo $product["slug"] ?>-<?php echo $product["product_id"] ?>.html"
                                           title="Chi tiết"><i class="fa-solid fa-eye"></i></a>
                                    </li>
                                    <li class="actions__item">
                                        <a href="" title="So sánh"><i
                                                    class="fa-solid fa-down-left-and-up-right-to-center"></i></a>
                                    </li>
                                    <li class="actions__item">
                                        <button class="add-cart--home"
                                                title="Thêm giỏ hàng"
                                                data-qty="<?php echo isset($_SESSION["cart"]) ? $_SESSION["cart"]["infor"]["num_order"] : 0; ?>"
                                                data-id="<?php echo $product["product_id"]; ?>"
                                                data-color="<?php echo $product["color_id"]; ?>"
                                        ><i class="fa-solid fa-cart-plus"></i></button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
    <div class="container pb-3">
        <div class="row d-flex justify-content-center">
            <div id="pagination">
                <ul data-totalPage="<?php echo $total_page; ?>" data-page="<?php echo $page; ?>"></ul>
            </div>
            <script src="public/js/pagination.js"></script>
        </div>
    </div>
</div>
<?php getModal("subcribe"); ?>
<?php get_footer(); ?>
