<base href="/public">
@extends('layouts.base')
@section('content')
 <!--/ Intro Single star /-->

 <section class="intro-single">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-8">
        <div class="title-single-box">
          <h1 class="title-single">{{ucfirst($property->title)}}</h1>
        </div>
      </div>
      <div class="col-md-12 col-lg-4">
        <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="{{route('/')}}">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              {{$property->category->name}}
          </li>
            <li class="breadcrumb-item active" aria-current="page">
                {{$property->title}}
            </li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</section>
<!--/ Intro Single End /-->

<!--/ Property Single Star /-->
<section class="property-single nav-arrow-b">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
          <div class="mb-5">
            <div class="container">
              <div class="carousel-item-c " id="main" style="background-image: url(property_main_images/{{$property->main_image}})">
              </div>
            </div>
            
          </div>
        <div class="row justify-content-between">
          <div class="col-md-5 col-lg-4">
            <div class="property-price d-flex justify-content-center foo">
              <div class="card-header-c d-flex">
                <div class="card-box-ico">
                  <span class="ion-money">&#8358</span>
                </div>
                <div class="card-title-c align-self-center">
                  <h5 class="title-c">{{number_format($property->price)}}</h5>
                </div>
              </div>
            </div>
            <div class="property-summary">
              <div class="row">
                <div class="col-sm-12">
                  <div class="title-box-d section-t4">
                    <h3 class="title-d">Quick Summary</h3>
                  </div>
                </div>
              </div>
              <div class="summary-list">
                <ul class="list">
            
                  <li class="d-flex justify-content-between">
                    <strong>Category:</strong>
                    <span>{{$property->category->name}}</span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <strong>Location:</strong>
                    <span>{{$property->location->name}}</span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <strong>Property Type:</strong>
                    <span>{{$property->property_type}}</span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <strong>Status:</strong>
                    <span>{{$property->status}}</span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-7 col-lg-7 section-md-t3">
            <div class="row">
              <div class="col-sm-12">
                <div class="title-box-d">
                  <h3 class="title-d">Property Description</h3>
                </div>
              </div>
            </div>
            <div class="property-description">
              <p class="description color-text-a">
                {{ucfirst($property->description)}}
              </p>
              <h3 class="mt-5"><strong>More Photos</strong></h3>
               <!--/ Carousel Star /-->
              <div class="intro intro-carousel">
                <div id="carousel" class="owl-carousel owl-theme">

                @foreach ($images as $image)
                        
                  <div class="carousel-item-c intro-item bg-image" width="100%" style="background-image: url(property_sub_images/{{$image->image}})">
                  </div>
                @endforeach
                </div>
              </div>
<!--/ Carousel end /-->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/ Property Single End /-->

@endsection