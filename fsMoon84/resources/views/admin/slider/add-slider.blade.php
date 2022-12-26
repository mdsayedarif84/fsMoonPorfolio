@extends('admin.master')
@section('title')
    AddSlider
@endsection
@section('body')
<div class="content-wrapper ">
    <div class="container">
        <marquee><h3 class="text-danger font-weight-bolder">Welcome Back Our Add Slide.</h3></marquee>
        <div class="card">
            @if($message   =   Session::get('message'))
                <h1 class="text-center text-primary" id="msg">{{ $message }}</h1>
            @endif
            <div class="card-body">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-danger font-weight-bolder"> Add Slider
                            <a href="" class="btn btn-danger btn-sm float-right">
                                <i class="far fa-hand-point-right"> </i>Manage Slider</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="heading" class="col-sm-4 col-md-4 text-primary font-weight-bolder text-md-end">Heading</label>
                                        <div class="col-sm-8">
                                        <input type="text" name="heading" class="form-control form-control-user" placeholder="Heading"/>
                                            <span class="text-danger">{{ $errors->has('category_id') ? $errors->first('category_id') : ' ' }}</span>
                                        </div>
                                    </div>
                                </div> 
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                    <label for="link" class="col-sm-4 col-md-4 text-primary font-weight-bolder text-md-end">Link</label>
                                        <div class="col-sm-8">
                                        <input type="text" name="link" class="form-control form-control-user" placeholder="Link"/>
                                            <span class="text-danger">{{ $errors->has('link') ? $errors->first('link') : ' ' }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <div class="form-group row">
                                        <label for="link_name" class="col-sm-4 col-md-4 text-primary font-weight-bolder text-md-end">Link Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="link_name" class="form-control form-control-user" placeholder="Link name"/>
                                            <span class="text-danger">{{ $errors->has('link_name') ? $errors->first('link_name') : ' ' }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <div class="form-group row">
                                        <label for="status" class="col-sm-4 col-md-4 text-primary font-weight-bolder text-md-end">Status</label>
                                        <div class="col-sm-8">
                                            <select class="form-select @error('status') is-invalid @enderror" name="status">
                                                <option  disabled selected >Select Option</option>
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                            <span class="text-danger">{{ $errors->has('status') ? $errors->first('status') : ' ' }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea name="description" class="form-control text-success font-weight-bolder" placeholder="Description"></textarea>
                                <span class="text-danger">{{ $errors->has('description') ? $errors->first('description') : ' ' }}</span>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <div class="form-group row"></div>
                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <div class="form-group row">
                                    <label for="image" class="col-sm-4 col-md-4 text-success font-weight-bolder text-md-end">{{ __('Image') }}</label>
                                        <div class="col-sm-8">
                                            <input type="file"  class="form-control @error('image') is-invalid @enderror" name="image" required autocomplete="image"/>
                                            <span class="text-danger">{{ $errors->has('image') ? $errors->first('image') : ' ' }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <div class="form-group row"></div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <div class="col-sm-4"></div>
                                <div class="col-sm-4">
                                    <button type="submit" class="btn btn-outline-danger btn-block font-weight-bolder">
                                        <i class="fas fa-save" aria-hidden="true"></i> Save Slider Image
                                    </button>
                                </div>
                                <div class="col-sm-4"></div>
                            </div>
                            </hr>
                        </form>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
