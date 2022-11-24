<?php
function construct()
{

}

function addAction()
{
    $product = findOne("products", "product_id", $_POST["product_id"]);
    $images = findAll("product_image", "`product_id`='{$_POST["product_id"]}'");
    $color = findOne("colors", "color_id", $_POST["color_id"]);

    $resQuantity = isset($_POST["quantity"]) ? $_POST["quantity"] : 1;
    $quantity = $resQuantity;

    if (isset($_SESSION["cart"]) && array_key_exists($_POST["product_id"], $_SESSION["cart"]["buy"])) {
        $quantity = $_SESSION["cart"]["buy"][$_POST["product_id"]]["quantity"] + $resQuantity;
    }
    $_SESSION["cart"]["buy"][$_POST["product_id"]] = array(
        "id" => $product["product_id"],
        "name" => $product["p_name"],
        "code" => $product["sku"],
        "image" => $images[0]["image"],
        "color" => $color["name"],
        "price" => $product["price"],
        "quantity" => $quantity,
        "total" => $quantity * $product["price"]
    );
    updateCart();
    $data = array(
        "num_order" => getNumItemCart(),
        "total_order" => getTotalCart(),
        "products" => $_SESSION["cart"]["buy"]
    );
    echo json_encode($data);
}