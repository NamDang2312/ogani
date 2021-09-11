@extends('layouts.layoutPage')
@section('title', 'Check out')
@section('css')
    <style>
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            margin: 0;
        }

        input[type="number"] {
            -moz-appearance: textfield;
        }


        .quantity-arrow-minus,
        .quantity-arrow-plus {
            cursor: pointer;
            font-size: 20px;
            font-size: 25px;
            font-weight: bold;
            outline: none;

        }

        .quantity-arrow-minus {
            color: #dd2222
        }

        .quantity-arrow-plus {
            color: #7fad39
        }

        .quantity-num {
            font-size: 20px;
            padding: 5px 10px;
            border-radius: 4px;
            outline: none;
            text-align: center
        }

        .wrap_checkout {
            padding-right: 80px;
            padding-left: 80px;
        }

        #deleteCard {
            margin-top: 20px
        }



        #wrap_image {
            min-height: 800px;
            position: relative;
        }

        #wrap_image img,
        #wrap_image #result_order {
            transform: translate(0%, 50%);
        }

    </style>
@stop
@section('main')


    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        <ul>
                            <li><a href="#">Fresh Meat</a></li>
                            <li><a href="#">Vegetables</a></li>
                            <li><a href="#">Fruit & Nut Gifts</a></li>
                            <li><a href="#">Fresh Berries</a></li>
                            <li><a href="#">Ocean Foods</a></li>
                            <li><a href="#">Butter & Eggs</a></li>
                            <li><a href="#">Fastfood</a></li>
                            <li><a href="#">Fresh Onion</a></li>
                            <li><a href="#">Papayaya & Crisps</a></li>
                            <li><a href="#">Oatmeal</a></li>
                            <li><a href="#">Fresh Bananas</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" id = "search" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+65 11.188.888</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ url('uploads') }}/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Checkout</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container-fluid wrap_checkout">
            <div class="row">
                <div class="col-lg-12">
                    <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your code
                    </h6>
                </div>
            </div>
            <div class="checkout__form">
                <h4>Billing Details</h4>
                <form method="POST">
                    @csrf
                    <div class="row">
                        <div style="background: #f5f5f5;" class="col-lg-4 col-md-6">
                            <div class="checkout__input">
                                <p>Name<span>*</span></p>
                                <input type="text" name="name" id="name">
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input id="address" type="text" placeholder="Delivery Address" class="checkout__input__add">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text" id="phone">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input id="email" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="acc">
                                    Create an account?
                                    <input type="checkbox" id="acc">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <p>Create an account by entering the information below. If you are a returning customer
                                please login at the top of the page</p>
                            <div class="checkout__input">
                                <p>Account Password<span>*</span></p>
                                <input type="text">
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="diff-acc">
                                    Ship to a different address?
                                    <input type="checkbox" name="diff_acc" id="diff-acc">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="checkout__input">
                                <p>Order notes<span>*</span></p>
                                <input id="note" type="text"
                                    placeholder="Notes about your order, e.g. special notes for delivery.">
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-6">

                            <div style="background-color:#ffffff" class="checkout__order">
                                <div id="wrap_order">
                                    @include('component.shoppingcart')
                                </div>
                                @if ($arrayCookie)
                                    <div class="checkout__order__subtotal">Subtotal <span id='subtotal'>$750.99</span></div>
                                    <div class="checkout__order__total">Total <span id="total">$750.99</span></div>

                                    <div class="checkout__input__checkbox">
                                        <label for="payment">
                                            Check Payment
                                            <input type="checkbox" id="payment">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="checkout__input__checkbox">
                                        <label for="paypal">
                                            Paypal
                                            <input type="checkbox" id="paypal">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>

                                    <button type="submit" id="add_order" class="site-btn">PLACE ORDER</button>
                                    <a href="{{ route('home.deleteCart') }}" class="btn alert-dark form-control"
                                        id="deleteCard">DELETE SHOPPING CART</a>
                                @else
                                    <button type="submit" class="site-btn">Create Account</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            
        </div>
    </section>
    <!-- Checkout Section End -->

