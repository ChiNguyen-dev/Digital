<?php get_header(); ?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar("admin"); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Cập nhật sản phẩm</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST" id="upload_multi" action="" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label for="name">Tên sản phẩm:</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                           value="<?php echo !empty($product["p_name"]) ? $product["p_name"] : '' ?>"
                                           aria-describedby="emailHelp">
                                </div>
                                <div class="form-group">
                                    <label for="sku">Mã sản phẩm:</label>
                                    <input type="text" class="form-control" id="sku" name="sku"
                                           value="<?php echo !empty($product["sku"]) ? $product["sku"] : '' ?>"
                                           aria-describedby="emailHelp">
                                </div>
                                <div class="form-group">
                                    <label for="price">Giá:</label>
                                    <input type="text" class="form-control" id="price" name="price"
                                           value="<?php echo !empty($product["price"]) ? $product["price"] : '' ?>"
                                           aria-describedby="emailHelp">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Danh mục sản phẩm:</label>
                                    <select name="category" class="form-control">
                                        <option value="">-- Chọn danh mục --</option>
                                        <?php if ($categories != null) { ?>
                                            <?php foreach ($categories as $key => $category) { ?>
                                                <option value="<?php echo $category["category_id"]; ?>">
                                                    <?php echo str_repeat("|---", $category["level"]) . $category["cate_name"]; ?>
                                                </option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Màu sắc:</label>
                                    <select name="color[]" class="select-roles js-multiple form-control"
                                            multiple="multiple">
                                        <?php if ($active_colors != null) { ?>
                                            <?php foreach ($active_colors as $key => $active) { ?>
                                                <option selected value="<?php echo $key; ?>">
                                                    <?php echo $active; ?>
                                                </option>
                                            <?php } ?>
                                        <?php } ?>
                                        <?php if ($colors != null) { ?>
                                            <?php foreach ($colors as $key => $color) { ?>
                                                <option value="<?php echo $key; ?>">
                                                    <?php echo $color; ?>
                                                </option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="quantity">Số lượng:</label>
                                    <input type="number" id="quantity" name="quantity" min="1" max="999"
                                           value="<?php echo !empty($invenrory["quantity"]) ? $invenrory["quantity"] : '' ?>"
                                           class="form-control">
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="detail">Chi tiết:</label>
                            <textarea class="ckeditor" id="detail" name="detail"
                                      placeholder="Mô tả sản phẩm"><?php echo !empty($product["detail"]) ? $product["detail"] : '' ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="desc">Mô tả:</label>
                            <textarea class="ckeditor" id="desc" name="desc"
                                      placeholder="Mô tả sản phẩm"><?php echo !empty($product["exceprt"]) ? $product["exceprt"] : '' ?></textarea>
                            <script>
                                CKEDITOR.replace('desc', {
                                    filebrowserBrowseUrl: 'public/js/plugins/ckfinder/ckfinder.html',
                                    filebrowserUploadUrl: 'public/js/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                                    filebrowserWindowWidth: '1000',
                                    filebrowserWindowHeight: '700'
                                });
                            </script>
                        </div>
                        <div class="pb-3 pt-2">
                            <input type="file" name="images[]" id="file" multiple="">
                            <button type="button" class="btn-upload">
                                <i class="fa-solid fa-upload"></i> upload file
                            </button>
                        </div>
                        <div id="result">
                            <?php if (!empty($images)) echo $images; ?>
                        </div>
                        <button type="submit"
                                name="btn-submit"
                                class="btn btn-primary"
                                id="btn-submit">
                            Cập nhật
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
