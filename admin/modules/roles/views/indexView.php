<?php get_header(); ?>
<div id="main-content-wp" class="add-cat-page menu-page">
    <div class="wrap clearfix">
        <?php get_sidebar("admin"); ?>
        <div id="content" class="container-fluid mr-0">
            <div class="row">
                <div class="col-4">
                    <div class="card">
                        <div class="card-header font-weight-bold">
                            Thêm vai trò mới
                        </div>
                        <div class="card-body">
                            <form method="post">
                                <div class="form-group">
                                    <label for="name">Tên vai trò</label>
                                    <input class="form-control" type="text" name="name" id="name" value="">
                                </div>
                                <div class="form-group">
                                    <label for="desc">Mô tả</label>
                                    <textarea class="form-control" id="desc" rows="3"></textarea>
                                </div>
                                <button type="button" class="btn btn-primary" id="add-role">Thêm mới</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="card">
                        <div class="card-header font-weight-bold">
                            Danh sách vai trò
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên vai trò</th>
                                    <th scope="col">Mô tả</th>
                                    <th scope="col">Tác vụ</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if (!empty($roles)) { ?>
                                    <?php foreach ($roles as $key => $role) { ?>
                                        <tr role="<?php echo $role["role_id"] ?>">
                                            <th scope="row"><?php echo $role["role_id"] ?></th>
                                            <td><?php echo $role["name"] ?></td>
                                            <td><?php echo $role["display_name"] ?></td>
                                            <td>
                                                <ul class="list-operation ml-3 mb-0">
                                                    <li>
                                                        <button type="button" title="Xóa"
                                                                id-role="<?php echo $role["role_id"] ?>"
                                                                class="delete-role">
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
<div id="toast"></div>

