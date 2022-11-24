<?php
function pagination($total_page, $page): string
{
    $result = '<ul class="pagination">';
    if ($page > 1) {
        $p = $page - 1;
        $result .= "<li class='page-item'>
                        <a class='page-link' href='san-pham/page-{$p}'>Previous</a>
                     </li>";
    }
    for ($i = 1; $i <= $total_page; $i++) {
        $active = "";
        if ($page == $i) $active = "active";

        $result .= "<li class='page-item {$active}'>
                        <a class='page-link' href='san-pham/page-{$i}'>$i</a>
                    </li>";
    }

    if ($page < $total_page) {
        $p = $page + 1;
        $result .= "<li class='page-item'>
                        <a class='page-link' href='san-pham/page-{$p}'>Next</a>
                    </li>";
    }
    $result .= "</ul>";
    return $result;
}

function create_slug($string): string
{
    $search = array(
        '#(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)#',
        '#(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)#',
        '#(ì|í|ị|ỉ|ĩ)#',
        '#(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)#',
        '#(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)#',
        '#(ỳ|ý|ỵ|ỷ|ỹ)#',
        '#(đ)#',
        '#(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)#',
        '#(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)#',
        '#(Ì|Í|Ị|Ỉ|Ĩ)#',
        '#(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)#',
        '#(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)#',
        '#(Ỳ|Ý|Ỵ|Ỷ|Ỹ)#',
        '#(Đ)#',
        "/[^a-zA-Z0-9\-\_]/",
    );
    $replace = array('a', 'e', 'i', 'o', 'u', 'y', 'd', 'A', 'E', 'I', 'O', 'U', 'Y', 'D', '-',
    );
    $string = preg_replace($search, $replace, $string);
    $string = preg_replace('/(-)+/', '-', $string);
    $string = strtolower($string);
    return $string;
}

function parse_date($value): string
{
    $data = date_parse($value);
    return $data["day"] . "-" . $data["month"] . "-" . $data["year"];
}