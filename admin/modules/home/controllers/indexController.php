<?php
function construct()
{
    load_model('index');
}

function indexAction()
{
    $data["orders"] = getOrder();
    $sucess = findAll("orders", "`status` = '1'");
    $processing = findAll("orders", "`status` = '0'");
    $data["processing"] = $processing != null ? count($processing) : 0;
    $data["sucess_order"] = $sucess != null ? count($sucess) : 0;
    load_view('index', $data);
}