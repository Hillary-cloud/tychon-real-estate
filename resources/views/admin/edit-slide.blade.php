<base href="/public">
@extends('layouts.base')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="container" style="margin-top: 120px">
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
                                <label class="" for="">Price</label>
                                    <input type="number" class="form-control" name="price" value="{{$slide->price}}">
                                    @error('price')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label class="" for="">Short Description</label>
                                    <input type="text" class="form-control" value="{{$slide->short_description}}" name="short_description">
                                    @error('short_description')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label class="" for="">Property Type</label>
                                <select name="property_type" class="form-control" id="">
                                    <option value="{{$slide->property_type}}">{{$slide->property_type}}</option>
                                    <option value="Buy">Buy</option>
                                    <option value="Rent">Rent</option>
                                </select>
                                    @error('property_type')
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
</div>
@endsection