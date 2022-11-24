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
                        <label for="fullname">Họ tên</label>
                        <input type="text" name="fullname" id="fullname"
                               value="<?php if (!empty($user)) echo $user["fullname"]; ?>">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email"
                               value="<?php if (!empty($user)) echo $user["email"]; ?>">
                        <label for="password">Mật khẩu mới</label>
                        <input type="password" name="password" id="password"
                               value="">
                        <label for="phone_number">Số điện thoại</label>
                        <input type="text" name="phone_number" id="phone_number"
                               value="<?php if (!empty($user)) echo $user["phone_number"]; ?>">
                        <label for="address">Địa chỉ</label>
                        <textarea name="address"
                                  id="address"><?php if (!empty($user)) echo $user["address"]; ?></textarea>
                        <label>Chọn vai trò</label>
                        <select name="role_id[]" class="select-roles js-multiple" multiple="multiple">
                            <?php foreach ($roles as $id => $value) { ?>
                                <option selected value="<?php echo $id; ?>"><?php echo $value; ?></option>
                            <?php } ?>
                            <?php if (!empty($not_active)) { ?>
                                <?php foreach ($not_active as $id => $value) { ?>
                                    <option value="<?php echo $id; ?>"><?php echo $value; ?></option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                        <button type="submit" name="btn-submit" id="btn-submit">Lưu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>


