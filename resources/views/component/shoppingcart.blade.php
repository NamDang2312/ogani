@if (request()->cookie('shopping-cart'))
<h4>Your Order</h4>
<div class="checkout__order__products">#Products <span>Total</span></div>
<ul>
{{-- json_decode(request()->cookie('shopping-cart'), true) --}}
    @foreach ($arrayCookie as $product)
        <li class="row  align-items-center grand-parent">
            <div class="col-1" data-id="{{ $product['id'] }}">
                {{ $product['id'] }}</div>
            <div class="col-5">
                <img src="{{ url('uploads') }}/{{ $product['image'] }} "
                    width="100px" height="100px" alt="">
                {{ $product['name'] }}
            </div>
            <div class="col-3">
                <div class="row">
                    <div class="col-2  quantity-arrow-minus">
                        -
                    </div>
                    {{-- <input type="hidden" name="id"> --}}
                    {{-- value = {{ $product }}> --}}
                    <input class="col-8 form-control quantity-num" type="number"
                        name="quantity" value="{{ $product['quantity'] }}" />
                    <div class="col-2 quantity-arrow-plus">
                        +
                    </div>
                </div>
            </div>
            <div class="col-1 delete-product"><i class="bi bi-trash-fill"></i> </div>
            <div class="col-2 price-product">
                <span data-price={{ $product['price'] }}></span>
            </div>
        </li>
    @endforeach
</ul>
@else
    <h4>
        Your cart has no products</h4>
      
    <a href="{{ route('home.index') }}" class="btn btn-info form-control">Back to
        home
        page</a>

        <div id = "wrap_image" class=" text-center"><div id= "result_order"></div> <img src="{{ url('uploads') }}/notfound.png" alt=""></div>

@endif
