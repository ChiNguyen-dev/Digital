<?php


function create_slug($string): string
{
    $search = array(
        '#(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)#',
        '#(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)#',
        '#(ì|í|ị|ỉ|ĩ)#',
        '#(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)#',
        '#(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)#',
        '#(ỳ|ý|ỵ|ỷ|ỹ)#',
        '#(đ)#',
        '#(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)#',
        '#(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)#',
        '#(Ì|Í|Ị|Ỉ|Ĩ)#',
        '#(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)#',
        '#(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)#',
        '#(Ỳ|Ý|Ỵ|Ỷ|Ỹ)#',
        '#(Đ)#',
        "/[^a-zA-Z0-9\-\_]/",
    );
    $replace = array('a', 'e', 'i', 'o', 'u', 'y', 'd', 'A', 'E', 'I', 'O', 'U', 'Y', 'D', '-',
    );
    $string = preg_replace($search, $replace, $string);
    $string = preg_replace('/(-)+/', '-', $string);
    $string = strtolower($string);
    return $string;
}


function menuCate($data, $parent_id, $class, $level = 0, $slugParent = "")
{
    $result = $level == 0 ? "<ul class='{$class}'>" : "<ul class='sub-menu-sidebar__chilrent'>";
    $slug = "";
    if (!empty($data)) {
        foreach ($data as $key => $value) {
            if ($value["parent_id"] == $parent_id) {
                if ($level == 0) {
                    $slug = 'danh-muc/' . $value["slug"];
                } else {
                    $slug = $slugParent . '/' . $value["slug"];
                }
                $result .= "<li>";
                $result .= "<div class='has-toggle d-flex align-items-center'>";
                $result .= " <a href='{$slug}' title='{$value['cate_name']}'>{$value['cate_name']}</a>";
                if (has_child($data, $value["category_id"])) {
                    $result .= "<i class='has-toggle__icon fa-solid fa-angle-down'></i></div>";
                    $result .= menuCate($data, $value["category_id"], $class, $level + 1, $slug);
                } else {
                    $result .= "</div>";
                }
            }
        }
    }
    $result .= "</ul>";
    return $result;
}

function menu($data, $parent_id, $class, $level = 0, $slugParent = ""): string
{
    $result = $level == 0 ? "<ul class='{$class}'>" : "<ul class='sub-menu'>";
    $slug = "";
    if (!empty($data)) {
        foreach ($data as $value) {
            if ($value["parent_id"] == $parent_id) {
                $slug = $level == 0 ? 'danh-muc/' . $value["slug"] : $slugParent . '/' . $value["slug"];
                $result .= "<li>";
                $result .= "<a href='{$slug}' title=''>{$value['cate_name']}</a>";
                if (has_child($data, $value["category_id"])) {
                    $result .= menu($data, $value["category_id"], $class, $level + 1, $slug);
                }
            }
        }
    }
    $result .= "</ul>";
    return $result;
}

function has_child($data, $parent_id): bool
{
    foreach ($data as $value) {
        if ($value["parent_id"] == $parent_id) {
            return true;
        }
    }
    return false;
}