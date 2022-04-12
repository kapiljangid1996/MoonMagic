@extends('layouts.admin')

@section('title', 'Admin Profile Edit')

@section('custom-css')
<link href="{{ asset('backend/plugins/dropify/dropify.min.css') }}" rel="stylesheet" type="text/css">

<link href="{{ asset('backend/assets/css/users/account-setting.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="page-header">
    <div class="page-title">
        <h3>Account Settings</h3>
        <div class="crumbs">
            <ul id="breadcrumbs" class="breadcrumb">
                <li><a href="{{ url('/admin') }}"><i class="flaticon-home-fill"></i></a></li>
                <li class="active"><a href="#">Account Settings</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="container">
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
            <form class="general-info" method="POST" action="{{ route('admin.edit.profile') }}" enctype="multipart/form-data">
            	@csrf
                <div class="info">                                
                    <h6 class="mt-4">General Information</h6>
                    <div class="row">
                        <div class="col-lg-4 col-md-5">
                            <div class="upload ml-md-5 mt-4 pr-md-4">
                                <input type="file" name="image" id="input-file-max-fs" class="dropify" data-default-file="{{ Auth::user()->image ? asset('Uploads/User/'.Auth::user()->image) : '' }}" data-max-file-size="2M" />
                                <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> Upload Picture</p>
                                {!! $errors->first('image', '<small class="text-danger">:message</small>') !!}
                            </div>
                            <input type="hidden" name="old_image" value="{{ Auth::user()->image }}">
                        </div>
                        <div class="col-lg-8 col-md-7 mt-md-0 mt-4">
                            <div class="form">
                                <div class="form-group">
                                    <label for="Name">Name</label>
                                    <input type="text" class="form-control mb-4" id="Name" name="name" value="{{ Auth::user()->name }}">
                                    {!! $errors->first('name', '<small class="text-danger">:message</small>') !!}
                                </div>
                                <div class="form-group">
                                    <label for="Email">Email</label>
                                    <input type="email" class="form-control mb-4" id="Email" name="email" value="{{ Auth::user()->email }}">
                                    {!! $errors->first('email', '<small class="text-danger">:message</small>') !!}
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control mb-4" id="password" name="password">
                                    {!! $errors->first('password', '<small class="text-danger">:message</small>') !!}
                                </div>
                            </div>
                        </div>
                        <?php $user_id = Auth::user()->id; ?>
                        <input type="hidden" name="id" value="{{ \Crypt::encrypt($user_id) }}">
                    </div>
                </div>
                <div class="save-info">
                    <div class="row">
                        <div class="col-md-11 mx-auto">
                            <button class="btn btn-gradient-warning mb-4 float-right btn-rounded">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
	</div>
</div>
@endsection

@section('custom-js')
<script src="{{ asset('backend/plugins/dropify/dropify.min.js') }}"></script>

<script src="{{ asset('backend/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}"></script>  

<script>
    $('.dropify').dropify({
        messages: { 'default': 'Click to Upload or Drag n Drop', 'remove':  '<i class="flaticon-close-fill"></i>', 'replace': 'Upload or Drag n Drop' }
    });
</script>
@endsection