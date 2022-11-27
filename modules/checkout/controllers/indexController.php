<?php
function construct()
{
    load_model('index');
    load("lib", "email");
}

function indexAction()
{
    $data = array();
    $data["provinces"] = provinces();
    $data["user"] = array();
    if (isset($_POST["btn-submit"])) {
        $error = array();
        if ($_POST["province"] == 0 || !isset($_POST["province"])) $error["province"] = "* Vui lòng chọn tỉnh";
        if ($_POST["district"] == 0 || !isset($_POST["district"])) $error["district"] = "* Vui lòng chọn quận, huyện";
        if ($_POST["ward"] == 0 || !isset($_POST["ward"])) $error["ward"] = "* Vui lòng chọn phường, xã";
        if (empty($_POST["address"])) $error["address"] = "* Số nhà,tên đường không được trống";
        if (empty($error)) $data["user"]["address"] = $_POST["address"] . " " . address($_POST["province"], $_POST["district"], $_POST["ward"]);
        if (!isset($_POST["nickName"])) $error["nickName"] = "* Danh xưng không được để trống";
        empty($_POST["email"]) ? $error["email"] = "Email không được để trống" : $data["user"]["email"] = $_POST["email"];
        empty($_POST["fullname"]) ? $error["fullname"] = "* Họ tên không được để trống" : $data["user"]["fullname"] = $_POST["fullname"];
        empty($_POST["phone"]) ? $error["phone"] = "* Số điện thoại không được để trống" : $data["user"]["phone_number"] = $_POST["phone"];
        if (empty($error)) {
//            show_array($_SESSION["cart"]["buy"]);
            $data["user"]["isDelete"] = 0;
            $nickName = $_POST["nickName"] == 1 ? "anh" : "chị";
            $str_product = "";
            if (isset($_SESSION["cart"])) {
                foreach ($_SESSION["cart"]["buy"] as $key => $item) {
                    $str_product .= '<div style="display: flex; padding-top: 10px;">
                                         <div style="width: 10%; font-size: 14px; font-weight:bold;margin-right: 5px;">' . $key . '</div>
                                         <div style="width: 32.74%; font-size: 14px; margin-right: 5px;">' . $item["name"] . '</div>
                                         <div style="width: 20%; font-size: 14px; margin-right: 5px;">' . currency_format($item["price"]) . '</div>
                                         <div style="width: 16.67%; font-size: 14px; margin-right: 5px;">' . $item["quantity"] . '</div>
                                         <div style="width: 20%; font-size: 14px; margin-right: 5px;">' . currency_format($item["total"]) . '</div>
                                    </div>';
                }
                $total_order = currency_format($_SESSION["cart"]["infor"]["total_order"]);
                $content = contentMail($str_product, $total_order, $nickName . ' ' . $data["user"]["fullname"]);
                if (send_mail("[Digital Store] Chi tiết đơn hàng", $data["user"]["email"], $data["user"]["fullname"], $content)) {
                    $user = add("user", $data["user"]);
                    if ($user != null) {
                        addRole($user["user_id"]);
                        $data["order"] = array(
                            "order_id" => "#" . mt_rand(1000, 999999),
                            "user_id" => $user["user_id"],
                            "status" => 0
                        );
                        $order = addOrder($data["order"], $data["order"]["order_id"]);
                        $payment_method = $_POST["payment-method"] == 0 ? "Thanh toán tại cửa hàng" : "Thanh toán tại nhà";
                        foreach ($_SESSION["cart"]["buy"] as $key => $item) {
                            addOrderItem([
                                "order_id" => $order["order_id"],
                                "product_id" => $key,
                                "color_name" => $item["color"],
                                "quantity" => $item["quantity"],
                                "payment_method" => $payment_method
                            ]);
                            $inventory = findOne("inventories", "product_id", $key);
                            $quantity = $inventory["quantity"] - $item["quantity"];
                            $quantity = $quantity > 0 ? $quantity : 0;
                            updateQty(["quantity" => $quantity], $key);
                        }
                        unset($_SESSION["cart"]);
                        redirect(base_url());
                    } else {
                        echo "INSERT CLIENT FAIL";
                    }
                } else {
                    echo "CHECKOUT FAIL";
                }
            }
        } else {
            $data["error"] = $error;
            load_view('index', $data);
        }
    } else {
        load_view('index', $data);
    }
}

function dataAction()
{
    $dataType = $_POST["dataType"];
    $id = $_POST["id"];
    $data = $dataType == 0 ? findAll("devvn_quanhuyen", "`matp`= '{$id}'") : findAll("devvn_xaphuongthitran", "`maqh`= '{$id}'");
    $data[] = $dataType;
    echo json_encode($data);
}