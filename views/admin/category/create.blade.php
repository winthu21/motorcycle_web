@extends('admin.layouts.master')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4 col-5">
            <div class="card-header py-3">
                <div class="">
                    <div class="">
                        <h6 class="m-0 font-weight-bold text-primary">Add Motorcycle Category</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('categoryCreate') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Category Name</label>
                        <input type="text" class="form-control @error('category_name') is-invalid @enderror" name="category_name" value="{{ old('category_name') }}" placeholder="Category Name">
                        @error('category_name')
                            <small class=" invalid-feedback">{{$message}}</small>
                        @enderror

                        <label for="exampleFormControlInput1" class="form-label">Category Image</label>
                        <img src="" class="img-thumbnail w-25 rounded-circle" alt="" id="output">
                        <input type="file" name="category_image" class="form-control @error('category_image')
                            is-invalid
                        @enderror" onchange="loadFile(event)" id="">
                        @error('category_image')
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
