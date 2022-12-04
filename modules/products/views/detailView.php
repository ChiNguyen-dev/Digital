<?php get_header(); ?>
<div id="main-content-wp" class="pt-0 clearfix detail-product-page">
    <div class="container">
        <div class="row">
            <div class="col-md-12 pl-0">
                <div class="secion" id="breadcrumb-wp">
                    <div class="secion-detail">
                        <ul class="list-item clearfix ">
                            <li>
                                <a href="" title="">Trang chủ</a>
                            </li>
                            <li>
                                <a href="" title="">Điện thoại</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wp-inner d-flex">
        <?php get_sidebar(); ?>
        <div class="main-content">
            <div class="section" id="detail-product-wp">
                <div class="section-detail clearfix">
                    <div class="thumb-wp">
                        <a href="" title="" id="main-thumb">
                            <img id="zoom" src="admin/<?php echo $images[0]["image"] ?>"/>
                        </a>
                        <div id="list-thumb" class="owl-carousel">
                            <?php if ($images != null) ?>
                            <?php foreach ($images as $image) { ?>
                                <div class="thumbnail">
                                    <img class="thumbnail__image" src="admin/<?php echo $image["image"] ?>"/>
                                </div>
                            <?php } ?>
                            <?php ?>
                        </div>
                    </div>
                    <div class="thumb-respon-wp">
                        <img src="public/images/img-pro-01.png" alt="">
                    </div>
                    <div class="info">
                        <h3 class="product-name"> <?php echo !empty($product["p_name"]) ? $product["p_name"] : "" ?></h3>
                        <div class="desc">
                            <?php echo !empty($product["detail"]) ? $product["detail"] : "" ?>
                        </div>
                        <div class="color">
                            <?php if ($colors != null) { ?>
                                <?php if (count($colors) == 1) { ?>
                                    <div class="color__infor color__infor--active"
                                         color-id="<?php echo $colors[0]['color_id']; ?>">
                                        <?php echo $colors[0]['name']; ?>
                                    </div>
                                <?php } else { ?>
                                    <?php foreach ($colors as $key => $color) { ?>
                                        <div class="color__infor <?php echo $key == 0 ? "color__infor--active" : "" ?>"
                                             color-id="<?php echo $color['color_id']; ?>">
                                            <?php echo $color['name']; ?>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                            <?php } ?>
                        </div>
                        <div class="num-product">
                            <span class="title">Số lượng: </span>
                            <span class="status"><?php echo $inventory != null || isset($_SESSION["cart"]) ? $inventory["quantity"] : "" ?></span>
                        </div>
                        <div class="d-flex align-items-center pt-2 pb-3">
                            <div id="num-order-wp">
                                <button type="button" class="minus"><i class="fa-solid fa-minus"></i></button>
                                <input type="text"
                                       class="quantity"
                                       data-price="<?php echo !empty($product["price"]) ? $product["price"] : "" ?>"
                                       data-quantity=" <?php echo $inventory != null ? $inventory["quantity"] : "" ?>"
                                       value="01">

                                <button type="button"
                                        data-quantity=" <?php echo $inventory != null ? $inventory["quantity"] : "" ?>"
                                        class="plus"><i class="fa-solid fa-plus"></i></button>
                            </div>
                            <p class="price price-item mb-0 mr-4"> <?php echo !empty($product["price"]) ? currency_format($product["price"]) : "" ?></p>
                        </div>
                        <a href="cart.html" type="submit" title="Thêm giỏ hàng"
                           class="add-cart add-cart--detail"
                           data-id="<?php echo !empty($product["product_id"]) ? $product["product_id"] : "" ?>">
                            Thêm giỏ hàng
                        </a>
                        <button title="Mua ngay" class="buy-now">Mua ngay</button>
                    </div>
                </div>
            </div>
            <div class="section" id="post-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Mô tả sản phẩm</h3>
                </div>
                <div class="section-detail">
                    <?php echo !empty($product["exceprt"]) ? $product["exceprt"] : "" ?>
                </div>
            </div>
            <div class="row mr-0 ml-0 pt-5 pb-5">
                <div class="feature-product__title">
                    <h2>sản phẩm cùng loại</h2>
                    <img src="public/images/Divider.png" alt="">
                </div>
                <div class="list-feature-product owl-carousel">
                    <?php if ($laptops != null) { ?>
                        <?php foreach ($laptops as $key => $laptop) { ?>
                            <div class="item">
                                <div class="cart">
                                    <div class="cart__image">
                                        <a href="san-pham/<?php echo $laptop["slug"] ?>-<?php echo $laptop["product_id"] ?>.html">
                                            <img class="cart__image-1" src="admin/<?php echo $laptop["image"]; ?>"
                                                 alt="">
                                            <img class="cart__image-2" src="public/images/img-pro-14.png" alt="">
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
                                                <a href="" title="Chi tiết"><i class="fa-solid fa-eye"></i></a>
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

        </div>
    </div>
</div>
<?php get_footer(); ?>

