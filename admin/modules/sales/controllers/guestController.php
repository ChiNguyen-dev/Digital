<?php

function construct()
{
    load_model("guest");
}

function indexAction()
{
    if ($data["users"] = get_all_client()) {
        load_view('guest', $data);
    }
}