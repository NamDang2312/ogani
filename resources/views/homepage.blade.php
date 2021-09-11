@extends('layouts.layoutPage')
@section('title', 'Ogani | Template')
@section('css')
    <style>
        .latest-product__item {
            position: relative;
        }

        .badge-overlay {
            position: absolute;
            top: 4px;
        }

        .showicon {
            list-style-type: none;
            text-decoration: none;
            position: relative;
            bottom: 0px;
            left: 0px;
        }

        .showicon li {
            display: inline;


        }

        .showicon a {

            margin-left: 10px;

        }
        .product__discount__percent{
            /* border: solid red 2px; */
            width:45px;
            height: 45px;
            background-color: red;
            color:white;
            position: relative;
            border-radius: 60px;

        }
        .number_sale{
            position: absolute;
            top: 10px;
    left: 6px;
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
                        <ul style="">
                            @foreach ($categories as $category)
                                <li><a href="{{ route("home.categorydetail",$category -> id) }}">{{ $category->name }}</a></li>
                            @endforeach


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
                                <input type="text" placeholder="What do yo u need?" id="search">
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

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    @foreach ($categories as $category)
                        @if ($category->Product->count() != 0)
                            <div class="col-lg-3">
                                <div class="categories__item set-bg"
                                    data-setbg="{{ url('uploads') }}/{{ $category->Product->last()->image }}" alt="">
                                    <h5><a
                                            href="{{ route('home.categorydetail', $category->id) }}">{{ $category->name }}</a>
                                    </h5>
                                @else
                                    @continue
                        @endif

                </div>
            </div>
            @endforeach


        </div>
        </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Latest Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            @foreach ($products->sortByDesc('id')->take(9)->chunk(3)
        as $chunk)
                                <div class="latest-prdouct__slider__item">
                                    @foreach ($chunk as $product)
                                        <div class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="{{ url('uploads') }}/{{ $product->image }}" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>{{ $product->name }}</h6>
                                                @if ($product->sale_price > 0)
                                                    <span
                                                    style="text-decoration:line-through;font-weight: 200;">{{ number_format($product->price, 0, '', '.') }}
                                                    đ</span>
                                                    <span>{{ number_format($product->price - round($product->price * $product->sale_price / 100, -3), 0, '', '.') }}
                                                        đ</span>
                                                @else
                                                        <span>{{ number_format($product->price, 0, '', '.') }} đ</span>
                                                @endif
                                            </div>
                                            @if ($product->sale_price > 0)
                                                <div class="badge-overlay">
                                                    <span class="top-right badge" style="    border: solid 2px red;
                                                                                background: red;
                                                                                color: white;">Sale
                                                        {{ $product->sale_price }}%</span>
                                                </div>
                                            @endif
                                            <ul class="showicon">
                                                <li><a class="show-product-detail"
                                                        href="{{ route('home.showproduct', $product->id) }}"
                                                        style="color:#01b1e3"><i class="bi bi-eye-fill"></i></a>
                                                </li>
                                                <li><a style="color: #12c055;"
                                                        href="{{ route('home.addcart', $product->id) }}"
                                                        class="add_product"><i class=" icon fa fa-shopping-cart"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top Rated Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            @foreach ($products->sortByDesc('STATUS')->take(9)->chunk(3)
        as $chunk)
                                <div class="latest-prdouct__slider__item">
                                    @foreach ($chunk as $product)
                                        <div class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="{{ url('uploads') }}/{{ $product->image }}" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>{{ $product->name }}</h6>
                                                @if ($product->sale_price > 0)
                                                    <span
                                                    style="text-decoration:line-through;font-weight: 200;">{{ number_format($product->price, 0, '', '.') }}
                                                    đ</span>
                                                    <span>{{ number_format($product->price - round($product->price * $product->sale_price / 100, -3), 0, '', '.') }}
                                                        đ</span>
                                                @else
                                                        <span>{{ number_format($product->price, 0, '', '.') }} đ</span>
                                                @endif
                                            </div>
                                            @if ($product->sale_price > 0)
                                                <div class="badge-overlay">
                                                    <span class="top-right badge" style="    border: solid 2px red;
                                                                                background: red;
                                                                                color: white;">Sale
                                                        {{ $product->sale_price }}%</span>
                                                </div>
                                            @endif

                                            <ul class="showicon">
                                                <li><a class="show-product-detail"
                                                        href="{{ route('home.showproduct', $product->id) }}"
                                                        style="color:#01b1e3"><i class="bi bi-eye-fill"></i></a>
                                                </li>

                                                <li><a style="color: #12c055;"
                                                        href="{{ route('home.addcart', $product->id) }}"
                                                        class="add_product"><i class=" icon fa fa-shopping-cart"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top Most Sale</h4>
                        <div class="latest-product__slider owl-carousel">
                            @foreach ($products->sortByDesc('sale_price')->take(9)->chunk(3)
        as $chunk)
                                <div class="latest-prdouct__slider__item">
                                    @foreach ($chunk as $product)
                                        <div class="latest-product__item">

                                            <div class="latest-product__item__pic">
                                                <img src="{{ url('uploads') }}/{{ $product->image }}" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>{{ $product->name }}</h6>
                                               
                                                @if ($product->sale_price > 0)
                                                    <span
                                                    style="text-decoration:line-through;font-weight: 200;">{{ number_format($product->price, 0, '', '.') }}
                                                    đ</span>
                                                    <span>{{ number_format($product->price - round($product->price * $product->sale_price / 100, -3), 0, '', '.') }}
                                                        đ</span>
                                                @else
                                                        <span>{{ number_format($product->price, 0, '', '.') }} đ</span>
                                                @endif

                                            </div>
                                            <div class="badge-overlay">
                                                <span class="top-right badge" style="    border: solid 2px red;
                                                                                background: red;
                                                                                color: white;">Sale
                                                    {{ $product->sale_price }}%</span>
                                            </div>
                                            <ul class="showicon">
                                                <a class="show-product-detail"
                                                    href="{{ route('home.showproduct', $product->id) }}"
                                                    style="color:#01b1e3"><i class="bi bi-eye-fill"></i></a>
                                                </li>

                                                <li><a style="color: #12c055;"
                                                        href="{{ route('home.addcart', $product->id) }}"
                                                        class="add_product"><i class=" icon fa fa-shopping-cart"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Product Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            @include('component.featured')
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="{{ url('public/ForLayoutPage') }}/img/banner/banner-1.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="{{ url('public/ForLayoutPage') }}/img/banner/banner-2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->



    <!-- Blog Section Begin -->
    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>From The Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="{{ url('public/ForLayoutPage') }}/img/blog/blog-1.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Cooking tips make cooking simple</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="{{ url('public/ForLayoutPage') }}/img/blog/blog-2.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">6 ways to prepare breakfast for 30</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="{{ url('public/ForLayoutPage') }}/img/blog/blog-3.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Visit the clean farm in the US</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->


@stop
@section('js')
    <script>
       
        
        // $('#search').autocomplete({
        //     source: "{{ route('home.featured') }}"
        // })
    </script>

@stop
