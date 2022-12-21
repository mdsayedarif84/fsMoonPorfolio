@extends('admin.master')
@section('title')
    Service
@endsection
@section('body')
<div class="content-wrapper ">
    <div class="container">
        <marquee><h3 class="text-danger font-weight-bolder">Welcome Back Our Add About Page.</h3></marquee>
        <div class="card">
            @if($message   =   Session::get('message'))
                <h1 class="text-center text-primary" id="msg">{{ $message }}</h1>
            @endif
            <div class="card-body">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-danger text-bold"> Add Service
                            <a href="{{route('manage.about')}}" class="btn btn-danger btn-sm float-right">
                                <i class="far fa-hand-point-right"> </i>Manage Service</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('new.about')}}" method="POST" class="form-horizontal" >
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3">
                                        <div class="form-group row">
                                            <label for="title" class="col-sm-4 col-form-label text-right">Headding Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" value="{{ old('title') }}" name="title" class="form-control @error('title') is-invalid @enderror""  placeholder="Enter About Name" >
                                                @error('title')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->has('title') ? $errors->first('title') : ' '  }}</strong>
                                                    </span>         
                                                @enderror 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <div class="form-group row">
                                            <label for="category_id" class="col-sm-4 col-form-label text-right">Category name</label>
                                            <div class="col-sm-8">
                                                <select name="category_id" value="{{ old('category_id') }}" class="form-select @error('category_id') is-invalid @enderror" >
                                                    <option disabled selected>Select Option</option>
                                                        <option value="">  </option>
                                                </select>
                                                @error('category_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->has('category_id') ? $errors->first('category_id') : ' '  }}</strong>
                                                    </span>         
                                                @enderror 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="about_us" class="col-sm-2 text-right">About Us</label>
                                    <div class="col-sm-10">
                                        <textarea type="text" value="{{ old('about_us') }}" name="about_us" class="form-control @error('about_us') is-invalid @enderror"></textarea>
                                        @error('about_us')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->has('about_us') ? $errors->first('about_us') : ' '  }}</strong>
                                            </span>         
                                        @enderror 
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="status" class="col-sm-4 col-form-label text-right">Status</label>
                                    <div class="col-sm-8">
                                        <select value="{{ old('status') }}" class="form-select @error('status') is-invalid @enderror" name="status">
                                            <option  disabled selected >Select Option</option>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                        @error('status')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->has('status') ? $errors->first('status') : ' '  }}</strong>
                                            </span>
                                        @enderror 
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label value="{{ old('short_msg') }}" for="short_msg" class="col-sm-2  text-right">Short Message Us</label>
                                    <div class="col-sm-10">
                                        <textarea type="text" name="short_msg" class="form-control @error('short_msg') is-invalid @enderror" ></textarea>
                                        @error('short_msg')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->has('short_msg') ? $errors->first('short_msg') : ' '  }}</strong>
                                            </span>         
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" :disabled="form.busy" class="btn btn-outline-success offset-sm-4">Save Data</button>
                                <button type="reset" class="btn btn-outline-danger ">Reset</button>
                            </div>
                            <!-- /.card-footer -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

