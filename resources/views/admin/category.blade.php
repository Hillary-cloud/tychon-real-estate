<base href="/public">
@extends('layouts.base')
@section('content')
<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
    </style>
   <div class="container" style="padding: 18% 0;">
       <div class="row">
           <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">All Categories</div>
                        <div class="container">
                            <div class="col-md-6 mt-5">
                                <form action="{{route('admin.categories')}}" method="GET">
                                    @csrf
                                    <input type="text" name="query" class="form-control" placeholder="Search here...">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-search"></i></button>
                                </form>
                                </div>
                                <div class="container">
                                    <a href="{{route('admin.addCategory')}}" class="pull-right btn btn-primary">Add Category</a>
                                </div>
                                
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="panel-body">
                        @if (session('message'))
                            <div class="alert alert-success">
                            {{ session('message') }}
                            </div>
                        @endif
                        @php
                            use App\Models\Category;
                        @endphp
                        @if (Category::count() < 1)
                            <p class="text-danger text-center">No Category found</p>
                        
                            @else
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Name</th>
                                    <th>Slug</th>
                                    <th>Date Created</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->slug}}</td>
                                <td>{{$category->created_at}}</td>
                                <td>
                                    <a href="{{route('admin.editCategory',$category->id)}}"><i class="fa fa-edit fa-2x text-success"></i></a>
                                </td>
                                <td>
                                    <a href="{{route('admin.deleteCategory', $category->id)}}" onclick="return confirm('You are about to delete this category')" style="margin-left: 10px;"><i class="fa fa-trash fa-2x text-danger"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @endif
                        {{$categories->links()}}
                    </div>
                </div>
                </div>
            </div>
       </div>
   </div>
</div>

@endsection