<?php
function getProducts($limit, $where)
{
    $sql = "SELECT p.product_id, p.p_name, p.price,p.slug,pc.color_id,iv.quantity
            FROM `products` as p INNER JOIN `product_color` as pc ON p.product_id = pc.product_id
                                 INNER JOIN `inventories` as iv ON p.product_id = iv.product_id
            WHERE  p.status = 1 AND p.isDelete = 0 AND iv.quantity > 0 {$where}
            GROUP BY p.product_id {$limit};";
    $data = db_fetch_array($sql);
    return !empty($data) ? $data : null;
}

function findAllProduct()
{
    $sql = "SELECT p.product_id, p.p_name, p.price,p.slug,pc.color_id,iv.quantity
            FROM `products` as p INNER JOIN `product_color` as pc ON p.product_id = pc.product_id
                                 INNER JOIN `inventories` as iv ON p.product_id = iv.product_id
            WHERE  p.status = 1 AND p.isDelete = 0 AND iv.quantity > 0
            GROUP BY p.product_id";
    $data = db_fetch_array($sql);
    return !empty($data) ? $data : null;
}