<?php get_header(); ?>
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php get_sidebar("admin"); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách sản phẩm</h3>
                    <form method="POST" class="form-s fl-right">
                        <input type="text" name="s" id="s">
                        <input type="submit" name="btn-search" value="Tìm kiếm">
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
                            <select name="actions">
                                <option value="">Tác vụ</option>
                                <option value="0">Đang xử lý</option>
                                <option value="1">Công khai</option>
                                <option value="2">Bỏ vào thủng rác</option>
                            </select>
                            <input type="submit" name="btn-submit" id="handle-items" value="Áp dụng">
                            <div class="table-responsive pt-3">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col"><input type="checkbox" id="checkAll"></th>
                                        <th scope="col"><span class="thead-text">STT</span></th>
                                        <th scope="col"><span class="thead-text">Mã sản phẩm</span></th>
                                        <th scope="col"><span class="thead-text">Hình ảnh</span></th>
                                        <th scope="col"><span class="thead-text">Tên sản phẩm</span></th>
                                        <th scope="col"><span class="thead-text">Giá</span></th>
                                        <th scope="col"><span class="thead-text">Danh mục</span></th>
                                        <th scope="col"><span class="thead-text">Trạng thái</span></th>
                                        <th scope="col"><span class="thead-text">Số lượng</span></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if ($products != null) { ?>
                                        <?php foreach ($products as $key => $product) { ?>
                                            <tr data-id="<?php echo $product["product_id"]; ?>">
                                                <td>
                                                    <input type="checkbox" name="checked[]" class="checkItem"
                                                           value="<?php echo $product["product_id"]; ?>">
                                                </td>
                                                <th scope="row" class="text-center">
                                                    <span class="tbody-text">  <?php echo $key + 1; ?></span>
                                                </th>
                                                <td><span class="tbody-text"> <?php echo $product["sku"]; ?></span></td>
                                                <td>
                                                    <div class="tbody-thumb">
                                                        <img src="<?php echo $product["image"]; ?>" alt="">
                                                    </div>
                                                </td>
                                                <td class="clearfix">
                                                    <div class="tb-title fl-left">
                                                        <a href="" title=""><?php echo $product["p_name"]; ?></a>
                                                    </div>
                                                    <ul class="list-operation fl-right mb-0">
                                                        <li>
                                                            <a href="san-pham/edit-<?php echo $product["product_id"]; ?>.html"
                                                               title="Sửa" class="edit">
                                                                <i class="fa-regular fa-pen-to-square"
                                                                   aria-hidden="true"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <span class="tbody-text"><?php echo currency_format($product["price"]); ?></span>
                                                </td>
                                                <td>
                                                    <span class="tbody-text"><?php echo $product["cate_name"]; ?></span>
                                                </td>
                                                <td>
                                                    <span class="tbody-text <?php echo $product["status"] == 0 ? 'confirm' : 'complete' ?>">
                                                         <?php echo $product["status"] == 0 ? 'Chờ duyệt' : 'Công khai' ?>
                                                    </span>
                                                </td>
                                                <td class="text-center">
                                                    <span class="tbody-text"><?php echo $product["quantity"]; ?></span>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                    <div id="paging-wp">
                        <div class="d-flex justify-content-between align-items-center clearfix">
                            <p id="desc" class="flex-grow-1 mb-0">Chọn vào checkbox để lựa chọn tất cả</p>
                            <nav aria-label="...">
                                <?php echo pagination($total_page, $page) ?>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
