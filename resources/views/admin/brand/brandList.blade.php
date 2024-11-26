@extends('admin.layouts.master')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between">
                    <div class="">
                        <h6 class="m-0 font-weight-bold text-primary">Motorcycle Brand List</h6>
                    </div>
                    <div class="">
                        <a href="{{ route('brandCreatePage') }}"><i class="fa-solid fa-plus"></i> Add Motorcycle Brand</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class=" text-center">
                                <th>Name</th>
                                <th>Company Image</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        @foreach ($data as $item)
                            <tbody>
                                <tr class=" text-center">
                                    <td class=" align-content-around"><h4 class="text-primary">{{ $item->brand_name}}</h4></td>
                                    <td class=" align-content-around"><img src="{{ asset('/admin/brandImages/'.$item->brand_image) }}" class="img-thumbnail" style="height: 50px"></td>
                                    <td class=" align-content-around"><a href="{{ route('brandEditPage',$item->id) }}"><i class="fa-solid fa-2x fa-pen-to-square "></i></a></td>
                                    <td class=" align-content-around"><a href="{{ route('brandDelete',$item->id)}}"><i class="fa-solid fa-2x fa-trash-can text-danger text-center"></i></i></a></td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
