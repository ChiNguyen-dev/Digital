<?php
function construct()
{
    load_model("index");
}

function indexAction()
{
    $data["roles"] = getRoles();
    load_view("index", $data);
}

/*
 * ADD ROLE NEW
 * INPUT : NAME AND DISPLAY_NAME
 * OUTPUT: ROLE
 */
function addAction()
{
    $name = $_POST["name"];
    $display_name = $_POST["display_name"];
    $error = array(
        "title" => 'Thất bại!',
        "message" => 'Có lỗi xảy ra, vui lòng kiểm tra lại',
        "type" => 'error'
    );
    if (!empty($name) && !empty($display_name)) {
        $data = array(
            "name" => $name,
            "display_name" => $display_name
        );
        $role = insertRole($data);
        if ($role != null) {
            $success = array(
                "role" => $role,
                "title" => 'Thành công!',
                "message" => 'Bạn đã thêm thành công',
                "type" => 'success'
            );
            echo json_encode($success);
        } else {
            echo json_encode($error);
        }
    } else {
        echo json_encode($error);
    }
}

function deleteAction()
{
    $role_id = $_POST["role_id"];
    $error = array(
        "title" => 'Thất bại!',
        "message" => 'Có lỗi xảy ra, vui lòng kiểm tra lại',
        "type" => 'error'
    );
    if (!empty($role_id)) {
        if (deleteRole($role_id)) {
            $success = array(
                "id" => $role_id,
                "title" => 'Thành công!',
                "message" => 'Bạn đã xóa thành công',
                "type" => 'success'
            );
            echo json_encode($success);
        } else {
            echo json_encode($error);
        }
    } else {
        echo json_encode($error);
    }
}
