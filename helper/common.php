<?php
/*
 * SHOPPING CART
 */
function updateCart()
{
    $num_order = 0;
    $total_order = 0;
    foreach ($_SESSION["cart"]["buy"] as $value) {
        $num_order += $value["quantity"];
        $total_order += $value["total"];
    }
    $_SESSION["cart"]["infor"] = array(
        "num_order" => $num_order,
        "total_order" => $total_order
    );
}

function getTotalCart()
{
    if (isset($_SESSION["cart"])) {
        return $_SESSION["cart"]["infor"]["total_order"];
    }
}

function getNumItemCart()
{
    if (isset($_SESSION["cart"])) {
        return $_SESSION["cart"]["infor"]["num_order"];
    }
}

function contentMail($products, $total_order, $user): string
{
    return '
    <div style="background-color:rgb(255,255,255)">
    <div style="background-color:rgb(255,255,255); color:rgb(0,0,0);">
        <div style="margin:0px auto;width:600px">
            <div style="padding:30px 20px;">
                <table style="margin:0px; padding:0px;font-family:Arial,Helvetica,sans-serif; font-size:12px; line-height:18px; width:100%!important; background-color:rgb(255,255,255);
                color:rgb(68,68,68);">
                    <tbody style="font-family:Arial,Helvetica,sans-serif">
                    <tr style="font-family:Arial,Helvetica,sans-serif">
                        <td style="font-family:Arial,Helvetica,sans-serif">
                            <h1 style="font-size:17px; font-weight:bold; padding:0px 0px 5px; margin:0px; font-family:Arial,Helvetica,sans-serif; color:rgb(68,68,68)">
                                Chào ' . $user . '
                            </h1>
                            <p style="margin:4px 0px;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:18px;font-weight:normal;color:rgb(68,68,68)">
                                Digital rất vui thông báo đơn hàng #535495201 của quý khách đã được tiếp nhận và đang
                                trong quá trình xử lý. Digital sẽ thông báo đến quý khách ngay khi hàng chuẩn bị được
                                giao.
                            </p>
                        </td>
                    </tr>
                    <tr style="font-family:Arial,Helvetica,sans-serif;">
                        <td style="font-family:Arial,Helvetica,sans-serif;  padding-top: 10px;">
                            <p style="font-size: 14px;">Chi tiết đơn hàng:</p>
                            <div style="display: flex;">
                                <div style="width: 10%; font-size: 14px; font-weight:bold;margin-right: 10px;">STT</div>
                                <div style="width: 32.74%; font-size: 14px; font-weight:bold;margin-right: 10px;">Sản
                                    phẩm
                                </div>
                                <div style="width: 20%; font-size: 14px; font-weight:bold;margin-right: 10px;">
                                    Đơn giá
                                </div>
                                <div style="width: 16.67%; font-size: 14px; font-weight:bold;margin-right: 10px;">
                                    Số lượng
                                </div>
                                <div style=" width: 20%;font-size: 14px; font-weight:bold;margin-right: 10px;"> Thành
                                    tiền
                                </div>
                            </div>
                           ' . $products . '
                            <h6 style="font-weight: bold; font-size: 15px; margin: 18px 0 15px;">
                                Tổng giá: <span style="color: #d63031;">' . $total_order . '</span>
                            </h6>
                            <p style="font-size:13px;padding:0px 0px 5px; margin:0px; font-family:Arial,Helvetica,sans-serif; color:rgb(68,68,68)">
                                Cảm ơn quý khách đã đặt hàng tại Digital.<br>
                                Trường hợp quý khách có những băn khoăn về đơn hàng, vui lòng liên hệ <br>
                                Hotline:0819778801.<br>
                            </p>
                            <div style="margin:auto;font-family:Arial,Helvetica,sans-serif">
                                <a href="" style="display:inline-block;text-decoration:none;margin-right:30px;text-align:center;border-radius:3px;padding:5px 10px;font-size:12px;font-weight:bold;
                                   margin-left:35%;margin-top:5px;font-family:Arial,Helvetica,sans-serif;background-color: #5a4bde;color:rgb(255,255,255)"
                                   target="_blank">
                                    Chi tiết đơn hàng tại Digital
                                </a>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
';
}