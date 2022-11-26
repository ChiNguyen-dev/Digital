<?php
function getDetail($id)
{
    $sql = "SELECT pi.image,p.p_name,p.price,oi.quantity,c.name
FROM `order_items` as oi INNER JOIN `orders` od ON od.order_id = oi.order_id
						 INNER JOIN `users` as u ON u.user_id = od.user_id
                         INNER JOIN `products` as p ON oi.product_id = p.product_id 
                         INNER JOIN `product_color` as pc ON pc.product_id = p.product_id
                         INNER JOIN `product_image` as pi ON pi.product_id = p.product_id
                         INNER JOIN `colors` as c ON c.color_id = pc.color_id
GROUP BY p.product_id";
}