@extends('admin.layouts.master')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Admin Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Total Sale Amount</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"> MMK</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="#">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Users</div>
                                <div class="h5 mb-0 font-weight-bold text-grey-800"></div>
                            </div>
                            <div class="col-auto">
                                <i class="fa-solid fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="#">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Products Sold
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-success-800"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fa-solid fa-list-check fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="#">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Pending Requests</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>

        </div>

        <!-- Product Category -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="#">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Product Categories</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                            </div>
                            <div class="col-auto">
                                <i class="fa-solid fa-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Products -->

        <div class="col-xl-3 col-md-6 mb-4">
            <a href="#">
                <div class="card border-left-secondary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                    Products</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                            </div>
                            <div class="col-auto">
                                <i class="fa-solid fa-bowl-food fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

    </div>

    {{-- Table --}}
    <div class="row">
        <!-- Admin Table -->
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <a href="#">
                    <div class="card-header py-3">
                        <h5>Admin Lists ()</h5>
                    </div>
                </a>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Profile</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            {{-- <tbody>
                                @foreach ($adminList as $item)
                                    <tr>
                                        <td>
                                            @if ($item->name != null)
                                                {{ $item->name }}
                                            @else
                                                {{ $item->nickname }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->profile == null)
                                                <img style="height: 50px" class="img-thumbnail rounded-circle" src="{{ asset('admin/defaultphoto/default.jpg')}}" alt="">
                                            @else
                                                <img style="height: 50px" class="img-thumbnail rounded-circle" src="{{ asset('admin/profile_photo/'.$item->profile) }}" alt="">
                                            @endif
                                        </td>
                                        <td>{{ $item->email }}</td>
                                    </tr>
                                @endforeach
                            </tbody> --}}

                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- User Table -->
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <a href="#">
                    <div class="card-header py-3">
                        <h5>User Lists ()</h5>
                    </div>
                </a>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Profile</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            {{-- <tbody>
                                @foreach ($userList as $item)
                                    <tr>
                                        <td>
                                            @if ($item->name != null)
                                                {{ $item->name }}
                                            @else
                                                {{ $item->nickname }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->profile == null)
                                                <img style="height: 50px" class="img-thumbnail rounded-circle" src="{{ asset('admin/defaultphoto/default.jpg')}}" alt="">
                                            @else
                                                <img style="height: 50px" class="img-thumbnail rounded-circle" src="{{ asset('user/profile_photo/'.$item->profile) }}" alt="">
                                            @endif
                                        </td>
                                        <td>{{ $item->email }}</td>
                                    </tr>
                                @endforeach
                            </tbody> --}}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

@endsection
