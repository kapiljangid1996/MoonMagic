@extends('layouts.admin')

@section('title', 'Menu List')

@section('custom-css')
<link href="{{ asset('backend/assets/css/ui-kit/custom-modal.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="page-header">
    <div class="page-title">
        <h3>Menu List</h3>
        <div class="crumbs">
            <ul id="breadcrumbs" class="breadcrumb">
                <li> <a href="{{ url('/admin') }}"> <i class="flaticon-home-fill"></i> </a> </li>
                <li class="active"> <a href="#">Menu List</a> </li>
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
                        <h4>Menu List</h4> 
                        <button type="button" class="btn btn-primary btn-rounded btn-sm mb-4 ml-3" data-toggle="modal" data-target="#addMenu">Add New Menu</button> 
                    </div>
                </div>
            </div>

            <div class="widget-content widget-content-area">
                <div class="table-responsive mb-4">
                    <table id="customer-info-detail-2" class="table style-2 table-bordered  table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">Record Id</th>
                                <th class="text-center">Menu Id</th>
                                <th class="text-center">Title</th>
                                <th class="text-center">Heading</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Date Created</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $index = 0; foreach ( $menus as $menu ){ $index++; ?>
                                <tr>
                                    <td class="text-center"><?php echo $index; ?></td> 

                                    <td class="text-center">{{ $menu->id }}</td>

                                    <td class="text-center">{{ $menu->title }}</td>

                                    <td class="text-center">{{ $menu->heading }}</td>

                                    @if($menu->status == 1)
                                        <td class="align-center"><span class="shadow-none badge badge-success">Published</span></td>
                                    @else
                                        <td class="align-center"><span class="shadow-none badge badge-danger">Not Published</span></td>
                                    @endif

                                    <td class="text-center">{{ $menu->created_at }}</td>

                                    <td class="text-center">
                                        <a type="button" class="bs-tooltip editMenuModal" data-toggle="modal" data-placement="top" title="" data-original-title="Edit" data-target="#editMenu" data-id="{{ $menu->id }}" data-title="{{ $menu->title }}" data-heading="{{ $menu->heading }}" data-status="{{ $menu->status }}"><i class="flaticon-edit-4 fs-20"></i></a>

                                        <a href="{{url('/admin/menu-builder/delete/'.$menu->id)}}" class="bs-tooltip ml-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" onclick="return confirm('Are you sure you want to delete')"><i class="flaticon-close-fill fs-20"></i></a>

                                        <a href="{{route('menu-builder.show', $menu->id)}}" class="bs-tooltip ml-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"><i class="flaticon-view-1 fs-20"></i></a>
                                    </td>
                                </tr>
                            <?php } ?> 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-js')
<!-- Add Menu Modal Start -->
<div id="addMenu" class="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalPopoversLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalRemoveAnimationLabel1">Add Menu Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
            	<form action="{{ route('menu-builder.store') }}" method="POST">
					@csrf
	                <div class="form-group">
						<label>Menu Name</label>
						<div class="input-group">
							<input type="text" class="form-control" id="Menu-Name" name="title" value="{{old('title')}}" required="">
						</div>
					</div>
					<div class="form-group">
						<label>Menu Heading</label>
						<div class="input-group">
							<input type="text" class="form-control" id="Menu-Heading" name="heading" value="{{old('heading')}}" required="">
						</div>
					</div>
					<div class="form-group">
						<div class="custom-control custom-checkbox checkbox-info">
                            <input type="checkbox" class="custom-control-input" id="sChkbox" name="status" value="1" checked>
                            <label class="custom-control-label" for="sChkbox">Status</label>
                        </div>
					</div>
	                <div class="modal-footer">
	                    <button type="submit" class="btn btn-primary btn-rounded mt-3 mb-3">Save changes</button>
	                    <button type="button" class="btn btn-dark btn-rounded mt-3 mb-3" data-dismiss="modal">Close</button>
	                </div>
            	</form>
            </div>
        </div>
    </div>
</div>
<!-- Add Menu Modal End -->

<!-- Edit Menu Modal Start -->
<div id="editMenu" class="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalPopoversLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalRemoveAnimationLabel1">Edit Menu Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
            	<form id="edit_menu_type">
	                <div class="form-group">
						<label>Menu Name</label>
						<div class="input-group">
							<input type="text" class="form-control" id="m_name" name="title" value="{{old('title')}}" required="">
						</div>
					</div>
					<div class="form-group">
						<label>Menu Heading</label>
						<div class="input-group">
							<input type="text" class="form-control" id="m_heading" name="heading" value="{{old('heading')}}" required="">
						</div>
					</div>
					<div class="form-group">
						<div class="custom-control custom-checkbox checkbox-info">
                            <input type="checkbox" class="custom-control-input" id="m_status" name="status" value="1" checked>
                            <label class="custom-control-label" for="m_status">Status</label>
                        </div>
					</div>
					<input type="hidden" name="menu_id" id="m_id" value="">
	                <div class="modal-footer">
	                    <button type="submit" class="btn btn-primary btn-rounded mt-3 mb-3">Save changes</button>
	                    <button type="button" class="btn btn-dark btn-rounded mt-3 mb-3" data-dismiss="modal">Close</button>
	                </div>
            	</form>
            </div>
        </div>
    </div>
</div>

<script>
	$(document).ready(function() {
		$('.editMenuModal').click(function() {
			var id=$(this).data('id');
			var title=$(this).data('title');
			var heading=$(this).data('heading');
			var status=$(this).data('status');
			$('#m_name').val(title);
			$('#m_heading').val(heading);
			$('#m_status').val(status);
			$('#m_id').val(id);
			if (status == 1) {
				$('#m_status').attr("checked", true);
			} 
			else {
				$('#m_status').attr("checked", false);
			}
		});

		$('#edit_menu_type').on('submit', function(e) {
			e.preventDefault();
			var baseUrl = '{{ URL::to('/') }}';
			var new_name = $('#m_name').val();
			var new_heading = $('#m_heading').val();
			var new_status = $('#m_status:checked').val();
			var new_id = $('#m_id').val();
			var csrfToken = $('meta[name="csrf-token"]').attr('content');
			$.ajax({
				url : "{{ route('menu-builder.update') }}",
				type:'post',
				data : { _token : csrfToken, id : new_id, title : new_name, heading : new_heading, status : new_status},
				success:function(html){
					var result = JSON.parse(html);
					if(result.statusCode == 200){ 
						alert('Menu Type Updated Successfully!');
						window.location.href = "menu-builder";
					} 
					else {
						alert('Something went wrong please check the form!');
					}
				},
			});
		});
	});
</script>
<!-- Edit Menu Modal End -->
@endsection