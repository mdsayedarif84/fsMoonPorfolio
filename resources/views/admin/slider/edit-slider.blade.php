@extends('admin.master')
@section('title')
    EditSlider
@endsection
@section('body')
<div class="content-wrapper ">
    <div class="container">
        <marquee><h3 class="text-danger font-weight-bolder">Welcome Back Our Edit Slide.</h3></marquee>
        <div class="card">
            @if($message   =   Session::get('message'))
                <h1 class="text-center text-primary" id="msg">{{ $message }}</h1>
            @endif
            <div class="card-body">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-danger font-weight-bolder"> Add Slider
                            <a href="{{route('manage.slider')}}" class="btn btn-danger btn-sm float-right">
                                <i class="far fa-hand-point-right"> </i>Manage Slider</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('update.slider')}}" method="POST" id="editSliderForm" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="heading" class="col-sm-4 col-md-4 text-primary font-weight-bolder text-md-end">Heading</label>
                                        <div class="col-sm-8">
                                        <input type="text" name="heading" value="{{ $slider->heading}}" class="form-control form-control-user" placeholder="Heading"/>
                                            <span class="text-danger">{{ $errors->has('heading') ? $errors->first('heading') : ' ' }}</span>
                                        </div>
                                    </div>
                                </div> 
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                    <label for="link" class="col-sm-4 col-md-4 text-primary font-weight-bolder text-md-end">Link</label>
                                        <div class="col-sm-8">
                                        <input type="text" name="link" value="{{ $slider->link}}" class="form-control form-control-user" placeholder="Link"/>
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
                                            <input type="text" name="link_name" value="{{ $slider->link_name}}" class="form-control form-control-user" placeholder="Link name"/>
                                            <span class="text-danger">{{ $errors->has('link_name') ? $errors->first('link_name') : ' ' }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <div class="form-group row">
                                        <label for="status" class="col-sm-4 col-md-4 text-primary font-weight-bolder text-md-end">Status</label>
                                        <div class="col-sm-8">
                                            <select name="status" value="{{ old('status') }}" class="form-select @error('status') is-invalid @enderror" >
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
                                <textarea name="description" class="form-control text-success font-weight-bolder" placeholder="Description">{{ $slider->description}}</textarea>
                                <span class="text-danger">{{ $errors->has('description') ? $errors->first('description') : ' ' }}</span>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <div class="form-group row">
                                    <div class="col-sm-8">
                                            <input name="slider_id" type="hidden" value="{{ $slider->id}}"  class="form-control @error('slider_id') is-invalid @enderror"   autocomplete="slider"/>
                                            <span class="text-danger">{{ $errors->has('slider_id') ? $errors->first('slider_id') : ' ' }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <div class="form-group row">
                                    <label for="image" class="col-sm-4 col-md-4 text-success font-weight-bolder text-md-end">{{ __('Image') }}</label>
                                        <div class="col-sm-8">
                                            <input name="image" type="file" value="{{ old('image') }}"  class="form-control @error('image') is-invalid @enderror">
                                            <span class="text-danger">{{ $errors->has('image') ? $errors->first('image') : ' ' }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <div class="form-group row">
                                        <img src="{{asset($slider->image)}}" width='100px'; height="100px" alt="not showing">
                                    </div>
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
<script>
    document.forms['editSliderForm'].elements['status'].value = '{!! $slider->status !!}';
</script>
@endsection
