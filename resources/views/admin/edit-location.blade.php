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
                            <div class="col-md-6"><h4><b>Edit Location</b></h4></div>
                            <div class="col-md-6"><a class="pull-right" href="{{route('admin.locations')}}">All Locations</a></div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (session('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                        <form action="{{route('admin.updateLocation',$location->id)}}" method="POST">
                            @method('PUT')
                            @csrf
                        
                            <div class="form-group">
                                <label class="" for="">Location Name</label>
                                    <input type="text" class="form-control" name="name" value="{{$location->name}}">
                                    @error('name')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label class="" for="">Slug</label>
                                    <input type="text" class="form-control" name="slug" value="{{$location->slug}}">
                                    @error('slug')
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