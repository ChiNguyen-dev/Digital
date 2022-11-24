<?php

function show_array($data)
{
    if (is_array($data)) {
        echo "<pre>";
        print_r($data);
        echo "<pre>";
    }
}

function menu($data, $parent_id, $class, $level = 0): string
{
    $result = $level == 0 ? "<ul class='{$class}'>" : "<ul class='sub-menu'>";
    foreach ($data as $value) {
        if ($value["parent_id"] == $parent_id) {
            $result .= "<li>";
            $result .= "<a href='san-pham/{$value["slug"]}' title=''>{$value['cate_name']}</a>";
            if (has_child($data, $value["category_id"])) {

                $result .= menu($data, $value["category_id"], $class, $level + 1);
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