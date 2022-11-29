<?php get_header(); ?>
    <div id="main-content-wp" class="add-cat-page menu-page">
        <div class="wrap clearfix">
            <?php get_sidebar("admin"); ?>
            <div id="content" class="container-fluid mr-0">
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header font-weight-light">
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
                            </div>
                            <div class="card-body">
                                <form method="POST" action="" class="form-actions">
                                    <div class="form-group">
                                        <select name="actions" class="form-control">
                                            <option value="">Tác vụ</option>
                                            <option value="0">Đang xử lý</option>
                                            <option value="1">Công khai</option>
                                            <option value="2">Bỏ vào thủng rác</option>
                                        </select>
                                    </div>
                                    <input type="submit" name="btn-submit" id="handle-items" value="Áp dụng">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header font-weight-bold">
                                Thêm slider
                            </div>
                            <div class="card-body">
                                <form method="post" id="upload_multi">
                                    <div class="form-group">
                                        <input type="file" name="images[]" id="file" multiple="">
                                        <button type="button" class="btn-upload"><i class="fa-solid fa-upload"></i>
                                            upload file
                                        </button>
                                    </div>
                                    <div id="result"></div>
                                    <button type="submit" class="btn btn-primary" name="btn-submit">Thêm mới</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row pt-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header font-weight-bold">
                                Danh sách slider
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col"><input type="checkbox" id="checkAll"></th>
                                        <th scope="col">#</th>
                                        <th scope="col">Ảnh</th>
                                        <th scope="col">URL</th>
                                        <th scope="col">Trạng thái</th>
                                        <th scope="col">Tác vụ</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if (!empty($sliders)) { ?>
                                        <?php foreach ($sliders as $key => $slider) { ?>
                                            <tr data-color=" <?php echo $slider["slider_id"]; ?>">
                                                <td>
                                                    <input type="checkbox" name="checked[]" class="checkItem"
                                                           value=" <?php echo $slider["slider_id"]; ?>">
                                                </td>
                                                <th scope="col">
                                                    <?php echo $key + 1; ?>
                                                </th>
                                                <td>
                                                    <div class="tbody-thumb">
                                                        <img src="<?php echo $slider["image"]; ?>" alt="">
                                                    </div>
                                                </td>
                                                <td><span class="tbody-text"> <?php echo $slider["image"]; ?></span>
                                                </td>
                                                <td>
                                                    <span class="tbody-text <?php echo $slider["status"] == 0 ? 'confirm' : 'complete' ?>">
                                                         <?php echo $slider["status"] == 0 ? 'Chờ duyệt' : 'Công khai' ?>
                                                    </span>
                                                </td>
                                                <td>
                                                    <ul class="list-operation ml-3 mb-0">
                                                        <li>
                                                            <button type="button" title="Xóa"
                                                                    data-color="<?php echo $slider["slider_id"]; ?>"
                                                                    class="delete-slider">
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
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>