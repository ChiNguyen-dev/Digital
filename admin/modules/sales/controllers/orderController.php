<?php
function construct()
{
    load_model("order");
}

function indexAction()
{
    $data["orders"] = getOrder();
    load_view("order",$data);
}