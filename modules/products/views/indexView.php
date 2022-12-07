<?php get_header(); ?>
<div class="container pt-4 pl-0 pr-0">
    <div class="row">
        <div class="col-md-3 pl-0 pr-0">
            <div class="sidebar-category">
                <div class="row">
                    <div class="col-md-12">
                        <div class="sidebar-category__filter">
                            <div class="filter__price filter">
                                <div class="filter__price-title">
                                    <h5 class="has-toggle ">Danh mục</h5>
                                </div>
                                <ul class="sub-menu-sidebar">
                                    <li><a href=""></a>Laptop</li>
                                    <li><a href=""></a>Điện thoại</li>
                                    <li><a href=""></a>Thiết bị âm thanh</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9 pl-0 pr-0">
            <div class="list-product-wp mt-0">
                <div class="row mr-0 ml-0">
                    <?php if ($products != null) { ?>
                        <?php foreach ($products as $key => $product) { ?>
                            <div class="col-md-4 mb-4 pr-0 ">
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
        </div>
    </div>
</div>
<?php get_footer(); ?>

