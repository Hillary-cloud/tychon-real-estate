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
                        <div class="col-md-6">All Slides</div>
                        <div class="col-md-6">
                            <form action="{{route('admin.slides')}}" method="GET">
                                @csrf
                                <input type="text" name="query" class="form-control" placeholder="Search here...">
                                <button type="submit" class="btn btn-default">Search</button>
                            </form>
                            <a href="{{route('admin.addSlide')}}" class="pull-right btn btn-primary">Add Slide</a>
                        </div>
                    </div>
                </div>
                    <div class="panel-body">
                        @if (session('message'))
                            <div class="alert alert-success">
                            {{ session('message') }}
                            </div>
                        @endif
                        @php
                        use App\Models\Slide;
                    @endphp
                        @if (Slide::count() < 1)
                            <p class="text-danger text-center">No Slide found</p>
                        
                            @else
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Image</th>
                                    <th>Slide Name</th>
                                    <th>Slug</th>
                                    <th>Price</th>
                                    <th>Short Description</th>
                                    <th>Property Type</th>
                                    <th>Status</th>
                                    <th>Date Created</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                            @foreach ($slides as $slide)
                            <tr>
                                <td>{{$i++}}</td>
                                <td><img src="/slide_images/{{$slide->image}}" alt="" width="100px"></td>
                                <td>{{$slide->name}}</td>
                                <td>{{$slide->slug}}</td>
                                <td>&#8358 {{number_format($slide->price)}}</td>
                                <td>{{$slide->short_description}}</td>
                                <td>{{$slide->property_type}}</td>
                                <td>{{$slide->status}}</td>
                                <td>{{$slide->created_at}}</td>
                                <td>
                                    <a href="{{route('admin.editSlide',$slide->id)}}"><i class="fa fa-edit fa-2x text-success"></i></a>
                                    <a href="{{route('admin.deleteSlide', $slide->id)}}" onclick="return confirm('You are about to delete this slide')" style="margin-left: 10px;"><i class="fa fa-trash fa-2x text-danger"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @endif
                        {{$slides->links()}}
                    </div>
                </div>
            </div>
       </div>
   </div>
</div>
@endsection