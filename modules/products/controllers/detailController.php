<?php
function construct()
{
    load_model('detail');
}

function detailAction()
{
    $data["product"] = findOne("products", "product_id", (int)$_GET["id"]);
    $data["images"] = findAll("product_image", "`product_id`= '{$_GET["id"]}'");
    $data["inventory"] = findOne("inventories", "product_id", (int)$_GET["id"]);
    $data["colors"] = getColorById((int)$_GET["id"]);
    load_view("detail", $data);
}