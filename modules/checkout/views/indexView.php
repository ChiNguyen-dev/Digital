<?php get_header(); ?>
<div id="main-content-wp" class="checkout-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?page=home" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Thanh toán</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="wrapper" class="wp-inner d-flex clearfix">
        <div class="section" id="customer-info-wp">
            <div class="section-head">
                <h1 class="section-title">Thông tin khách hàng</h1>
            </div>
            <div class="section-detail">
                <form method="POST" action="" name="form-checkout">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group clearfix">
                                <label for="fullname" class="pb-2">Họ tên:</label>
                                <input type="text" class="form-control" name="fullname" id="fullname"
                                       placeholder="Họ và Tên"
                                       value="<?php if (!empty($fullname)) echo $fullname; ?>">
                            </div>
                            <?php if (!empty($error["fullname"])) echo "<p  style='color: #c0392b; font-size: 14px; margin: 0px 0 15px;font-weight: 400; '>{$error["fullname"]}</p>" ?>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-1 clearfix">
                                <label for="fullname " class="pb-2">Danh Xưng</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="nickName" id="male"
                                       value="1">
                                <label class="form-check-label" for="male">Anh</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="nickName" id="female"
                                       value="0">
                                <label class="form-check-label" for="female">Chị</label>
                            </div>
                            <?php if (!empty($error["nickName"])) echo "<p  style='color: #c0392b; font-size: 14px; margin: 0px 0 15px;font-weight: 400; '>{$error["nickName"]}</p>" ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group clearfix">
                                <label for="phone" class="pb-2">Số điện thoại</label>
                                <input type="text" class="form-control" name="phone" id="phone"
                                       placeholder="Điện thoại" value="<?php if (!empty($phone_number)) echo $phone_number; ?>">
                            </div>
                            <?php if (!empty($error["phone"])) echo "<p  style='color: #c0392b; font-size: 14px; margin: 0px 0 15px;font-weight: 400; '>{$error["phone"]}</p>" ?>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group clearfix">
                                <label for="email" class="pb-2">Email*</label>
                                <input type="email" class="form-control" name="email" id="email"
                                       placeholder="Email" value="<?php if (!empty($email)) echo $email; ?>">
                            </div>
                            <?php if (!empty($error["email"])) echo "<p  style='color: #c0392b; font-size: 14px; margin: 0px 0 15px;font-weight: 400; '>{$error["email"]}</p>" ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="email" class="pb-2">Địa chỉ</label>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select class="form-control data-change"
                                        name="province"
                                        data-type="0">
                                    <option value="0">Chọn tỉnh,thành phố</option>
                                    <?php if ($provinces != null) { ?>
                                        <?php foreach ($provinces as $key => $province) { ?>
                                            <option value="<?php echo $province["matp"]; ?>"><?php echo $province["name"]; ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                            <?php if (!empty($error["province"])) echo "<p  style='color: #c0392b; font-size: 14px; margin: 0px 0 15px;font-weight: 400; '>{$error["province"]}</p>" ?>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select class="form-control data-change" name="district" data-type="1">
                                    <option value="0">Chọn quận, huyện</option>
                                </select>
                            </div>
                            <?php if (!empty($error["district"])) echo "<p  style='color: #c0392b; font-size: 14px; margin: 0px 0 15px;font-weight: 400; '>{$error["district"]}</p>" ?>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select class="form-control" name="ward" data-type="2">
                                    <option value="0">Chọn phường,xã</option>
                                </select>
                            </div>
                            <?php if (!empty($error["ward"])) echo "<p  style='color: #c0392b; font-size: 14px; margin: 0px 0 15px;font-weight: 400; '>{$error["ward"]}</p>" ?>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="address" class="form-control" placeholder="Số nhà tên đường">
                            </div>
                            <?php if (!empty($error["address"])) echo "<p  style='color: #c0392b; font-size: 14px; margin: 0px 0 15px;font-weight: 400; '>{$error["address"]}</p>" ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1" class="pb-2">
                                    Yêu cầu khác(<span
                                            style='color: #c0392b; font-size: 14px; margin: 0px 0 15px; font-weight: 400; '>* Không bắt buộc</span>)
                                </label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="place-order-wp clearfix">
                        <div id="payment-checkout-wp">
                            <ul id="payment_methods">
                                <li>
                                    <input type="radio" id="direct-payment" name="payment-method" value="0">
                                    <label for="direct-payment">Thanh toán tại cửa hàng</label>
                                </li>
                                <li>
                                    <input type="radio" checked id="payment-home" name="payment-method" value="1">
                                    <label for="payment-home">Thanh toán tại nhà</label>
                                </li>
                            </ul>
                        </div>
                        <input type="submit" id="order-now" name="btn-submit" value="Đặt hàng">
                    </div>
                </form>
            </div>
        </div>
        <div class="section" id="order-review-wp">
            <div class="section-head">
                <h1 class="section-title">Thông tin đơn hàng</h1>
            </div>
            <div class="section-detail">
                <table class="shop-table">
                    <thead>
                    <tr>
                        <td>Sản phẩm</td>
                        <td>Tổng</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (isset($_SESSION["cart"])) { ?>
                        <?php foreach ($_SESSION["cart"]["buy"] as $item) { ?>
                            <tr class="cart-item">
                                <td class="product-name">
                                    <?php echo $item["name"]; ?>
                                    <strong class="product-quantity">x <?php echo $item["quantity"]; ?></strong>
                                </td>
                                <td class="product-total"><?php echo currency_format($item["total"]); ?></td>
                            </tr>
                        <?php } ?>
                    <?php } ?>

                    </tbody>
                    <tfoot>
                    <tr class="order-total">
                        <td>Tổng đơn hàng:</td>
                        <td>
                            <strong class="total-price"><?php echo isset($_SESSION["cart"]) ? currency_format($_SESSION["cart"]["infor"]["total_order"]) : "0" ?></strong>
                        </td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
