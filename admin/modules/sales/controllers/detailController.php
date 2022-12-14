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
    $data["totalOrder"] = 0;
    $data["totalQuantity"] = 0;
    foreach ($data["details"] as $v) {
        $data["totalOrder"] += $v["total"];
        $data["totalQuantity"] += $v["quantity"];
    }

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
        $data["isRole"] = false;
        if (checkRole(getAllRole(), ["Admin", "Content"])) {
            $data["isRole"] = true;
        }
        load_view("detail", $data);
    }
}