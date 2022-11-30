<?php get_header(); ?>
    <div id="main-content-wp" class="add-cat-page menu-page">
        <div class="wrap clearfix">
            <?php get_sidebar("admin"); ?>
            <div id="content" class="container-fluid mr-0">
                <div class="row">
                    <?php if ($isRole) { ?>
                        <div class="col-4">
                            <div class="card">
                                <div class="card-header font-weight-bold">
                                    Thêm màu mới
                                </div>
                                <div class="card-body">
                                    <form method="post">
                                        <div class="form-group">
                                            <label for="name">Tên màu</label>
                                            <input class="form-control" type="text" name="name" id="name" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="favcolor">Chọn màu</label>
                                            <input type="color" class="form-control" id="favcolor" name="favcolor"
                                                   value="#ff0000">
                                        </div>
                                        <button type="button" class="btn btn-primary" id="add-color">Thêm mới</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="col-8">
                        <div class="card">
                            <div class="card-header font-weight-bold">
                                Danh sách màu
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tên màu</th>
                                        <th scope="col">Màu</th>
                                        <th scope="col">Trạng thái</th>
                                        <th scope="col">Tác vụ</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if (!empty($colors)) { ?>
                                        <?php foreach ($colors as $key => $color) { ?>
                                            <tr data-color="<?php echo $color["color_id"]; ?>">
                                                <th scope="col"><?php echo $key + 1; ?></th>
                                                <td><?php echo $color["name"]; ?></td>
                                                <td>
                                                <span style="padding: 5px 20px;
                                                             border-radius: 50px;
                                                 <?php echo "color: " . $color["style"] . ";" . " background-color: " . $color["style"] . ";"; ?>">
                                                color
                                                </span>
                                                </td>
                                                <td><span class="status-color"
                                                          style="<?php echo $color['active'] == 0 ? "color: #636e72" : 'color: #009432'; ?>"><i
                                                                class="fa-solid fa-circle-check"></i>
                                                    </span>
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
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>