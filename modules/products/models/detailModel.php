<?php
function getColorById($id)
{
    $sql = "SELECT c.color_id, c.name , c.style
            FROM `product_color` as pc INNER JOIN `colors` as c ON pc.color_id = c.color_id 
            WHERE `product_id` = '{$id}' AND c.active = 1";
    $colors = db_fetch_array($sql);
    return !empty($colors) ? $colors : null;
}