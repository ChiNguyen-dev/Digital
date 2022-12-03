<?php get_header(); ?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar("admin"); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Cập nhật thông tin</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="fullname">Họ tên:</label>
                                    <input type="text" name="fullname" id="fullname" class="form-control"
                                           value="<?php if (!empty($user)) echo $user["fullname"]; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="text" name="email" id="email" class="form-control"
                                           value="<?php if (!empty($user)) echo $user["email"]; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="password">Mật khẩu mới:</label>
                                    <input type="password" name="password" id="password" value="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="phone_number">Số điện thoại:</label>
                                    <input type="text" name="phone_number" id="phone_number" class="form-control"
                                           value="<?php if (!empty($user)) echo $user["phone_number"]; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="address">Địa chỉ:</label>
                                    <textarea name="address" id="address" class="form-control" rows="5"
                                              cols="5"><?php if (!empty($user)) echo $user["address"]; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Chọn vai trò:</label>
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
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mb-3" name="btn-submit" id="btn-submit">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>


