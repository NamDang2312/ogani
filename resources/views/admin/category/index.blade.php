@extends('layouts.layoutAdmin');
@section('tittle','Category')
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

    <form class="form-inline justify-content-between">
        <a href="{{ route('category.create') }}" class="btn btn-info">Add Category</a>
        <div class="form-group">           
            <input type="text" name="txtSearch" id="" class="form-control" placeholder="Search by name ..." aria-describedby="helpId">
            <input type="submit" value="Search" class="btn btn-success">
        </div>
    </form>
<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Prioty</th>          
            <th>Status</th>     
            <th>Total Product</th>      
            <th class="text-right">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $category)
        <tr>
            <td>{{$category -> name }}</td>
            <td>{{$category -> prioty}}</td>
            <td>
                @if($category->STATUS == 0)
                    <span class="badge badge-danger">Private</span>
                @else
                <span class="badge badge-success">Publish</span>
                @endif
            </td>
            <td>{{$category -> product  -> count()}} </td>
            <td class="text-right"> 
                <a href="{{route('category.edit',$category->id)}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                <a href="{{route('category.destroy',$category->id)}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
            </td>
        </tr>
       @endforeach
    </tbody>
</table>
<form action="" method="POST" id="form-delete">
    @csrf @method('DELETE')
</form>
<hr>
{{$data->appends(request()->all())->links()}}
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
 
</script>
@stop