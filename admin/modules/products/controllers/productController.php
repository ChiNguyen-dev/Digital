<?php
function construct()
{
    load_model("color");
    load_model("product");
    load_model("cate");
}

/*
 * ADD PRODUCT
 */
function addAction()
{
    $categories = findAll("categories");
    $data["categories"] = data_tree($categories, 0);
    $data["colors"] = findAll("colors");
    if (isset($_POST["btn-submit"])) {
        $data["products"] = array(
            "p_name" => $_POST["name"],
            "price" => $_POST["price"],
            "sku" => $_POST["sku"],
            "detail" => $_POST["detail"],
            "exceprt" => $_POST["desc"],
            "slug" => create_slug($_POST["name"]),
            "status" => $_POST["exampleRadios"],
            "user_id" => $_SESSION["isLogin"],
            "category_id" => $_POST["category"],
            "isDelete" => 0
        );
        if (empty($_POST["name"]) || empty($_POST["price"]) || empty($_POST["sku"]) ||
            empty($_POST["category"]) || empty($_POST["color"]) || empty($_POST["quantity"]) ||
            empty($_FILES["images"]["name"]) || empty($_POST["detail"])) {
            $data["products"]["quantity"] = $_POST["quantity"];
            load_view("add", $data);
        } else {
            $product = add("product", $data["products"]);
            if ($product != null) {
                if (addInventory(["product_id" => $product["product_id"], "quantity" => $_POST["quantity"]]) != null) {
                    foreach ($_POST["color"] as $color) {
                        addProductColor(["product_id" => $product["product_id"], "color_id" => $color]);
                        updateColor(["active" => 1], $color);
                    }
                    $files = getFileName($_FILES["images"]["name"]);
                    foreach ($files as $file) {
                        addProductImg(["image" => $file, "product_id" => $product["product_id"]]);
                    }
                    redirect(base_url("san-pham.html"));
                } else {
                    deleteItemById($product["product_id"]);
                    load_view("add", $data);
                }
            } else {
                $data["products"]["quantity"] = $_POST["quantity"];
                load_view("add", $data);
            }
        }
    } else {
        load_view("add", $data);
    }
}

/*
 * UPDATE PRODUCT
 */
function updateAction()
{
    $id = $_GET["id"];
    if (isset($_POST["btn-submit"])) {
        $data["products"] = array(
            "p_name" => $_POST["name"],
            "price" => $_POST["price"],
            "sku" => $_POST["sku"],
            "detail" => $_POST["detail"],
            "exceprt" => $_POST["desc"],
            "slug" => create_slug($_POST["name"]),
            "user_id" => $_SESSION["isLogin"]
        );
        if (!empty($_POST["category"])) {
            $data["products"]["category_id"] = $_POST["category"];
        }
        if (updateItemById("`products`", $data["products"], "`product_id` = '{$id}'")) {
            redirect(base_url("san-pham.html"));
        } else {
            echo "Update fail";
        }
    } else {
        $data["product"] = findOne("products", "product_id", $id);
        $data["categories"] = data_tree(findAll("categories"), 0);
        $data["active_colors"] = array();
        foreach (getColor($id, 1) as $color) {
            $data["active_colors"][$color["color_id"]] = $color["name"];
        }
        $data["colorAll"] = array();
        foreach (findAll("colors") as $color) {
            $data["colorAll"][$color["color_id"]] = $color["name"];
        }
        $data["colors"] = array_diff($data["colorAll"], $data["active_colors"]);
        $data["invenrory"] = findOne("inventories", "product_id", $id);
        $data["images"] = null;
        foreach (findAll("product_image", "`product_id`='$id'") as $image) {
            $data["images"] .= "<div class='thumnail'><img src='{$image["image"]}'></div>";
        }
        load_view("update", $data);
    }
}
