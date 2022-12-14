@extends('admin.master')
@section('title')
    AddCategory
@endsection
@section('body')
<div class="content-wrapper ">
    <div class="container">
        <marquee><h3 class="text-danger font-weight-bolder">Welcome Back Our Add Category Page.</h3></marquee>
        <div class="card">
            @if($message   =   Session::get('message'))
                <h1 class="text-center text-primary" id="msg">{{ $message }}</h1>
            @endif
            <div class="card-body">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-danger text-bold"> Add Category
                            <a href="{{route('manage.category')}}" class="btn btn-danger btn-sm float-right">
                                <i class="far fa-hand-point-right"> </i>Manage Category</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('new.category')}}" method="POST" class="form-horizontal" >
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="category_name" class="col-sm-4 col-form-label text-right">Category Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" value="{{ old('category_name') }}" name="category_name" class="form-control @error('category_name') is-invalid @enderror" id="name" placeholder="Enter Category Name">
                                        @error('category_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->has('category_name') ? $errors->first('category_name') : ' '  }}</strong>
                                            </span>
                                        @enderror                                          </div>
                                </div>
                                <div class="form-group row">
                                    <label for="status" class="col-sm-4 col-form-label text-right">status</label>
                                    <div class="col-sm-8">
                                        <select class="form-control @error('status') is-invalid @enderror" name="status">
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

