<?php get_header(); ?>
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php get_sidebar("admin"); ?>
        <div id="content" class="detail-exhibition fl-right">
            <div class="section">
                <h3 class="section-title p-3 text-uppercase">thông tin khách hàng</h3>
                <form action="">
                    <div class="form-group pl-5">
                        <label class="infor-title">Mã đơn hàng:</label>
                        <p>#62452</p>
                    </div>
                    <div class="form-group pl-5">
                        <label class="infor-title">Địa chỉ:</label>
                        <p>19B ấp 2 Xã Vĩnh Xương, Thị xã Tân Châu, Tỉnh An Giang</p>
                    </div>
                    <div class="form-group pl-5">
                        <label class="infor-title">Số điện thoại:</label>
                        <p>0819778801</p>
                    </div>
                    <div class="form-group pl-5">
                        <label class="infor-title">Email:</label>
                        <p>19130154@st.hcmuaf.edu.vn</p>
                    </div>
                    <div class="form-group pl-5">
                        <label class="infor-title">Hỉnh thức thanh toán:</label>
                        <p>Than toán tại nhà</p>
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
                        <!--                        --><?php //if ($orders != null) { ?>
                        <!--                            --><?php //foreach ($orders as $order) { ?>
                        <!--                                <tr>-->
                        <!--                                    <th scope="row">-->
                        <!--                                        <span class="tbody-text">1</span></th>-->
                        <!--                                    <td><span class="tbody-text">-->
                        <?php //echo $order["order_id"]; ?><!--</span>-->
                        <!--                                    <td>-->
                        <!--                                        <div class="tb-title fl-left">-->
                        <!--                                            <a href="" title="">-->
                        <?php //echo $order["fullname"]; ?><!--</a>-->
                        <!--                                        </div>-->
                        <!--                                        <ul class="list-operation mb-0">-->
                        <!--                                            <li>-->
                        <!--                                                <a href="" title="Sửa" class="edit">-->
                        <!--                                                    <i class="fa-regular fa-pen-to-square" aria-hidden="true"></i>-->
                        <!--                                                </a>-->
                        <!--                                            </li>-->
                        <!--                                            <li>-->
                        <!--                                                <button type="button" title="Xóa" id-user=""-->
                        <!--                                                        class="delete">-->
                        <!--                                                    <i class="fa fa-trash" aria-hidden="true"></i>-->
                        <!--                                                </button>-->
                        <!--                                            </li>-->
                        <!--                                        </ul>-->
                        <!--                                    </td>-->
                        <!--                                    <td>-->
                        <!--                                        <span class="tbody-text">-->
                        <?php //echo currency_format($order["total"]) ?><!--</span>-->
                        <!--                                    </td>-->
                        <!--                                    <td>-->
                        <!--                                            <span class="tbody-text -->
                        <?php //echo $order["status"] == 0 ? 'confirm' : 'complete' ?><!-- ">-->
                        <!--                                               --><?php //echo $order["status"] == 0 ? 'Chờ duyệt' : 'Công khai' ?>
                        <!--                                            </span>-->
                        <!--                                    </td>-->
                        <!--                                    <td>-->
                        <!--                                        <span class="tbody-text">-->
                        <?php //echo parse_date($order["created_date"]); ?><!--</span>-->
                        <!--                                    </td>-->
                        <!--                                    <td><a href="ban-hang/don-hang--->
                        <?php //echo $order["id"] ?><!--.html">Chi tiết</a>-->
                        <!--                                    </td>-->
                        <!--                                </tr>-->
                        <!--                            --><?php //} ?>
                        <!--                        --><?php //} ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--            <div class="section">-->
            <!--                <h3 class="section-title">Giá trị đơn hàng</h3>-->
            <!--                <div class="section-detail">-->
            <!--                    <ul class="list-item clearfix">-->
            <!--                        <li>-->
            <!--                            <span class="total-fee">Tổng số lượng</span>-->
            <!--                            <span class="total">Tổng đơn hàng</span>-->
            <!--                        </li>-->
            <!--                        <li>-->
            <!--                            <span class="total-fee">5 sản phẩm</span>-->
            <!--                            <span class="total">725,000 VNĐ</span>-->
            <!--                        </li>-->
            <!--                    </ul>-->
            <!--                </div>-->
            <!--            </div>-->
        </div>
    </div>
</div>
</div>
