<?php

function login($email, $password)
{
    $cipher = md5($password);
    return db_fetch_row("SELECT * FROM `users` WHERE `email` = '{$email}' AND `password` = '{$cipher}'");
}

function get_user($id)
{
    return db_fetch_row("SELECT * FROM `users` WHERE `user_id` = '{$id}'");
}


function update_user($data = array())
{
    return db_update("`users`", $data, "`id` = '{$_SESSION['isLogin']}'") ? get_user($_SESSION["isLogin"]) : false;
}

function check_role($value): bool
{

    $sql = "SELECT r.name
            FROM `user_role` as ur INNER JOIN `users` as u ON ur.user_id = u.user_id
                                   INNER JOIN roles as r ON ur.role_id = r.role_id
            WHERE ur.user_id = '{$value}'";

    $res = db_fetch_array($sql);

    if (count($res) < 2) {
        return $res[0]["name"] == "Guest";
    } else {
        foreach ($res as $value) if ($value["name"] != "Guest") return false;
        return true;
    }
}


function get_role_by_id($value)
{
    $role_id = db_fetch_row("SELECT `role_id` FROM `user_role` WHERE `user_id` = '{$value}' LIMIT 1");
    return db_fetch_row("SELECT `name` FROM `roles` WHERE `role_id` ={$role_id["role_id"]}");
}

/*
 * RESET PASSWORD
 */
function get_user_by_pass($value)
{
    $cipher = md5($value);
    return db_fetch_row("SELECT * FROM `users` WHERE `password` = '{$cipher}'");
}

