<?php

function base_url($url = ""): string
{
    global $config;
    return $config['base_url'] . $url;
}

function redirect($url = "")
{
    if (!empty($url)) {
        header("location: {$url}");
    }
}
