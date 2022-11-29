<?php get_header(); ?>
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php get_sidebar("admin") ?>
        <div id="content" class="fl-right">
            <div id="box-process">
                <div class="row clearfix d-flex align-items-center justify-content-center">
                    <div class="col-md-3 ">
                        <div class="successful-order bg-primary mb-3 mt-3">
                            <span class="successful-order__title">Đơn hàng thành công</span>
                            <span class="successful-order__total"><?php echo $sucess_order; ?></span>
                            <span class="successful-order__status">Đơn giao dịch thành công</span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="processing-order bg-danger mb-3 mt-3">
                            <span class="processing-order__title">Đang xử lý</span>
                            <span class="processing-order__total"><?php echo $processing; ?></span>
                            <span class="processing-order__status">Số lượng đơn đang xử lý</span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="sales-order bg-success mb-3 mt-3">
                            <span class="sales-order__title">Doanh số bán hàng</span>
                            <span class="sales-order__total">418.120.000 VNĐ</span>
                            <span class="sales-order__status">Doanh số hệ thống</span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="cancel-order bg-dark mb-3 mt-3">
                            <span class="cancel-order__title">Đơn hàng hủy</span>
                            <span class="cancel-order__total">6</span>
                            <span class="cancel-order__status">Số đơn bị hủy</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section  mb-0" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Đơn hàng mới</h3>
                    <form method="GET" class="form-s fl-right">
                        <input type="text" name="s" id="s">
                        <input type="submit" name="sm_s" value="Tìm kiếm">
                    </form>
                </div>
            </div>
            <div class="section">
                <div class="section-detail">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col"><span class="thead-text">STT</span></th>
                                <th scope="col"><span class="thead-text">Mã đơn hàng</span></th>
                                <th scope="col"><span class="thead-text">Khách hàng</span></th>
                                <th scope="col"><span class="thead-text">Tổng tiền</span></th>
                                <th scope="col"><span class="thead-text">Trạng thái</span></th>
                                <th scope="col"><span class="thead-text">Thời gian</span></th>
                                <th scope="col"><span class="thead-text">Chi tiết</span></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if ($orders != null) { ?>
                                <?php foreach ($orders as $key => $order) { ?>
                                    <tr>
                                        <th scope="row">
                                            <span class="tbody-text"><?php echo $key + 1; ?></span>
                                        </th>
                                        <td>
                                            <span class="tbody-text"><?php echo $order["order_id"]; ?></span>
                                        <td>
                                            <span class="tbody-text"><?php echo $order["fullname"]; ?></span>
                                        </td>
                                        <td>
                                            <span class="tbody-text"><?php echo currency_format($order["total"]) ?></span>
                                        </td>
                                        <td>
                                            <span class="tbody-text <?php echo $order["status"] == 0 ? 'confirm' : 'complete' ?> ">
                                               <?php echo $order["status"] == 0 ? 'Chờ duyệt' : 'Công khai' ?>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="tbody-text"><?php echo $order["created_date"]; ?></span>
                                        </td>
                                        <td>
                                            <a href="ban-hang/don-hang-<?php echo $order["user_id"] ?>.html">Chi
                                                tiết</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    <p id="desc" class="fl-left">Chọn vào checkbox để lựa chọn tất cả</p>
                    <ul id="list-paging" class="fl-right">
                        <li>
                            <a href="" title=""><</a>
                        </li>
                        <li>
                            <a href="" title="">1</a>
                        </li>
                        <li>
                            <a href="" title="">2</a>
                        </li>
                        <li>
                            <a href="" title="">3</a>
                        </li>
                        <li>
                            <a href="" title="">></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
