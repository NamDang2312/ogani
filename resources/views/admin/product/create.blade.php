@extends('layouts.layoutAdmin');
@section('tittle','Product Create')
@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form id="formcreate" action="{{ route('product.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-9">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId"
                                    placeholder="">
                                @error('name')
                                    <small id="helpId" class="form-text   text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                                @error('description')
                                    <small id="helpId" class="form-text   text-danger">{{ $message }}</small>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label for="image_list">Image List</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" hidden name="image_list" id="image_list"
                                        aria-describedby="helpId" placeholder="">
                                    <div class="input-group-append">
                                        <span class="input-group-text" data-toggle="modal" data-target="#imageforlist"><i
                                                class="fa fa-image"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="splide">
                                <div class="splide__track">
                                    <ul class="splide__list" id="show_Image_list">
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select class="form-control" name="category_id" id="category">
                                    @foreach ($data as $model)
                                        <option value="{{ $model->id }}">{{ $model->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="text" class="form-control" name="price" id="price" aria-describedby="helpId"
                                    placeholder="">
                                @error('price')
                                    <small id="helpId" class="form-text   text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="sale_price">Sale Price</label>
                                <input type="text" class="form-control" name="sale_price" id="sale_price"
                                    aria-describedby="helpId" placeholder="">
                                @error('sale_price')
                                    <small id="helpId" class="form-text   text-danger">{{ $message }}</small>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <span class="input-group-text" data-toggle="modal" data-target="#image_main"
                                            id="basic-addon2"><i class="fa fa-image"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="image" id="image"
                                        aria-describedby="helpId" placeholder="">
                                   
                                </div>
                                @error('image')
                                    <small id="helpId" class="form-text  text-danger">{{ $message }}</small>
                                @enderror
                                <img src="" id="imageMain" style="width:200px" alt="No image">
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="STATUS" id="1" value="1" checked>
                                    Publish
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="STATUS" id="0" value="0" >
                                    Private1
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class=" justify-content-between d-flex">
                        <button type="submit" class="btn btn-success">Save Data</button>
                        <a href="{{ route('product.index') }}" class="btn btn-primary">Back List Product </a>
                    </div>

                </form>
            </div>
        </div>
        <!-- Modal image -->
        <div class="modal fade" id="image_main" tabindex="-1" role="dialog" aria-labelledby="image_main" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <iframe src="{{ url('file/dialog.php?field_id=image') }}"
                            style="width:100%;height:500px;overflow y :auto;bored:none" frameborder="0"></iframe>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal image_list -->
        <div class="modal fade" id="imageforlist" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <iframe src="{{ url('file/dialog.php?field_id=image_list') }}"
                            style="width:100%;height:500px;overflow y :auto;bored:none" frameborder="0"></iframe>
                    </div>
                </div>
            </div>
        </div>



    @stop
    @section('css')
        <link rel="stylesheet" href="{{ url('public/ForLayoutAdmin') }}/plugins/summernote/summernote-bs4.min.css">
        <link rel="stylesheet" href="{{ url('resources/css/splide.css') }}/splide-skyblue.min.css">
        <link rel="stylesheet" href="{{ url('resources/css/splide.css') }}/splide.min.css">
        <style>
            .modal-dialog {
                max-width: 95% !important;
            }
        </style>
    @stop
    @section('js')
        <script src="{{ url('public/ForLayoutAdmin') }}/plugins/summernote/summernote-bs4.min.js"></script>
        <script src="{{ url('resources/js/splide.js') }}/splide.js"></script>
        <script>
                $('form#formcreate').validate({
                    rules: {
                        name: 'required',
                        description: 'required',
                        price: {
                            required: true,
                            number: true
                        },
                        sale_price: {
                            required: true,
                            number: true
                        },
                        image: 'required'
                    },
                    messages: {
                        name: 'Name must be required',
                        description: 'Description must be required',
                        price: {
                            required:'Price must be required',
                            number: 'Price must be number'
                        },
                        sale_price: {
                            required: 'Sale price must be required',
                            number: 'Sale price must be number'
                        },
                        image: 'Image must be required'
                    }

                });

                $('#description').summernote({
                    height: 177,
                    placeholder: "Product description",
                });
            
            $('#image_main').on('hide.bs.modal', function(event) {
                let linkMainImage = $('input#image').val();
                $('#imageMain').attr('src', "{{ url('uploads') }}/" + linkMainImage);
            });
            $('#imageforlist').on('hide.bs.modal', function(event) {
                let linkForImages = $('input#image_list').val();

                let _html = '';
                // CHECK JSON HAY KO 
                if (/^[\],:{}\s]*$/.test(linkForImages.replace(/\\["\\\/bfnrtu]/g, '@').replace(
                            /"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, ']')
                        .replace(/(?:^|:|,)(?:\s*\[)+/g, ''))) {
                    let arrayLink = $.parseJSON(linkForImages);
                    arrayLink.forEach(element => {
                        _html += '<li class="splide__slide"><img width="200px" src="{{ url('uploads') }}/' + element +
                            '" alt=""> </li>'
                    });
                } else {
                    let url = "{{ url('uploads') }}/" + linkForImages;
                    _html += '<div class="col4">' + '"<img  width="200px" src="' + url + '" alt=""></div>';
                }
                $('#show_Image_list').html(_html);
                new Splide('.splide', {
                    type: 'loop',
                    perPage: 3,
                    perMove: 1,
                }).mount();
            });
        </script>


    @stop
