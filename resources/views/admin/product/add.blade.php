@extends('layouts.admin')

@section('title', 'Add Product')

@section('custom-css')
<style>
	.images-preview-div img {
		padding: 10px;
		max-width: 200px;
	}
</style>
@endsection

@section('content')
<div class="page-header">
    <div class="page-title">
        <h3>Add Product</h3>
        <div class="crumbs">
            <ul id="breadcrumbs" class="breadcrumb">
                <li> <a href="{{ url('/admin') }}"> <i class="flaticon-home-fill"></i> </a> </li>
                <li> <a href="{{ url('/admin/product') }}"> Product Manager </a> </li>
                <li class="active"> <a href="#">Add Product</a> </li>
            </ul>
        </div>
    </div>
</div>

<div class="row">
	<div class="col-lg-12 layout-spacing">
		<div class="statbox widget box box-shadow">
			<div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>Add Product</h4>
                    </div>                                                                        
                </div>
            </div>

            <div class="widget-content widget-content-area">
            	<form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            		@csrf
            		<div class="form-row mb-4">
                        <div class="form-group col-md-6">
                            <label for="name">Title</label>
                            <input type="text" class="form-control" id="name" name="title" placeholder="Title" value="{{old('title')}}">
                            <input type="hidden" class="form-control" id="slug" name="slug">
                            {!! $errors->first('title', '<small class="text-danger">:message</small>') !!}
                        </div>
                        <div class="form-group col-md-6">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" id="txtChar" name="price" placeholder="Price" value="{{old('price')}}" onkeypress="return isNumberKey(event)">
                            {!! $errors->first('title', '<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
            		<div class="form-row mb-1">
                        <div class="form-group col-md-6">
                            <label for="name">Select Category</label>
                            <select class="selectpicker form-control" name="category_id">
                                <option value="">Select Category</option>
                                @if( count($categories) > 0 )
                                    @foreach ($categories as $category)
                                    	@if($category->parent == null)
                                        	<option value="{{ $category->id }}">{{ $category->title }}</option>
                                        @endif

                                        @if($category->children)
                                        	@foreach($category->children as $child)
                                        		<option class="ml-5" value="{{ $child->id }}">{{ $child->title }}</option>
                                        	@endforeach
                                        @endif
                                    @endforeach
                                @else
                                    <option value="">No Record Found</option>
                                @endif
                            </select>
                            {!! $errors->first('category_id', '<small class="text-danger">:message</small>') !!}
                        </div>
                        <div class="form-group col-md-6">
                            <label for="price">Select Material</label>
                            <select class="selectpicker form-control" name="material_id">
                                <option value="">Select Material</option>
                                @if( count($materials) > 0 )
                                    @foreach ($materials as $material)
                                        <option value="{{ $material->id }}">{{ $material->title }}</option>
                                    @endforeach
                                @else
                                    <option value="">No Record Found</option>
                                @endif
                            </select>
                            {!! $errors->first('material_id', '<small class="text-danger">:message</small>') !!}
                        </div>
                        <div class="form-group col-md-6">
                            <label for="price">Select Gemstone</label>
                            <select class="selectpicker form-control" name="gemstone_id">
                                <option value="">Select Gemstone</option>
                                @if( count($gemstones) > 0 )
                                    @foreach ($gemstones as $gemstone)
                                        <option value="{{ $gemstone->id }}">{{ $gemstone->title }}</option>
                                    @endforeach
                                @else
                                    <option value="">No Record Found</option>
                                @endif
                            </select>
                            {!! $errors->first('gemstone_id', '<small class="text-danger">:message</small>') !!}
                        </div>
                        <div class="form-group col-md-6">
            				<label for="name">Select Birthstone</label>
            				<select class="selectpicker form-control" name="birthstone">
            					<option value="">Select Birthstone</option>
            					<option value="January">January</option>
            					<option value="February">February</option>
            					<option value="March">March</option>
            					<option value="April">April</option>
            					<option value="May">May</option>
            					<option value="June">June</option>
            					<option value="July">July</option>
            					<option value="August">August</option>
            					<option value="September">September</option>
            					<option value="October">October</option>
            					<option value="November">November</option>
            					<option value="December">December</option>
            				</select>
            			</div>
                        <div class="form-group col-md-6">
                            <label for="price">Select Shape</label>
                            <select class="selectpicker form-control" name="shape_id">
                                <option value="">Select Shape</option>
                                @if( count($shapes) > 0 )
                                    @foreach ($shapes as $shape)
                                        <option value="{{ $shape->id }}">{{ $shape->title }}</option>
                                    @endforeach
                                @else
                                    <option value="">No Record Found</option>
                                @endif
                            </select>
                            {!! $errors->first('shape_id', '<small class="text-danger">:message</small>') !!}
                        </div>
                        <div class="form-group col-md-6">
                            <label for="price">Select Meaning</label>
                            <select class="selectpicker form-control" name="meaning_id">
                                <option value="">Select Meaning</option>
                                @if( count($meanings) > 0 )
                                    @foreach ($meanings as $meaning)
                                        <option value="{{ $meaning->id }}">{{ $meaning->title }}</option>
                                    @endforeach
                                @else
                                    <option value="">No Record Found</option>
                                @endif
                            </select>
                            {!! $errors->first('meaning_id', '<small class="text-danger">:message</small>') !!}
                        </div>                        
            			<div class="form-group col-md-6">
            				<label for="name">Select Ring Size</label>
            				<select class="selectpicker form-control" name="ring_size">
            					<option value="">Select Ring Size</option>
            					<option value="5">5</option>
            					<option value="6">6</option>
            					<option value="7">7</option>
            					<option value="8">8</option>
            					<option value="9">9</option>
            					<option value="10">10</option>
            					<option value="11">11</option>
            					<option value="12">12</option>
            					<option value="13">13</option>
            				</select>
            			</div>
                    </div>
                    <div class="form-row mb-4">
                    	<div class="form-group col-md-12">
                            <label for="name">Description</label>
                            <textarea class="form-control" id="editor1" name="description">{{old('description')}}</textarea>
                            {!! $errors->first('description', '<small class="text-danger">:message</small>') !!}
                        </div>
                        <div class="form-group col-md-12">
                            <label for="name">Gem Information</label>
                            <textarea class="form-control" id="editor2" name="gem_info">{{old('gem_info')}}</textarea>
                            {!! $errors->first('gem_info', '<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="form-row mb-4">
                    	<div class="form-group col-md-6 offset-md-3">
                            <label for="name">Media</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="media[]" multiple>
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                    	<div class="form-group col-md-12">
                            <div class="images-preview-div"> </div>
                        </div>
                    </div>
                    <div class="form-row mb-4">
                    	<div class="form-group col-md-6">
                            <label for="name">Meta Name</label>
                            <input type="text" class="form-control" name="meta_name" placeholder="Meta Name" value="{{old('meta_name')}}">
                            {!! $errors->first('meta_name', '<small class="text-danger">:message</small>') !!}
                        </div>
                    	<div class="form-group col-md-12">
                            <label for="name">Meta Keyword</label>
                            <textarea class="form-control" name="meta_keyword" placeholder="Meta Keyword">{{old('meta_keyword')}}</textarea>
                            {!! $errors->first('meta_keyword', '<small class="text-danger">:message</small>') !!}
                        </div>
                    	<div class="form-group col-md-12">
                            <label for="name">Meta Description</label>
                            <textarea class="form-control" name="meta_description" placeholder="Meta Description">{{old('meta_description')}}</textarea>
                            {!! $errors->first('meta_description', '<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="form-row mb-4 mt-4 ml-5">
                        <div class="form-group col-md-4">
                            <div class="form-check pl-0">
                                <div class="custom-control custom-checkbox checkbox-info">
                                    <input type="checkbox" class="custom-control-input" id="hChkbox1" name="shipping" value="1">
                                    <label class="custom-control-label" for="hChkbox1">Shipping Free</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <div class="form-check pl-0">
                                <div class="custom-control custom-checkbox checkbox-info">
                                    <input type="checkbox" class="custom-control-input" id="hChkbox2" name="featured" value="1">
                                    <label class="custom-control-label" for="hChkbox2">Featured</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <div class="form-check pl-0">
                                <div class="custom-control custom-checkbox checkbox-info">
                                    <input type="checkbox" class="custom-control-input" id="hChkbox3" name="status" value="1">
                                    <label class="custom-control-label" for="hChkbox3">Published</label>
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

<script >
$(function() {
	// Multiple images preview with JavaScript
	var previewImages = function(input, imgPreviewPlaceholder) {
	if (input.files) {		
		var filesAmount = input.files.length;
		for (i = 0; i < filesAmount; i++) {
			const file_preview = document.querySelector('input[type=file]').files[i];
			
			var reader = new FileReader();

			if (file_preview.type == "image/jpeg") {
				reader.onload = function(event) {
					$($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
				}
			} else {
				reader.onload = function(event) {
					$(imgPreviewPlaceholder).append('<video src="' + event.target.result + '" width="200" height="140" controls></video>');
				}
			}
			
			reader.readAsDataURL(input.files[i]);
		}
	}
	};
	$('#customFile').on('change', function() {
		previewImages(this, 'div.images-preview-div');
	});
	
});
</script>

<!-- Input type Price -->
<SCRIPT language=Javascript>
   	<!--
   	function isNumberKey(evt)
   	{
      	var charCode = (evt.which) ? evt.which : evt.keyCode;
      	if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
         	return false;

      	return true;
   	}
   	//-->
</SCRIPT>
<!-- Input type Price -->

<!-- Ckeditor -->
<script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>

<script>
    var url = {!! json_encode(url('/')) !!};
    CKEDITOR.replace( 'editor1', {
        filebrowserBrowseUrl: url + '/public/ckfinder/ckfinder.html',
        filebrowserUploadUrl: url + '/public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
    });
    CKEDITOR.replace( 'editor2', {
        filebrowserBrowseUrl: url + '/public/ckfinder/ckfinder.html',
        filebrowserUploadUrl: url + '/public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
    });
</script>
<!-- Ckeditor -->
@endsection