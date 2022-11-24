<?php
function addInventory($data)
{
    $id = db_insert("`inventories`", $data);
    return findOne("inventories", "inven_id", $id);
}

function addProductImg($data)
{
    $id = db_insert("product_image", $data);
    return findOne("product_image", "img_id", $id);
}

function addProductColor($data)
{
    $id = db_insert("product_color", $data);
    return findOne("product_color", "id", $id);
}

function getProductAll($start, $num)
{

    $sql = "SELECT p.product_id, p.sku, pi.image ,p.p_name, p.price, cate.cate_name, p.status, p.slug ,p.created_date,i.quantity
            FROM `products` as p INNER JOIN `product_image` as pi ON p.product_id = pi.product_id 
					             INNER JOIN `categories` as cate ON p.category_id = cate.category_id
                                 INNER JOIN `inventories` as i ON p.product_id = i.product_id
            WHERE p.isDelete = 0
            GROUP BY p.product_id LIMIT {$start},{$num};";

    $products = db_fetch_array($sql);
    return !empty($products) ? $products : null;
}

function deleteItemById($product_id)
{
    return db_delete("`products`", "`product_id` = '$product_id'");
}


function updateItemById($table, $data, $w): bool
{
    return db_update($table, $data, $w) !== -1;
}

function sumProduct()
{
    return db_num_rows("SELECT p.product_id, p.sku, pi.image ,p.p_name, p.price, cate.cate_name, p.status, p.slug ,p.created_date,i.quantity
                        FROM `products` as p INNER JOIN `product_image` as pi ON p.product_id = pi.product_id 
					             INNER JOIN `categories` as cate ON p.category_id = cate.category_id
                                 INNER JOIN `inventories` as i ON p.product_id = i.product_id
                        WHERE p.isDelete = 0
                        GROUP BY p.product_id");
}