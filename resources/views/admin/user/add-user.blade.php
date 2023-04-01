
@extends('admin.master')
@section('title')
    User
@endsection
@section('body')
<style>
    .showPassword {
        position: relative;
    }
    .showPassword i{
        position: absolute;
        margin-left: 600px;
        bottom: 12px;
        cursor: pointer;
    }
</style>
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
                                    <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror"  value="{{ old('name') }}" >
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
                                    <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" >
                                    <span class="text-danger" id="res"></span>
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
                                    <select id="author_name" name="author_name" value="{{ old('author_name') }}" class="form-select @error('author_name') is-invalid @enderror">
                                        <option disabled selected id="choseOption" > Select Type</option>
                                        <option value="admin">Admin</option>
                                        <option value="user">User</option>
                                    </select>
                                    @error('author_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="status" class="col-md-4 col-form-label text-md-end">{{ __('Status') }}</label>
                                <div class="col-md-8">
                                    <select name="status" id="status" value="{{ old('status') }}" class="form-select @error('status') is-invalid @enderror" >
                                        <option disabled selected id="choseOption"> Select Option</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                                <div class="col-md-8 showPassword">
                                    <input id="password" name="password" type="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror" >
                                    <i class="fas fa-eye-slash text-danger " id="togglePassword"></i>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password_confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                                <div class="col-md-8">
                                    <input id="password_confirm" name="password_confirmation" type="password" class="form-control @error('password') is-invalid @enderror" autocomplete="current-password">
                                    <span class="text-danger" id="match"></span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="designation" class="col-md-4 col-form-label text-md-end">{{ __('Designation') }}</label>
                                <div class="col-md-8">
                                    <input id="designation" type="text" name="designation" value="{{ old('designation') }}"  class="form-control @error('designation') is-invalid @enderror">
                                    @error('designation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="district" class="col-md-4 col-form-label text-md-end">{{ __('District') }}</label>
                                <div class="col-md-8">
                                    <input id="district" name="district" type="text" value="{{ old('district') }}" class="form-control @error('district') is-invalid @enderror" >
                                    @error('district')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="phone_number" class="col-md-4 col-form-label text-md-end">{{ __('Phone Number') }}</label>
                                <div class="col-md-8">
                                    <input id="phone_number" name="phone_number" value="{{ old('phone_number') }}" type="number" class="form-control @error('phone_number') is-invalid @enderror"  >
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
                                    <input id="image" name="image" type="file" value="{{ old('image') }}" class="form-control @error('image') is-invalid @enderror"  >
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
                                    <button id="regBtn"  type="submit" class="btn btn-primary">
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
<!-- <script type="text/javascript">
    $('#password_confirm').keyup(function(){
        var pwd    =   $('#password').val();
        var cpwd   =   $('#password_confirm').val();
        if(cpwd != pwd){
            $('#match').html('Password is not matching');
            $('#match').css('color','red');
            return false;
        }else if(cpwd == pwd){
            $('#match').html('Password is  matching');
            $('#match').css('color','green');
            return true;
    });
</script> -->
<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');
    togglePassword.addEventListener('click', function (e) {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        $("#togglePassword").toggleClass("fa-eye");
    });
</script>
<script>
    var email           =   document.getElementById('email');
    email.onblur        =   function (){
        var email       =   document.getElementById('email').value;
        var xmlHttp     =   new XMLHttpRequest();
        var serverPage  =   "http://127.0.0.1:8000/email-check/"+email;
        xmlHttp.open('GET', serverPage);
        xmlHttp.onreadystatechange  =   function (){
            if (xmlHttp.readyState == 4 && xmlHttp.status  ==  200){
                document.getElementById('res').innerHTML   =   xmlHttp.responseText;
                if (xmlHttp.responseText == 'This Email Already exist.Try new email'){
                    document.getElementById('regBtn').disabled  =    true;
                }else {
                    document.getElementById('regBtn').disabled  =    false;
                }
            }
        }
        xmlHttp.send(null);
    }
</script>
@endsection
