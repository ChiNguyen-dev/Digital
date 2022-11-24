<?php get_header(); ?>
<div id="main-content-wp" class="cart-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?page=home" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Sản phẩm làm đẹp da</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="wrapper" class="wp-inner clearfix">
        <div class="section" id="info-cart-wp">
            <div class="section-detail table-responsive">
                <?php if (isset($_SESSION["cart"])) { ?>
                    <table class="table">
                        <thead>
                        <tr>
                            <td>Mã sản phẩm</td>
                            <td>Ảnh sản phẩm</td>
                            <td>Tên sản phẩm</td>
                            <td>Giá sản phẩm</td>
                            <td>Số lượng</td>
                            <td>Thành tiền</td>
                            <td></td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (isset($_SESSION["cart"])) { ?>
                            <?php foreach ($_SESSION["cart"]["buy"] as $key => $item) { ?>
                                <tr>
                                    <td><?php echo $item["code"] ?></td>
                                    <td>
                                        <a href="" title="" class="thumb">
                                            <img src="admin/<?php echo $item["image"] ?>" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="san-pham/<?php echo create_slug($item["name"]) ?>-<?php echo $item["id"] ?>.html"
                                           title=""
                                           class="name-product"><?php echo $item["name"] ?></a>
                                    </td>
                                    <td><?php echo currency_format($item["price"]) ?></td>
                                    <td>
                                        <input type="text" name="num-order" value="<?php echo $item["quantity"] ?>"
                                               class="num-order">
                                    </td>
                                    <td><?php echo currency_format($item["total"]) ?></td>
                                    <td>
                                        <a href="cart/delete-<?php echo $key ?>" title="" class="del-product">
                                            <i class="fa-regular fa-trash-can"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="7">
                                <div class="d-flex flex-md-row-reverse clearfix">
                                    <p id="total-price" class="">
                                        Tổng giá:
                                        <span><?php echo isset($_SESSION["cart"]) ? currency_format($_SESSION["cart"]["infor"]["total_order"]) : 0 ?></span>
                                    </p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="7">
                                <div class="clearfix">
                                    <div class="d-flex flex-md-row-reverse">
                                        <a href="checkout.html" title="" id="checkout-cart">Thanh toán</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                <?php } ?>
                <?php if (!isset($_SESSION["cart"])) { ?>
                    <div class="w-100 bg-white" style="position: relative">
                        <div class="cart-empty">
                            <img src="public/images/cart-empty.png" alt="">
                        </div>
                        <p class="cart-title text-center text-muted">Giỏ hàng chưa có sản phẩm nào</p>
                        <div class="d-flex justify-content-center pb-3">
                            <a href="<?php echo base_url() ?>" class="buy-now">Mua sắm ngay</a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="section" id="action-cart-wp">
            <div class="section-detail">
                <p class="title">
                    Click vào <span>“Cập nhật giỏ hàng”</span> để cập nhật số lượng. Nhập vào số lượng
                    <span>0</span> để xóa sản phẩm khỏi giỏ hàng. Nhấn vào thanh toán để hoàn tất mua hàng.</p>
                <a href="?page=home" title="" id="buy-more">Mua tiếp</a><br/>
                <a href="cart/deleteAll" title="" id="delete-cart">Xóa giỏ hàng</a>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>
