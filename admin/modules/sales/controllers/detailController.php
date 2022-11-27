<?php
function construct()
{
    load_model("detail");
}

function indexAction()
{
    $id = (int)$_GET["id"];
    $data["user"] = findOne("users", "user_id", $id);
    $data["order"] = findOne("orders", "user_id", $id);
    $data["details"] = getOrderByUser($id);

    if (isset($_POST["btn-submit"])) {
        $order_id = $data["order"]["order_id"];
        if ($_POST["actions"] == 0) {
            load_view("detail", $data);
        } else if ($_POST["actions"] == 1) {
            updateOrder(["status" => 1], $order_id);
            redirect(base_url("home.html"));
        } else {
            updateOrder(["status" => 2], $order_id);
            redirect(base_url("home.html"));
        }
    } else {
        load_view("detail", $data);
    }
}