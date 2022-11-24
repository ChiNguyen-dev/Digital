<?php
function construct()
{

}

function deleteAllAction()
{
    unset($_SESSION["cart"]);
    redirect(base_url());
}

function deleteAction()
{
    $id = (int)$_GET["id"];
    if (array_key_exists($id, $_SESSION["cart"]["buy"])) {
        unset($_SESSION["cart"]["buy"][$id]);
        if (count($_SESSION["cart"]["buy"]) > 0) {
            updateCart();
        } else {
            unset($_SESSION["cart"]);
        }
        redirect(base_url("cart.html"));
    }
}