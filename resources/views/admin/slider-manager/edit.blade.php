@extends('layouts.admin')

@section('title', 'Edit Slide')

@section('custom-css')
    <style type="text/css">
        .img-view img {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
        }
    </style>
@endsection

@section('content')
<div class="page-header">
    <div class="page-title">
        <h3>Edit Slide</h3>
        <div class="crumbs">
            <ul id="breadcrumbs" class="breadcrumb">
                <li> <a href="{{ url('/admin') }}"> <i class="flaticon-home-fill"></i> </a> </li>
                <li> <a href="{{ url('/admin/sliders') }}"> Slider Manager </a> </li>
                <li class="active"> <a href="#">Edit Slide</a> </li>
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
                        <h4>Edit Slide</h4> 
                    </div>
                </div>
            </div>

            <div class="widget-content widget-content-area">
                <form action="{{ route('sliders.update',$sliders->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-row mb-4">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Title</label>
                            <input type="text" class="form-control" id="name" name="title" value="{{ $sliders->title }}">
                            {!! $errors->first('title', '<small class="text-danger">:message</small>') !!}
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Slug</label>                            
                            <input type="text" class="form-control" id="slug" name="slug" value="{{ $sliders->slug }}">
                            {!! $errors->first('slug', '<small class="text-danger">:message</small>') !!}
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Caption</label>
                            <input type="text" class="form-control" id="name" name="caption" value="{{ $sliders->caption }}">
                            {!! $errors->first('caption', '<small class="text-danger">:message</small>') !!}
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Caption Color</label>
                            <input type="text" id="hue-demo" class="form-control demo" data-control="hue" name="captioncolor" value="{{ $sliders->captioncolor }}">
                            {!! $errors->first('captioncolor', '<small class="text-danger">:message</small>') !!}
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Button Text</label>
                            <input type="text" class="form-control" id="name" name="button_text" placeholder="Button Text" value="{{ $sliders->button_text }}">
                            {!! $errors->first('button_text', '<small class="text-danger">:message</small>') !!}
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Button URL</label>
                            <input type="text" class="form-control" id="name" name="button_url" placeholder="Button URL" value="{{ $sliders->button_url }}">
                            {!! $errors->first('button_url', '<small class="text-danger">:message</small>') !!}
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Button Color</label>
                            <input type="text" id="saturation-demo" class="form-control demo" data-control="saturation" name="buttoncolor" value="{{ $sliders->buttoncolor }}">
                            {!! $errors->first('buttoncolor', '<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <div class="form-group col-md-6">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="media">
                                <label class="custom-file-label" for="customFile">Choose file (Image or Video)</label>
                                <input type="hidden" name="old_media" value="{{ $sliders->media }}">
                            </div>
                        </div> 
                        <div class="form-group col-md-6">
                            @if(!empty($sliders->media))
                                @if ( pathinfo($sliders->media, PATHINFO_EXTENSION) == 'mp4' )
                                    <video width="320" height="240" controls>
                                        <source src="{{asset('Uploads/Slider/Video').'/'.$sliders->media}}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                @else
                                    <img src="{{asset('Uploads/Slider/Image').'/'.$sliders->media}}"  width="100px">
                                @endif
                            @else
                                No Media Found.
                            @endif
                        </div>   
                    </div> 
                    <div class="form-row mb-4">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Sort Order</label>
                            <input type="number" class="form-control" id="name" pattern="[0-9]" min="0" name="sort_order" placeholder="Sort Order" value="{{ $sliders->sort_order }}" oninput="validity.valid||(value='');">
                            {!! $errors->first('sort_order', '<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="form-row mb-4">
                        <div class="form-group col-md-6">
                            <div class="custom-control custom-checkbox checkbox-info">
                                <input type="checkbox" class="custom-control-input" id="sChkbox" name="status" value="1" @if(old('status', $sliders->status)) checked @endif>
                                <label class="custom-control-label" for="sChkbox">Published</label>
                            </div>
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
    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>


    <script src="{{ asset('backend/plugins/color_pickers/jquery_minicolors/jquery.minicolors.min.js') }}"></script>

    <script src="{{ asset('backend/plugins/color_pickers/jquery_minicolors/jquery.minicolors_examples.js') }}"></script>
@endsection