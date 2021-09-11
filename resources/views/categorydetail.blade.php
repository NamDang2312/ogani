@extends('layouts.layoutPage')
@section('title', 'Shop Category Detail')
@section('css')
    <style>
        .icon {
            margin-top: 10px;
        }

        .product__discount__percent {
            /* border: solid red 2px; */
            width: 45px;
            height: 45px;
            background-color: red;
            color: white;
            position: relative;
            border-radius: 60px;

        }

        .number_sale {
            position: absolute;
            top: 10px;
            left: 6px;
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
                        @foreach ($categories as $model)
                            <li><a href="{{ route("home.categorydetail",$model -> id) }}">{{ $model->name }}</a></li>
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
    <section class="container">
        <div class="row">
            <div class="col-3">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <h4>Department</h4>
                        <ul>
                            @foreach ($categories as $model)
                                <li><a href="{{ route('home.categorydetail', $model->id) }}">{{ $model->name }}</a>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-9">
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
                <div class="row featured__filter">
                    @foreach ($category->product as $product)
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="featured__item">
                                <div class="featured__item__pic set-bg"
                                    data-setbg="{{ url('uploads') }}/{{ $product->image }}">
                                    @if ($product->sale_price != 0)
                                        <div class="product__discount__percent mt-3 "><span
                                                class="number_sale">-{{ $product->sale_price }}%</span>
                                        </div>
                                    @endif
                                    <ul class="featured__item__pic__hover">
                                        <li><a href="{{route('home.showproduct',$product ->id)}}" class="show-product-detail"  style="color:#01b1e3"><i class="bi bi-eye-fill"></i></a>
                                        <li><a style="color: #12c055;" href="{{ route('home.addcart', $product->id) }}"
                                                class="add_product"><i class=" icon fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="featured__item__text">
                                    <h6><a href="#">{{ $product->name }}</a></h6>
                                    @if ($product->sale_price > 0)
                                        <span
                                            style="text-decoration-line:line-through">{{ number_format($product->price, 0, '', '.') }}
                                            đ </span>
                                        <h5>{{ number_format($product->price - round(($product->price * $product->sale_price) / 100, -3), 0, '', '.') }}
                                            đ</h5>
                                    @else
                                        <h5>{{ number_format($product->price, 0, '', '.') }} đ</h5>
                                    @endif

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@stop
