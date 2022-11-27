<?php
function getOrderByUser($id)
{
    $sql = "SELECT od.order_id,pi.image,p.p_name,p.price,oi.quantity,oi.color_name,oi.quantity*p.price as total,oi.payment_method
            FROM `order_items` as oi INNER JOIN `orders` od ON od.order_id = oi.order_id
                         INNER JOIN `products` as p ON oi.product_id = p.product_id
                         INNER JOIN `product_image` as pi ON pi.product_id = p.product_id
            WHERE od.user_id = '{$id}'
            GROUP BY p.product_id";
    $data = db_fetch_array($sql);
    return !empty($data) ? $data : null;
}

function updateOrder($data, $id)
{
    db_update("`orders`", $data, "`order_id`='{$id}'");
}