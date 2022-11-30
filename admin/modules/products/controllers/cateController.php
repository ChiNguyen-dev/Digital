<?php
function construct()
{
    load_model("color");
    load_model("product");
    load_model("cate");
}

/*
 * OUTPUT: LIST CATEGORY
 * REDIRECT TO PRODUCT CATEGORY PAGE
 */
function cateAction()
{
    /*
     * GET ALL CATEGORY
     * OUTPUT : TRUE-> LIST CATEGORY , FALSE->NULL
     */
    $categories = findAll("categories");
    if ($categories != null) {
        $data["isRole"] = false;
        if (checkRole(getAllRole(), ["Admin", "Content"])) $data["isRole"] = true;

        $data["categories"] = data_tree($categories, 0);
        load_view("cate", $data);
    } else {
        load_view("cate");
        echo "CATEGORIES NULL";
    }
}

/*
 * ADD CATEGORY
 * INPUT : NAME CATEGORY(CATE_NAME) AND ID CATEGORY PARENT (PARENT_ID)
 * OUTPUT: MESSAGE AND LIST CATEGORY
 */
function addCateAction()
{
    $cate_name = $_POST["cate_name"];
    $parent_id = $_POST["parent_id"];
    if (empty($cate_name)) {
        $response = array(
            "title" => 'Thất bại!',
            "message" => 'Có lỗi xảy ra, vui lòng kiểm tra lại',
            "type" => 'error',
            "duration" => 5000
        );
        echo json_encode($response);
    } else {
        $data = array(
            "cate_name" => $cate_name,
            "parent_id" => $parent_id,
            "slug" => create_slug($cate_name),
            "isDelete" => 0
        );
        $response = array(
            "title" => 'Thành công!',
            "message" => 'Bạn đã thêm thành công',
            "type" => 'success'
        );
        addCate($data);
        $categories = array();
        foreach (data_tree(findAll("categories"), 0) as $value) {
            $value["cate_name"] = str_repeat("|---", $value["level"]) . $value["cate_name"];
            $categories[] = $value;
        }
        $response["categories"] = $categories;
        echo json_encode($response);
    }
}

/*
 * DELETE CATEGORY
 * INPUT  : CATEGORY_ID
 * OUTPUT : MESSAGE AND CATEGORY_ID
 */
function deleteAction()
{
    $caterory_id = $_POST["category_id"];
    if (!empty($caterory_id) && deleteCateById($caterory_id) > 0) {
        $response = array(
            "id" => $caterory_id,
            "title" => 'Thành công!',
            "message" => 'Bạn đã xóa thành công',
            "type" => 'success',
            "duration" => 5000
        );
        echo json_encode($response);
    } else {
        $response = array(
            "title" => 'Thất bại!',
            "message" => 'Có lỗi xảy ra, vui lòng kiểm tra lại',
            "type" => 'error',
            "duration" => 5000
        );
        echo json_encode($response);
    }
}