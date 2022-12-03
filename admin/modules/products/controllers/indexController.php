<?php
function construct()
{
    load_model("color");
    load_model("product");
    load_model("cate");
}

/*
 * LIST PRODUCT
 */
function indexAction()
{
    $total_row = sumProduct();
    $total_pages = ceil($total_row / 8);
    $page = isset($_GET["page"]) ? $_GET["page"] : 1;
    $start = ($page - 1) * 8;
    $data["page"] = $page;
    $data["total_page"] = $total_pages;
    $data["products"] = getProductAll($start, 8);
    $data["confirms"] = findAll("products", "`status`   = '0'");
    $data["accept"] = findAll("products", "`status`   = '1'");
    $data["deletes"] = findAll("products", "`isDelete` = '1'");
    if (isset($_POST["btn-submit"])) {
        if (isset($_POST["checked"]) && isset($_POST["actions"])) {
            $checked = implode(",", $_POST["checked"]);
            $v = $_POST["actions"] < 2 ? ["status" => $_POST["actions"]] : ["isDelete" => 1];
            updateItemById("products", $v, "`product_id` IN($checked)");
        }
        redirect(base_url("san-pham.html"));
    } else {
        $data["isRole"] = false;
        if (checkRole(getAllRole(), ["Admin", "Content"])) {
            $data["isRole"] = true;
        }
        load_view("index", $data);
    }
}


