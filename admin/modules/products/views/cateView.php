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
                                Thêm danh mục mới
                            </div>
                            <div class="card-body">
                                <form method="post">
                                    <div class="form-group">
                                        <label for="name">Tên danh mục</label>
                                        <input class="form-control" type="text" name="name" id="name" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Danh mục cha</label>
                                        <select class="form-control" id="" name="cate-product">
                                            <option value="0">Chọn danh mục</option>
                                            <?php if (!empty($categories)) { ?>
                                                <?php foreach ($categories as $key => $category) { ?>
                                                    <option value="<?php echo $category["category_id"] ?>">
                                                        <?php echo $category["cate_name"] ?>
                                                    </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Trạng thái</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="exampleRadios"
                                                   id="exampleRadios1" value="option1" checked>
                                            <label class="form-check-label" for="exampleRadios1">
                                                Chờ duyệt
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="exampleRadios"
                                                   id="exampleRadios2" value="option2">
                                            <label class="form-check-label" for="exampleRadios2">
                                                Công khai
                                            </label>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-primary" id="add-cate">Thêm mới</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <div class="col-8">
                    <div class="card">
                        <div class="card-header font-weight-bold">
                            Danh mục sản phẩm
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên danh mục</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col">Tác vụ</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if (!empty($categories)) { ?>
                                    <?php foreach ($categories as $key => $category) { ?>
                                        <tr cate="<?php echo $category["category_id"] ?>">
                                            <th scope="row"><?php echo $key + 1; ?></th>
                                            <td><?php echo str_repeat("|---", $category['level']) . $category["cate_name"] ?></td>
                                            <td><?php echo $category["slug"] ?></td>
                                            <td>
                                                <ul class="list-operation ml-3 mb-0">
                                                    <li>
                                                        <button type="button" title="Xóa"
                                                                id-cate="<?php echo $category["category_id"] ?>"
                                                                class="delete-cate">
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
<div id="toast"></div>
<?php get_footer(); ?>

