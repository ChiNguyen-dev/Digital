<?php
function currency_format($number, $suffix = 'đ'): string
{
    return number_format($number) . $suffix;
}

function validation_log($email, $password, $user_log = ""): array
{
    $error = [];
    if (empty($_POST[$email])) {
        $error[$email] = '* Email không được để trống';
    } elseif (!preg_match('/^[A-Za-z0-9_\.@]{5,32}$/', $_POST[$email])) {
        $error[$email] = '* invalid account name';
    }

    if (empty($_POST[$password])) {
        $error[$password] = '* Mật khẩu không được để trống';
    } elseif (!preg_match('/^[A-Za-z0-9_\.!@#$%^&*()]{6,32}$/', $_POST[$password])) {
        $error[$password] = '* Mật khẩu phải từ 6-32 kí tự và chữ hoa';
    }
    if (empty($error) && empty($user_log)) {
        $error["log_fail"] = "* Email hoặc mật khẩu không đúng";
    }
    return $error;
}

function validation_reset($pass_old, $pass_new, $confirm): array
{
    $error = [];
    if (empty($_POST[$pass_old])) {
        $error[$pass_old] = '* Mật khẩu cũ không được để trống';
    } elseif (!preg_match('/^[A-Za-z0-9_\.!@#$%^&*()]{6,32}$/', $_POST[$pass_old])) {
        $error[$pass_old] = '* Mật khẩu phải từ 6-32 kí tự và chữ hoa';
    }

    if (empty($_POST[$pass_new])) {
        $error[$pass_new] = '* Mật khẩu mới không được để trống';
    } elseif (!preg_match('/^[A-Za-z0-9_\.!@#$%^&*()]{6,32}$/', $_POST[$pass_new])) {
        $error[$pass_new] = '* Mật khẩu phải từ 6-32 kí tự và chữ hoa';
    }

    if (empty($_POST[$confirm])) {
        $error[$confirm] = '* Xác nhận mật khẩu không chính xác';
    } elseif (!preg_match('/^[A-Za-z0-9_\.!@#$%^&*()]{6,32}$/', $_POST[$confirm])) {
        $error[$confirm] = '* Mật khẩu phải từ 6-32 kí tự và chữ hoa';
    }

    return $error;
}

function data_tree($data, $parent_id = 0, $level = 0): array
{
    $output = array();
    foreach ($data as $key => $value) {
        if ($value["parent_id"] == $parent_id) {
            $value["level"] = $level;
            $output[] = $value;
            if (has_child($data, $value["category_id"])) {
                $resultChild = data_tree($data, $value["category_id"], $level + 1);
                $output = array_merge($output, $resultChild);
            }
        }
    }
    return $output;
}

function has_child($data, $paren_id): bool
{
    foreach ($data as $value) {
        if ($value["parent_id"] = $paren_id) {
            return true;
        }
    }
    return false;
}

function getFileName($files)
{
    if (!empty($files)) {
        $result = array();
        foreach ($files as $key => $file) {
            $result[$key] = "public/uploads/" . $file;
        }
        return $result;
    } else {
        return null;
    }
}
