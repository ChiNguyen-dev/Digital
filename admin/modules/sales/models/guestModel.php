<?php
/*
 * list client
 */
function get_all_client()
{
    $data = db_fetch_array("SELECT u.user_id,u.fullname,u.email,u.phone_number,u.created_date
                            FROM `user_role` as ur JOIN roles as r ON ur.role_id = r.role_id JOIN users as u on ur.user_id = u.user_id 
                            WHERE r.name = 'Guest' AND u.isDelete = 0");
    return !empty($data) ? $data : false;
}