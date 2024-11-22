@extends('admin.layouts.master')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Order Code</th>
                                <th>User</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($saleInfo as $item)
                                <tr>
                                    <input type="hidden" name="orderCode" class="orderCode" value="{{ $item->order_code }}">
                                    <td>{{ $item->created_at->format('j-F-y')}}</td>
                                    <td class="orderCode"><a href="{{ route('orderDetails',$item->order_code) }}">{{ $item->order_code}}</a></td>
                                    @if ($item->userName != null)
                                        <td>{{ $item->userName}}</td>
                                     @else
                                        <td>{{ $item->userNickname}}</td>
                                    @endif
                                    <td>
                                        @if ($item->status == 1)
                                            <h5 class="text-success">Accepted</h5>
                                        @elseif ($item->status == 2)
                                            <h5 class="text-danger">Rejected</h5>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            <span class=" d-flex justify-content-end">{{ $saleInfo->links() }}</span>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
