<base href="/public">
@extends('layouts.base')
@section('content')
<div class="container" style="padding: 18% 0;">
    <div class="row">
        <div class="col-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6"><h4><b>Edit Slide</b></h4></div>
                        <div class="col-md-6"><a class="pull-right" href="{{route('admin.slides')}}">All Slides</a></div>
                    </div>
                </div>
                <div class="panel-body">
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <form action="{{route('admin.updateSlide',$slide->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label class="" for="">Slide Name</label>
                                <input type="text" class="form-control" value="{{$slide->name}}" name="name" >
                                @error('name')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label class="" for="">Slug</label>
                                <input type="text" class="form-control" value="{{$slide->slug}} " name="slug">
                                @error('slug')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label class="" for="">Choose Slide Image</label>
                                <input type="file" class="form-control" accept="image/*" name="image">
                                <img src="/slide_images/{{$slide->image}}" width="25%" class="mt-2" alt="">
                            
                            @error('image')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="" for="">Status</label>
                                <select name="status" class="form-control" id="">
                                    <option value="{{$slide->status}}">{{$slide->status}}</option>
                                    <option value="Active">Active</option>
                                    <option value="In-active">In-active</option>
                                </select>
                                @error('status')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                        </div>
                        <button class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection