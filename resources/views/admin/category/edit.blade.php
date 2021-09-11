@extends('layouts.layoutAdmin');
@section('tittle','Edit Category');
@section('main')
    <div class="container-fluid">    
    <form method="POST"  action= "{{route('category.update',$category->id)}}">  
      @csrf @method('PUT')
  <div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="{{$category->name}}" id="name" name="name" placeholder="input Name">
      @error('name')
      <small>{{$message}}</small>
      @enderror
    </div>
  </div>
  <div class="form-group row">
    <label for="Prioty" class="col-sm-2 col-form-label">Prioty</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="{{$category->prioty}}"  name="prioty" id="prioty" placeholder="input prioty">
      @error('prooty')
      <small>{{$message}}</small>
      @enderror
    </div>
  </div>
  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Status</legend>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="status" id="gridRadios1" value="1" <?php if($category->STATUS == 1){ echo('checked');} ?>>
          <label class="form-check-label" for="publish">
                Publish
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="status" id="gridRadios2" value="0" <?php if($category->STATUS == 0){ echo('checked');} ?>>
          <label class="form-check-label" for="private">
            Private
          </label>
        </div>
      </div>
    </div>
  </fieldset>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-success">Save Data</button>
    </div>
  </div>
</form>
    </div>
@stop