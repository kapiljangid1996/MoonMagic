@extends('layouts.admin')

@section('title', 'Edit Category')

@section('custom-css')

@endsection

@section('content')
<div class="page-header">
    <div class="page-title">
        <h3>Edit Category</h3>
        <div class="crumbs">
            <ul id="breadcrumbs" class="breadcrumb">
                <li> <a href="{{ url('/admin') }}"> <i class="flaticon-home-fill"></i> </a> </li>
                <li> <a href="{{ url('/admin/category') }}"> Category Manager </a> </li>
                <li class="active"> <a href="#">Edit Category</a> </li>
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
                        <h4>Edit Category</h4> 
                    </div>
                </div>
            </div>

            <div class="widget-content widget-content-area">
                <form action="{{ route('category.update',$categories->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row mb-4">
                        <label for="hEmail" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Title</label>
                        <div class="col-xl-10 col-lg-9 col-sm-10">
                            <input type="text" class="form-control" id="name" name="title" placeholder="Title" value="{{ $categories->title }}">
                            {!! $errors->first('title', '<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="hEmail" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Slug</label>
                        <div class="col-xl-10 col-lg-9 col-sm-10">
                            <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="{{ $categories->slug }}">
                            {!! $errors->first('slug', '<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="hEmail" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Short Description</label>
                        <div class="col-xl-10 col-lg-9 col-sm-10">
                            <textarea class="form-control" name="short_description">{{ $categories->short_description }}</textarea>
                            {!! $errors->first('short_description', '<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="hEmail" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Image</label>
                        <div class="col-xl-10 col-lg-9 col-sm-10">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="image">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                                <input type="hidden" name="old_image" value="{{ $categories->image }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="hEmail" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Image Preview</label>
                        <div class="col-xl-10 col-lg-9 col-sm-10">
                            @if(!empty($categories->image))
                                <img src="{{asset('Uploads/Category').'/'.$categories->image}}"  width="100px">
                            @else
                                No Image Found.
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="hEmail" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Select Parent Category <small>( Leave Blank if Main Category )</small></label>
                        <div class="col-xl-10 col-lg-9 col-sm-10">
                            <select class="selectpicker form-control" name="parent_id">
                                <option value="">Select Parent Category</option>
                                @if( count($all_categories) > 0 )
                                    @foreach ($all_categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id === $categories->parent_id ? 'selected' : '' }}>{{ $category->title }}</option>
                                    @endforeach
                                @else
                                    <option value="">No Record Found</option>
                                @endif
                            </select>
                            {!! $errors->first('meta_name', '<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="hEmail" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Meta Title</label>
                        <div class="col-xl-10 col-lg-9 col-sm-10">
                            <input type="text" class="form-control" name="meta_name" value="{{ $categories->meta_name }}">
                            {!! $errors->first('meta_name', '<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="hEmail" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Meta Keyword</label>
                        <div class="col-xl-10 col-lg-9 col-sm-10">
                            <textarea class="form-control" name="meta_keyword">{{ $categories->meta_keyword }}</textarea>
                            {!! $errors->first('meta_keyword', '<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="hEmail" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Meta Description</label>
                        <div class="col-xl-10 col-lg-9 col-sm-10">
                            <textarea class="form-control" name="meta_description">{{ $categories->meta_description }}</textarea>
                            {!! $errors->first('meta_description', '<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10">
                            <div class="form-check pl-0">
                                <div class="custom-control custom-checkbox checkbox-info">
                                    <input type="checkbox" class="custom-control-input" id="hChkbox" name="status" value="1" @if(old('status', $categories->status)) checked @endif>
                                    <label class="custom-control-label" for="hChkbox">Status</label>
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
@endsection