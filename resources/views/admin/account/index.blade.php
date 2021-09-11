@extends('layouts.layoutAdmin');
@section('tittle','Account')
@section('main')
<div class="container-fluid">
    <form class="form-inline">
        <div class="form-group">
            <input type="text" name="txtSearch" id="" class="form-control" placeholder="Search by name ..." aria-describedby="helpId">
            <input type="submit" value="Search" class="btn btn-success">
        </div>
    </form>
<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Status</th>
            <th>Address</th>
            <th class="text-right">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $account)
        <tr>
            <td>{{$account -> name}}</td>
            <td>{{$account -> email}}</td>
            <td>{{$account -> phone}}</td>
            <td>
                @if($account -> status == 0)
                    <span class="badge badge-danger">Private</span>
                @else
                <span class="badge badge-success">Publish</span>
                @endif
            </td>
            <td>{{$account -> email}}</td>
            <td class="text-right"> 
                <a href="" class="btn btn-success"><i class="fas fa-edit"></i></a>
                <a href="" class="btn btn-danger"><i class="fas fa-trash"></i></a>
            </td>
        </tr>
       @endforeach
    </tbody>
</table>
<hr>
{{$data->appends(request()->all())->links()}}
</div>

@stop