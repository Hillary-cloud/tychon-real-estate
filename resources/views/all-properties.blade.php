@extends('layouts.base')
@section('content')
     <!--/ Intro Single star /-->
     <style>
      nav svg{
          height: 20px;
      }
      nav .hidden{
          display: block !important;
      }
    </style>
  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">Our Amazing Properties</h1>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="#">Home</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Properties
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!--/ Intro Single End /-->

  <!--/ Property Grid Star /-->
  <section class="property-grid grid">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="grip-option pull-right" >
            <li class="nav-item dropdown" style="list-style: none">
              <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> Sort By</a>
              <ul class="dropdown-menu">
                 <li class="text-center"><a href="{{URL::current()}}">All Properties</a></li><hr class="text-dark">
                 <li class="text-center"><a href="{{URL::current().'?sort=price_asc'}}">Price - Low To High</a></li><hr class="text-dark">
                 <li class="text-center"><a href="{{URL::current().'?sort=price_desc'}}">Price - High To Low</a></li><hr class="text-dark">
              </ul>
            </li>
          </div>
        </div>
        @foreach ($properties as $property)
        <div class="col-md-4">
          <div class="card-box-a card-shadow">
            <div class="img-box-a">
              <img src="property_main_images/{{$property->main_image}}" alt="" class="img-a img-fluid">
            </div>
            <div class="card-overlay">
              <div class="card-overlay-a-content">
                <div class="card-header-a">
                  <h2 class="card-title-a">
                    <a href="{{route('property-detail',$property->slug)}}">{{ucfirst($property->title)}}
                      <br /> <h5 class="text-light">{{ucfirst($property->location->name)}}</h5></a>
                  </h2>
                </div>
                <div class="card-body-a">
                  <div class="price-box d-flex">
                    <span class="price-a">{{$property->property_type}} | &#8358 {{number_format($property->price)}}</span>
                  </div>
                  <a href="{{route('property-detail',$property->slug)}}" class="link-a">Click here to view
                    <span class="ion-ios-arrow-forward"></span>
                  </a>
                </div>
                <div class="card-footer-a">
                  <ul class="card-info d-flex justify-content-around">
                    <li>
                      <h4 class="card-info-title">Category</h4>
                      <span>{{ucfirst($property->category->name)}}</span>
                    </li>  
                    <li>
                      <h4 class="card-info-title">Location</h4>
                      <span>{{ucfirst($property->location->name)}}</span>
                    </li>  
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      {{$properties->links()}}

    </div>
  </section>
  <!--/ Property Grid End /-->
@endsection