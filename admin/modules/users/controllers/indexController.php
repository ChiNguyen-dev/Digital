<?php
function construct()
{
    load_model('index');
}

function indexAction()
{
//    if ($data["users"] = get_all_client()) {
//        load_view('index', $data);
//    } else {
//        load_view('index');
//    }
}

function loginAction()
{
    if (isset($_POST['btn_login'])) {
        $user = !empty($_POST['email']) && !empty($_POST['password']) ? login($_POST['email'], $_POST['password']) : "";
        $validation = validation_log('email', 'password', $user);
        if (!empty($validation)) {
            load_view('login', ['validation' => $validation, "value_email" => $_POST["email"]]);
        } elseif (check_role($user["user_id"])) {
            $validation["log_fail"] = "*Do not have an account";
            load_view('login', ['validation' => $validation, "value_email" => $_POST["email"]]);
        } else {
            $_SESSION['isLogin'] = $user["user_id"];
            $_SESSION['user_login'] = $user["fullname"];
            setcookie('isLogin', true, time() + 3600, '/');
            setcookie('user_login', $_POST["username"], time() + 3600, '/');
            redirect(base_url("home.html"));
        }
    } else {
        load_view("login");
    }
}

function logoutAction()
{
    setcookie('isLogin', true, time() - 3600, '/');
    setcookie('user_login', $_POST["username"], time() - 3600, '/');
    unset($_SESSION['isLogin']);
    unset($_SESSION['user_login']);
    redirect("login");
}

function resetAction()
{
    if (isset($_POST["btn-reset"])) {
        $validation = validation_reset("pass-old", "pass-new", "confirm-pass");
        if (empty($validation)) {
            $user = get_user_by_pass($_POST["pass-old"]);
            if (empty($user)) $validation["pass_fail"] = "* Mật khẩu cũ không chính xác";
            if ($_POST["pass-new"] != $_POST["confirm-pass"]) $validation["confirm-pass"] = '* Xác nhận mật khẩu không chính xác';
            if (empty($validation)) {
                $data = array(
                    "`password`" => md5($_POST["pass-new"])
                );
                if (!empty(update_user($data))) load_view("reset");
            } else {
                load_view('reset', ["validation" => $validation]);
            }
        } else {
            load_view('reset', ["validation" => $validation]);
        }
    } else {
        load_view('reset');
    }
}

function updateAction()
{
    if (isset($_POST["btn-submit"])) {
        $request = array(
            "`fullname`" => $_POST["name"],
            "`email`" => $_POST["email"],
            "`phone_number`" => $_POST["phone_number"],
            "`address`" => $_POST["address"]
        );
        if ($data["user"] = update_user($request)) load_view('update', $data);
    } else {
        $data["user"] = get_user($_SESSION['isLogin']);
        $data["role"] = get_role_by_id($_SESSION['isLogin']);
        load_view('update', $data);
    }
}
