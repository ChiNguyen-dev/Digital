<?php

function construct()
{
    load_model("index");
}

function indexAction()
{
    $data["phones"] = getItemPhone(322);
    $data["laptops"] = getItemPhone(321);
    $data["products"] = getAll();
    $data["sliders"] = findAll("sliders", "`status` = 1");
    load_view('index', $data);
}

