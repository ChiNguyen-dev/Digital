<?php get_header(); ?>
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php get_sidebar("admin"); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách đơn hàng</h3>
                    <form method="POST" class="form-s fl-right">
                        <input type="text" name="s" id="s">
                        <input type="submit" name="sm_s" value="Tìm kiếm">
                    </form>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status">
                            <li class="all">
                                <a href="">
                                    Tất cả
                                    <span class="count">(<?php echo !empty($products) ? count($products) : 0 ?>)</span>
                                </a> |
                            </li>
                            <li class="publish">
                                <a href="">
                                    Đã đăng
                                    <span class="count">(<?php echo !empty($accept) ? count($accept) : 0 ?>)</span>
                                </a>|
                            </li>
                            <li class="pending">
                                <a href="">
                                    Chờ xét duyệt
                                    <span class="count">(<?php echo !empty($confirms) ? count($confirms) : 0 ?>)</span>
                                    |
                                </a>
                            </li>
                            <li class="pending">
                                <a href="">
                                    Thùng rác
                                    <span class="count">(<?php echo !empty($deletes) ? count($deletes) : 0 ?>)</span>
                                </a>
                            </li>
                        </ul>
                        <a href="san-pham/add.html" class="btn btn-primary btn--space">Thêm</a>
                    </div>
                    <div class="actions mt-3">
                        <form method="POST" action="" class="form-actions">
                            <input type="hidden" name="checked" class="checked" value="">
                            <select name="actions">
                                <option value="0">Tác vụ</option>
                                <option value="1">Công khai</option>
                                <option value="2">Bỏ vào thủng rác</option>
                            </select>
                            <input type="submit" name="btn-submit" id="handle-items" value="Áp dụng">
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col"><input type="checkbox" name="checkAll" id="checkAll"></th>
                                <th scope="col"><span class="thead-text">STT</span></th>
                                <th scope="col"><span class="thead-text">Mã đơn hàng</span></th>
                                <th scope="col"><span class="thead-text">Khách hàng</span></th>
                                <th scope="col"><span class="thead-text">Tổng tiền</span></th>
                                <th scope="col"><span class="thead-text">Trạng thái</span></th>
                                <th scope="col"><span class="thead-text">Thời gian</span></th>
                                <th scope="col"><span class="thead-text">Chi tiết</span></th>
                                <th scope="col"><span class="thead-text">Tác vụ</span></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if ($orders != null) { ?>
                                <?php foreach ($orders as $key => $order) { ?>
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="checkItem" class="checkItem"
                                        </td>
                                        <td scope="row">
                                            <span class="tbody-text"><?php echo $key + 1; ?></span>
                                        </td>
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
                                        <td>
                                            <ul class="list-operation ml-3 mb-0">
                                                <li>
                                                    <button type="button" title="Xóa"
                                                            data-color="<?php echo $color["color_id"]; ?>"
                                                            class="delete-color">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </button>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="section pt-3" id="paging-wp">
                <div class="section-detail d-flex justify-content-between clearfix">
                    <p id="desc" class="flex-grow-1">Chọn vào checkbox để lựa chọn tất cả</p>
                    <!--                    <nav aria-label="...">-->
                    <!--                        --><?php //echo pagination($total_page, $page) ?>
                    <!--                    </nav>-->
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
