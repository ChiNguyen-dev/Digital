<?php

function construct()
{
    load_model("index");
}

function indexAction()
{
    $data["phones"] = getItemPhone(322);
    $data["laptops"] = getItemPhone(321);

    $data["sliders"] = findAll("sliders", "`status` = 1");
    // Pagination
    $total_row = count(getAll());
    $total_pages = ceil($total_row / 12);
    $page = isset($_GET["page"]) ? $_GET["page"] : 1;
    $start = ($page - 1) * 12;
    $data["page"] = $page;
    $data["total_page"] = $total_pages;
    $data["products"] = getProductAll($start, 12);

    load_view('index', $data);
}

