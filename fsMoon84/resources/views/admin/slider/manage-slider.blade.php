@extends('admin.master')
@section('title')
    ManageSlider
@endsection
@section('body')
<div class="content-wrapper ">
    <div class="container">
        <div class="card">
            @if($message   =   Session::get('message'))
                <h1 class="text-center text-primary" id="msg">{{ $message }}</h1>
            @endif
            <div class="card-body">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-danger text-bold">  Manage User
                            <a href="{{route('add.slider')}}" class="btn btn-danger btn-sm float-right">
                                <i class="far fa-hand-point-right"> </i>Add User</a>
                        </h4>
                    </div>
                    <div class="container">
                        <div class="card-body">
                            <table class="table table-hover table-striped table-responsive" id="example1">
                                <thead>
                                    <tr class="text-center" >
                                        <th style="width: 20px;">SL No</th>
                                        <th style="width: 100px;"> Heading</th>
                                        <th style="width: 150px;">Link</th>
                                        <th style="width: 50px;">Link Name</th>
                                        <th style="width: 100px;">Description</th>
                                        <th style="width: 50px;">Status</th>
                                        <th style="width: 50px;">Image</th>
                                        <th style="width: 150px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i=1)
                                    @foreach($sliders as $slider)
                                        <tr class="text-center">
                                            <td>{{ $i++}}</td>
                                            <td>{{ $slider->heading}}</td>
                                            <td>{{ $slider->link}}</td>
                                            <td>{{ $slider->link_name}}</td>
                                            <td>{{ $slider->description}}</td>
                                            <td>{{ $slider->status}}</td>
                                            <td>
                                                <img src="{{asset($slider->image)}}" width='100px'; height="50px" alt="not showing">
                                            </td>
                                            <td class="table-action">
                                                @if($slider->status == 1)
                                                    <a class="btn btn-success text-light btn-sm"
                                                    href=""
                                                    title="Active">
                                                        <span class=" fas fa-arrow-up fa-sm"></span>
                                                    </a>
                                                @else
                                                    <a class="btn btn-warning btn-sm"
                                                    href="
                                                    title="Inactive">
                                                        <span class=" fas fa-arrow-down fa-sm"></span>
                                                    </a>
                                                @endif
                                                <a class="btn  btn-sm"
                                                href=""
                                                title="Edit">
                                                    <em class="fas fa-edit"></em>
                                                </a>
                                                <a class="btn  btn-sm"
                                                href=""
                                                onclick="return confirm('Are you sure to delete this ??')"
                                                title="Delete">
                                                    <em class="fas fa-trash-alt"></em>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

