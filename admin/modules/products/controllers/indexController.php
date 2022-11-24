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
    $total_pages = ceil($total_row / 3);
    $page = isset($_GET["page"]) ? $_GET["page"] : 1;
    $start = ($page - 1) * 3;

    $data["page"] = $page;
    $data["total_page"] = $total_pages;
    $data["products"] = getProductAll($start, 3);
    $data["confirms"] = findAll("products", "`status` = '0'");
    $data["accept"] = findAll("products", "`status` = '1'");
    $data["deletes"] = findAll("products", "`isDelete` = '1'");
//    if (isset($_POST["btn-submit"])) {
//        $status = $_POST["actions"];
//        $checked = explode(",", $_POST['checked']);
//        if ($status == 1) {
//            foreach ($checked as $id) {
//                updateItemById("`products`", ['`status`' => 1], "`product_id` = '{$id}'");
//            }
//        }
//        if ($status == 2) {
//            foreach ($checked as $id) {
//                updateItemById("`products`", ['`isDelete`' => 1], "`product_id` = '{$id}'");
//            }
//        } else {
//            load_view("index", $data);
//        }
//        load_view("index", $data);
//    } else {
//    }
        load_view("index", $data);
}


