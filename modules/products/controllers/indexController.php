<?php
function construct()
{
    load_model("index");
}

function indexAction()
{
    $_SESSION["slug"] = isset($_GET["cate"]) ? "danh-muc" . $_GET["cate"] : "danh-muc";
    $price = isset($_GET["gia-ban"]) && $_GET["gia-ban"] == 'duoi-10-trieu' ? "price < 10000000" : "";
    $price = isset($_GET["gia-ban"]) && $_GET["gia-ban"] == 'tu-10-den-15-trieu' ? "price > 10000000 AND price <= 15000000" : "";
    $price = isset($_GET["gia-ban"]) && $_GET["gia-ban"] == 'tu-15-den-20-trieu' ? "price > 15000000 AND price <= 20000000" : "";
    $price = isset($_GET["gia-ban"]) && $_GET["gia-ban"] == 'tren-20-trieu' ? "price > 20000000" : "";
    $data["products"] = findAll("products");
    if (isset($_GET["cate"]) && !empty($_GET["cate"])) {
        echo $price;
        $param = $_GET["cate"];
        $ids = array();
        if (count(explode("/", $param)) > 2) {
            $req = "'" . implode("','", explode("/", $param)) . "'";
            $category = findAll("categories", "`slug` IN({$req})");
        } else {
            $cate_parent = findOne("categories", "slug", explode("/", $param)[1])["category_id"];
            $category = findAll("categories", "`parent_id` = '{$cate_parent}'");
        }
        if ($category != null) foreach ($category as $value) $ids[] = $value["category_id"];
        $param = implode(",", $ids);
        $data["products"] = findAll("products", "`category_id` IN({$param})");
    }
    load_view("index", $data);
}

