<?php get_header(); ?>
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php get_sidebar("admin"); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách khách hàng</h3>
                    <form method="GET" class="form-s fl-right">
                        <input type="text" name="s" id="s">
                        <input type="submit" name="sm_s" value="Tìm kiếm" class="btn btn-primary">
                    </form>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all">
                                <a href="">
                                    Tất cả <span class="count">(<?php echo !empty($users) ? count($users) : 0 ?>)</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="actions">
                        <form method="GET" action="" class="form-actions">
                            <select name="actions">
                                <option value="0">Tác vụ</option>
                                <option value="1">Xóa</option>
                            </select>
                            <input type="submit" name="sm_action" value="Áp dụng">
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped pb-2">
                            <thead>
                            <tr>
                                <th scope="col"><input type="checkbox" name="checkAll" id="checkAll"></th>
                                <th scope="col"><span class="thead-text">STT</span></th>
                                <th scope="col"><span class="thead-text">Họ và tên</span></th>
                                <th scope="col"><span class="thead-text">Số điện thoại</span></th>
                                <th scope="col"><span class="thead-text">Email</span></th>
                                <th scope="col"><span class="thead-text">Đơn hàng</span></th>
                                <th scope="col"><span class="thead-text">Thời gian</span></th>
                                <th scope="col"><span class="thead-text">Chi tiết</span></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (!empty($users)) { ?>
                                <?php foreach ($users as $key => $user) { ?>
                                    <tr user="<?php echo $user["user_id"]; ?>">
                                        <td>
                                            <input type="checkbox" name="checkItem" class="checkItem">
                                        </td>
                                        <th scope="row">
                                            <span class="tbody-text"><?php echo $key + 1; ?></span>
                                        </th>
                                        <td>
                                            <div class="tb-title fl-left">
                                                <a href="" title=""><?php echo $user["fullname"]; ?></a>
                                            </div>
                                            <ul class="list-operation fl-right mb-0">
                                                <li>
                                                    <a href="" title="Sửa" class="edit">
                                                        <i class="fa-regular fa-pen-to-square" aria-hidden="true"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <button type="button" title="Xóa"
                                                            id-user="<?php echo $user["user_id"]; ?>"
                                                            class="delete">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </button>
                                                </li>
                                            </ul>
                                        </td>
                                        <td><span class="tbody-text"><?php echo $user["phone_number"]; ?></span></td>
                                        <td><span class="tbody-text"><?php echo $user["email"]; ?></span></td>
                                        <td><span class="tbody-text">1</span></td>
                                        <td>
                                            <span class="tbody-text"><?php echo parse_date($user["created_date"]); ?></span>
                                        </td>
                                        <td><span class="tbody-text"><a href="">Chi tiết</a></span></td>
                                    </tr>
                                <?php }
                            } ?>
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
<?php get_footer(); ?>
