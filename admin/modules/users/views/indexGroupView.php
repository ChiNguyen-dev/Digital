<?php get_header(); ?>
    <div id="main-content-wp" class="list-product-page">
        <div class="wrap clearfix">
            <?php get_sidebar("admin");?>
            <div id="content" class="fl-right">
                <div class="section" id="title-page">
                    <div class="clearfix">
                        <h3 id="index" class="fl-left">Danh sách thành viên</h3>
                        <form method="GET" class="form-s fl-right">
                            <input type="text" name="s" id="s">
                            <input type="submit" name="sm_s" value="Tìm kiếm" class="btn btn-primary">
                        </form>
                    </div>
                </div>
                <div class="section" id="detail-page">
                    <div class="section-detail">
                        <div class="filter-wp clearfix">
                            <ul class="post-status mb-3">
                                <li class="all d-flex align-items-center">
                                    <a href="" class="pr-3">
                                        Tất cả
                                        <span class="count">(<?php echo !empty($members) ? count($members) : 0 ?>)</span>
                                    </a>
                                    <a href="user/add" class="btn btn-primary">thêm</a>
                                </li>
                            </ul>
                        </div>
                        <div class="table-responsive pb-2">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th><input type="checkbox" name="checkAll" id="checkAll"></th>
                                    <th scope="col"><span class="thead-text">STT</span></th>
                                    <th scope="col"><span class="thead-text">Họ và tên</span></th>
                                    <th scope="col"><span class="thead-text">Số điện thoại</span></th>
                                    <th scope="col"><span class="thead-text">Email</span></th>
                                    <th scope="col"><span class="thead-text">Vai trò</span></th>
                                    <th scope="col"><span class="thead-text">Chi tiết</span></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if (!empty($members)) { ?>
                                    <?php foreach ($members as $key => $value) { ?>
                                        <tr user="<?php echo $value["user_id"]; ?>">
                                            <th>
                                                <input type="checkbox" name="checkItem" class="checkItem">
                                            </th>
                                            <th scope="row">
                                                <span class="tbody-text"><?php echo $key + 1; ?></span>
                                            </th>
                                            <td>
                                                <div class="tb-title fl-left">
                                                    <a href="" title=""><?php echo $value["fullname"]; ?></a>
                                                </div>
                                                <ul class="list-operation fl-right mb-0">
                                                    <li>
                                                        <a href="user/edit-<?php echo $value["user_id"]; ?>.html"
                                                           title="Sửa"
                                                           class="edit">
                                                            <i class="fa-regular fa-pen-to-square"
                                                               aria-hidden="true"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <button type="button" title="Xóa"
                                                                id-user="<?php echo $value["user_id"]; ?>"
                                                                class="delete">
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                        </button>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td><span class="tbody-text"><?php echo $value["phone_number"]; ?></span>
                                            </td>
                                            <td><span class="tbody-text"><?php echo $value["email"]; ?></span></td>
                                            <td><span class="tbody-text"><?php echo $value["name"]; ?></span></td>
                                            <td><span class="tbody-text"><a href="">Chi tiết</a></span></td>
                                        </tr>
                                    <?php }
                                }; ?>
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
    <div id="toast"></div>

    <!--            <div class="modal fade" id="delete_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"-->
    <!--                 aria-hidden="true">-->
    <!--                <div class="modal-dialog" role="document">-->
    <!--                    <div class="modal-content"-->
    <!--                         style="border-radius: 7px !important;">-->
    <!--                        <div class="modal-header d-flex align-items-center" style="background-color: #cce5ff;  color: #014080;">-->
    <!--                            <svg width="1.25em" height="1.25em"-->
    <!--                                 viewBox="0 0 16 16"-->
    <!--                                 class="m-1 bi bi-bell-fill"-->
    <!--                                 fill="currentColor"-->
    <!--                                 xmlns="http://www.w3.org/2000/svg">-->
    <!--                                <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>-->
    <!--                            </svg>-->
    <!--                            <h5 class="modal-title" id="exampleModalLabel"> Welcome to Digital!</h5>-->
    <!--                            <button type="button" class="close"-->
    <!--                                    style="background-color: #cce5ff;  color: #014080; font-size: 25px;" data-dismiss="modal"-->
    <!--                                    aria-label="Close">-->
    <!--                                <span aria-hidden="true">&times;</span>-->
    <!--                            </button>-->
    <!--                        </div>-->
    <!--                        <div class="modal-body">-->
    <!--                            <h2 style="font-size: 20px;font-weight: bold;color: #014080;line-height: 20px; margin: 5px 0 13px;">-->
    <!--                                Xóa thành viên! </h2>-->
    <!--                            bạn có chắc muốn xóa ?-->
    <!--                        </div>-->
    <!--                        <div class="modal-footer">-->
    <!--                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>-->
    <!--                            <button type="button" class="btn btn-primary" data-dismiss="modal" id="isDelete" id-user="">Xóa</button>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
<?php get_footer(); ?>