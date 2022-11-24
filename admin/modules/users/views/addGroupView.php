<?php get_header(); ?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar("admin"); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm thành viên</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <div class="form-group">
                            <label for="fullname">Họ tên</label>
                            <input type="text" name="fullname" id="fullname" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">Mật khẩu</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Số điện thoại</label>
                            <input type="text" name="phone_number" id="phone_number" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="address">Địa chỉ</label>
                            <textarea name="address" id="address" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Chọn vai trò</label>
                            <select name="role_id[]" class="select-roles js-multiple form-control" multiple="multiple">
                                <option value=""></option>
                                <?php foreach ($roles as $role) { ?>
                                    <option value="<?php echo $role["role_id"]; ?>"><?php echo $role["name"]; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <button type="submit" name="btn-submit" class="btn btn-primary" id="btn-submit">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>


