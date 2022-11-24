<?php $roles = getAllRole(); ?>
<div id="sidebar" class="fl-sleft">
    <ul id="sidebar-menu">
        <li class="nav-item">
            <a href="home.html" class="dashboard-link">
                <i class="fa-regular fa-folder icon dashboard-icon"></i>
                <span class="title dashboard-title" style="padding-left: 10px">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="" title="" class="nav-link nav-toggle">
                <i class="fa-regular fa-folder icon"></i>
                <span class="title">Trang</span>
            </a>
            <ul class="sub-menu">
                <?php if (checkRole($roles, ["Admin", "Content"])) { ?>
                    <li class="nav-item">
                        <a href="pages/add" title="" class="nav-link">Thêm mới</a>
                    </li>
                <?php } ?>
                <li class="nav-item">
                    <a href="pages/danh-sach-trang" title="" class="nav-link">Danh sách các trang</a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="" title="" class="nav-link nav-toggle">
                <i class="fa-regular fa-folder icon"></i>
                <span class="title">Bài viết</span>
            </a>
            <ul class="sub-menu">
                <?php if (checkRole($roles, ["Admin", "Content"])) { ?>
                    <li class="nav-item">
                        <a href="?mod=posts&action=add" title="" class="nav-link">Thêm mới</a>
                    </li>
                <?php } ?>
                <li class="nav-item">
                    <a href="?mod=posts" title="" class="nav-link">Danh sách bài viết</a>
                </li>
                <li class="nav-item">
                    <a href="?mod=posts&action=cate" title="" class="nav-link">Danh mục bài viết</a>
                </li>

            </ul>
        </li>
        <li class="nav-item">
            <a href="" title="" class="nav-link nav-toggle">
                <i class="fa-regular fa-folder icon"></i>
                <span class="title">Trang</span>
            </a>
            <ul class="sub-menu">
                <?php if (checkRole($roles, ["Admin", "Content"])) { ?>
                    <li class="nav-item">
                        <a href="pages/add" title="" class="nav-link">Thêm mới</a>
                    </li>
                <?php } ?>
                <li class="nav-item">
                    <a href="pages/danh-sach-trang" title="" class="nav-link">Danh sách các trang</a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="" title="" class="nav-link nav-toggle">
                <i class="fa-regular fa-folder icon"></i>
                <span class="title">Sản phẩm</span>
            </a>
            <ul class="sub-menu">
                <?php if (checkRole($roles, ["Admin", "Content"])) { ?>
                    <li class="nav-item">
                        <a href="san-pham/add.html" title="" class="nav-link">Thêm mới</a>
                    </li>
                <?php } ?>
                <li class="nav-item">
                    <a href="san-pham" title="" class="nav-link">Danh sách sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a href="danh-muc-san-pham.html" title="" class="nav-link">Danh mục sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a href="danh-sach-mau.html" title="" class="nav-link">Danh sách màu</a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="" title="" class="nav-link nav-toggle">
                <i class="fa-regular fa-folder icon"></i>
                <span class="title">Slider</span>
            </a>
            <ul class="sub-menu">
                <?php if (checkRole($roles, ["Admin", "Content"])) { ?>
                    <li class="nav-item">
                        <a href="?page=add_slider" title="" class="nav-link">Thêm mới</a>
                    </li>
                <?php } ?>
                <li class="nav-item">
                    <a href="?page=list_slider" title="" class="nav-link">Danh sách slider</a>
                </li>
            </ul>
        </li>
        <?php if (checkRole($roles, ["Admin"])) { ?>
            <li class="nav-item">
                <a href="" title="" class="nav-link nav-toggle">
                    <i class="fa-regular fa-folder icon"></i>
                    <span class="title">Bán hàng</span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item">
                        <a href="sales/danh-sach-don-hang.html" title="" class="nav-link">Danh sách đơn hàng</a>
                    </li>
                    <li class="nav-item">
                        <a href="khach-hang.html" title="" class="nav-link">Danh sách khách hàng</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="" title="" class="nav-link nav-toggle">
                    <i class="fa-regular fa-folder icon"></i>
                    <span class="title">Member</span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item">
                        <a href="vai-tro.html" title="" class="nav-link">
                            Danh sách vai trò
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="thanh-vien.html" title="" class="nav-link">
                            Danh sách thành viên
                        </a>
                    </li>
                </ul>
            </li>

        <?php } ?>
    </ul>
</div>
