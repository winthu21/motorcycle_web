@extends('admin.layouts.master')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4 col-5">
            <div class="card-header py-3">
                <div class="">
                    <div class="">
                        <h6 class="m-0 font-weight-bold text-primary">Create Motorcyle Brand</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('brandCreate') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Motorcyle Brand Name</label>
                        <input type="text" class="form-control @error('brand_name') is-invalid @enderror" name="brand_name" value="{{ old('brand_name') }}" placeholder="Motorcycle Brand Name">
                        @error('brand_name')
                            <small class=" invalid-feedback">{{$message}}</small>
                        @enderror

                        <label for="exampleFormControlInput1" class="form-label">Motorcyle Brand Image</label>
                        <img src="" class="img-thumbnail" alt="" id="output">
                        <input type="file" class="form-control @error('brand_image')
                            is-invalid
                        @enderror" name="brand_image" onchange="loadFile(event)">
                        @error('brand_image')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <input type="submit" value="Create" class="btn btn-primary">
                </form>

            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
