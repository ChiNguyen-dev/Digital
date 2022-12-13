<?php
function construct()
{
    load_model("index");
}

function indexAction()
{
    $paramSlugCate = $_GET["cate"] ?? "";
    $_SESSION["slug"] = !empty($paramSlugCate) ? "danh-muc" . $paramSlugCate : "danh-muc";
    $priceFilter = isset($_GET["gia-ban"]) ? ' AND ' . price($_GET["gia-ban"]) : "";
    // Pagination
    $products = findAllProduct();
    $totalProduct = count($products);
    $page = $_GET["page"] ?? 1;
    $pagination = handlePagination($totalProduct, 12, $page);
    $limit = " LIMIT {$pagination["startPage"]},12";
    $where = $priceFilter;
    if (!empty($paramSlugCate)) {
        $categoryID = array();
        $paramSlugCate = explode("/", $paramSlugCate);
        $category = findOne("categories", "slug", $paramSlugCate[count($paramSlugCate) - 1]);
        $categoryID[] = $category["category_id"];
        if (count($paramSlugCate) == 2) {
            $categoryID = array();
            $cateChildren = findAll("categories", "`parent_id` = '{$category["category_id"]}'");
            foreach ($cateChildren as $cateChild) $categoryID[] = $cateChild["category_id"];
        }
        $strCategoryID = implode(",", $categoryID);
        $category = findAll("categories", "`category_id` IN({$strCategoryID})");
        if ($category != null) foreach ($category as $value) $categoryID[] = $value["category_id"];
        $id = implode(",", $categoryID);
        $where = "AND p.category_id IN({$id})" . $priceFilter;
    }
    $_SESSION["slug"] .= isset($_GET["gia-ban"]) ? "&price=" . $_GET["gia-ban"] . "&page=" : "&page=";
    $products = getProducts($limit, $where);
    load_view("index", ["products" => $products, "total_page" => $pagination["totalPage"], "page" => $page]);
}

function price($param): string
{
    $data = "";
    if ($param == 'duoi-10-trieu') $data = "p.price < 10000000";
    if ($param == 'tu-10-den-15-trieu') $data = "p.price > 10000000 AND p.price <= 15000000";
    if ($param == 'tu-15-den-20-trieu') $data = "p.price > 15000000 AND p.price <= 20000000";
    if ($param == 'tren-20-trieu') $data = "p.price > 20000000";
    return $data;
}


