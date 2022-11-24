<?php

function construct()
{
    load_model("index");
}

function indexAction()
{
    $data["products"] = getItemPhone();
    load_view('index', $data);
}

function addAction()
{
    echo $_GET['id'];
    echo "add item";
}

function editAction()
{
    echo "edit item";
}

function deleteAction()
{
    echo "delete item";
}