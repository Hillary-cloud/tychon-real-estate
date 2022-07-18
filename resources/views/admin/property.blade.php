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
                        <div class="col-md-6">All Properties</div>
                        <div class="col-md-6">
                            <form action="{{route('admin.properties')}}" method="GET">
                                @csrf
                                <input type="text" name="query" value="" class="form-control" placeholder="Search here...">
                                <button type="submit" class="btn btn-default">Search</button>
                            </form>
                            <a href="{{route('admin.addProperty')}}" class="pull-right btn btn-primary">Add Property</a>
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
                            use App\Models\Property;
                        @endphp
                        @if (Property::count() < 1)
                            <p class="text-danger text-center">No Property found</p>
                        
                            @else
                        <div class="table-responsive ">
                            <table class="table table-striped table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center ">Image</th>
                                        <th class="text-center">Title</th>
                                        <th class="text-center">Price</th>
                                        <th class="text-center">Location</th>
                                        <th class="text-center">Category</th>
                                        <th class="text-center">Property Type</th>
                                        <th class="text-center">Landlord</th>
                                        <th class="text-center">Agent</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">View</th>
                                        <th class="text-center">Edit</th>
                                        <th class="text-center">Action</th>
                                        <th class="text-center">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                @foreach ($properties as $property)
                                <tr>
                                    <td class="text-center"><img src="/property_main_images/{{$property->main_image}}" width="50px" class="img-responsive" alt=""></td>
                                    <td class="text-center">{{$property->title}}</td>
                                    <td class="text-center">{{$property->price}}</td>
                                    <td class="text-center">{{$property->location->name}}</td>
                                    <td class="text-center">{{$property->category->name}}</td>
                                    <td class="text-center">{{$property->property_type}}</td>
                                    <td class="text-center">{{$property->landlord_name}}</td>
                                    <td class="text-center">{{$property->agent_name}}</td>
                                    <td class="text-center">{{$property->status}}</td>
                                    <td class="text-center">
                                        <a href="{{route('admin.viewProperty',$property->slug)}}" class="ml-1"><i class="fa fa-eye fa-1x text-primary"></i></a>
                                    </td>
                                    <td>
                                        <a href="{{route('admin.editProperty',$property->id)}}" class="ml-1"><i class="fa fa-edit fa-1x text-success"></i></a>
                                    </td>
                                    <td>
                                        <form action="" method="post">
                                            <button class="ml-1 btn btn-success btn-sm" onclick="return confirm('You are about to confirm that this property has been sold or rented')">Confirm</button>                                            
                                            @csrf
                                            @method('delete')
                                            
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{route('admin.deleteProperty',$property->id)}}" method="post">
                                            <button class="ml-1" onclick="return confirm('You are about to delete this property')"><i class="fa fa-trash fa-1x text-danger"></i></button>                                            
                                            @csrf
                                            @method('delete')
                                            
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>    
                        
                        @endif
                        {{$properties->links()}}
                    </div>
                </div>
            </div>
       </div>
   </div>
</div>

@endsection