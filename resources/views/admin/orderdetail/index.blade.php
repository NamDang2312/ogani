@extends('layouts.layoutAdmin');
@section('main')
    <div class="container">
        <div class="row">
            <div class="col-12 text-info text-center">
                <h2>List OrderDetail</h2>
            </div>
        </div>
        <table id="table" class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Order_id</th>
                    <th>Product_id</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $model )
                <tr>
                    <td>{{ $model -> id }}</td>
                    <td>{{ $model -> order_id }}</td>
                    <td>{{ $model ->  product-> name}}</td>
                    <td>{{ $model ->  quantity}}</td>
                    @if ($model -> product -> sale_price == 0)
                    <td>{{number_format( $model ->  product -> price)}} đ</td>
                    @else
                    <td>{{number_format( $model ->  product -> price - $model ->  product -> price / $model -> product -> sale_price)}} đ</td>
                    @endif
                </tr>  
                @endforeach                
            </tbody>
        </table>
    </div>
@stop
@section('js')
    <script>
        $(document).ready(function(){
            $('#table').DataTable();
        })
    </script>
@stop