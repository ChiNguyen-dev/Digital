<?php
function getOrder()
{
    $sql = "SELECT od.order_id, u.fullname,oi.quantity*p.price as total, od.status,od.created_date,oi.id
            FROM `orders` as od INNER JOIN `users` as u ON od.user_id = u.user_id 
					INNER JOIN `order_items` oi ON od.order_id = oi.order_id
                    INNER JOIN `products` as p ON oi.product_id = p.product_id";
    $orders = db_fetch_array($sql);
    return !empty($orders) ? $orders : null;
}