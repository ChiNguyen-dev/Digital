<?php
function construct()
{
    load_model("index");
}

function indexAction()
{
    if (isset($_GET["slug"])) {
        $param = $_GET["slug"];
        $cate = findOne("categories", "slug", $param);
        $category = findAll("categories", "`parent_id` = '{$cate["category_id"]}'");
        $ids = array();
        if ($category != null) {
            foreach ($category as $value) $ids[] = $value["category_id"];
        }
        $cate_id = !empty($ids) ? implode(",", $ids) : $cate["category_id"];
        $data["products"] = findAll("products", "`category_id` IN({$cate_id}) OR `category_id` = '{$cate["category_id"]}' ");
    } else {
        $data["products"] = findAll("products");
    }
    load_view("index", $data);
}