<?php
/*
 * SHOPPING CART
 */
function updateCart()
{
    $num_order = 0;
    $total_order = 0;
    foreach ($_SESSION["cart"]["buy"] as $value) {
        $num_order += $value["quantity"];
        $total_order += $value["total"];
    }
    $_SESSION["cart"]["infor"] = array(
        "num_order" => $num_order,
        "total_order" => $total_order
    );
}

function getTotalCart()
{
    if (isset($_SESSION["cart"])) {
        return $_SESSION["cart"]["infor"]["total_order"];
    }
}

function getNumItemCart()
{
    if (isset($_SESSION["cart"])) {
        return $_SESSION["cart"]["infor"]["num_order"];
    }
}