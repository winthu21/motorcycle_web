@extends('admin.layouts.master')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between">
                    <div class="">
                        <h6 class="m-0 font-weight-bold text-primary">Bike List</h6>
                    </div>
                    <div class="">
                        <a href="{{ route('bikeDetailsCreatePage') }}"><i class="fa-solid fa-plus"></i> Add Bike</a>
                    </div>
                </div>
                <div class="col-lg-8 input-group mb-3">
                    <form action="" method="get">
                        @csrf
                        <div class="row">
                            <div class="col-lg">
                                <input type="text" name="searchKey" class="form-control" value="{{ request('searchKey') }}" placeholder="Search Products...">
                            </div>

                            <div class="col-lg-2">
                                <button type="submit" class="form-control btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </div>
                        </div>
                    </form>
                  </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Bike Name</th>
                                <td>Bike Image</td>
                                <th>Company</th>
                                <th>Type</th>
                                <th>Engine Power</th>
                                <th>Detail</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->bike_name}}</td>

                                    <td>
                                        @if (count($item->bike_image) > 0)
                                            <img class="" style="height: 100px" src="{{ asset('/admin/bikeImages/'.$item->bike_name.'/'.$item->bike_image[0]) }}">
                                        @endif
                                        {{-- @foreach ($item->bike_image as $img)
                                            <img class="" style="height: 100px" src="{{ asset('/admin/bikeImages/'.$item->bike_name.'/'.$img) }}">
                                        @endforeach --}}
                                    </td>
                                    <td>{{ $item->brand_name}}</td>
                                    <td>{{ $item->category_name }}</td>
                                    <td>{{ $item->engine_power}}</td>
                                    <td><a href="{{ route('bikeDetailsPage',$item->id) }}"><i class="fa-solid fa-circle-info"></i></a></td>
                                    <td><a href=""><i class="fa-solid fa-pen-to-square"></i></a></td>
                                    <td><a href=""><i class="fa-solid fa-trash"></i></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- <span class=" d-flex justify-content-end">{{ $data->links() }}</span> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
