@extends('admin.master')
@section('title')
    User
@endsection
@section('body')
<div class="content-wrapper">
    <div class="container">
        <div class="card">
            @if($message   =   Session::get('message'))
                <h1 class="text-center text-primary" id="msg">{{ $message }}</h1>
            @endif
            <div class="card-body">
                <div class="card-header">
                    <h4 class="text-danger text-bold"> Add User
                        <a href="{{route('manage.user')}}" class="btn btn-danger btn-sm float-right">
                            <i class="far fa-hand-point-right"> </i>Manage User</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('new.user') }}" enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                                <div class="col-md-8">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                                <div class="col-md-8">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="author_name" class="col-md-4 col-form-label text-md-end">{{ __('Auth Type') }}</label>
                                <div class="col-md-8">
                                    <select class="form-select @error('author_name') is-invalid @enderror" id="author_name" name="author_name">
                                        <option disabled selected id="choseOption" required> Select Type</option>
                                        <option value="admin">Admin</option>
                                        <option value="user">User</option>
                                    </select>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="status" class="col-md-4 col-form-label text-md-end">{{ __('Status') }}</label>
                                <div class="col-md-8">
                                    <select name="status" id="status" class="form-select @error('author_name') is-invalid @enderror" >
                                        <option disabled selected id="choseOption" required> Select Option</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                                <div class="col-md-8">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                                <div class="col-md-8">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="designation" class="col-md-4 col-form-label text-md-end">{{ __('Designation') }}</label>
                                <div class="col-md-8">
                                    <input id="designation" type="text" class="form-control @error('designation') is-invalid @enderror" name="designation" required autocomplete="designation">
                                    @error('designation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="phone_number" class="col-md-4 col-form-label text-md-end">{{ __('Phone Number') }}</label>
                                <div class="col-md-8">
                                    <input id="phone_number" type="number" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" required autocomplete="phone_number">
                                    @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Image') }}</label>
                                <div class="col-md-8">
                                    <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" required autocomplete="image">
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
