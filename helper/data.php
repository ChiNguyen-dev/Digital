<?php

function show_array($data)
{
    if (is_array($data)) {
        echo "<pre>";
        print_r($data);
        echo "<pre>";
    }
}

/*
 *
 */
function products()
{
    $products = db_fetch_array("SELECT *
                                FROM `product_image` as pi INNER JOIN `products` as p ON pi.product_id = p.product_id 
                                WHERE p.isDelete = 0 
                                GROUP BY p.product_id limit 0,7");
    return !empty($products) ? $products : null;
}

//function menu($data, $parent_id, $class, $level = 0): string
//{
//    $result = $level == 0 ? "<ul class='{$class}'>" : "<ul class='sub-menu'>";
//    if (!empty($data)) {
//        foreach ($data as $value) {
//            if ($value["parent_id"] == $parent_id) {
//                $result .= "<li>";
//                $result .= "<a href='danh-muc/{$value["slug"]}' title=''>{$value['cate_name']}</a>";
//                if (has_child($data, $value["category_id"])) {
//                    $result .= menu($data, $value["category_id"], $class, $level + 1);
//                }
//            }
//        }
//    }
//    $result .= "</ul>";
//    return $result;
//}

function images($product_id)
{
    $data = "";
    $images = findAll("product_image", "`product_id` = '$product_id'");
    if ($images != null && count($images) > 1) {
        for ($i = 0; $i < 2; $i++) {
            $index = $i + 1;
            $data .= "<img class='cart__image-{$index}' src='admin/{$images[$i]['image']}' alt=''>";
        }
    } else {
        $data .= "<img class='cart__image-1' src='admin/{$images[0]['image']}' alt=''> <img class='cart__image-2' src='admin/{$images[0]['image']}' alt=''>";
    }
    return $data;
}

//function has_child($data, $parent_id): bool
//{
//    foreach ($data as $value) {
//        if ($value["parent_id"] == $parent_id) {
//            return true;
//        }
//    }
//    return false;
//}

/*
 * GET ONE OBJECT OF TABLE
 */
function findOne($table, $field, $value)
{
    $object = db_fetch_row("SELECT * FROM `$table` WHERE `$field` = '{$value}'");
    return !empty($object) ? $object : null;
}

/*
 * GET ALL OBJECT OF TABLE
 */
function findAll($table, $where = "")
{
    $w = !empty($where) ? "WHERE " . $where : "";
    $objects = db_fetch_array("SELECT * FROM `$table` " . $w);
    return !empty($objects) ? $objects : null;
}

/*
 * ADDRESS CHECKOUT
 */
function address($province_id, $district_id, $ward_id)
{
    $province = findOne("devvn_tinhthanhpho", "maTp", $province_id);
    $district = findOne("devvn_quanhuyen", "maqh", $district_id);
    $ward = findOne("devvn_xaphuongthitran", "xaid", $ward_id);
    if ($province != null && $district != null && $ward != null) {
        return $ward["name"] . ", " . $district["name"] . ", " . $province["name"];
    }
}

/*
 * ADD
 */
function add($table, $data)
{
    $tables = $table . 's';
    $field_id = $table . '_id';
    $id = db_insert("`" . $tables . "`", $data);
    return findOne("$tables", "$field_id", $id);
}