<?php
function construct()
{
    load_model("index");
}

function indexAction()
{
    $param = $_GET["slug"];
    $cate = findOne("categories", "slug", $param);
    load_view("index");
}