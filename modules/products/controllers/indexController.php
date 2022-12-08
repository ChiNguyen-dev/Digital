<?php
function construct()
{
    load_model("index");
}

function indexAction()
{
    $data["products"] = findAll("products");
    if (isset($_GET["slug"])) {
        $param = $_GET["slug"];
        $ids = array();
        if (count(explode("/", $param)) > 1) {
            $req = "'" . implode("','", explode("/", $param)) . "'";
            $category = findAll("categories", "`slug` IN({$req})");
        } else {
            $cate_parent = findOne("categories", "slug", $param)["category_id"];
            $category = findAll("categories", "`parent_id` = '{$cate_parent}'");
        }
        if ($category != null) foreach ($category as $value) $ids[] = $value["category_id"];
        $param = implode(",", $ids);
        $data["products"] = findAll("products", "`category_id` IN({$param})");
    }
    load_view("index", $data);
}