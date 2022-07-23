<base href="/public">
@extends('layouts.base')
@section('content')
 <!--/ Intro Single star /-->

 <section class="intro-single">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-8">
        <div class="title-single-box">
          <h1 class="title-single">{{$property->title}}</h1>
          <span class="color-text-a">{{$property->address}}</span>
        </div>
      </div>
      <div class="col-md-12 col-lg-4">
        <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="{{route('/')}}">Home</a>
            </li>
            <li class="breadcrumb-item">
              <a href="{{route('admin.properties')}}">Properties</a>
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
                    <strong>Property ID:</strong>
                    <span>{{$property->id}}</span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <strong>Slug:</strong>
                    <span>{{$property->slug}}</span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <strong>Category:</strong>
                    <span>{{$property->category->name}}</span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <strong>Location:</strong>
                    <span>{{$property->location->name}}</span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <strong>Address:</strong>
                    <span>{{$property->address}}</span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <strong>Property Type:</strong>
                    <span>{{$property->property_type}}</span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <strong>Status:</strong>
                    <span>{{$property->status}}</span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <strong>Landlord:</strong>
                    <span>{{$property->landlord_name}}</span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <strong>Landlord Number:</strong>
                    <span>{{$property->landlord_phone}}</span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <strong>Agent:</strong>
                    <span>{{$property->agent_name}}</span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <strong>Agent Number:</strong>
                    <span>{{$property->agent_phone}}</span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <strong>Date Created:</strong>
                    <span>{{$property->created_at}}</span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <strong>Date Updated:</strong>
                    <span>{{$property->updated_at}}</span>
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
              @foreach ($images as $image)
              <img src="/property_sub_images/{{$image->image}}" width="200px" alt="">
             @endforeach
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-10 offset-md-1">
        <ul class="nav nav-pills-a nav-pills mb-3 section-t3" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="pills-video-tab" data-toggle="pill" href="#pills-video" role="tab"
              aria-controls="pills-video" aria-selected="true">Video</a>
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-video" role="tabpanel" aria-labelledby="pills-video-tab">
            <iframe src="https://player.vimeo.com/video/73221098" width="100%" height="460" frameborder="0"
              webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/ Property Single End /-->

@endsection