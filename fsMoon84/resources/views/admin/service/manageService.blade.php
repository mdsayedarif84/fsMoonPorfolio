@extends('admin.master')
@section('title')
    ManageAbout
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
                        <h4 class="text-danger text-bold">  Manage About
                            <a href="{{route('category')}}" class="btn btn-danger btn-sm float-right">
                                <i class="far fa-hand-point-right"> </i>Add About</a>
                        </h4>
                    </div>
                    <div class="container">
                        <div class="card-body">
                            <table class="table table-hover table-striped table-responsive" id="example1">
                                <thead>
                                    <tr class="text-center" >
                                        <th style="width: 100px;">No</th>
                                        <th style="width: 200px;">Headding name</th>
                                        <th style="width: 100px;">CategoryId</th>
                                        <th style="width: 100px;">Status</th>
                                        <th style="width: 200px;">ShortMsg</th>
                                        <th style="width: 100px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i=1)
                                    @foreach($abouts as $about)
                                        <tr class="text-center">
                                            <td>{{$i++}}</td>
                                            <td>{{$about->title}}</td>
                                            <td>{{$about->category_id}}</td>
                                            <td>{{$about->status == 1 ? 'Active':'Inactive'}}</td>
                                            <td>{{$about->short_msg}}</td>
                                            <td class="table-action">
                                                @if($about->status == 1)
                                                    <a class="btn btn-success text-light btn-sm"
                                                    href="{{ route('inactive.about', ['id'=>$about->id]) }}"
                                                    title="Active">
                                                        <span class=" fas fa-arrow-up fa-sm"></span>
                                                    </a>
                                                @else
                                                    <a class="btn btn-warning btn-sm"
                                                    href="{{ route('active.about', ['id'=>$about->id]) }}"
                                                    title="Inactive">
                                                        <span class=" fas fa-arrow-down fa-sm"></span>
                                                    </a>
                                                @endif
                                                <a class="btn  btn-sm"
                                                href="{{ route('edit.about', ['id'=>$about->id]) }}"
                                                title="Edit">
                                                    <em class="fas fa-edit"></em>
                                                </a>
                                                <a class="btn  btn-sm"
                                                href="{{ route('delete.about', ['id'=>$about->id]) }}"
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

