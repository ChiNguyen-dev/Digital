<?php
function handlePagination($totalProduct, $numItemsOfPage, $currentPage): array
{
    return array(
        "totalPage" => ceil($totalProduct / $numItemsOfPage),
        "startPage" => ($currentPage - 1) * $numItemsOfPage,
    );
}

function pagination($total_page, $page): string
{
    $result = '<ul class="pagination mb-0">';
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
