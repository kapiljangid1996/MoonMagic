@extends('layouts.admin')

@section('title', 'Edit Page')

@section('custom-css')

@endsection

@section('content')
<div class="page-header">
    <div class="page-title">
        <h3>Edit Page</h3>
        <div class="crumbs">
            <ul id="breadcrumbs" class="breadcrumb">
                <li> <a href="{{ url('/admin') }}"> <i class="flaticon-home-fill"></i> </a> </li>
                <li> <a href="{{ url('/admin/page-manager') }}"> Page Manager </a> </li>
                <li class="active"> <a href="#">Edit Page</a> </li>
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
                        <h4>Edit Page</h4> 
                    </div>
                </div>
            </div>

            <div class="widget-content widget-content-area">
                <form action="{{ route('page-manager.update',$pages->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row mb-4">
                        <label for="hEmail" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Title</label>
                        <div class="col-xl-10 col-lg-9 col-sm-10">
                            <input type="text" class="form-control" id="name" name="title" placeholder="Title" value="{{ $pages->title }}">
                            {!! $errors->first('title', '<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="hEmail" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Slug</label>
                        <div class="col-xl-10 col-lg-9 col-sm-10">
                            <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="{{ $pages->slug }}">
                            {!! $errors->first('slug', '<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="hEmail" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Description</label>
                        <div class="col-xl-10 col-lg-9 col-sm-10">
                            <textarea class="form-control" id="editor1" name="description">{{ $pages->description }}</textarea>
                            {!! $errors->first('description', '<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="hEmail" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Media</label>
                        <div class="col-xl-10 col-lg-9 col-sm-10">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="media">
                                <label class="custom-file-label" for="customFile">Choose Media ( Image or Video )</label>
                                <input type="hidden" name="old_media" value="{{ $pages->media }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="hEmail" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Media Preview</label>
                        <div class="col-xl-10 col-lg-9 col-sm-10">
                            @if(!empty($pages->media))
                                @if ( pathinfo($pages->media, PATHINFO_EXTENSION) == 'mp4' )
                                    <video width="320" height="240" controls>
                                        <source src="{{asset('Uploads/Page/Video').'/'.$pages->media}}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                @else
                                    <img src="{{asset('Uploads/Page/Image').'/'.$pages->media}}"  width="100px">
                                @endif
                            @else
                                No Media Found.
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="hEmail" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Meta Title</label>
                        <div class="col-xl-10 col-lg-9 col-sm-10">
                            <input type="text" class="form-control" name="meta_name" placeholder="Meta Title" value="{{ $pages->meta_name }}">
                            {!! $errors->first('meta_name', '<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="hEmail" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Meta Keyword</label>
                        <div class="col-xl-10 col-lg-9 col-sm-10">
                            <textarea class="form-control" name="meta_keyword">{{ $pages->meta_keyword }}</textarea>
                            {!! $errors->first('meta_keyword', '<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="hEmail" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Meta Description</label>
                        <div class="col-xl-10 col-lg-9 col-sm-10">
                            <textarea class="form-control" name="meta_description">{{ $pages->meta_description }}</textarea>
                            {!! $errors->first('meta_description', '<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10">
                            <div class="form-check pl-0">
                                <div class="custom-control custom-checkbox checkbox-info">
                                    <input type="checkbox" class="custom-control-input" id="hChkbox" name="publish" value="1" @if(old('publish', $pages->publish)) checked @endif>
                                    <label class="custom-control-label" for="hChkbox">Published</label>
                                </div>
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

<!-- Ckeditor -->
<script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>

<script>
    var url = {!! json_encode(url('/')) !!};
    CKEDITOR.replace( 'editor1', {
        filebrowserBrowseUrl: url + '/public/ckfinder/ckfinder.html',
        filebrowserUploadUrl: url + '/public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
    });
</script>
@endsection