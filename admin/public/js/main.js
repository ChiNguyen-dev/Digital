$(document).ready(function () {
    let height = $(window).height() - $('#footer-wp').outerHeight(true) - $('#header-wp').outerHeight(true);

    $('#content').css('min-height', height);

    let checked = [];

    //  CHECK ALL
    $('#checkAll').click(function () {
        let status = $(this).prop('checked');
        $('.table tbody tr td input[type="checkbox"]').prop("checked", status);
    });

    $("#sidebar-menu").find(".dashboard-title").addClass("active-color");
    $("#sidebar-menu").find(".dashboard-icon").addClass("active-color");

    // EVENT SIDEBAR MENU
    $('#sidebar-menu .nav-item .nav-link .title').after('<span class="fa fa-angle-right arrow"></span>');
    let sidebar_menu = $('#sidebar-menu > .nav-item > .nav-link');
    sidebar_menu.on('click', function () {
        if (!$(this).parent('li').hasClass('active')) {
            $("#sidebar-menu").find(".dashboard-title").removeClass("active-color");
            $("#sidebar-menu").find(".dashboard-icon").removeClass("active-color");

            $('#sidebar-menu > .nav-item').find(".active-color").removeClass("active-color");
            $('.sub-menu').slideUp();
            $(this).parent('li').find('.sub-menu').slideDown();
            $(this).parent('li').children(".nav-link").find("i").addClass("active-color");
            $(this).parent('li').children(".nav-link").find(".title").addClass("active-color");
            $('#sidebar-menu > .nav-item').removeClass('active');
            $(this).parent('li').addClass('active');
            return false;
        } else {
            $(this).parent('li').children(".nav-link").find("i").removeClass("active-color");
            $(this).parent('li').children(".nav-link").find(".title").removeClass("active-color");
            $('.sub-menu').slideUp();
            $('#sidebar-menu > .nav-item').removeClass('active');
            $("#sidebar-menu").find(".dashboard-title").addClass("active-color");
            $("#sidebar-menu").find(".dashboard-icon").addClass("active-color");
            return false;
        }
    });

    // URL DEFAULT
    const Default_URL = "http://localhost:8080/Digital/admin/";

    // ADD ROLE
    $("#add-role").click(function () {
        const input = $("#name");
        const text = $("#desc");
        const data = {
            name: input.val(),
            display_name: text.val()
        }
        $.ajax({
            url: Default_URL + '?mod=roles&action=add',
            method: 'POST',
            data: data,
            dataType: 'json',
            success: function (data) {
                console.log(data)
                if (data.type === "success") {
                    const table = document.querySelector("tbody");
                    const row = document.createElement("tr");
                    row.setAttribute("role", data.role.role_id);
                    row.innerHTML = ` <th scope="row">${data.role.role_id}</th>
                                            <td>${data.role.name}</td>
                                            <td> ${data.role.display_name}</td>
                                            <td>
                                                <ul class="list-operation ml-3 mb-0">
                                                    <li>
                                                        <button type="button" title="Xóa"
                                                                id-role="${data.role.role_id}"
                                                                class="delete-role">
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                        </button>
                                                    </li>
                                                </ul>
                                            </td>`;
                    table.appendChild(row);
                    input.val("");
                    text.val("");
                    return false;
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
    });
    // ADD CATEGORY
    $("#add-cate").click(function () {
        const input = $("#name");
        const select = document.querySelector("select");
        let data = {
            cate_name: input.val(),
            parent_id: select.value
        };
        $.ajax({
            url: Default_URL + '?mod=products&controllers=cate&action=addCate',
            method: 'POST',
            data: data,
            dataType: 'json',
            success: function (data) {
                if (data.type === "success") {
                    console.log(data)
                    const table = document.querySelector("tbody");
                    table.innerHTML = "";
                    select.innerHTML = "";
                    const option_default = document.createElement("option");
                    option_default.setAttribute("value", 0);
                    option_default.innerText = "Chọn danh mục";
                    select.appendChild(option_default);

                    data.categories.forEach(function (value, index) {
                        const row = document.createElement("tr");
                        row.setAttribute("cate", value.category_id);
                        row.innerHTML = ` <th scope="row">${index + 1}</th>
                                                <td>${value.cate_name}</td>
                                                <td>${value.slug}</td>
                                                <td>
                                                    <ul class="list-operation ml-3 mb-0">
                                                        <li>
                                                            <button type="button" title="Xóa"
                                                                    id-cate="${value.category_id}"
                                                                    class="delete-cate">
                                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                            </button>
                                                        </li>
                                                    </ul>
                                                </td>`;
                        table.appendChild(row);
                        const option = document.createElement("option");
                        option.setAttribute("value", value.category_id);
                        option.innerText = value.cate_name;
                        select.appendChild(option);
                        input.val("");
                    })
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
    });
    // ADD COLOR
    $("#add-color").click(function () {
        const input = $("#name");
        const style = $("#favcolor");
        const data = {
            name: input.val(),
            style: style.val()
        }
        console.log(data)
        $.ajax({
            url: Default_URL + '?mod=products&controllers=color&action=add',
            method: 'POST',
            data: data,
            dataType: 'json',
            success: function (data) {
                console.log(data);
                let active = data.color.active === '0' ? "color:#636e72;" : "color: #009432";
                console.log(data.color.active)
                const table = document.querySelector("tbody");
                const row = document.createElement("tr");
                let idRowAbove;
                if (table.children.length > 0) {
                    idRowAbove = parseInt(table.children[table.children.length - 1].children[0].innerText) + 1;
                } else {
                    idRowAbove = 1;
                }
                row.setAttribute("data-color", data.color.color_id);
                row.innerHTML = ` <th scope="row">${idRowAbove}</th>
                                            <td>${data.color.name}</td>
                                            <td><span style="background-color:${data.color.style}; color: ${data.color.style};
                                             padding: 5px 20px; border-radius: 50px">color</span></td>
                                            <td><span class="status-color"
                                                style="${active}"><i
                                                class="fa-solid fa-circle-check"></i>
                                                </span>
                                            </td>
                                            <td>
                                                <ul class="list-operation ml-3 mb-0">
                                                    <li>
                                                        <button type="button" title="Xóa"
                                                                data-color="${data.color.color_id}"
                                                                class="delete-color">
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                        </button>
                                                    </li>
                                                </ul>
                                            </td>`;
                table.appendChild(row);
                input.val("");
            }
        });
    });
    // DELETE USER GROUP
    $(".delete").click(function () {
        let id_user = $(this).attr("id-user");
        let data = {id: id_user};
        $.ajax({
            url: Default_URL + 'user/delete',
            method: 'POST',
            data: data,
            dataType: 'json',
            success: function (data) {
                $("[user='" + data.id + "']").remove();
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
        return false;
    });
    // DELETE CATEGORY
    $("tbody").on("click", ".delete-cate", function () {
        const id = $(this).attr("id-cate");
        const data = {category_id: id};
        $.ajax({
            url: Default_URL + "?mod=products&controllers=cate&action=delete",
            method: "POST",
            data: data,
            dataType: "json",
            success: function (data) {
                console.log(data);
                if (data.type === "success") {
                    $("[cate='" + data.id + "']").remove();
                    $("option[value='" + data.id + "']").remove();
                    return false;
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
    });
    // // DELETE ROLE
    $("tbody").on("click", ".delete-role", function () {
        const id = $(this).attr("id-role");
        const data = {role_id: id};
        $.ajax({
            url: Default_URL + "?mod=roles&action=delete",
            method: "POST",
            data: data,
            dataType: "json",
            success: function (data) {
                console.log(data);
                if (data.type === "success") {
                    $("[role='" + data.id + "']").remove();
                    return false;
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
    });
    //DELETE COLOR
    $("tbody").on("click", ".delete-color", function () {
        const id = $(this).attr("data-color");
        const data = {color_id: id};
        $.ajax({
            url: Default_URL + "?mod=products&controllers=color&action=delete",
            method: "POST",
            data: data,
            dataType: "json",
            success: function (data) {
                console.log(data);
                const table = document.querySelector("tbody");
                table.innerHTML = "";
                data.colors.forEach(function (data, index) {
                    const row = document.createElement("tr");
                    let active = data.active === '0' ? "color:#636e72;" : "color: #009432";
                    console.log(data.active)
                    row.setAttribute("data-color", data.color_id);
                    row.innerHTML = ` <th scope="row">${index + 1}</th>
                                      <td>${data.name}</td>
                                      <td>
                                            <span style="padding: 5px 20px;
                                                         border-radius: 50px; color: ${data.style};
                                                         background-color: ${data.style};">
                                                  color
                                            </span>
                                      </td>
                                      <td><span class="status-color"
                                                style="${active}"><i
                                                class="fa-solid fa-circle-check"></i>
                                           </span>
                                      </td>
                                      <td>
                                           <ul class="list-operation ml-3 mb-0">
                                               <li>
                                                   <button type="button" title="Xóa"
                                                           data-color="${data.color_id}"
                                                           class="delete-color">
                                                           <i class="fa fa-trash" aria-hidden="true"></i>
                                                   </button>
                                               </li>
                                           </ul>
                                      </td>`;
                    table.appendChild(row);
                })
                return false;
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
    });

    $("#upload_multi").on("click", '.btn-upload', function () {
        let inputFile = $('#file');
        let fileToUpload = inputFile[0].files;
        if (fileToUpload.length > 0) {
            let formData = new FormData();
            for (let i = 0; i < fileToUpload.length; i++) {
                let file = fileToUpload[i];
                formData.append('file[]', file, file.name);
            }
            $.ajax({
                url: Default_URL + 'helper/file.php',
                type: 'post',
                data: formData,
                contentType: false,
                processData: false,
                dataType: 'text',
                success: function (data) {
                    console.log(data)
                    $("#result").html(data);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
        }
        return false;
    });

});



