<div class="sidebar fl-left">
    <div class="section" id="category-product-wp">
        <div class="section-head">
            <h3 class="section-title">Danh mục sản phẩm</h3>
        </div>
        <div class="secion-detail">
            <?php echo menu(findAll("categories"), 0, "list-item") ?>
        </div>
    </div>
    <div class="section" id="selling-wp">
        <div class="section-head">
            <h3 class="section-title">Sản phẩm bán chạy</h3>
        </div>
        <div class="section-detail">
            <ul class="list-item">
                <?php if (products() != null) { ?>
                    <?php foreach (products() as $product) { ?>
                        <li class="clearfix">
                            <a href="?page=detail_product" title="" class="thumb">
                                <img src="admin/<?php echo $product["image"] ?>" alt="">
                            </a>
                            <div class="info">
                                <a href="?page=detail_product" title="" class="product-name"><?php echo $product["p_name"] ?></a>
                                <div class="price">
                                    <span class="new"><?php echo currency_format($product["price"]); ?></span>
                                </div>
                                <a href="" title="" class="buy-now">Mua ngay</a>
                            </div>
                        </li>
                    <?php } ?>
                <?php } ?>
            </ul>
        </div>
    </div>
    <div class="section" style="border: none;" id="banner-wp">
        <div class="section-detail">
            <a href="" title="" class="thumb">
                <img src="public/images/xxxbannerxxx3.png" alt="">
            </a>
        </div>
    </div>
</div>