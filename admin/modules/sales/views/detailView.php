<?php get_header(); ?>
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php get_sidebar("admin"); ?>
        <div id="content" class="detail-exhibition fl-right">
            <div class="section">
                <h3 class="section-title p-3 text-uppercase">thông tin đơn hàng</h3>
                <form action="" method="post">
                    <div class="form-group pl-5">
                        <label class="infor-title">Mã đơn hàng:</label>
                        <p><?php echo $details[0]["order_id"]; ?></p>
                    </div>
                    <div class="form-group pl-5">
                        <label class="infor-title">Địa chỉ:</label>
                        <p><?php echo $user["address"]; ?></p>
                    </div>
                    <div class="form-group pl-5">
                        <label class="infor-title">Số điện thoại:</label>
                        <p><?php echo $user["phone_number"]; ?></p>
                    </div>
                    <div class="form-group pl-5">
                        <label class="infor-title">Email:</label>
                        <p><?php echo $user["email"]; ?></p>
                    </div>
                    <div class="form-group pl-5">
                        <label class="infor-title">Hỉnh thức thanh toán:</label>
                        <p><?php echo $details[0]["payment_method"]; ?></p>
                    </div>
                    <div class="pl-5 d-flex align-items-center">
                        <select name="actions" class="p-2 mr-2">
                            <option value="0">Tác vụ</option>
                            <option value="1">Công khai</option>
                            <option value="2">Bỏ vào thủng rác</option>
                        </select>
                        <input type="submit" class="btn btn-primary" name="btn-submit" id="handle-items"
                               value="Áp dụng">
                    </div>
                </form>
            </div>
            <div class="section pt-4">
                <h5 class="pl-3">Sản phẩm đơn hàng:</h5>
                <div class="table-responsive pl-3 pr-3">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col"><span class="thead-text">STT</span></th>
                            <th scope="col-2"><span class="thead-text">Hình ảnh</span></th>
                            <th scope="col"><span class="thead-text">Tên sản phẩm</span></th>
                            <th scope="col"><span class="thead-text">Đơn giá</span></th>
                            <th scope="col"><span class="thead-text">Số lượng</span></th>
                            <th scope="col"><span class="thead-text">Màu sắc</span></th>
                            <th scope="col"><span class="thead-text">Thành tiền</span></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if ($details != null) { ?>
                            <?php foreach ($details as $key => $detail) { ?>
                                <tr>
                                    <th scope="row">
                                        <span class="tbody-text"><?php echo $key + 1; ?></span>
                                    </th>
                                    <td>
                                        <div class="tbody-thumb">
                                            <img src="<?php echo $detail["image"]; ?>" alt="img-product">
                                        </div>
                                    <td>
                                        <span class="tbody-text">  <?php echo $detail["p_name"]; ?></span>
                                    </td>
                                    <td>
                                        <span class="tbody-text"><?php echo currency_format($detail["total"]); ?></span>
                                    </td>
                                    <td>
                                        <span class="tbody-text"><?php echo $detail["quantity"]; ?></span>
                                    </td>
                                    <td>
                                        <span class="tbody-text"><?php echo $detail["color_name"]; ?></span>
                                    </td>
                                    <td>
                                        <span class="tbody-text"><?php echo currency_format($detail["total"]); ?></span>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="total">
                    <div class="total__quantity">
                        <p>Tổng số lượng:</p>
                        <span><?php echo $totalQuantity; ?></span>
                    </div>
                    <div class="total__order">
                        <p>Tổng đơn hàng:</p>
                        <span><?php echo currency_format($totalOrder); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
