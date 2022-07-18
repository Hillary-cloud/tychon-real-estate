<base href="/public">
@extends('layouts.base')
@section('content')
<div class="container" style="padding: 18% 0;">
    <div class="row">
        <div class="col-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6"><h4><b>Edit Property</b></h4></div>
                        <div class="col-md-6"><a class="pull-right" href="{{route('admin.properties')}}">All Properties</a></div>
                    </div>
                </div><hr class="text-dark">
                <div class="panel-body">
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="container">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="" for=""><h3><strong>Main image</strong></h3></label>
            
                                        <img src="/property_main_images/{{$property->main_image}}" alt="" style="display: block" width="50%" class="mt-2 img-responsive">
                                        {{-- <form action="{{route('admin.deleteMainImage',$property->id)}}" method="POST"  >
                                            <button class="btn btn-danger btn-sm mt-1">Delete</button>
                                            @csrf
                                            @method('delete')
                                        </form> --}}
                                </div>
                                <hr class="text-dark">

                                <div class="form-group">
                                    <label class="" for=""><h3><strong>Sub-images</strong></h3></label><br>
        
                                        @foreach ($images as $image)
                                            <img src="/property_sub_images/{{$image->image}}" width="50%" class="img-responsive mt-2" alt="">
                                            <form action="{{route('admin.deleteSubImage',$image->id)}}" method="POST"  >
                                                <button class="btn btn-danger btn-sm mt-1">Delete</button>
                                                @csrf
                                                @method('delete')
                                            </form>
                                        @endforeach
                                </div>
                            </div>
                    <form action="{{route('admin.updateProperty',$property->id)}}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                            <div class="container">
                                <div class="row">
                                    <div class="col-6">

                                        <div class="form-group">
                                            <label class="" for="">Title</label>
                                                <input type="text" class="form-control" name="title" value="{{$property->title}}">
                                                @error('title')
                                                    <p class="text-danger">{{$message}}</p>
                                                @enderror
                                        </div>
    
                                        <div class="form-group">
                                            <label class="" for="">Slug</label>
                                                <input type="text" class="form-control" name="slug" value="{{$property->slug}}">
                                                @error('slug')
                                                    <p class="text-danger">{{$message}}</p>
                                                @enderror
                                        </div>
    
                                        <div class="form-group">
                                            <label class="" for="">Description</label>
                                                <textarea name="description" id="" cols="30" class="form-control" rows="1">{{$property->description}}</textarea>
                                                @error('description')
                                                    <p class="text-danger">{{$message}}</p>
                                                @enderror
                                        </div>
    
                                        <div class="form-group">
                                            <label class="" for="">Location</label>
                                                <select name="location_id"  class="form-control" id="">
                                                    <option value="{{$property->location_id}}">{{ucfirst($property->location->name)}}</option>
                                                    @foreach ($locations as $location)
                                                        <option value="{{$location->id}}">{{ucfirst($location->name)}}</option>
                                                    @endforeach
                                                </select>
                                                @error('location_id')
                                                    <p class="text-danger">{{$message}}</p>
                                                @enderror
                                        </div>
    
                                        <div class="form-group">
                                            <label class="" for="">Address(Optional)</label>
                                                <input type="text" class="form-control" name="address" value="{{$property->address}}">
                                        </div>
    
                                        <div class="form-group">
                                            <label class="" for="">Price</label>
                                                <input type="number" class="form-control" name="price" value="{{$property->price}}">
                                                @error('price')
                                                    <p class="text-danger">{{$message}}</p>
                                                @enderror
                                        </div>
    
                                        <div class="form-group">
                                            <label class="" for="">Category</label>
                                            <select name="category_id" class="form-control" id="">
                                                <option value="{{$property->category_id}}">{{ucfirst($property->category->name)}}</option>
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
                                                    <option value="{{$property->property_type}}">{{$property->property_type}}</option>
                                                    <option value="Buy">Buy</option>
                                                    <option value="Rent">Rent</option>
                                                </select>
                                                @error('property_type')
                                                    <p class="text-danger">{{$message}}</p>
                                                @enderror
                                        </div>
    
                                    </div>
                                    <div class="col-6">
    
                                        <div class="form-group">
                                            <label class="" for="">Landlord's Name(Optional)</label>
                                                <input type="text" class="form-control" name="landlord_name" value="{{$property->landlord_name}}">
                                        </div>
    
                                        <div class="form-group">
                                            <label class="" for="">Landlord's Number(Optional)</label>
                                                <input type="text" class="form-control" name="landlord_phone" value="{{$property->landlord_phone}}">
                                        </div>
    
                                        <div class="form-group">
                                            <label class="" for="">Agent's Name(Optional)</label>
                                                <input type="text" class="form-control" name="agent_name" value="{{$property->agent_name}}">
                                        </div>
    
                                        <div class="form-group">
                                            <label class="" for="">Agent's Number(Optional)</label>
                                                <input type="text" class="form-control" name="agent_phone" value="{{$property->agent_phone}}">
                                        </div>
    
                                        <div class="form-group">
                                            <label class="" for="">Property Status</label>
                                                <input type="text" class="form-control" name="status" value="{{$property->status}}" readonly>
                                        </div>
    
                                        <div class="form-group">
                                            <label class="" for="">Choose Main Image</label>
                                                <input type="file" value="property_main_images/{{$property->main_image}}" class="form-control" accept="image/*" name="main_image">
                                         
                                        </div>
    
                                        <div class="form-group">
                                            <label class="" for="">Choose Sub-images</label>
                                                <input type="file" name="images[]" class="form-control" accept="image/*" multiple>
                                        </div>
    
                                        <button class="btn btn-success mt-4 pull-right">Update Property</button>
    
                                    </div>
                                </div>
                            </div>
                                
                            
                        
                    </form>
                </div>
            </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection