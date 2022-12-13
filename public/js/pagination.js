// Pagination
const ulTag = document.querySelector("#pagination ul");
let totalPages = parseInt(ulTag.getAttribute("data-totalPage"));
let url = ulTag.getAttribute("base-url");
function element(totalPages, page, url) {
    if (url === null) url = "san-pham/page-";
    console.log("Pagination success");
    let liTag = "";
    let activeLi;
    let beforePages = page - 1;
    let afterPages = page + 1;
    if (page > 1) liTag += `<a href="${url}${page - 1}" ><li class="btn pre"><span>Quay lại</span></li></a>`;
    if (page > 2) {
        liTag += `<a href="san-pham/page-1"><li class="numb"><span>1</span></li></a>`;
        if (page > 3) liTag += `<li class="dots"><span>...</span></li>`;
    }
    for (let pageLength = beforePages; pageLength <= afterPages; pageLength++) {
        if (pageLength > totalPages) continue;
        if (pageLength === 0) pageLength = pageLength + 1;
        activeLi = page === pageLength ? "active" : "";
        liTag += `<a href="${url}${pageLength}"><li class="numb ${activeLi}"><span>${pageLength}</span></li></a>`;
    }
    if (page < totalPages - 1) {
        if (page < totalPages - 2) liTag += ` <li class="dots"><span>...</span></li>`;
        liTag += `<a href="${url}${totalPages}"><li class="numb"><span>${totalPages}</span></li></a>`;
    }

    if (page < totalPages) liTag += `<a href="${url}${afterPages}"><li class="btn next"><span>Tiếp</span></li></a>`;
    ulTag.innerHTML = liTag;
}

element(totalPages, parseInt(ulTag.getAttribute("data-page")),url);