@stop
@section('js')
    <script>
        $('#add_order').on("click", function(event) {
            event.preventDefault();
            let dataForOrder;
            if ($('#diff-acc').prop('checked')) {
                let yourname = $("#name").val();
                let email = $('#email').val();
                let phone = $('#phone').val();
                let address = $('#address').val();
                let note = $('#note').val();
                dataForOrder = {
                    name: yourname,
                    email: email,
                    phone: phone,
                    address: address,
                    note: note
                }
            }
            $.ajax({
                url: "{{ route('home.add_order') }}",
                data: dataForOrder,
                dataType: "json",
                type: "get",
                success: function(data) {
                    if (data.code === "403") {
                        console.log(data.code);
                        location.replace(data.route);
                    }
                    if (data.code === "200") {
                        // toastr.success(data.success);
                        $('#wrap_checkout').html(data.viewShoppingCart)
                        location.reload();
                    }



                }
            })

        })

        function format(str) {
            const format = str.replace(/\B(?=(\d{3})+(?!\d))/g, '.')
            return format + " đ";
        }

        function Total() {
            let totalForProduct = 0;
            $('.quantity-num').each(function() {
                let txtPriceAValue = $(this).parent().parent().parent().children(
                    '.price-product').children().data('price');
                let quantityProduct = parseInt($(this).val())
                let txtPriceValue = txtPriceAValue * quantityProduct;
                totalForProduct += parseInt(txtPriceValue);
                $('#subtotal').html(format(totalForProduct.toString()))
                $('#total').html(format(totalForProduct.toString()))

            })
        }
        let totalAllProduct = 0;
        let tagForEachProduct = $('.grand-parent');
        tagForEachProduct.each(function() {
            let input = $(this).children().eq(2).children().eq(0).children().eq(1);
            let txtPrice = $(this).children().eq(4).children().eq(0);
            // console.log(txtPrice)
            let quantity = parseInt(input.val());
            let priceForProduct = txtPrice.data('price');
            let totalForEachProduct = quantity * priceForProduct;
            txtPrice.html(format(totalForEachProduct.toString()));

            totalAllProduct = totalAllProduct + totalForEachProduct;
        });
        $('#subtotal').html(format(totalAllProduct.toString()));
        $('#total').html(format(totalAllProduct.toString()));
        $('.quantity-arrow-plus').each(function() {
            $(this).on("click", function(event) {
                let input = $(this).parent().children('.quantity-num')
                let quantity = $(this).parent().children('.quantity-num').val();
                quantity = parseInt(quantity) + 1;
                input.val(quantity);
                let txtPrice = $(this).parent().parent().parent().children('.price-product').children().eq(
                    0)
                let txtIdAValue = $(this).parent().parent().parent().children().eq(0).data('id');
                // console.log(txtIdAValue);
                // console.log(input.val())
                var token;
                token = '{{ csrf_token() }}';
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': token
                    },
                    url: "{{ route('home.updatecart') }}",
                    type: "post",
                    dataType: "json",
                    data: {
                        id: txtIdAValue,
                        quantity: input.val().toString()
                    },
                    success: function(data) {

                    }

                })
                let TotalPriceNow = txtPrice.data('price');
                let TotalPriceNew = parseInt(quantity) * parseInt(TotalPriceNow);
                txtPrice.html(format(TotalPriceNew.toString()));
                // tinh tong tien lai
                Total();
            })
        })
        $('.quantity-arrow-minus').each(function() {
            $(this).on("click", function(event) {
                let input = $(this).parent().children('.quantity-num')
                let quantity = $(this).parent().children('.quantity-num').val();
                if (quantity > 1) {
                    quantity = parseInt(quantity) - 1;
                    input.val(quantity);
                }

                let txtIdAValue = $(this).parent().parent().parent().children().eq(0).data('id');
                var token;
                token = '{{ csrf_token() }}';
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': token
                    },
                    url: "{{ route('home.updatecart') }}",
                    type: "post",
                    dataType: "json",
                    data: {
                        id: txtIdAValue,
                        quantity: input.val().toString()
                    },
                    success: function(data) {

                    }

                })
                let txtPrice = $(this).parent().parent().parent().children('.price-product').children().eq(
                    0)
                let TotalPriceNow = txtPrice.data('price');
                let TotalPriceNew = parseInt(quantity) * parseInt(TotalPriceNow);
                txtPrice.html(format(TotalPriceNew.toString()));
                // tinh tong tien lai
                let totalForProduct = 0;
                Total();
            })
        })

        $('.quantity-num').each(function() {
            $(this).on("keyup", function(event) {
                if (parseInt($(this).val()) > 0) {
                    let txtPrice = $(this).parent().parent().parent().children('.price-product').children();
                    let quantity = $(this).val();
                    let TotalPriceNow = txtPrice.data('price');
                    let TotalPriceNew = parseInt(quantity) * parseInt(TotalPriceNow);
                    let txtIdAValue = $(this).parent().parent().parent().children().eq(0).data('id');
                    txtPrice.html(format(TotalPriceNew.toString()));
                    var token;
                    token = '{{ csrf_token() }}';
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': token
                        },
                        url: "{{ route('home.updatecart') }}",
                        type: "post",
                        dataType: "json",
                        data: {
                            id: txtIdAValue,
                            quantity: quantity.toString()
                        },
                        success: function(data) {
                            console.log(data)
                        }
                    })
                    // tinh tong tien lai
                    Total();
                }
            })
        })
        $("#deleteCard").on("click", function(event) {
            event.preventDefault();
            swal({
                    title: "Remove all product ",
                    text: "Are you sure you want to remove all products in your cart?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#f73e18",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    closeOnConfirm: true,
                    closeOnCancel: false
                },
                function(isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            url: "{{ route('home.deleteCart') }}",
                            type: "get",
                            dataType: "json",
                            success: function(data) {

                                $('#wrap_order').html(data.viewShoppingCart)
                                location.reload();

                            }
                        })

                    } else {
                        swal("You are not redirected!", "success");
                    }

                });
        })
        $('.delete-product').each(function() {
            $(this).on("click", function(event) {
                let id = $(this).parent().children().eq(0).data('id');
                $.ajax({
                    url: "{{ route('home.deleteEachCart') }}",
                    type: "GET",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        if (data.code === 200) {
                            $('#wrap_order').html(data.viewShoppingCart);
                            location.reload();
                        }
                    }
                })
            })
        })
    </script>
@stop
