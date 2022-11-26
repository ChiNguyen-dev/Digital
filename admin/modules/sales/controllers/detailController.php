<?php
function construct()
{
    load_model("detail");
}

function indexAction()
{
    $id = (int)$_GET["id"];
    load_view("detail");
}