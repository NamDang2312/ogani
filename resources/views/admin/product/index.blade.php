@extends('layouts.layoutAdmin');
@section('tittle','Product')
@section('main')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            @if($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{$message}}</strong>
            </div>
            @endif
            @if($message = Session::get('danger'))
            <div class="alert alert-danger">
                <strong>{{$message}}</strong>
            </div>
        @endif
        </div>
    </div>
    <a href="{{ route('product.create') }}" class="mb-3 btn btn-info">Add Product</a>
<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Image</th>          
            <th>Price/Sale</th>
            <th>Category Name</th>   
            <th>Description</th>
            <th>Status</th>                          
            <th class="text-right">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $model)
        <tr>
            <td>{{$model -> name}}</td>
            <td><img src="{{ url('uploads') }}/{{$model -> image}}" width="100px" alt=""></td>
            <td>{{$model -> price}}/<span class="badge badge-danger">{{$model -> sale_price}}</span></td> 
            <td>{{$model-> category -> name}}</td>
            <td>{{$model -> description}}</td>
            <td>
                @if($model->STATUS == 0)
                    <span class="badge badge-danger">Private</span>
                @else
                <span class="badge badge-success">Publish</span>
                @endif
            </td>
            <td class="text-right"> 
                <a href="{{route('product.edit',$model->id)}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                <a href="{{route('product.destroy',$model->id)}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
            </td>
        </tr>
       @endforeach
    </tbody>
</table>
<form action="" method="POST" id="form-delete">
    @csrf @method('DELETE')
</form>


</div>
@stop
@section('css')
    <link rel="stylesheet" href="{{ url('resources/css/asteroid-alert') }}/style.css">
@stop
@section('js')
<script src="{{ url('resources/js/asteroid-alert')}}/as-min.js"></script>
<script>
    $('.btn-danger').click(function(event){
        event.preventDefault();
        var href = $(this).attr('href')
        $('form#form-delete').attr('action',href);
        if(confirm("Are you sure you want to DELETE? ")){
             $('form#form-delete').submit();
        }
    })
    $('.table').DataTable();
</script>
@stop