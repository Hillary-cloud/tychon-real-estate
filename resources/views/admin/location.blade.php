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
                        <div class="col-md-6">All Locations</div>
                        <div class="col-md-6">
                            <form action="{{route('admin.locations')}}" method="GET">
                                @csrf
                                <input type="text" name="query" class="form-control" placeholder="Search here...">
                                <button type="submit" class="btn btn-default">Search</button>
                            </form>
                            <a href="{{route('admin.addLocation')}}" class="pull-right btn btn-primary">Add Location</a>
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
                        use App\Models\Location;
                    @endphp
                        @if (Location::count() < 1)
                            <p class="text-danger text-center">No Location found</p>
                        
                            @else
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Location Name</th>
                                    <th>Slug</th>
                                    <th>Date Created</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                            @foreach ($locations as $location)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$location->name}}</td>
                                <td>{{$location->slug}}</td>
                                <td>{{$location->created_at}}</td>
                                <td>
                                    <a href="{{route('admin.editLocation',$location->id)}}"><i class="fa fa-edit fa-1x text-success"></i></a>
                                    <a href="{{route('admin.deleteLocation', $location->id)}}" onclick="return confirm('You are about to delete this location')" style="margin-left: 10px;"><i class="fa fa-trash fa-1x text-danger"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @endif
                        {{$locations->links()}}
                    </div>
                </div>
            </div>
       </div>
   </div>
</div>
@endsection