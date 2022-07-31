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
   <div class="container">
       <div class="row">
           <div class="col-md-12">
               <div class="container" style="margin-top: 120px">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">All Price Ranges</div>
                            <div class="col-md-6">
                                <a href="{{route('admin.addPriceRange')}}" class="pull-right btn btn-primary">Add Price Range</a>
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
                            use App\Models\PriceRange;
                            @endphp
                            @if (PriceRange::count() < 1)
                                <p class="text-danger text-center">No Price Range found</p>
                            
                                @else
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Price Range (&#8358)</th>
                                        <th>Date Created</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                @foreach ($price_ranges as $price_range)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$price_range->price_range}}</td>
                                    <td>{{$price_range->created_at}}</td>
                                    <td>
                                        <a href="{{route('admin.editPriceRange',$price_range->id)}}"><i class="fa fa-edit fa-2x text-success"></i></a>
                                    </td>
                                    <td>
                                        <a href="{{route('admin.deletePriceRange', $price_range->id)}}" onclick="return confirm('You are about to delete this price range')" style="margin-left: 10px;"><i class="fa fa-trash fa-2x text-danger"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            @endif
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection