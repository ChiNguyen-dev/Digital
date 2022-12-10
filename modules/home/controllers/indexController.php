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
    $data["page"] = $_GET["page"] ?? 1;
    $pagination = handlePagination($total_row, 12, $data["page"]);
    $data["total_page"] = $pagination["totalPage"];
    $data["products"] = getProductAll("LIMIT {$pagination["startPage"]} , 12");
    load_view('index', $data);
}

