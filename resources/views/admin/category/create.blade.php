@extends('layouts.layoutAdmin');
@section('tittle','Add Category');
@section('main')
    <div class="container-fluid">    
    <form method="POST"  action= "{{route('category.store')}}">  
      @csrf
  <div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name" name="name" placeholder="input Name">
      @error('name')
      <small class="help-block">{{$message}}</small>
      @enderror
    </div>
  </div>
  <div class="form-group row">
    <label for="Prioty" class="col-sm-2 col-form-label">Prioty</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="prioty" id="prioty" placeholder="input prioty">
      @error('prioty')
      <small class="help-block">{{$message}}</small>
      @enderror
    </div>
  </div>
  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Status</legend>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="status" id="gridRadios1" value="1" checked>
          <label class="form-check-label" for="publish">
                Publish
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="status" id="gridRadios2" value="0">
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