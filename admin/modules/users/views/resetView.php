<?php get_header(); ?>
<div id="main-content-wp" class="change-pass-page">
    <div class="wrap clearfix">
        <?php get_sidebar('user') ?>
        <div id="content" class="fl-right">
            <div class="section section--addition" id="detail-page">
                <div class="section-detail pb-3">
                    <h3 id="index">Đổi mật khẩu</h3>
                    <form method="POST">
                        <label for="old-pass">Mật khẩu cũ</label>
                        <input type="password" name="pass-old" id="pass-old">
                        <?php if (!empty($validation["pass-old"]))
                            echo "<small style='display: block;color: #c0392b;padding-bottom: 10px; font-size: 14px'>{$validation["pass-old"]}</small>"
                        ?>
                        <?php if (!empty($validation["pass_fail"]))
                            echo "<small style='display: block;color: #c0392b;padding-bottom: 10px; font-size: 14px'>{$validation["pass_fail"]}</small>"
                        ?>
                        <label for="new-pass">Mật khẩu mới</label>
                        <input type="password" name="pass-new" id="pass-new">
                        <?php if (!empty($validation["pass-new"]))
                            echo "<small style='display: block;color: #c0392b;padding-bottom: 10px; font-size: 14px'>{$validation["pass-new"]}</small>"
                        ?>
                        <label for="confirm-pass">Xác nhận mật khẩu</label>
                        <input type="password" name="confirm-pass" id="confirm-pass">
                        <?php if (!empty($validation["confirm-pass"]))
                            echo "<small style='display: block;color: #c0392b;padding-bottom: 10px; font-size: 14px'>{$validation["confirm-pass"]}</small>"
                        ?>
                        <button type="submit" class="btn btn-primary" name="btn-reset" id="btn-submit">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
