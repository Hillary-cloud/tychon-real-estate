<base href="/public">
@extends('layouts.base')
@section('content')
<div class="container" style="padding: 18% 0;">
    <div class="row">
        <div class="col-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6"><h4><b>Add Price Range</b></h4></div>
                        <div class="col-md-6"><a class="pull-right" href="{{route('admin.priceRange')}}">All Price Range</a></div>
                    </div>
                </div>
                <div class="panel-body ">
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <form action="{{route('admin.storePriceRange')}}" method="POST" >
                        @csrf
                    
                        <div class="form-group ">
                            <label class="" for="">Price Range</label>
                                <input type="text" class="form-control" name="price_range" placeholder="Enter Price Range">
                                @error('price_range')
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