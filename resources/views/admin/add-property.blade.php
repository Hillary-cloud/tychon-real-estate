<base href="/public">
@extends('layouts.base')
@section('content')
<div class="container" style="padding: 18% 0;">
    <div class="row">
        <div class="col-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6"><h4><b>Add Property</b></h4></div>
                        <div class="col-md-6"><a class="pull-right" href="{{route('admin.properties')}}">All Properties</a></div>
                    </div>
                </div><hr class="text-dark">
                <div class="panel-body">
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <form action="{{route('admin.storeProperty')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="container">
                            <div class="row">
                                <div class="col-6">

                                    <div class="form-group">
                                        <label class="" for="">Title</label>
                                            <input type="text" class="form-control" name="title" placeholder="Enter Title">
                                            @error('title')
                                                <p class="text-danger">{{$message}}</p>
                                            @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="" for="">Slug</label>
                                            <input type="text" class="form-control" name="slug" placeholder="Enter Slug">
                                            @error('slug')
                                                <p class="text-danger">{{$message}}</p>
                                            @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="" for="">Description</label>
                                            <textarea name="description" id="" cols="30" class="form-control" rows="1" placeholder="Enter Description"></textarea>
                                            @error('description')
                                                <p class="text-danger">{{$message}}</p>
                                            @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="" for="">Location</label>
                                            <select name="location_id" class="form-control" id="">
                                                <option value="">--Select Location--</option>
                                                @foreach ($locations as $location)
                                                    <option value="{{$location->id}}">{{ucfirst($location->name)}}</option>
                                                @endforeach
                                            </select>
                                            @error('location_id')
                                                <p class="text-danger">{{$message}}</p>
                                            @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="" for="">Address</label>
                                            <input type="text" class="form-control" name="address" placeholder="Enter Address">
                                            @error('address')
                                                <p class="text-danger">{{$message}}</p>
                                            @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="" for="">Price</label>
                                            <input type="number" class="form-control" name="price" placeholder="Enter Price">
                                            @error('price')
                                                <p class="text-danger">{{$message}}</p>
                                            @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="" for="">Category</label>
                                        <select name="category_id" class="form-control" id="">
                                            <option value="">--Select Category--</option>
                                            @foreach ($categories as $category)
                                                <option value="{{$category->id}}">{{ucfirst($category->name)}}</option>
                                            @endforeach
                                        </select>
                                            @error('category_id')
                                                <p class="text-danger">{{$message}}</p>
                                            @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="" for="">Property type</label>
                                            <select name="property_type" class="form-control" id="">
                                                <option value="">--Select Property Type--</option>
                                                <option value="sale">Sale</option>
                                                <option value="rent">Rent</option>
                                            </select>
                                            @error('property_type')
                                                <p class="text-danger">{{$message}}</p>
                                            @enderror
                                    </div>

                                </div>
                                <div class="col-6">

                                    <div class="form-group">
                                        <label class="" for="">Landlord's Name(Optional)</label>
                                            <input type="text" class="form-control" name="landlord_name" placeholder="Enter landlord's Name">
                                    </div>

                                    <div class="form-group">
                                        <label class="" for="">Landlord's Number(Optional)</label>
                                            <input type="text" class="form-control" name="landlord_phone" placeholder="Enter landlord's Number">
                                    </div>

                                    <div class="form-group">
                                        <label class="" for="">Agent's Name(Optional)</label>
                                            <input type="text" class="form-control" name="agent_name" placeholder="Enter Agent's Name">
                                    </div>

                                    <div class="form-group">
                                        <label class="" for="">Agent's Number(Optional)</label>
                                            <input type="text" class="form-control" name="agent_phone" placeholder="Enter Agent's Number">
                                    </div>

                                    <div class="form-group">
                                        <label class="" for="">Property Status</label>
                                            <select name="status" class="form-control" id="">
                                                <option value="">--Select Property Status--</option>
                                                <option value="instock">Instock</option>
                                                <option value="outofstock">Outofstock</option>
                                            </select>
                                            @error('status')
                                                <p class="text-danger">{{$message}}</p>
                                            @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="" for="">Choose Main Image</label>
                                            <input type="file" class="form-control" accept="image/*" name="main_image">
                                        
                                        @error('main_image')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="" for="">Choose Sub-images</label>
                                            <input type="file" name="images[]" class="form-control" accept="image/*" multiple>
                                    </div>

                                    <button class="btn btn-success mt-4 pull-right">Add Property</button>

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