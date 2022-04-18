@extends('layouts.admin')

@section('title', 'Edit Shape')

@section('custom-css')

@endsection

@section('content')
<div class="page-header">
    <div class="page-title">
        <h3>Edit Shape</h3>
        <div class="crumbs">
            <ul id="breadcrumbs" class="breadcrumb">
                <li> <a href="{{ url('/admin') }}"> <i class="flaticon-home-fill"></i> </a> </li>
                <li> <a href="{{ url('/admin/shape-manager') }}"> Shape Manager </a> </li>
                <li class="active"> <a href="#">Edit Shape</a> </li>
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
                        <h4>Edit Shape</h4> 
                    </div>
                </div>
            </div>

            <div class="widget-content widget-content-area">
                <form action="{{ route('shape-manager.update',$shapes->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row mb-4">
                        <label for="hEmail" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Title</label>
                        <div class="col-xl-10 col-lg-9 col-sm-10">
                            <input type="text" class="form-control" id="name" name="title" placeholder="Title" value="{{ $shapes->title }}">
                            {!! $errors->first('title', '<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="hEmail" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Slug</label>
                        <div class="col-xl-10 col-lg-9 col-sm-10">
                            <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="{{ $shapes->slug }}">
                            {!! $errors->first('slug', '<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10">
                            <div class="form-check pl-0">
                                <div class="custom-control custom-checkbox checkbox-info">
                                    <input type="checkbox" class="custom-control-input" id="hChkbox" name="status" value="1" @if(old('status', $shapes->status)) checked @endif>
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

@endsection