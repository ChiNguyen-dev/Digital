<?php
function construct()
{
    load_model('index');
    load("lib","email");
}

function indexAction()
{
    $data["provinces"] = provinces();
    if (isset($_POST["btn-submit"])) {
        $error = array();
        if ($_POST["province"] == 0) $error["province"] = "Vui lòng chọn tỉnh";
        if ($_POST["district"] == 0) $error["district"] = "Vui lòng chọn quận, huyện";
        if ($_POST["ward"] == 0) $error["ward"] = "Vui lòng chọn phường, xã";
        if (empty($_POST["nickName"])) $error["nickName"] = "Danh xưng không được để trống";
        if (empty($_POST["email"])) $error["email"] = "Email không được để trống";
        if (empty($_POST["fullname"])) $error["fullname"] = "Họ tên không được để trống";
        if (empty($_POST["phone"])) $error["phone"] = "Số điện thoại không được để trống";
        if (empty($_POST["address"])) $error["address"] = "Số nhà,tên đường không được để trống";
        if (empty($error)) {
            $nickName = $_POST["nickName"] == 1 ? "Anh" : "Chị";
            $data = array(
                "fullname" => $_POST["fullname"],
                "email" => $_POST["email"],
                "phone_number" => $_POST["phone"],
                "address" => $_POST["address"] . " " . address($_POST["province"], $_POST["district"], $_POST["ward"])
            );
        } else {
            load_view('index', $data);
        }
    } else {
        load_view('index', $data);
    }
}

function dataAction()
{
    $dataType = $_POST["dataType"];
    $id = $_POST["id"];
    $data = $dataType == 0 ? findAll("devvn_quanhuyen", "`matp`= '{$id}'") : findAll("devvn_xaphuongthitran", "`maqh`= '{$id}'");
    $data[] = $dataType;
    echo json_encode($data);
}