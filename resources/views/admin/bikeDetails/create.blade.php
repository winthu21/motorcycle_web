@extends('admin.layouts.master')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="">
                    <div class="">
                        <h6 class="m-0 font-weight-bold text-primary">Add Motorcycle Details</h6>
                    </div>
                </div>
            </div>
            <div class="mt-3">
                <form action="{{ route('bikeDetailsCreate') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4 p-3">
                            <div class="mx-2">
                                <label class="form-label">Image</label>
                                <img class="img-thumbnail" id="output" src="" alt="">
                                <input type="file" class="form-control @error('bike_image') is-invalid @enderror" name="bike_image[]" onchange="loadFile(event)" multiple>
                                @error('bike_image')
                                    <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>

                        </div>
                        <div class="col-lg">
                            <div class="row">
                                <div class="col-lg-8 mb-3">
                                    <label class="form-label">Motorcycle Name</label>
                                    <input type="text" class="form-control @error('bike_name') is-invalid @enderror"
                                        name="bike_name" value="{{ old('bike_name') }}" placeholder="Motorcycle bike_name">
                                    @error('bike_name')
                                        <small class=" invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-8 mb-3">
                                    <label class="form-label">Company</label>
                                    <select name="brand_id" class="form-control  @error('brand_id') is-invalid @enderror">
                                        <option value="">Choose Company...</option>
                                        @foreach ($company as $item)
                                            <option value="{{ $item->id }}" @if (old('brand_id') == $item->id) selected @endif>{{ $item->brand_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('brand_id')
                                        <small class=" invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-8 mb-3">
                                    <label class="form-label">Motorcycle Category</label>
                                    <select name="category_id" class="form-control  @error('category_id') is-invalid @enderror">
                                        <option value="">Choose Category...</option>
                                        @foreach ($category as $item)
                                            <option value="{{ $item->id }}" @if (old('category_id') == $item->id) selected @endif>{{ $item->category_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <small class=" invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-lg-4 mb-3 ">
                                    <label  class="form-label">Motrocycle Code Name</label>
                                    <input type="text" class="form-control @error('bike_code_name') is-invalid @enderror" name="bike_code_name" value="{{ old('bike_code_name') }}" placeholder="Motorcycle Code">
                                    @error('bike_code_name')
                                        <small class=" invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-lg-4 mb-3 mx-2">
                                    <label  class="form-label">Chassis Number</label>
                                    <input type="text" class="form-control @error('chassis') is-invalid @enderror" name="chassis" value="{{ old('chassis') }}" placeholder="Product chassis">
                                    @error('chassis')
                                        <small class=" invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-lg-4 mb-3 ">
                                    <label  class="form-label">Production Year</label>
                                    <div>
                                        <select name="model_year" class="form-control @error('model_year') is-invalid @enderror">
                                            <option value="">Year from</option>
                                            @for ($i = 1950; $i <= 2025; $i++)
                                                <option value="{{ $i }}" @if (old('model_year') == $i) selected @endif>{{ $i }}</option>
                                            @endfor
                                        </select>
                                        @error('model_year')
                                            <small class=" invalid-feedback">{{ $message }}</small>
                                        @enderror

                                        <select name="model_year_to" class="form-control @error('model_year_to')
                                            is-invalid
                                        @enderror">
                                            <option value="">Year to</option>
                                            @for ($j = 1950; $j <= 2025; $j++)
                                                <option value="{{ $j }}" @if (old('model_year_to') == $j) selected @endif>{{ $j }}</option>
                                            @endfor
                                            <option value="present" @if (old('model_year_from') == 'present')
                                                selected
                                            @endif>Present</option>
                                        </select>
                                        @error('model_year_to')
                                            <small class=" invalid-feedback">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-lg-4 mb-3 ">
                                    <label  class="form-label">Engine Power (cc)</label>
                                    <input type="text" class="form-control @error('engine_power') is-invalid @enderror" name="engine_power" value="{{ old('engine_power') }}" placeholder="Engine Power (cc)">
                                    @error('engine_power')
                                        <small class=" invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-lg-4 mb-3 mx-2">
                                    <label  class="form-label">HP & Torque</label>
                                    <input type="text" class="form-control @error('hp_torque') is-invalid @enderror" name="hp_torque" value="{{ old('hp_torque') }}" placeholder="Product hp_torque">
                                    @error('hp_torque')
                                        <small class=" invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-lg-4 mb-3 ">
                                    <label  class="form-label">Front Brake System</label>
                                    <input type="text" class="form-control @error('front_brake') is-invalid @enderror" name="front_brake" value="{{ old('front_brake') }}" placeholder="Front Brake System">
                                    @error('front_brake')
                                        <small class=" invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-lg-4 mb-3 mx-2">
                                    <label  class="form-label">Rear Brake</label>
                                    <input type="text" class="form-control @error('rear_brake') is-invalid @enderror" name="rear_brake" value="{{ old('rear_brake') }}" placeholder="Rear Brake">
                                    @error('rear_brake')
                                        <small class=" invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-lg-4 mb-3 ">
                                    <label  class="form-label">Fuel System</label>
                                    <input type="text" class="form-control @error('fuel_system') is-invalid @enderror" name="fuel_system" value="{{ old('fuel_system') }}" placeholder="Fuel System">
                                    @error('fuel_system')
                                        <small class=" invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-lg-4 mb-3 mx-2">
                                    <label  class="form-label">Wheel Sizes</label>
                                    <input type="text" class="form-control @error('wheel_size') is-invalid @enderror" name="wheel_size" value="{{ old('wheel_size') }}" placeholder="Wheel Sizes">
                                    @error('wheel_size')
                                        <small class=" invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-lg-4 mb-3 ">
                                    <label  class="form-label">Front Suspension</label>
                                    <input type="text" class="form-control @error('suspension_front') is-invalid @enderror" name="suspension_front" value="{{ old('suspension_front') }}" placeholder="Front suspension">
                                    @error('suspension_front')
                                        <small class=" invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-lg-4 mb-3 mx-2">
                                    <label  class="form-label">Rear Suspension</label>
                                    <input type="text" class="form-control @error('suspension_rear') is-invalid @enderror" name="suspension_rear" value="{{ old('suspension_rear') }}" placeholder="Rear Suspension">
                                    @error('suspension_rear')
                                        <small class=" invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-lg-4 mb-3 ">
                                    <label  class="form-label">Drive Type</label>
                                    <input type="text" class="form-control @error('chain_type') is-invalid @enderror" name="chain_type" value="{{ old('chain_type') }}" placeholder="Drive Type">
                                    @error('chain_type')
                                        <small class=" invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-lg-4 mb-3 mx-2">
                                    <label  class="form-label">Swing Arm</label>
                                    <input type="text" class="form-control @error('swing_arm') is-invalid @enderror" name="swing_arm" value="{{ old('swing_arm') }}" placeholder="Swing Arm">
                                    @error('swing_arm')
                                        <small class=" invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-lg-4 mb-3 ">
                                    <label  class="form-label">Display Type</label>
                                    <input type="text" class="form-control @error('display') is-invalid @enderror" name="display" value="{{ old('display') }}" placeholder="Display Type">
                                    @error('display')
                                        <small class=" invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-lg-4 mb-3 mx-2">
                                    <label  class="form-label">Headlight</label>
                                    <input type="text" class="form-control @error('headlight') is-invalid @enderror" name="headlight" value="{{ old('headlight') }}" placeholder="Headlight">
                                    @error('headlight')
                                        <small class=" invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-lg-4 mb-3 ">
                                    <label  class="form-label">Frame Type</label>
                                    <input type="text" class="form-control @error('frame') is-invalid @enderror" name="frame" value="{{ old('frame') }}" placeholder="Frame Type">
                                    @error('frame')
                                        <small class=" invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-lg-4 mb-3 mx-2">
                                    <label  class="form-label">Weight</label>
                                    <input type="text" class="form-control @error('weight') is-invalid @enderror" name="weight" value="{{ old('weight') }}" placeholder="Weight">
                                    @error('weight')
                                        <small class=" invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-lg-4 mb-3 ">
                                    <label  class="form-label">Starter</label>
                                    <input type="text" class="form-control @error('starter') is-invalid @enderror" name="starter" value="{{ old('starter') }}" placeholder="Starter">
                                    @error('starter')
                                        <small class=" invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-lg-4 mb-3 mx-2">
                                    <label  class="form-label">Top Speed</label>
                                    <input type="text" class="form-control @error('speed') is-invalid @enderror" name="speed" value="{{ old('speed') }}" placeholder="Top Speed">
                                    @error('speed')
                                        <small class=" invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col-lg">
                                    <input type="submit" value="Create" class="btn btn-primary p-2">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
