$(document).ready(function () {
//  SLIDER
    let slider = $('#slider-wp .section-detail');
    slider.owlCarousel({
        autoPlay: 4500,
        navigation: false,
        navigationText: false,
        paginationNumbers: false,
        pagination: true,
        items: 1, //10 items above 1000px browser width
        itemsDesktop: [1000, 1], //5 items between 1000px and 901px
        itemsDesktopSmall: [900, 1], // betweem 900px and 601px
        itemsTablet: [600, 1], //2 items between 600 and 0
        itemsMobile: true // itemsMobile disabled - inherit from itemsTablet option
    });

//  ZOOM PRODUCT DETAIL
    const zoom = $("#zoom");
    const thumbnail = $(".thumbnail__image");
    thumbnail.click(function () {
        let image = $(this).attr("src");
        zoom.attr("src", image);
    });
    zoom.imagezoomsl({
        zoomrange: [3, 3]
    });


//  LIST THUMB
    let list_thumb = $('#list-thumb');
    list_thumb.owlCarousel({
        navigation: true,
        navigationText: false,
        paginationNumbers: false,
        pagination: false,
        stopOnHover: true,
        items: 5, //10 items above 1000px browser width
        itemsDesktop: [1000, 5], //5 items between 1000px and 901px
        itemsDesktopSmall: [900, 5], // betweem 900px and 601px
        itemsTablet: [768, 5], //2 items between 600 and 0
        itemsMobile: true // itemsMobile disabled - inherit from itemsTablet option
    });

//  FEATURE PRODUCT
    let feature_product = $('#feature-product-wp .list-item');
    feature_product.owlCarousel({
        autoPlay: true,
        navigation: true,
        navigationText: false,
        paginationNumbers: false,
        pagination: false,
        stopOnHover: true,
        items: 4, //10 items above 1000px browser width
        itemsDesktop: [1000, 4], //5 items between 1000px and 901px
        itemsDesktopSmall: [800, 3], // betweem 900px and 601px
        itemsTablet: [600, 2], //2 items between 600 and 0
        itemsMobile: [375, 1] // itemsMobile disabled - inherit from itemsTablet option
    });

//  SAME CATEGORY
    let same_category = $('#same-category-wp .list-item');
    same_category.owlCarousel({
        autoPlay: true,
        navigation: true,
        navigationText: false,
        paginationNumbers: false,
        pagination: false,
        stopOnHover: true,
        items: 4, //10 items above 1000px browser width
        itemsDesktop: [1000, 4], //5 items between 1000px and 901px
        itemsDesktopSmall: [800, 3], // betweem 900px and 601px
        itemsTablet: [600, 2], //2 items between 600 and 0
        itemsMobile: [375, 1] // itemsMobile disabled - inherit from itemsTablet option
    });

//  SCROLL TOP
    $(window).scroll(function () {
        if ($(this).scrollTop() != 0) {
            $('#btn-top').stop().fadeIn(150);
        } else {
            $('#btn-top').stop().fadeOut(150);
        }
    });
    $('#btn-top').click(function () {
        $('body,html').stop().animate({scrollTop: 0}, 800);
    });

// CHOOSE NUMBER ITEM
    let value = parseInt($('#num-order').attr('data-quantity'));
    let price = parseInt($('#num-order').attr('data-price'));
    let total = 0;
    let count = 1;
    $('#plus').click(function () {
        if (value > 0 && count < value) {
            count++;
        }
        $('#num-order').attr('value', count);
        total = price * count;
        let current = new Intl.NumberFormat("en-VN").format(total);
        $(".price-item").text(current + "đ")
    });
    $('#minus').click(function () {
        if (count > 1) {
            count--;
            $('#num-order').attr('value', count);
            if (total >= price) {
                total = total - price;
                let current = new Intl.NumberFormat("en-VN").format(total);
                $(".price-item").text(current + "đ")
            }
        }
    });
    // CHOOSE COLOR ITEMS
    $(".color").on("click", ".color__infor", function () {
        $(".color").find(".color__infor--active").removeClass("color__infor--active");
        $(this).addClass("color__infor--active");
    });

    // URL DEFAULT
    const Default_URL = "http://localhost:8080/ismart.com/";
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
        const data = {
            product_id: id,
            color_id: color
        }
        $.ajax({
            url: Default_URL + "?mod=carts&controllers=add&action=add",
            method: 'POST',
            data: data,
            dataType: 'json',
            success: function (data) {
                console.log(data)
                $("#num").text(data.num_order);
                const dropdown = document.querySelector("#dropdown");
                dropdown.innerHTML = ``;
                const desc = document.createElement("p");
                desc.classList.add("desc");
                desc.innerHTML = `Có <span>${data.num_order} sản phẩm </span>trong giỏ hàng`;
                dropdown.appendChild(desc);
                const cart = document.createElement("ul");
                cart.classList.add("list-cart");
                Object.values(data.products).forEach(function (value, index) {
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
