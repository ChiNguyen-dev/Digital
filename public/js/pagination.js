// Pagination
const ulTag = document.querySelector("#pagination ul");
console.log(ulTag.getAttribute("data-totalPage"), ulTag.getAttribute("data-page"))
let totalPages = parseInt(ulTag.getAttribute("data-totalPage"));

function element(totalPages, page) {
    let liTag = "";
    let activeLi;
    let beforePages = page - 1;
    let afterPages = page + 1;
    if (page > 1) liTag += `<a href="san-pham/page-${page - 1}" ><li class="btn pre" onclick="element(${totalPages}, ${page - 1})"><span><i class="fa-solid fa-angle-left"></i></span>Prev</li></a>`;
    if (page > 2) {
        liTag += `<a href="san-pham/page-1"><li class="numb"><span>1</span></li></a>`;
        if (page > 3) liTag += `<li class="dots"><span>...</span></li>`;
    }
    // if (page === totalPages) {
    //     beforePages = beforePages - 2;
    // } else if (page === totalPages - 1) {
    //     beforePages = beforePages - 1;
    // }
    //
    // if (page === 1) {
    //     afterPages = afterPages + 2;
    // } else if (page === 2) {
    //     afterPages = afterPages + 1;
    // }

    for (let pageLength = beforePages; pageLength <= afterPages; pageLength++) {
        if (pageLength > totalPages) continue;
        if (pageLength === 0) pageLength = pageLength + 1;
        activeLi = page === pageLength ? "active" : "";
        liTag += `<a href="san-pham/page-${pageLength}"><li class="numb ${activeLi}"><span>${pageLength}</span></li></a>`;
    }
    if (page < totalPages - 1) {
        if (page < totalPages - 2) liTag += ` <li class="dots"><span>...</span></li>`;
        liTag += `<a href="san-pham/page-${totalPages}"><li class="numb"><span>${totalPages}</span></li></a>`;
    }

    if (page < totalPages) liTag += `<a href="san-pham/page-${afterPages}"><li class="btn next"><span>Next<i class="fa-solid fa-angle-right"></i></span></li></a>`;
    ulTag.innerHTML = liTag;
}

element(totalPages, parseInt(ulTag.getAttribute("data-page")));