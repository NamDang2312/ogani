<div class="row">
    <div class="col-lg-12">
        <div class="section-title">
            <h2>Featured Product</h2>
        </div>
        <div class="featured__controls">
            <ul>
                <li class="active" data-filter="*">All</li>
                @foreach ($categories as $category)
                    <li data-filter=".{{ str_replace(['&', ' '], '', $category->name) }}">
                        {{ $category->name }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<div class="row featured__filter">
    @foreach ($products as $product)
        <div
            class="col-lg-3 col-md-4 col-sm-6 mix {{ str_replace(['&', ' '], '', $product->category->name) }}">
            <div class="featured__item">
                <div class="featured__item__pic set-bg"
                    data-setbg="{{ url('uploads') }}/{{ $product->image }}">
                    @if ($product->sale_price != 0)
                        <div class="product__discount__percent mt-3 "><span class="number_sale">-{{ $product->sale_price }}%</span>
                        </div>
                    @endif
                    <ul class="featured__item__pic__hover">
                        <li><a class="show-product-detail"
                                href="{{ route('home.showproduct', $product->id) }}" style="color:#01b1e3"><i
                                    class="bi bi-eye-fill"></i></a>
                        </li>
                        <li><a style="color: #12c055;" href="{{ route('home.addcart', $product->id) }}"
                                class="add_product"><i class=" icon fa fa-shopping-cart"></i></a></li>
                    </ul>
                </div>
                <div class="featured__item__text">
                    <h6><a href="#">{{ $product->name }}</a></h6>
                    @if ($product->sale_price > 0)
                        <span style="text-decoration-line:line-through">{{ number_format($product->price, 0, '', '.') }} đ </span>
                        <h5>{{ number_format($product->price - round($product->price * $product-> sale_price / 100, -3), 0, '', '.')  }} đ</h5>
                        @else
                        <h5>{{ number_format($product->price, 0, '', '.') }} đ</h5>
                    @endif
                    
                    
                </div>
            </div>
        </div>
    @endforeach
</div>