@extends('layouts.layoutPage')
@section('title', 'Shop')
@section('css')
    <style>
        #seemore {
            border: solid red 2px;
            cursor: pointer;
            color: red;
        }

    </style>
@stop
@section('main')

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

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ url('public/ForLayoutPage') }}/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Organi Shop</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Department</h4>
                            <ul>
                                @foreach ($categories as $model)
                                    <li><a href="{{ route('home.categorydetail', $model->id) }}">{{ $model->name }}</a></li>
                                @endforeach

                            </ul>
                        </div>
                        {{-- <div class="sidebar__item">
                            <h4>Price</h4>
                            <div class="price-range-wrap">
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                    data-min="10" data-max="540">
                                    <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                </div>
                                <div class="range-slider">
                                    <div class="price-input">
                                        <input type="text" id="minamount">
                                        <input type="text" id="maxamount">
                                    </div>
                                </div>
                            </div> --}}

                        <div class="sidebar__item">
                            <div class="latest-product__text">
                                <h4>Latest Products</h4>
                                <div class="latest-product__slider owl-carousel">
                                    @foreach ($products->sortByDesc('id')->take(9)->chunk(3)
        as $chunk)
                                        <div class="latest-prdouct__slider__item">
                                            @foreach ($chunk as $product)
                                                <a href="#" class="latest-product__item">
                                                    <div class="latest-product__item__pic">
                                                        <img src="{{ url('uploads') }}/{{ $product->image }}" alt="">
                                                    </div>
                                                    <div class="latest-product__item__text">
                                                        <h6>{{ $product->name }}</h6>
                                                        <span>{{ number_format($product->price, 0, '', '.') }} đ</span>
                                                    </div>
                                                </a>
                                            @endforeach
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    <div class="product__discount">
                        <div class="section-title product__discount__title">
                            <h2>Sale Off</h2>
                        </div>
                        <div class="row">
                            <div class="product__discount__slider owl-carousel">
                                @foreach ($products->sortByDesc('sale_price')->take(6) as $product)
                                    <div class="col-lg-4">
                                        <div class="product__discount__item">
                                            <div class="product__discount__item__pic set-bg"
                                                data-setbg="{{ url('uploads') }}/{{ $product->image }}">
                                                <div class="product__discount__percent">-{{ $product->sale_price }}%
                                                </div>
                                                <ul class="product__item__pic__hover">
                                                    <li><a href="{{route('home.showproduct',$product ->id)}}" class="show-product-detail"  style="color:#01b1e3"><i class="bi bi-eye-fill"></i></a>
                                                    </li>
                                                    <li><a style="color: #12c055;" href="{{ route('home.addcart', $product->id) }}" class="add_product"><i
                                                                class=" icon fa fa-shopping-cart"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="product__discount__item__text">
                                                <span>{{ $product->category->name }}</span>
                                                <h5><a href="#">{{ $product->name }}</a></h5>
                                                @if ($product->sale_price == 0)
                                                    <div class="product__item__price">{{ $product->price }}
                                                        <span>{{ $product->price }}</span>
                                                    </div>
                                                @else
                                                    <div class="product__item__price">
                                                        {{ number_format($product->price - round($product->price * $product->sale_price / 100, -3), 0, '', '.') }} đ
                                                        <span>{{ number_format($product->price, 0, '', '.')}} đ</span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @foreach ($categories as $category)
                        <div class="filter__item">
                            <div class="row">
                                <div class="col-lg-4 col-md-5">
                                    <div class="filter__sort">
                                        <span class="font-weight-bold">{{ $category->name }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="filter__found">
                                        <h6><span>{{ $category->product->count() }}</span> Products found</h6>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-3">
                                    <div class="filter__option">
                                        <span class="icon_grid-2x2"></span>
                                        <span class="icon_ul"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="product__discount__slider owl-carousel">
                                @foreach ($category->product as $product)
                                    <div class="col-lg-4">
                                        <div class="product__discount__item">
                                            <div class="product__discount__item__pic set-bg"
                                                data-setbg="{{ url('uploads') }}/{{ $product->image }}">
                                                @if ($product->sale_price != 0)
                                                    <div class="product__discount__percent">-{{ $product->sale_price }}%
                                                    </div>
                                                @endif
                                                <ul class="product__item__pic__hover">
                                                    <li><a href="{{route('home.showproduct',$product ->id)}}" class="show-product-detail"  style="color:#01b1e3"><i class="bi bi-eye-fill"></i></a>
                                                    </li>
                                                    <li><a style="color: #12c055;" href="{{ route('home.addcart', $product->id) }}" class="add_product"><i
                                                                class=" icon fa fa-shopping-cart"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="product__discount__item__text">
                                                <span>{{ $product->category->name }}</span>
                                                <h5><a href="#">{{ $product->name }}</a></h5>
                                                @if ($product->sale_price == 0)
                                                    <div class="product__item__price">{{ number_format($product->price, 0, '', '.')}} đ</div>
                                                @else
                                                    <div class="product__item__price">
                                                        {{ number_format($product->price - round($product->price * $product->sale_price / 100, -3), 0, '', '.') }} đ
                                                        <span>{{ number_format($product->price, 0, '', '.')}} đ</span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="row mt-3 d-flex justify-content-center">
                            <a href="{{ route('home.categorydetail', $category->id) }}" id="seemore"
                                class=" btn-lg ">See all</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

@stop
