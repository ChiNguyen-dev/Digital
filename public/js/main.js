$(document).ready(function () {
    //SEARCH
    $(".box-search__icon").click(function () {
        $(".box-search").toggleClass("active");
    });
    $(".clear").click(function () {
        $(".input__search").val("");
        $(".box-search").toggleClass("active");
    });

//  SLIDER
    let slider = $('#slider-wp');
    slider.owlCarousel({
        items: 1,
        loop: true,
        nav: true,
        lazyLoad: true,
        autoplay: true,
        autoplayTimeout: 5000
    });


//  ZOOM PRODUCT DETAIL
    $(".thumbnail__image").click(function () {
        let image = $(this).attr("src");
        $("#zoom").attr("src", image);
    });
    $("#zoom").imagezoomsl({
        zoomrange: [3, 3]
    });


//  LIST THUMB
    let list_thumb = $('#list-thumb');
    list_thumb.owlCarousel({
        items: 5, //10 items above 1000px browser width
    });

//  FEATURE PRODUCT
    let feature_product = $('.list-feature-product');
    feature_product.owlCarousel({
        items: 4,
        loop: true,
        margin: 10, nav: true,
        autoplay: true,
        autoplayTimeout: 4000
    });

    // sidebar menu
    const sideBar_menu = $(".sidebar-category__filter > .filter > .filter__title>h5.has-toggle");
    sideBar_menu.on("click", function () {
        !$(this).hasClass("active") ? $(this).addClass('active') : $(this).removeClass('active');
        const parent = $(this).parent(".filter__title").parent(".filter");
        if (!parent.hasClass("active")) {
            parent.find('.sub-menu-sidebar').slideUp();
            $(this).parent(".filter__title").parent(".filter").find(".sub-menu-sidebar").slideDown();
            parent.removeClass('active');
            $(this).parent(".filter__title").parent(".filter").addClass('active');
            return false;
        } else {
            parent.find('.sub-menu-sidebar').slideUp();
            parent.removeClass('active');
            return false;
        }
    });
    const chidrent = $(".sidebar-category__filter > .filter > .sub-menu-sidebar > li > .has-toggle > i.has-toggle__icon");
    chidrent.on("click", function () {
        const parent = $(this).parent(".has-toggle").parent("li");
        if (parent.hasClass("active")) {
            parent.find(".sub-menu-sidebar__chilrent").slideUp();
            parent.removeClass('active');
            return false;
        } else {
            $(".sidebar-category__filter > .filter > .sub-menu-sidebar > li").find(".sub-menu-sidebar__chilrent").slideUp();
            parent.find(".sub-menu-sidebar__chilrent").slideDown();
            parent.removeClass('active');
            parent.addClass('active');
            return false;
        }
    })


//  SCROLL TOP
    $(window).scroll(function () {
        if ($(this).scrollTop() !== 0) {
            $('#btn-top').stop().fadeIn(150);
        } else {
            $('#btn-top').stop().fadeOut(150);
        }
    });
    $('#btn-top').click(function () {
        $('body,html').stop().animate({scrollTop: 0}, 800);
    });

// CHOOSE NUMBER ITEM
    const qty = $(".quantity");
    const quantity = parseInt(qty.attr('data-quantity'));
    const price = parseInt(qty.attr('data-price'));
    const newPrice = $(".price-item");
    let total = 0;
    let count = 1;
    $('.plus').click(function () {
        if (quantity > 0 && count < quantity) count++;
        qty.attr('value', count < 10 ? "0" + count : count);
        total = price * count;
        let current = new Intl.NumberFormat("en-VN").format(total);
        newPrice.text(current + "đ")
    });
    $('.minus').click(function () {
        if (count > 1) {
            count--;
            qty.attr('value', count < 10 ? "0" + count : count);
            if (total >= price) {
                total = total - price;
                let current = new Intl.NumberFormat("en-VN").format(total);
                newPrice.text(current + "đ")
            }
        }
    });
    // CHOOSE COLOR ITEMS
    $(".color").on("click", ".color__infor", function () {
        $(".color").find(".color__infor--active").removeClass("color__infor--active");
        $(this).addClass("color__infor--active");
    });

    // URL DEFAULT
    const Default_URL = "http://localhost:8080/Digital/";

    // ADD CART FROM DETAIL
    $(".add-cart--detail").click(function () {
        const color = $(".color__infor--active").attr("color-id");
        const id = $(this).attr("data-id");
        let quantity = $("#num-order").val();
        let price = parseInt($("#num-order").attr("data-price")) * parseInt(quantity);
        const data = {
            product_id: id,
            color_id: color,
            quantity: quantity,
            price: price
        };
        $.ajax({
            url: Default_URL + "?mod=carts&controllers=add&action=add",
            method: 'POST',
            data: data,
            dataType: 'json',
            success: function (data) {
                console.log(data)
                $("#num").text(data.num_order);
                $("#dropdown .desc span").text(data.num_order + " sản phẩm");
                $("#dropdown .total-price .price").text(new Intl.NumberFormat("en-VN").format(data.total_order) + "đ");
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
    });
    // ADD CART FROM HOME
    $(".add-cart--home").click(function () {
        const id = $(this).attr("data-id");
        const color = $(this).attr("data-color");
        const cart = $("#btn-cart");
        let imgToDrag = $(this).parent(".actions__item").parent(".actions").parent(".cart__content").parent(".cart").find("img").eq(0);
        if (imgToDrag) {
            let imgClone = imgToDrag.clone().offset({
                top: imgToDrag.offset().top,
                left: imgToDrag.offset().left
            }).css({
                'opacity': '0.8',
                'position': 'absolute',
                'height': '150px',
                'width': '150px',
                'z-index': '100'
            }).appendTo($('body')).animate({
                'top': cart.offset().top + 20,
                'left': cart.offset().left + 30,
                'width': 75,
                'height': 75
            }, 1000, 'easeInOutExpo');
            imgClone.animate({
                'width': 0,
                'height': 0
            }, function () {
                $(this).detach()
            });
        }
        $.ajax({
            url: Default_URL + "?mod=carts&controllers=add&action=add",
            method: 'POST',
            data: {product_id: id, color_id: color},
            dataType: 'json',
            success: function (data) {
                console.log(data)
                setTimeout(function () {
                    $("#num").text(data.num_order);
                }, 1500);
                const dropdown = document.querySelector("#dropdown");
                dropdown.innerHTML = ``;
                const desc = document.createElement("p");
                desc.classList.add("desc");
                desc.innerHTML = `Có <span>${data.num_order} sản phẩm </span>trong giỏ hàng`;
                dropdown.appendChild(desc);
                const cart = document.createElement("ul");
                cart.classList.add("list-cart");
                Object.values(data.products).reverse().forEach(function (value, index) {
                    const li = document.createElement("li");
                    li.classList.add("clearfix");
                    li.innerHTML = `<a href="" title="" class="thumb"> <img src="admin/${value.image}"></a>
                                    <div class="info">
                                          <a href="" title="" class="product-name">${value.name}</a>
                                          <p class="price mb-0">${new Intl.NumberFormat("en-VN").format(value.price)}đ</p>
                                          <p class="qty">Số lượng:<span>${value.quantity}</span></p>
                                    </div>
                    `;
                    cart.appendChild(li);
                });
                dropdown.appendChild(cart);
                const total = document.createElement("div");
                total.classList.add("total-price", "clearfix");
                total.innerHTML = ` <p class="title">Tổng:</p>
                                    <p class="price">${new Intl.NumberFormat("en-VN").format(data.total_order)}đ</p>`
                dropdown.appendChild(total);
                const action = document.createElement("div");
                action.classList.add("action-cart", "d-flex", "justify-content-between", "clearfix")
                action.innerHTML = `<a href="?mod=carts" title="Giỏ hàng" class="view-cart">Giỏ hàng</a>
                                    <a href="?mod=checkout" title="Thanh toán" class="checkout">Thanh toán</a>`
                dropdown.appendChild(action);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
    });

    $(".data-change").change(function () {
        const id = $(this).val();
        const dataType = $(this).attr("data-type");
        const data = {id: id, dataType: dataType}
        $.ajax({
            url: Default_URL + "?mod=checkout&controllers=index&action=data",
            method: 'POST',
            data: data,
            dataType: 'json',
            success: function (data) {
                console.log(data)
                const options = data.filter(function (data, index, arr) {
                    return index < arr.length - 1;
                });
                if (data[data.length - 1] === "0") {
                    const select = document.querySelector("select[data-type='1']");
                    if (select.childNodes.length > 1) {
                        select.innerHTML = ``;
                        let defaultOption = document.createElement("option");
                        defaultOption.setAttribute("value", "0");
                        defaultOption.textContent = "Chọn quận, huyện";
                        select.appendChild(defaultOption);
                    }
                    options.forEach(function (value, index) {
                        const option = document.createElement("option");
                        option.setAttribute("value", value.maqh);
                        option.textContent = value.name;
                        select.appendChild(option);
                    })
                } else {
                    const ward = document.querySelector("select[data-type='2']");
                    if (ward.childNodes.length > 1) {
                        ward.innerHTML = ``;
                        let defaultOption = document.createElement("option");
                        defaultOption.setAttribute("value", "0");
                        defaultOption.textContent = "Chọn phường, xã";
                        ward.appendChild(defaultOption);
                    }
                    options.forEach(function (value, index) {
                        const option = document.createElement("option");
                        option.setAttribute("value", value.xaid);
                        option.textContent = value.name;
                        ward.appendChild(option);
                    })
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        })
    });


//  MAIN MENU
    $('#category-product-wp .list-item > li').find('.sub-menu').after('<i class="fa fa-angle-right arrow" aria-hidden="true"></i>');
    $('.list-megamenu__item .sub-menu > li').find('.sub-menu').after('<i class="fa fa-angle-right arrow" aria-hidden="true"></i>');

//  TAB
    tab();

    //  EVEN MENU RESPON
    $('html').on('click', function (event) {
        let target = $(event.target);
        let site = $('#site');

        if (target.is('#btn-respon i')) {
            if (!site.hasClass('show-respon-menu')) {
                site.addClass('show-respon-menu');
            } else {
                site.removeClass('show-respon-menu');
            }
        } else {
            $('#container').click(function () {
                if (site.hasClass('show-respon-menu')) {
                    site.removeClass('show-respon-menu');
                    return false;
                }
            });
        }
    });

//  MENU RESPON
    $('#main-menu-respon li .sub-menu').after('<span class="fa fa-angle-right arrow"></span>');
    $('#main-menu-respon li .arrow').click(function () {
        if ($(this).parent('li').hasClass('open')) {
            $(this).parent('li').removeClass('open');
        } else {

//            $('.sub-menu').slideUp();
//            $('#main-menu-respon li').removeClass('open');
            $(this).parent('li').addClass('open');
//            $(this).parent('li').find('.sub-menu').slideDown();
        }
    });

    function tab() {
        let tab_menu = $('#tab-menu li');
        tab_menu.stop().click(function () {
            $('#tab-menu li').removeClass('show');
            $(this).addClass('show');
            let id = $(this).find('a').attr('href');
            $('.tabItem').hide();
            $(id).show();
            return false;
        });
        $('#tab-menu li:first-child').addClass('show');
        $('.tabItem:first-child').show();
    }
});
