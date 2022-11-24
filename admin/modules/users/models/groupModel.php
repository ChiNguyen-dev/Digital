<?php
function get_list_member(): array
{
    $sql = "SELECT   u.user_id , u.fullname ,u.phone_number, u.email,r.name,u.created_date
            FROM `user_role` as ur INNER JOIN `users` as u ON ur.user_id = u.user_id 
                                   INNER JOIN roles as r ON ur.role_id = r.role_id
            WHERE r.name != 'Guest' AND u.isDelete = 0
            GROUP BY u.fullname ,u.phone_number, u.email,u.created_date ";
    return db_fetch_array($sql);
}

function roles($value): array
{
    $roles = array();
    $ids = db_fetch_array("SELECT `role_id` FROM `user_role` WHERE `user_id` = '{$value}'");
    foreach ($ids as $key => $id) {
        $role_name = db_fetch_row("SELECT `name` FROM `roles` WHERE `role_id` = '{$id["role_id"]}'");
        $roles[] = $role_name["name"];
    }
    return $roles;
}

function getAll($table, $value): array
{
    $data = implode(",", $value);
    return db_fetch_array("SELECT {$data} FROM {$table}");
}

/*
 * ADD MEMBER
 */
function handle_add_user($user, $roleIds)
{
    $user_id = addUser($user);
    foreach ($roleIds as $id) {
        db_insert("`user_role`", ["user_id" => $user_id["user_id"], "role_id" => $id]);
    }
}

function addUser($user)
{
    $id = db_insert("`users`", $user);
    return db_fetch_row("SELECT * FROM `users` WHERE `user_id` = '{$id}'");
}

/*
 * edit user group
 */
function role_user($id): array
{
    $sql = "SELECT r.role_id,r.name FROM `user_role` as ur JOIN roles as r ON ur.role_id = r.role_id WHERE `user_id` = '{$id}'";
    return db_fetch_array($sql);
}

/*
 * update user group
 */
function update_member($data = array(), $id = ""): bool
{
    return (bool)db_update("`users`", $data, "`user_id` = '{$id}'");
}

/*
 * update role user group edit
 */
function update_role($role_old, $id_user, $role_new): bool
{
    if (!empty($role_old) && !empty($id_user) && !empty($role_new)) {
        $role = array();
        foreach ($role_old as $value) $role[] = $value['role_id'];

        if (count($role) < count($role_new)) {
            $r = array_diff($role_new, $role);
            foreach ($r as $value) db_insert("`user_role`", ['user_id' => $id_user, 'role_id' => $value]);
            return true;
        } else if (count($role) > count($role_new)) {
            $r = array_diff($role, $role_new);
            foreach ($r as $value) db_query("DELETE FROM `user_role` WHERE `user_id` = '{$id_user}' AND `role_id` = '{$value}'");
            return true;
        } else {
            $r = array_diff($role, $role_new);
            if (!empty($r)) {
                foreach ($r as $value) db_query("DELETE FROM `user_role` WHERE `user_id` = '{$id_user}' AND `role_id` = '{$value}'");
                foreach ($role_new as $value) db_insert("`user_role`", ['user_id' => $id_user, 'role_id' => $value]);
            }
            return true;
        }
        return false;
    }
    return false;
}

/*
 * delete user: getUserById
 */
function isDelete_user($id)
{
    return db_update("`users`", ["isDelete" => 1], "`user_id` = '{$id}'");
}