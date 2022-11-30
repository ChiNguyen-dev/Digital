<?php
function construct()
{
    load_model("slider");
}

function indexAction()
{
    $sliders = findAll("sliders", "`status` != 2");
    $data["confirms"] = findAll("sliders", "`status`   = '0'");
    $data["accept"] = findAll("sliders", "`status`   = '1'");
    $data["deletes"] = findAll("sliders", "`status` = '2'");
    $data["sliders"] = $sliders != null ? $sliders : "";
    if (isset($_POST["btn-submit"])) {
        if (!empty($_POST["images"][0]) && $_POST["btn-submit"] == 1) {
            foreach ($_POST["images"] as $image) {
                addSlider(["image" => "public/uploads/" . $image, "status" => 0, "user_id" => $_SESSION["isLogin"]]);
            }
        }
        if ($_POST["btn-submit"] == 0 && isset($_POST["checked"]) && isset($_POST["actions"])) {
            $checked = implode(",", $_POST["checked"]);
            $v = $_POST["actions"] < 2 ? ["status" => $_POST["actions"]] : ["status" => 2];
            updateSlider($v, "`slider_id` IN($checked)");
        }
        redirect(base_url("slider.html"));
    } else {
        $data["isRole"] = false;
        if (checkRole(getAllRole(), ["Admin", "Content"])) {
            $data["isRole"] = true;
        }
        load_view("index", $data);
    }
}

