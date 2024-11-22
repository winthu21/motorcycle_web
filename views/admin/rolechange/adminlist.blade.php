@extends('admin.layouts.master')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between">
                    <div class="">
                        <a href="{{ route('adminListPage') }}"><button class="btn btn-primary">Admin List ({{ $adminCount }})</button></a>
                        <a href="{{ route('userListPage') }}"><button class="btn btn-secondary">User List ({{ $userCount }})</button></a>
                    </div>
                    <div class="">
                        <a href="{{ route('adminCreatePage') }}"><i class="fa-solid fa-plus"></i> Add Admin</a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Provider</th>
                                <th>Role</th>
                                <th>Phone</th>
                                <th>Address</th>
                                @if (auth()->user()->role == 'superadmin')
                                    <th>Change Role</th>
                                @endif
                                @if (auth()->user()->role == 'superadmin')
                                    <th>Delete Account</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>
                                        <a href="{{ route('eachProfilePage',$item->id) }}">
                                            @if ($item->name != null)
                                                {{ $item->name }}
                                            @else
                                            {{ $item->nickname }}
                                            @endif
                                        </a>
                                    </td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->provider}}</td>
                                    <td class="text-primary">{{ $item->role}}</td>
                                    <td>{{ $item->phone}}</td>
                                    <td>{{ $item->address}}</td>
                                    @if (auth()->user()->role == 'superadmin')
                                        @if (auth()->user()->id != $item->id)
                                            <td><a href="{{ route('changeToUser',$item->id) }}"><button class="btn btn-secondary">Change to User</button></a></td>
                                        @endif
                                    @endif
                                    @if (auth()->user()->role == 'superadmin')
                                        @if (auth()->user()->id != $item->id)
                                            <td class=" text-center"><a href="{{ route('deleteAccount',$item->id)}}"><button class="btn btn-danger">Delete</button></td>
                                        @endif

                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <span class="d-flex justify-content-end">{{ $data->links()}}</span>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
