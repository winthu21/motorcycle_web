@extends('admin.layouts.master')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between">
                    <div class="">
                        <h6 class="m-0 font-weight-bold text-primary">Motorcyle Category List</h6>
                    </div>
                    <div class="">
                        <a href="{{ route('categoryCreatePage') }}"><i class="fa-solid fa-plus"></i> Add Category</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class=" text-center">
                                <th>Category Name</th>
                                <th>Category Image</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        @foreach ($data as $item)
                        <tbody>
                            <tr class=" text-center">
                                <td class=" align-content-around"><h5 class="text-danger">{{ $item->category_name}}</h5></td>
                                <td class=" align-content-around"><img src="{{ asset('/admin/categoryImages/'.$item->category_image) }}" class="img-thumbnail rounded-circle" style="height: 50px" alt=""></td>
                                <td class=" align-content-around"><a href="{{ route('categoryUpdatePage',$item->id) }}"><i class="fa-solid fa-2x fa-pen-to-square "></i></a></td>
                                <td class=" align-content-around"><a href="{{ route ('categoryDelete',$item->id) }}"><i class="fa-solid fa-2x fa-trash-can text-danger text-center"></i></i></a></td>
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
