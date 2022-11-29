<?php
function construct()
{
    load_model("slider");
}

function indexAction()
{
    $sliders = findAll("sliders");
    $data["sliders"] = $sliders != null ? $sliders : "";
    if (isset($_POST["btn-submit"])) {
        if (!empty($_POST["images"])) {
            echo "ok";
        } else {
            redirect(base_url("slider.html"));
        }
//        foreach ($_POST["images"] as $image) {
//            addSlider(["image" => "public/uploads/" . $image, "status" => 0, "user_id" => $_SESSION["isLogin"]]);
//        }

    } else {
        load_view("index", $data);
    }
}