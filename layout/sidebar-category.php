<div class="sidebar-category">
    <div class="row">
        <div class="col-md-12">
            <div class="sidebar-category__filter">
                <div class="filter active">
                    <div class="filter__title">
                        <h5 class="has-toggle">Danh mục</h5>
                    </div>
                    <!--                    <ul class="sub-menu-sidebar">-->
                    <!--                        <li>-->
                    <!--                            <div class="has-toggle d-flex align-items-center">-->
                    <!--                                <a href="">Laptop</a>-->
                    <!--                                <i class="has-toggle__icon fa-solid fa-angle-down"></i>-->
                    <!--                            </div>-->
                    <!--                            <ul class="sub-menu-sidebar__chilrent">-->
                    <!--                                <li>-->
                    <!--                                    <div class="has-toggle d-flex align-items-center">-->
                    <!--                                        <a href="">Laptop</a>-->
                    <!--                                    </div>-->
                    <!--                                </li>-->
                    <!--                                <li>-->
                    <!--                                    <div class="has-toggle d-flex align-items-center">-->
                    <!--                                        <a href="">Điện thoại</a>-->
                    <!--                                    </div>-->
                    <!--                                </li>-->
                    <!--                                <li>-->
                    <!--                                    <div class="has-toggle d-flex align-items-center">-->
                    <!--                                        <a href="">Thiết bị âm thanh</a>-->
                    <!--                                    </div>-->
                    <!--                                </li>-->
                    <!--                            </ul>-->
                    <!--                        </li>-->
                    <!--                    </ul>-->
                    <?php echo menuCate(findAll("categories"), 0, "sub-menu-sidebar") ?>
                </div>
                <?php if(isset($_SESSION["slug"])){ ?>
                <div class="filter__price filter active">
                    <div class="filter__title">
                        <h5 class="has-toggle ">Giá</h5>
                    </div>
                    <ul class="sub-menu-sidebar">
                        <li><a href="<?php echo $_SESSION["slug"];?>&gia-ban=<?php echo create_slug("dưới 10 triệu"); ?>">dưới 10 triệu</a></li>
                        <li><a href="<?php echo $_SESSION["slug"];?>&gia-ban=<?php echo create_slug("từ 10 đến 15 triệu"); ?>">từ 10 đến 15 triệu</a></li>
                        <li><a href="<?php echo $_SESSION["slug"];?>&gia-ban=<?php echo create_slug("từ 15 đến 20 triệu"); ?>">từ 15 đến 20 triệu</a></li>
                        <li><a href="<?php echo $_SESSION["slug"];?>&gia-ban=<?php echo create_slug("trên 20 triệu"); ?>">trên 20 triệu</a></li>
                    </ul>
                </div>
                <?php } ?>
            </div>
        </div>
        <div class="col-md-12">
            <div class="banner">
                <img src="https://cdn.shopify.com/s/files/1/0099/8739/1539/files/left_banner.jpg?v=1613544012" alt="">
            </div>
        </div>
    </div>
</div>