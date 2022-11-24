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
                            <span class="successful-order__total">6</span>
                            <span class="successful-order__status">Đơn giao dịch thành công</span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="processing-order bg-danger mb-3 mt-3">
                            <span class="processing-order__title">Đang xử lý</span>
                            <span class="processing-order__total">6</span>
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
                                <th scope="col"><input type="checkbox" name="checkAll" id="checkAll"></th>
                                <th scope="col"><span class="thead-text">STT</span></th>
                                <th scope="col"><span class="thead-text">Mã đơn hàng</span></th>
                                <th scope="col"><span class="thead-text">Khách hàng</span></th>
                                <th scope="col"><span class="thead-text">Số lượng</span></th>
                                <th scope="col"><span class="thead-text">Tổng tiền</span></th>
                                <th scope="col"><span class="thead-text">Trạng thái</span></th>
                                <th scope="col"><span class="thead-text">Thời gian</span></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                <th scope="row"><span class="tbody-text">1</h3></span></th>
                                <td><span class="tbody-text">WEB00001</h3></span>
                                <td>
                                    <div class="tb-title fl-left">
                                        <a href="" title="">Cao Thị Trúc Linh</a>
                                    </div>
                                    <ul class="list-operation mb-0">
                                        <li>
                                            <a href="" title="Sửa" class="edit">
                                                <i class="fa-regular fa-pen-to-square" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <button type="button" title="Xóa" id-user=""
                                                    class="delete">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>
                                        </li>
                                    </ul>
                                </td>
                                <td>1</td>
                                <td><span class="tbody-text">1.500.000 VNĐ</span></td>
                                <td><span class="tbody-text">Hoạt động</span></td>
                                <td><span class="tbody-text">12-07-2016</span></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                <th scope="row"><span class="tbody-text">1</h3></span></th>
                                <td><span class="tbody-text">WEB00001</h3></span>
                                <td>
                                    <div class="tb-title fl-left">
                                        <a href="" title="">Cao Thị Trúc Linh</a>
                                    </div>
                                    <ul class="list-operation mb-0">
                                        <li>
                                            <a href="" title="Sửa" class="edit">
                                                <i class="fa-regular fa-pen-to-square" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <button type="button" title="Xóa" id-user=""
                                                    class="delete">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>
                                        </li>
                                    </ul>
                                </td>
                                <td>1</td>
                                <td><span class="tbody-text">1.500.000 VNĐ</span></td>
                                <td><span class="tbody-text">Hoạt động</span></td>
                                <td><span class="tbody-text">12-07-2016</span></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                <th scope="row"><span class="tbody-text">1</h3></span></th>
                                <td><span class="tbody-text">WEB00001</h3></span>
                                <td>
                                    <div class="tb-title fl-left">
                                        <a href="" title="">Cao Thị Trúc Linh</a>
                                    </div>
                                    <ul class="list-operation mb-0">
                                        <li>
                                            <a href="" title="Sửa" class="edit">
                                                <i class="fa-regular fa-pen-to-square" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <button type="button" title="Xóa" id-user=""
                                                    class="delete">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>
                                        </li>
                                    </ul>
                                </td>
                                <td>1</td>
                                <td><span class="tbody-text">1.500.000 VNĐ</span></td>
                                <td><span class="tbody-text">Hoạt động</span></td>
                                <td><span class="tbody-text">12-07-2016</span></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                <th scope="row"><span class="tbody-text">1</h3></span></th>
                                <td><span class="tbody-text">WEB00001</h3></span>
                                <td>
                                    <div class="tb-title fl-left">
                                        <a href="" title="">Cao Thị Trúc Linh</a>
                                    </div>
                                    <ul class="list-operation mb-0">
                                        <li>
                                            <a href="" title="Sửa" class="edit">
                                                <i class="fa-regular fa-pen-to-square" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <button type="button" title="Xóa" id-user=""
                                                    class="delete">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>
                                        </li>
                                    </ul>
                                </td>
                                <td>1</td>
                                <td><span class="tbody-text">1.500.000 VNĐ</span></td>
                                <td><span class="tbody-text">Hoạt động</span></td>
                                <td><span class="tbody-text">12-07-2016</span></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                <th scope="row"><span class="tbody-text">1</h3></span></th>
                                <td><span class="tbody-text">WEB00001</h3></span>
                                <td>
                                    <div class="tb-title fl-left">
                                        <a href="" title="">Cao Thị Trúc Linh</a>
                                    </div>
                                    <ul class="list-operation mb-0">
                                        <li>
                                            <a href="" title="Sửa" class="edit">
                                                <i class="fa-regular fa-pen-to-square" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <button type="button" title="Xóa" id-user=""
                                                    class="delete">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>
                                        </li>
                                    </ul>
                                </td>
                                <td>1</td>
                                <td><span class="tbody-text">1.500.000 VNĐ</span></td>
                                <td><span class="tbody-text">Hoạt động</span></td>
                                <td><span class="tbody-text">12-07-2016</span></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                <th scope="row"><span class="tbody-text">1</h3></span></th>
                                <td><span class="tbody-text">WEB00001</h3></span>
                                <td>
                                    <div class="tb-title fl-left">
                                        <a href="" title="">Cao Thị Trúc Linh</a>
                                    </div>
                                    <ul class="list-operation mb-0">
                                        <li>
                                            <a href="" title="Sửa" class="edit">
                                                <i class="fa-regular fa-pen-to-square" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <button type="button" title="Xóa" id-user=""
                                                    class="delete">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>
                                        </li>
                                    </ul>
                                </td>
                                <td>1</td>
                                <td><span class="tbody-text">1.500.000 VNĐ</span></td>
                                <td><span class="tbody-text">Hoạt động</span></td>
                                <td><span class="tbody-text">12-07-2016</span></td>
                            </tr>
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
