<?php
function addColor($data)
{
    $color_id = db_insert("colors", $data);
    $color = db_fetch_row("SELECT * FROM `colors` WHERE `color_id` = '{$color_id}'");
    return !empty($color) ? $color : null;
}

function deleteColor($id): bool
{
    return (bool)db_delete("`colors`", "`color_id` = '{$id}'");
}

function updateColor($data, $id): bool
{
    return db_update("`colors`", $data, " `color_id` ='" . $id . "'") != -1;
}

function getColor($product_id, $active)
{
    $sql = "SELECT c.color_id,c.name,c.style,c.active 
            FROM `product_color` as pc INNER JOIN `colors` as c ON pc.color_id = c.color_id 
            WHERE c.active = '$active' AND pc.product_id = '$product_id'";
    $colors = db_fetch_array($sql);
    return !empty($colors) ? $colors : null;
}