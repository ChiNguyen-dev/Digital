<?php
function construct()
{
    load_model('detail');
}

function detailAction()
{
    $data["product"] = findOne("products", "product_id", (int)$_GET["id"]);
    $data["laptops"] = getItemPhone(findOne("categories", "category_id", $data["product"]["category_id"])["parent_id"]);
    $data["images"] = findAll("product_image", "`product_id`= '{$_GET["id"]}'");
    $data["colors"] = getColorById((int)$_GET["id"]);
    $data["inventory"] = findOne("inventories", "product_id", (int)$_GET["id"]);
    if (isset($_SESSION["cart"]) && array_key_exists($data["product"]["product_id"], $_SESSION["cart"]["buy"])) {
        $data["inventory"]["quantity"] = $data["inventory"]["quantity"] - $_SESSION["cart"]["buy"][$data["product"]["product_id"]]["quantity"];
    }
    load_view("detail", $data);
}