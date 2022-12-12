<?php
function construct()
{
    load_model('index');
}

function indexAction()
{
    load_view('index');
}

function updateAction()
{
    $qty = (int)$_POST["quantity"];
    $id = (int)$_POST["id"];

    if ($_POST["status"] == "plus" and array_key_exists($id, $_SESSION["cart"]["buy"])) {
        $_SESSION["cart"]["buy"][$id]["quantity"] = $_SESSION["cart"]["buy"][$id]["quantity"] + 1;
        $_SESSION["cart"]["buy"][$id]["total"] = $_SESSION["cart"]["buy"][$id]["price"] * $_SESSION["cart"]["buy"][$id]["quantity"];
    } else if (array_key_exists($id, $_SESSION["cart"]["buy"]) and $qty != 1) {
        $_SESSION["cart"]["buy"][$id]["quantity"] = $_SESSION["cart"]["buy"][$id]["quantity"] - 1;
        $_SESSION["cart"]["buy"][$id]["total"] = $_SESSION["cart"]["buy"][$id]["price"] * $_SESSION["cart"]["buy"][$id]["quantity"];
    }
    updateCart();
    $data = array(
        "num_order" => getNumItemCart(),
        "total_order" => getTotalCart(),
        "products" => $_SESSION["cart"]["buy"][$id]
    );
    echo json_encode($data);
}