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
                                            <label for="q_heading" class="col-sm-4 col-form-label text-right"> Question Heading</label>
                                            <div class="col-sm-8">
                                                <input type="text" value="{{ old('q_heading') }}" name="q_heading" class="form-control @error('q_heading') is-invalid @enderror""  placeholder="Question write" >
                                                @error('q_heading')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->has('q_heading') ? $errors->first('q_heading') : ' '  }}</strong>
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
                                                    @foreach($categories as $category)
                                                        <option value="{!! $category->id !!}"> {!! $category->category_name !!} </option>
                                                    @endforeach
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
                                    <label for="heading_name" class="col-sm-2 text-right">Heading Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" value="{{ old('heading_name') }}" name="heading_name" class="form-control @error('heading_name') is-invalid @enderror">
                                        @error('heading_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->has('heading_name') ? $errors->first('heading_name') : ' '  }}</strong>
                                            </span>         
                                        @enderror 
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="status" class="col-sm-4 col-form-label text-right">Status</label>
                                    <div class="col-sm-8">
                                        <select name="status" value="{{ old('status') }}" class="form-select @error('status') is-invalid @enderror">
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
                                    <label value="{{ old('short_msg') }}" for="short_msg" class="col-sm-2  text-right"> Message</label>
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

