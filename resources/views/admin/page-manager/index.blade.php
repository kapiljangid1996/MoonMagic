@extends('layouts.admin')

@section('title', 'Page Manager')

@section('content')
<div class="page-header">
    <div class="page-title">
        <h3>Page Manager</h3>
        <div class="crumbs">
            <ul id="breadcrumbs" class="breadcrumb">
                <li> <a href="{{ url('/admin') }}"> <i class="flaticon-home-fill"></i> </a> </li>
                <li class="active"> <a href="#">Page Manager</a> </li>
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
                        <h4>Page Manager</h4> 
                        <a class="btn btn-primary btn-rounded btn-sm mb-4 ml-3" href="{{route('page-manager.create')}}">Add New Page</a>
                    </div>
                </div>
            </div>

            <div class="widget-content widget-content-area">
                <div class="table-responsive mb-4">
                    <table id="customer-info-detail-2" class="table style-2 table-bordered  table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">Record Id</th>
                                <th class="text-center">Title</th>
                                <th class="text-center">Publish</th>
                                <th class="text-center">Date Created</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $index = 0; foreach ( $pages as $page ){ $index++; ?>
                                <tr>
                                    <td class="text-center"><?php echo $index; ?></td> 

                                    <td class="text-center">{{ $page->title }}</td>

                                    @if($page->publish == 1)
                                        <td class="align-center"><span class="shadow-none badge badge-success">Published</span></td>
                                    @else
                                        <td class="align-center"><span class="shadow-none badge badge-danger">Not Published</span></td>
                                    @endif

                                    <td class="text-center">{{ $page->created_at }}</td>

                                    <td class="text-center">
                                        <a href="{{route('page-manager.edit', $page->id)}}" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="flaticon-edit-4 fs-20"></i></a>

                                        <a href="{{url('/admin/page-manager/delete/'.$page->id)}}" class="bs-tooltip ml-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" onclick="return confirm('Are you sure you want to delete')"><i class="flaticon-close-fill fs-20"></i></a>
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