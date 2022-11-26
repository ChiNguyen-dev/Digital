<?php
function provinces()
{
    $provinces = db_fetch_array("SELECT * FROM `devvn_tinhthanhpho`");
    return !empty($provinces) ? $provinces : null;
}

function addRole($user_id)
{
    db_insert("`user_role`", ["user_id" => $user_id, "role_id" => 4]);
}

function addOrderItem($data)
{
    db_insert("`order_items`", $data);
}

function updateQty($data, $product_id)
{
    db_update("inventories", $data, "`product_id`='{$product_id}'");
}

function addOrder($data,$id)
{
    db_insert("`orders`", $data);
    $order = findOne("orders", "order_id", $id);
    return $order != null ? $order : null;
}