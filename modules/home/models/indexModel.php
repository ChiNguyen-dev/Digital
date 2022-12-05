<?php
function getItemPhone($category_id)
{
    $sql = "SELECT p.product_id, p.p_name, p.price,p.slug,pi.image,pc.color_id,iv.quantity
            FROM `products` as p INNER JOIN `categories` as cate ON p.category_id = cate.category_id
            					 INNER JOIN `product_image` as pi ON p.product_id = pi.product_id
                                 INNER JOIN `product_color` as pc ON p.product_id = pc.product_id
                                 INNER JOIN `inventories` as iv ON p.product_id = iv.product_id
            WHERE  p.status = 1 AND p.isDelete = 0 AND iv.quantity > 0 AND cate.parent_id = '{$category_id}'
            GROUP BY p.product_id";
    $products = db_fetch_array($sql);
    return !empty($products) ? $products : null;
}

function getAll()
{
    $sql = "SELECT p.product_id, p.p_name, p.price,p.slug,pc.color_id,iv.quantity
FROM `products` as p INNER JOIN `categories` as cate ON p.category_id = cate.category_id
                     INNER JOIN `product_color` as pc ON p.product_id = pc.product_id
                     INNER JOIN `inventories` as iv ON p.product_id = iv.product_id
WHERE  p.status = 1 AND p.isDelete = 0 AND iv.quantity > 0
GROUP BY p.product_id";
    $products = db_fetch_array($sql);
    return !empty($products) ? $products : null;
}