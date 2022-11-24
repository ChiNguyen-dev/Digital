<?php

function show_array($data)
{
    if (is_array($data)) {
        echo "<pre>";
        print_r($data);
        echo "<pre>";
    }
}

/*
 * GET ALL ROLE OF USER LOGIN
 */
function getAllRole()
{
    $user_id = $_SESSION["isLogin"];
    $sql = "SELECT r.role_id, r.name FROM `user_role` as ur INNER JOIN roles as r ON ur.role_id = r.role_id  WHERE ur.user_id = '{$user_id}'";
    $roles = db_fetch_array($sql);
    return !empty($roles) ? $roles : null;
}

function checkRole($data = array(), $value = array())
{
    if (!empty($data) && !empty($value)) {
        foreach ($data as $v) {
            if (in_array($v["name"], $value)) {
                return true;
            }
        }
        return false;
    }
}

/*
 * GET ONE OBJECT OF TABLE
 */
function findOne($table, $field, $value)
{
    $object = db_fetch_row("SELECT * FROM `$table` WHERE `$field` = '{$value}'");
    return !empty($object) ? $object : null;
}

/*
 * GET ALL OBJECT OF TABLE
 */
function findAll($table, $where = "")
{
    $w = !empty($where) ? "WHERE " . $where : "";
    $objects = db_fetch_array("SELECT * FROM `$table` " . $w);
    return !empty($objects) ? $objects : null;
}

/*
 * ADD
 */
function add($table, $data)
{
    $tables = $table . 's';
    $field_id = $table . '_id';
    $id = db_insert("`" . $tables . "`", $data);
    return findOne("$tables", "$field_id", $id);
}

