<base href="/public">
@extends('layouts.base')
@section('content')
<div class="container" style="padding: 18% 0;">
    <div class="row">
        <div class="col-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6"><h4><b>Add Slide</b></h4></div>
                        <div class="col-md-6"><a class="pull-right" href="{{route('admin.slides')}}">All Slides</a></div>
                    </div>
                </div>
                <div class="panel-body">
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <form action="{{route('admin.storeSlide')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                    
                        <div class="form-group">
                            <label class="" for="">Slide Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Slide Name">
                                @error('name')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label class="" for="">Slug</label>
                                <input type="text" class="form-control" name="slug" placeholder="Slug">
                                @error('slug')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label class="" for="">Price</label>
                                <input type="number" class="form-control" name="price" placeholder="Price">
                                @error('price')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label class="" for="">Short Description</label>
                                <input type="text" class="form-control" name="short_description" placeholder="Short Description">
                                @error('short_description')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                        </div>
                        
                        <div class="form-group">
                            <label class="" for="">Property Type</label>
                                <select name="property_type" class="form-control" id="">
                                    <option value="">--Select Property Type--</option>
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
                            
                            @error('image')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="" for="">Status</label>
                                <select name="status" class="form-control" id="">
                                    <option value="">--Select status--</option>
                                    <option value="Active">Active</option>
                                    <option value="In-active">In-active</option>
                                </select>
                                @error('status')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                        </div>
                        <button class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection