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
                        <div class="container">
                            <div class="col-md-6 mt-5">
                                <form action="{{route('admin.properties')}}" method="GET">
                                    @csrf
                                        <input type="text" name="query" value="" class="form-control" placeholder="Search here...">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                        
                            <a href="{{route('admin.addProperty')}}" class="pull-right btn btn-primary">Add Property</a>
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
                            use App\Models\Property;
                        @endphp
                        @if (Property::count() < 1)
                            <p class="text-danger text-center">No Property found</p>
                        
                            @else
                           
                                <div class="table-responsive ">
                                    <table class="table table-striped table-hover table-bordered" align="center">
                                        <thead>
                                            <tr>
                                                <th class="text-center ">Image</th>
                                                <th class="text-center">Title</th>
                                                <th class="text-center">Price(&#8358)</th>
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
                                            <td class="text-center">{{number_format($property->price)}}</td>
                                            <td class="text-center">{{$property->location->name}}</td>
                                            <td class="text-center">{{$property->category->name}}</td>
                                            <td class="text-center">{{$property->property_type}}</td>
                                            <td class="text-center">{{$property->landlord_name}}</td>
                                            <td class="text-center">{{$property->agent_name}}</td>
                                            <td class="text-center text-primary">{{$property->status}}</td>
                                            <td class="text-center">
                                                <a href="{{route('admin.viewProperty',$property->slug)}}" class="ml-1"><i class="fa fa-eye fa-2x text-primary"></i></a>
                                            </td>
                                            <td>
                                                <a href="{{route('admin.editProperty',$property->id)}}" class="ml-1"><i class="fa fa-edit fa-2x text-success"></i></a>
                                            </td>
                                            <td>
                                                @if ($property->status == 'Not Bought' || $property->status == 'Not Rented')
                                                <form action="{{route('admin.confirmProperty',$property->id)}}" method="GET">
                                                    <button class="ml-1 btn btn-sm btn-success" onclick="return confirm('You are about to confirm that this property has been bought or rented')">Confirm</button>                                            
                                                    @csrf
                                                    
                                                </form>
                                                    
                                                @else
                                                <p class="text-warning">Confirmed</p>
                                                @endif                                 
                                            </td>
                                            <td>
                                                <form action="{{route('admin.deleteProperty',$property->id)}}" method="post">
                                                    <button class="ml-1" onclick="return confirm('You are about to delete this property')"><i class="fa fa-trash fa-2x text-danger"></i></button>                                            
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
                        <br>
                        {{$properties->links()}}
                        </div>
                    </div>
                </div>
            </div>
       </div>
   </div>
</div>
@endsection