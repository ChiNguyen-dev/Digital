<?php get_header(); ?>
    <div id="main-content-wp" class="add-cat-page">
        <div class="wrap clearfix">
            <?php get_sidebar("admin"); ?>
            <div id="content" class="fl-right">
                <div class="section" id="title-page">
                    <div class="clearfix">
                        <h3 id="index" class="fl-left">Thêm sản phẩm</h3>
                    </div>
                </div>
                <div class="section" id="detail-page">
                    <div class="section-detail">
                        <form method="POST" id="upload_multi" action="" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label for="name">Tên sản pẩm</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                               value="<?php echo !empty($products["p_name"]) ? $products["p_name"] : '' ?>"
                                               aria-describedby="emailHelp">
                                    </div>
                                    <div class="form-group">
                                        <label for="sku">Mã sản phẩm</label>
                                        <input type="text" class="form-control" id="sku" name="sku"
                                               value="<?php echo !empty($products["sku"]) ? $products["sku"] : '' ?>"
                                               aria-describedby="emailHelp">
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Giá</label>
                                        <input type="text" class="form-control" id="price" name="price"
                                               value="<?php echo !empty($products["price"]) ? $products["price"] : '' ?>"
                                               aria-describedby="emailHelp">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group pb-1">
                                        <label>Danh mục sản phẩm</label>
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
                                        <label>Màu sắc</label>
                                        <select name="color[]" class="select-roles js-multiple form-control"
                                                multiple="multiple">
                                            <?php if ($colors != null) { ?>
                                                <?php foreach ($colors as $key => $color) { ?>
                                                    <option value="<?php echo $color["color_id"]; ?>">
                                                        <?php echo $color["name"]; ?>
                                                    </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="quantity">Số lượng</label>
                                        <input type="number" id="quantity" name="quantity" min="1" max="999"
                                               value="<?php echo !empty($products["quantity"]) ? $products["quantity"] : '' ?>"
                                               class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="detail">Chi tiết</label>
                                <textarea class="form-control ckeditor"
                                          id="detail"
                                          name="detail"
                                          rows="4">
                                    <?php echo !empty($products["detail"]) ? $products["detail"] : '' ?>
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="desc">Mô tả</label>
                                <textarea class="form-control ckeditor" id="desc" name="desc" rows="4">
                                            <?php echo !empty($products["desc"]) ? $products["desc"] : '' ?>
                                        </textarea>
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
                            <div id="result"></div>
                            <div class="form-group">
                                <label class="mb-0">Trạng thái</label>
                                <div class="form-check pt-2">
                                    <input class="form-check-input" type="radio" name="exampleRadios"
                                           id="exampleRadios1" value="0" checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                        Chờ duyệt
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios"
                                           id="exampleRadios2" value="1">
                                    <label class="form-check-label" for="exampleRadios2">
                                        Công khai
                                    </label>
                                </div>
                            </div>
                            <button type="submit" name="btn-submit" class="btn btn-primary" id="btn-submit">Thêm mới
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>