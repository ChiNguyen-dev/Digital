<?php get_header(); ?>
<div id="main-content-wp" class="info-account-page">
    <div class="wrap clearfix">
        <?php get_sidebar('user') ?>
        <div id="content" class="fl-right">
            <div class="section section--addition" id="detail-page">
                <div class="section-detail">
                    <h3 id="index">Cập nhật thông tin</h3>
                    <form method="POST">
                        <label for="name">Tên hiển thị</label>
                        <input type="text" name="name" id="name" value="<?php echo $user["fullname"] ?>">
                        <label for="username">Vai trò</label>
                        <input type="text" name="username" id="username" placeholder="<?php echo $role["name"] ?>"
                               readonly="readonly">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value="<?php echo $user["email"] ?>">
                        <label for="tel">Số điện thoại</label>
                        <input type="tel" name="phone_number" id="tel" value="<?php echo $user["phone_number"] ?>">
                        <label for="address">Địa chỉ</label>
                        <textarea name="address" id="address"><?php echo $user["address"] ?></textarea>
                        <button type="submit" class="btn btn-primary" name="btn-submit" id="btn-submit">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
