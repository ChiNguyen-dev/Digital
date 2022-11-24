<?php
function construct()
{
    load_model('group');
    load_model("index");
}

function indexGroupAction()
{
    $data["members"] = get_list_member();
    load_view("indexGroup", $data);
}

function addGroupAction()
{
    if (isset($_POST["btn-submit"])) {
        $user = array(
            "fullname" => $_POST["fullname"],
            "email" => $_POST["email"],
            "password" => md5($_POST["password"]),
            "phone_number" => $_POST["phone_number"],
            "address" => $_POST["address"],
        );
        $roleIds = $_POST["role_id"];
        if (!empty($user) && !empty($roleIds)) {
            handle_add_user($user, $roleIds);
            redirect(base_url("thanh-vien.html"));
        }
    } else {
        $data["roles"] = getAll("roles", ["*"]);
        load_view("addGroup", $data);
    }

}

function updateGroupAction()
{
    $role_user = role_user($_GET["id"]);
    if (isset($_POST["btn-submit"])) {
        $user = array(
            "fullname" => $_POST["fullname"],
            "email" => $_POST["email"],
            "phone_number" => $_POST["phone_number"],
            "address" => $_POST["address"],
        );
        $roleIds = (isset($_POST["role_id"])) ? $_POST["role_id"] : "";
        if (!empty($_POST["password"])) $user["password"] = md5($_POST["password"]);
        update_member($user, $_GET["id"]);
        if (!empty($roleIds)) {
            if (update_role($role_user, $_GET["id"], $roleIds)) {
                redirect(base_url("thanh-vien.html"));
            }
        } else {
            redirect(base_url("thanh-vien.html"));
        }
    } else {
        $data['user'] = get_user($_GET["id"]);
        $data['roles'] = array();
        foreach ($role_user as $value) $data['roles'][$value['role_id']] = $value['name'];
        $allRole = array();
        foreach (getAll("`roles`", ["`role_id`", "`name`"]) as $value) $allRole[$value['role_id']] = $value['name'];
        $data['not_active'] = array_diff($allRole, $data['roles']);
        load_view("updateGroup", $data);
    }
}

function deleteGroupAction()
{
    $id = $_POST["id"];
    $user = isDelete_user($id);
    if ($user) {
        $success = array(
            "id" => $id,
            "title" => 'Thành công!',
            "message" => 'Bạn đã xóa thành công',
            "type" => 'success',
        );
        echo json_encode($success);
    } else {
        $error = array(
            "title" => 'Thất bại!',
            "message" => 'Có lỗi xảy ra, vui lòng kiểm tra lại',
            "type" => 'error',
        );
        echo json_encode($error);
    }
}
