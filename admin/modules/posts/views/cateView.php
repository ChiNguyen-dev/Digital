<?php get_header(); ?>
<div id="main-content-wp" class="add-cat-page menu-page">
    <div class="wrap clearfix">
        <?php get_sidebar("admin"); ?>
        <div id="content" class="container-fluid mr-0" >
            <div class="row">
                <div class="col-4">
                    <div class="card">
                        <div class="card-header font-weight-bold">
                            Thêm danh mục mới
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <label for="name">Tên danh mục</label>
                                    <input class="form-control" type="text" name="name" id="name">
                                </div>
                                <div class="form-group">
                                    <label for="">Danh mục cha</label>
                                    <select class="form-control" id="">
                                        <option>Chọn danh mục</option>
                                        <option>Danh mục 1</option>
                                        <option>Danh mục 2</option>
                                        <option>Danh mục 3</option>
                                        <option>Danh mục 4</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Trạng thái</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            Chờ duyệt
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                        <label class="form-check-label" for="exampleRadios2">
                                            Công khai
                                        </label>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Thêm mới</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="card">
                        <div class="card-header font-weight-bold">
                            Danh mục bài viết
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
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>
                                        <ul class="list-operation mb-0">
                                            <li>
                                                <a href="" title="Sửa" class="edit">
                                                    <i class="fa-regular fa-pen-to-square" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <button type="button" title="Xóa" id-user=""
                                                        class="delete">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </button>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>
                                        <ul class="list-operation mb-0">
                                            <li>
                                                <a href="" title="Sửa" class="edit">
                                                    <i class="fa-regular fa-pen-to-square" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <button type="button" title="Xóa" id-user=""
                                                        class="delete">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </button>
                                            </li>
                                        </ul>
                                    </td>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>
                                        <ul class="list-operation mb-0">
                                            <li>
                                                <a href="" title="Sửa" class="edit">
                                                    <i class="fa-regular fa-pen-to-square" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <button type="button" title="Xóa" id-user=""
                                                        class="delete">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </button>
                                            </li>
                                        </ul>
                                    </td>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


