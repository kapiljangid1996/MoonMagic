@extends('layouts.admin')

@section('title', 'Add Slide')

@section('content')
<div class="page-header">
    <div class="page-title">
        <h3>Add Slide</h3>
        <div class="crumbs">
            <ul id="breadcrumbs" class="breadcrumb">
                <li> <a href="{{ url('/admin') }}"> <i class="flaticon-home-fill"></i> </a> </li>
                <li> <a href="{{ url('/admin/sliders') }}"> Slider Manager </a> </li>
                <li class="active"> <a href="#">Add Slide</a> </li>
            </ul>
        </div>
    </div>
</div>

<div class="row layout-spacing">
    <div class="col-lg-12">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>Add Slide</h4> 
                    </div>
                </div>
            </div>

            <div class="widget-content widget-content-area">
                <form action="{{ route('sliders.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row mb-4">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Title</label>
                            <input type="text" class="form-control" id="name" name="title" placeholder="Title" value="{{old('title')}}">
                            <input type="hidden" class="form-control" id="slug" name="slug">
                            {!! $errors->first('title', '<small class="text-danger">:message</small>') !!}
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Caption</label>
                            <input type="text" class="form-control" id="name" name="caption" placeholder="Caption" value="{{old('caption')}}">
                            {!! $errors->first('caption', '<small class="text-danger">:message</small>') !!}
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Caption Color</label>
                            <input type="text" id="hue-demo" class="form-control demo" data-control="hue" name="captioncolor" value="#6156ce">
                            {!! $errors->first('captioncolor', '<small class="text-danger">:message</small>') !!}
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Button Text</label>
                            <input type="text" class="form-control" id="name" name="button_text" placeholder="Button Text" value="{{old('button_text')}}">
                            {!! $errors->first('button_text', '<small class="text-danger">:message</small>') !!}
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Button URL</label>
                            <input type="text" class="form-control" id="name" name="button_url" placeholder="Button URL" value="{{old('button_url')}}">
                            {!! $errors->first('button_url', '<small class="text-danger">:message</small>') !!}
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Button Color</label>
                            <input type="text" id="saturation-demo" class="form-control demo" data-control="saturation" name="buttoncolor" value="#07dabf">
                            {!! $errors->first('buttoncolor', '<small class="text-danger">:message</small>') !!}
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Sort Order</label>
                            <input type="number" class="form-control" id="name" pattern="[0-9]" min="0" name="sort_order" placeholder="Sort Order" value="{{old('sort_order')}}" oninput="validity.valid||(value='');">
                            {!! $errors->first('sort_order', '<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="form-row mb-4">
                        <div class="form-group col-md-6">
                            <div class="widget-content widget-content-area">
                                <div class="custom-file-container" data-upload-id="myFirstImage">
                                    <label>Upload Image <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                    <label class="custom-file-container__custom-file" >
                                        <input type="file" class="custom-file-container__custom-file__custom-file-input" accept="image/*" name="image">
                                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                    </label>
                                    <div class="custom-file-container__image-preview"></div>
                                </div>
                            </div>
                            {!! $errors->first('image', '<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="form-row mb-4">
                        <div class="form-group col-md-6">
                            <div class="custom-control custom-checkbox checkbox-info">
                                <input type="checkbox" class="custom-control-input" id="sChkbox" name="status" value="1">
                                <label class="custom-control-label" for="sChkbox">Published</label>
                            </div>
                            {!! $errors->first('captioncolor', '<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>

                    <button type="submit" class="btn btn-button-7 mb-4 mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-js')
    <script src="{{ asset('backend/plugins/file-upload/file-upload-with-preview.js') }}"></script>

    <script>
        //First upload
        var firstUpload = new FileUploadWithPreview('myFirstImage')
    </script>


    <script src="{{ asset('backend/plugins/color_pickers/jquery_minicolors/jquery.minicolors.min.js') }}"></script>

    <script src="{{ asset('backend/plugins/color_pickers/jquery_minicolors/jquery.minicolors_examples.js') }}"></script>
@endsection