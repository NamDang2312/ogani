@extends('layouts.layoutPage')
@section('title', 'Your order')
@section('css')
    <style>
        .order{
            border-radius: 10px;
        }
        .row-order{
            padding: 10px;
        }
    </style>
@stop
@section('main')
    <div class="container">
        @if ($orders->count())
            @foreach ($orders as $order)
                <div class=" alert-secondary mt-3 order">
                    @foreach ($order->orderdetails as $orderdetail)
                        <div class="row row-order">
                           
                            <div class="col-2 font-weight-bold"><img
                                    src="{{ url('uploads') }}/{{ $orderdetail->product->image }}" width="100px"
                                    height="100px" alt=""></div>
                            <div class="col-4 font-weight-bold"> {{ $orderdetail->product->name }}</div>
                            <div class="col-2 font-weight-bold">Price: {{ $orderdetail->product->price }}</div>
                            <div class="col-3 font-weight-bold">Quantity: {{ $orderdetail->quantity }}</div>
                        </div>
                    @endforeach

                    <div class="row ">
                        <div class="col-6"></div>
                        <div class="col-2">Total: {{ $order->total }}</div>
                        @switch($order-> STATUS)
                            @case(0)
                                <div class="col-2"><span class=" badge-danger">Cancel</span></div>
                            @break
                            @case(1)
                                <div class="col-2"><span class=" badge-warning">Wait for Confirm</span></div>
                            @break
                            @case(2)
                                <div class="col-2"><span class=" badge-info">Confirmed</span></div>
                            @break
                            @case(4)
                                <div class="col-2"><span class=" badge-success">Order Completed</span></div>
                            @break
                        @endswitch
                        <div class="col-2">
                            @if ($order->STATUS == 1)
                                <a data-orderid={{ $order->id }} class="btn btn-danger statusbtn"
                                    style="color: white">Cancel</a>
                            @elseif($order-> STATUS == 0)
                                <a data-orderid={{ $order->id }} class=" btn btn-info statusbtn"
                                    style="color: white">Re-order</a>
                            @endif
                        </div>

                    </div>
                </div>
                <hr width="100%" />
            @endforeach
        @else
            <div class="text-center mt-4 mb-4" style="background:#0f0e17">
                <h4 style="background:#ff8906;color:#fffffe">There is not one yet Which order is in the list?</h4>
            </div>
        @endif

    </div>
@stop
@section('js')
    <script>
        $('.btn-danger').on("click", function(event) {
            event.preventDefault();
            let orderid = $(this).data('orderid')
            $.ajax({
                data: {
                    id: orderid
                },
                type: "get",
                url: "{{ route('home.cancelorder') }}",
                success: function(data) {
                    location.reload()
                }
            })
            $(this).removeClass('btn btn-danger');
            $(this).addClass('btn btn-info');
            $(this).html('Re-order')
        })
        $('.btn-info').on("click", function(event) {
            event.preventDefault();
            let orderid = $(this).data('orderid')
            $.ajax({
                data: {
                    id: orderid
                },
                type: "get",
                url: "{{ route('home.re_order') }}",
                success: function(data) {
                    location.reload()
                }
            })
            $(this).removeClass('btn btn-info');
            $(this).addClass('btn btn-danger');
            $(this).html('Cancel')
        })
    </script>
@stop
