<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="{{ url('uploads') }}/logo.png" type="image/x-icon" />
    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ url('public/ForLayoutPage') }}/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ url('public/ForLayoutPage') }}/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="{{ url('public/ForLayoutPage') }}/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="{{ url('public/ForLayoutPage') }}/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="{{ url('public/ForLayoutPage') }}/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="{{ url('public/ForLayoutPage') }}/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="{{ url('public/ForLayoutPage') }}/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="{{ url('public/ForLayoutPage') }}/css/style.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="{{ url('public/ForLayoutPage') }}/css/sweetalert.css">
    @yield('css')
    <style>
        label.error {
            color: red;
        }

        body {
            background: #f1f0f1;
        }

    </style>
</head>

<body>
    {{-- <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div> --}}

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="{{ url('public/ForLayoutPage') }}/img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>$150.00</span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="{{ url('public/ForLayoutPage') }}/img/language.png" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div>
            <div class="header__top__right__auth">
                <a href="#"><i class="fas fas-user"></i>Login</a>
            </div>
        </div>


        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="{{ route('home.index') }}">Home</a></li>
                <li><a href="./shop-grid.html">Shop</a></li>
                <li><a href="#">Pages</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="./shop-details.html">Shop Details</a></li>
                        <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                        <li><a href="./checkout.html">Check Out</a></li>
                        <li><a href="./blog-details.html">Blog Details</a></li>
                    </ul>
                </li>
                <li><a href="./blog.html">Blog</a></li>
                <li><a href="./contact.html">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                <li>Free Shipping for all Order of $99</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                                <li>Free Shipping for all Order of $99</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <div class="header__top__right__language">
                                <img src="{{ url('public/ForLayoutPage') }}/img/language.png" alt="">
                                <div>English</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Spanis</a></li>
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div>
                            <div class="header__top__right__auth">
                                @if (request()->cookie('name'))
                                    <div id="user_dadangnhap" class="dropdown">
                                        <a id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <i class="fa fa-user"></i>
                                            <span id="user_name_dadangnhap">{{ request()->cookie('name') }}</span>
                                        </a>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                            <a href="{{ route('home.checkout') }}" class="dropdown-item"
                                                type="button"><i class="bi bi-cart-check-fill"></i> Shopping Cart</a>
                                            <a href="{{ route('home.orderList') }}" class="dropdown-item"
                                                type="button"><i class="bi bi-clipboard-check"></i>Your Order</a>
                                            <button class="dropdown-item" type="button"><i
                                                    class="bi bi-pencil-fill"></i>
                                                Update</button>
                                            <button class="dropdown-item" type="button"><i class="bi bi-key-fill"></i>
                                                Change Password</button>
                                            <a href="{{ route('home.logout') }}" class="dropdown-item" id="logout"
                                                type="button"><i class="bi bi-box-arrow-right"></i> Log out</a>
                                        </div>
                                    </div>
                                @else
                                    <a href="{{ route('home.login') }}"><i class="fa fa-user"></i>
                                        <span id="user_name_moidangnhap">Login </span> </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="{{ route('home.index') }}"><img
                                src="{{ url('public/ForLayoutPage') }}/img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="{{ route('home.index') }}">Home</a></li>
                            <li><a href="{{ route('home.shop') }}">Shop</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="./shop-details.html">Shop Details</a></li>
                                    <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                                    <li><a href="./checkout.html">Check Out</a></li>
                                    <li><a href="./blog-details.html">Blog Details</a></li>
                                </ul>
                            </li>
                            <li><a href="./blog.html">Blog</a></li>
                            <li><a href="./contact.html">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="{{ route('home.orderList') }}"><i
                                        class="bi bi-calendar2-check-fill"></i><span>3</span></a></li>
                            <li><a href="{{ route('home.checkout') }}"><i class="fa fa-shopping-bag"></i>
                                    <span>
                                        @if (request()->cookie('shopping-cart'))
                                            {{ count(json_decode(request()->cookie('shopping-cart'), true)) }}
                                        @else
                                            0
                                        @endif
                                    </span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Hero Section Begin -->

    <!-- Header Section End -->
    @yield('main')
    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="{{ route('home.index') }}"><img
                                    src="{{ url('public/ForLayoutPage') }}/img/logo.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Address: 60-49 Road 11378 New York</li>
                            <li>Phone: +65 11.188.888</li>
                            <li>Email: hello@colorlib.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Useful Links</h6>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">About Our Shop</a></li>
                            <li><a href="#">Secure Shopping</a></li>
                            <li><a href="#">Delivery infomation</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Our Sitemap</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Who We Are</a></li>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Projects</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Innovation</a></li>
                            <li><a href="#">Testimonials</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Join Our Newsletter Now</h6>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text">
                            <p>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                <script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved | This template is made with <i
                                    class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com"
                                    target="_blank">Colorlib</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                        <div class="footer__copyright__payment"><img
                                src="{{ url('public/ForLayoutPage') }}/img/payment-item.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Button trigger modal -->
    <div class="modal fade" id="image_main" tabindex="-1" role="dialog" aria-labelledby="image_main"
        aria-hidden="true">
        <div class="modal-dialog" style="max-width:1000px" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>





    <!-- Js Plugins -->
    <script src="{{ url('public/ForLayoutPage') }}/js/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="{{ url('public/ForLayoutPage') }}/js/jquery.nice-select.min.js"></script>
    <script src="{{ url('public/ForLayoutPage') }}/js/jquery-ui.min.js"></script>
    <script src="{{ url('public/ForLayoutPage') }}/js/jquery.slicknav.js"></script>
    <script src="{{ url('public/ForLayoutPage') }}/js/mixitup.min.js"></script>
    <script src="{{ url('public/ForLayoutPage') }}/js/owl.carousel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="{{ url('public/ForLayoutPage') }}/js/main.js"></script>
    <script src="{{ url('public/ForLayoutPage') }}/js/sweetalert.min.js"></script>
    <script>
        $('.add_product').on("click", function(event) {
            event.preventDefault();
            let _href = $(this).attr('href');
            $.ajax({
                url: _href,
                type: "get",
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    toastr.options.positionClass = 'toast-top-left';
                    toastr.options.fadeOut = 250;
                    toastr.options.fadeIn = 250;
                    toastr.success(data.message);
                }
            })
        })
        $('#search').autocomplete({
            source: "{{ route('home.featured') }}",
            select: function(event, ui) {
                // console.log(ui.item.name)
                $('#search').val(ui.item.name)
                let href = ui.item.name;
                ajaxshowproduct(href);
            }
        }).data('ui-autocomplete')._renderItem = function(ul, item) {
            return $("<li class='ui-autocomplete-row'></li>")
                .data("item.autocomplete", item)
                .append(item.label)
                .appendTo(ul);
        };
        $('.show-product-detail').on("click", function(event) {
            event.preventDefault();
            let href = $(this).attr('href');
            ajaxshowproduct(href)

        })
        function ajaxshowproduct(href){
            $.ajax({
                url: href,
                type: "get",
                success: function(data) {
                    $('.modal-body').html(data.view)
                    var proQty = $('.pro-qty');
                    proQty.prepend('<span class="dec qtybtn">-</span>');
                    proQty.append('<span class="inc qtybtn">+</span>');
                    proQty.on('click', '.qtybtn', function() {
                        var $button = $(this);
                        var oldValue = $button.parent().find('input').val();
                        if ($button.hasClass('inc')) {
                            var newVal = parseFloat(oldValue) + 1;
                        } else {
                            // Don't allow decrementing below zero
                            if (oldValue > 0) {
                                var newVal = parseFloat(oldValue) - 1;
                            } else {
                                newVal = 0;
                            }
                        }
                        $button.parent().find('input').val(newVal);
                    });
                    $(".product__details__pic__slider").owlCarousel({
                        loop: true,
                        margin: 20,
                        items: 3,
                        dots: true,
                        smartSpeed: 1200,
                        autoHeight: false,
                        autoplay: false
                    });
                    $('.product__details__pic__slider img').on('click', function() {
                        var imgurl = $(this).data('imgbigurl');
                        $('#imglagre').attr('src', imgurl)
                    });


                    $('.modal').modal('show')
                    $('#add-quantity-product').on("click", function(event) {
                        event.preventDefault();
                        let href = $(this).attr('href');
                        let quantity = $('#quantity').val();
                        $.ajax({
                            url: href,
                            type: "get",
                            data: {
                                quantity: quantity
                            },
                            success: function(data) {
                                toastr.success(data.message)
                                $('.modal').modal('hide')
                            }
                        })

                    })
                }
            })
        }
    </script>
    @yield('js')


</body>

</html>
