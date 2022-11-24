<?php
/*
 * GET ALL ROLE
 * OUTPUT : TRUE -> LIST ROLE , FALSE -> NULL
 */
function getRoles()
{
    $roles = db_fetch_array("SELECT * FROM `roles`");
    return !empty($roles) ? $roles : null;
}

/*
 *
 */
function insertRole($data = array())
{
    $role_id = db_insert("`roles`", $data);
    $role = db_fetch_row("SELECT * FROM `roles` WHERE `role_id` = '{$role_id}'");
    return !empty($role) ? $role : null;
}

/*
 *
 */
function deleteRole($id): bool
{
    return (bool)db_delete("`roles`", "`role_id` = '{$id}'");
}