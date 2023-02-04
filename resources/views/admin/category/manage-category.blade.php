@extends('admin.master')
@section('title')
    AddCategory
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
                        <h4 class="text-danger text-bold">  Manage Category
                            <a href="{{route('category')}}" class="btn btn-danger btn-sm float-right">
                                <i class="far fa-hand-point-right"> </i>Add Category</a>
                        </h4>
                    </div>
                    <div class="container">
                        <div class="card-body">
                            <table class="table table-hover table-striped table-responsive" id="example1">
                                <thead>
                                    <tr class="text-center" >
                                        <th style="width: 100px;">No</th>
                                        <th style="width: 300px;">Category name</th>
                                        <th style="width: 300px;">Status</th>
                                        <th style="width: 200px;">Created date</th>
                                        <th style="width: 200px;">Updated date</th>
                                        <th style="width: 100px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i=1)
                                    @foreach($categories as $category)
                                        <tr class="text-center">
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $category->category_name }}</td>
                                            <td>{{ $category->status == 1 ? 'Active':'Inactive'}}</td>
                                            <td>{{ $category->created_at}}</td>
                                            <td>{{ $category->updated_at}}</td>
                                            <td class="table-action">
                                                @if($category->status == 1)
                                                    <a class="btn btn-success text-light btn-sm"
                                                    href="{{ route('unpublished.cat',['id'=>$category->id]) }}"
                                                    title="Active">
                                                        <span class=" fas fa-arrow-up fa-sm"></span>
                                                    </a>
                                                @else
                                                    <a class="btn btn-warning btn-sm"
                                                    href="{{ route('published.cat',['id'=>$category->id]) }}"
                                                    title="Inactive">
                                                        <span class=" fas fa-arrow-down fa-sm"></span>
                                                    </a>
                                                @endif
                                                <a class="btn  btn-sm"
                                                href="{{ route('edit.category', ['id'=>$category->id]) }}"
                                                title="Edit">
                                                    <em class="fas fa-edit"></em>
                                                </a>
                                                <a class="btn  btn-sm"
                                                href="{{ route('delete.category', ['id'=>$category->id]) }}"
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

