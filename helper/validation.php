<?php

function validation_log($email, $password): array
{
    $error = [];
    if (empty($_POST[$email])) {
        $error[$email] = '* email cannot be left blank';
    } elseif (!preg_match('/^[A-Za-z0-9_\.@]{5,32}$/', $_POST[$email])) {
        $error[$email] = '* invalid account name';
    }

    if (empty($_POST[$password])) {
        $error[$password] = '* password cannot be left blank';
    } elseif (!preg_match('/^[A-Za-z0-9_\.!@#$%^&*()]{6,32}$/', $_POST[$password])) {
        $error[$password] = '* 6-32 kí tự và phải có chữ hoa';
    }
    return $error;
}