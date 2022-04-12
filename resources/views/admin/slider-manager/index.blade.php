@extends('layouts.admin')

@section('title', 'Slider Manager')

@section('content')
<div class="page-header">
    <div class="page-title">
        <h3>Slider Manager</h3>
        <div class="crumbs">
            <ul id="breadcrumbs" class="breadcrumb">
                <li> <a href="{{ url('/admin') }}"> <i class="flaticon-home-fill"></i> </a> </li>
                <li class="active"> <a href="#">Slider Manager</a> </li>
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
                        <h4>Slider Manager</h4> 
                        <a class="btn btn-primary btn-rounded btn-sm mb-4 ml-3" href="{{route('sliders.create')}}">Add New Slide</a>
                    </div>
                </div>
            </div>

            <div class="widget-content widget-content-area">
                <div class="table-responsive mb-4">
                    <table id="customer-info-detail-2" class="table style-2 table-bordered  table-hover">
                        <thead>
                            <tr>
                                <th class="text-center"> Record Id </th>
                                <th>Title</th>
                                <th class="text-center">Image</th>
                                <th>Sort Order</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $index = 0; foreach ( $sliders as $slider ){ $index++; ?>
                                <tr>
                                    <td class="text-center"><?php echo $index; ?></td> 

                                    <td>{{ $slider->title }}</td>

                                    @if(!empty($slider->image))
                                        <td class="align-center">
                                            <span><img src="{{asset('Uploads/Slider/').'/'.$slider->image}}" class="img-thumbnail rounded-circle" alt="profile"></span>
                                        </td>
                                    @else
                                        <td>No Image Found</td>
                                    @endif

                                    <td>{{ $slider->sort_order }}</td>

                                    @if($slider->status == 1)
                                        <td class="align-center"><span class="shadow-none badge badge-success">Published</span></td>
                                    @else
                                        <td class="align-center"><span class="shadow-none badge badge-danger">Not Published</span></td>
                                    @endif

                                    <td class="text-center">
                                        <a href="{{route('sliders.edit', $slider->id)}}" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="flaticon-edit-4 fs-20"></i></a>

                                        <a href="{{url('/admin/sliders/delete/'.$slider->id)}}" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" onclick="return confirm('Are you sure you want to delete')"><i class="flaticon-close-fill fs-20"></i></a>
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