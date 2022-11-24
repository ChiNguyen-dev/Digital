<?php
function construct()
{
    load_model("color");
}

function indexAction()
{
    $data["colors"] = findAll("colors");
    if ($data["colors"] != null) {
        load_view("color", $data);
    } else {
        load_view("color");
    }
}

function addAction()
{
    $name = $_POST["name"];
    $style = $_POST["style"];
    $user_id = $_SESSION["isLogin"];
    if (!empty($name) && !empty($style)) {
        $data = array(
            "name" => $name,
            "style" => $style,
            "user_id" => $user_id
        );
        $color = addColor($data);
        $success = array(
            "title" => 'Thành công!',
            "message" => 'Bạn đã xóa thành công',
            "color" => $color
        );
        echo json_encode($success);
    } else {
        $error = array(
            "title" => 'Thất bại!',
            "message" => 'Có lỗi xảy ra, vui lòng kiểm tra lại'
        );
        echo json_encode($error);
    }
}

function deleteAction()
{
    $color_id = $_POST["color_id"];
    if (deleteColor($color_id)) {
        $colors = findAll("colors");
        echo json_encode(["colors" => $colors]);
    } else {
        $error = array(
            "title" => 'Thất bại!',
            "message" => 'Có lỗi xảy ra, vui lòng kiểm tra lại'
        );
        echo json_encode($error);
    }
}