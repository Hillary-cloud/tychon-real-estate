@extends('layouts.base')
@section('content')

<style>
  nav svg{
      height: 20px;
  }
  nav .hidden{
      display: block !important;
  }
</style>
 <!--/ Carousel Star /-->
 <div class="intro intro-carousel">
  <div id="carousel" class="owl-carousel owl-theme">

   @foreach ($slides as $slide)
    <div class="carousel-item-a intro-item bg-image"  id="slide1" style="background-image: url(slide_images/{{$slide->image}})">
      <div class="overlay overlay-a">
 
      </div>
      <div class="intro-content display-table">
        <div class="table-cell">
          <div class="container">
            <div class="row">
              <div class="col-lg-8">
                <div class="intro-body">
                 
                  <h1 class="intro-title mb-2">
                    <span class="color-b">{{ucfirst($slide->name)}} </span>
                  </h1>

                    <br><h2 class="text-light">{{ucfirst($slide->short_description)}}</h2>
                  <p class="intro-subtitle intro-price">
                    <a href="#"><span class="price-a">{{$slide->property_type}} | &#8358 {{number_format($slide->price)}}</span></a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
   @endforeach
  </div>
</div>
<!--/ Carousel end /-->

<div class="container" style=" display: flex; margin-top: 3%; align-items: center; flex-direction: column;" >
  <h2 class="title-a">Search Properties</h2>
  <div class="grid-option">
    <form action="{{route('all-properties')}}" method="GET">
      @csrf
      <select name="property_type" class="custom-select m-1">
        <option selected>Property Type</option>
        <option value="Rent"> Rent</option>
        <option value="Buy"> Buy</option>
      </select>
      <select name="location" class="custom-select m-1">
        <option selected>Location</option>
        @foreach ($locations as $location)
          <option value="{{$location->id}}">{{ucfirst($location->name)}}</option>
        @endforeach 
      </select>
      <select name="price_range" class="custom-select m-1">
        <option selected>Price Range(&#8358)</option>
        @foreach ($price_ranges as $price_range)
        <option value="{{$price_range->id}}">{{$price_range->price_range}}</option>
        @endforeach
      </select>
      <select name="category" class="custom-select m-1">
        <option selected>Category</option>
        @foreach ($categories as $category)
            <option value="{{$category->id}}">{{ucfirst($category->name)}}</option>
        @endforeach
      </select>
      <button class="btn btn-success m-1">Find Property</button>
    </form>
  </div>
</div>

<!--/ Services Star /-->
<section class="section-services section-t8">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="title-wrap d-flex justify-content-between">
          <div class="title-box">
            <h2 class="title-a">Our Services</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="card-box-c foo">
          <div class="card-header-c d-flex">
            <div class="card-box-ico">
              <span class="fa fa-gamepad"></span>
            </div>
            <div class="card-title-c align-self-center">
              <h2 class="title-c">Lifestyle</h2>
            </div>
          </div>
          <div class="card-body-c">
            <p class="content-c">
              Sed porttitor lectus nibh. Cras ultricies ligula sed magna dictum porta. Praesent sapien massa,
              convallis a pellentesque
              nec, egestas non nisi.
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card-box-c foo">
          <div class="card-header-c d-flex">
            <div class="card-box-ico">
              <span class="fa fa-usd"></span>
            </div>
            <div class="card-title-c align-self-center">
              <h2 class="title-c">Loans</h2>
            </div>
          </div>
          <div class="card-body-c">
            <p class="content-c">
              Nulla porttitor accumsan tincidunt. Curabitur aliquet quam id dui posuere blandit. Mauris blandit
              aliquet elit, eget tincidunt
              nibh pulvinar a.
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card-box-c foo">
          <div class="card-header-c d-flex">
            <div class="card-box-ico">
              <span class="fa fa-home"></span>
            </div>
            <div class="card-title-c align-self-center">
              <h2 class="title-c">Sell</h2>
            </div>
          </div>
          <div class="card-body-c">
            <p class="content-c">
              Sed porttitor lectus nibh. Cras ultricies ligula sed magna dictum porta. Praesent sapien massa,
              convallis a pellentesque
              nec, egestas non nisi.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/ Services End /-->



{{-- <section class="property-grid grid mt-4">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="title-box">
          <h2 class="title-a">Our Amazing Properties</h2>
        </div>
       
      </div>
      @foreach ($properties as $property)
      <div class="col-md-4">
        <div class="card-box-b card-shadow ">
          <div class="img-box-a">
            <img src="property_main_images/{{$property->main_image}}" alt="" class="img-a img-fluid">
          </div>
          <div class="card-overlay">
            <div class="card-overlay-a-content">
              <div class="card-header-a">
                <h2 class="card-title-a">
                  <a href="{{route('property-detail',$property->slug)}}">{{ucfirst($property->title)}}
                  
                    <h5 class="text-light">{{ucfirst($property->category->name)}}</h5>
                  <h6 class="text-light">{{ucfirst($property->location->name)}}</h6></a>
                </h2>
              </div>
              <div class="card-body-a">
                <div class="price-box d-flex">
                  <span class="price-a">{{$property->property_type}} | $ {{$property->price}}</span>
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
  
</section> --}}

<!--/ Property Star /-->
<section class="section-property section-t8">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="title-wrap d-flex justify-content-between">
          <div class="title-box">
            <h2 class="title-a">Featured Properties</h2>
          </div>
          <div class="title-link mt-3">
            <a href="{{route('all-properties')}}">All Property
              <span class="ion-ios-arrow-forward"></span>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div id="property-carousel" class="owl-carousel owl-theme">

      @foreach ($properties as $property)
      <div class="carousel-item-b">
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
  </div>
</section>
<!--/ Property End /-->

<!--/ Agents Star /-->
{{-- <section class="section-agents section-t8">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="title-wrap d-flex justify-content-between">
          <div class="title-box">
            <h2 class="title-a">Best Agents</h2>
          </div>
          <div class="title-link">
            <a href="agents-grid.html">All Agents
              <span class="ion-ios-arrow-forward"></span>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="card-box-d">
          <div class="card-img-d">
            <img src="assets/img/agent-4.jpg" alt="" class="img-d img-fluid">
          </div>
          <div class="card-overlay card-overlay-hover">
            <div class="card-header-d">
              <div class="card-title-d align-self-center">
                <h3 class="title-d">
                  <a href="agent-single.html" class="link-two">Margaret Sotillo
                    <br> Escala</a>
                </h3>
              </div>
            </div>
            <div class="card-body-d">
              <p class="content-d color-text-a">
                Sed porttitor lectus nibh, Cras ultricies ligula sed magna dictum porta two.
              </p>
              <div class="info-agents color-a">
                <p>
                  <strong>Phone: </strong> +54 356 945234</p>
                <p>
                  <strong>Email: </strong> agents@example.com</p>
              </div>
            </div>
            <div class="card-footer-d">
              <div class="socials-footer d-flex justify-content-center">
                <ul class="list-inline">
                  <li class="list-inline-item">
                    <a href="#" class="link-one">
                      <i class="fa fa-facebook" aria-hidden="true"></i>
                    </a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#" class="link-one">
                      <i class="fa fa-twitter" aria-hidden="true"></i>
                    </a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#" class="link-one">
                      <i class="fa fa-instagram" aria-hidden="true"></i>
                    </a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#" class="link-one">
                      <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                    </a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#" class="link-one">
                      <i class="fa fa-dribbble" aria-hidden="true"></i>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card-box-d">
          <div class="card-img-d">
            <img src="assets/img/agent-1.jpg" alt="" class="img-d img-fluid">
          </div>
          <div class="card-overlay card-overlay-hover">
            <div class="card-header-d">
              <div class="card-title-d align-self-center">
                <h3 class="title-d">
                  <a href="agent-single.html" class="link-two">Stiven Spilver
                    <br> Darw</a>
                </h3>
              </div>
            </div>
            <div class="card-body-d">
              <p class="content-d color-text-a">
                Sed porttitor lectus nibh, Cras ultricies ligula sed magna dictum porta two.
              </p>
              <div class="info-agents color-a">
                <p>
                  <strong>Phone: </strong> +54 356 945234</p>
                <p>
                  <strong>Email: </strong> agents@example.com</p>
              </div>
            </div>
            <div class="card-footer-d">
              <div class="socials-footer d-flex justify-content-center">
                <ul class="list-inline">
                  <li class="list-inline-item">
                    <a href="#" class="link-one">
                      <i class="fa fa-facebook" aria-hidden="true"></i>
                    </a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#" class="link-one">
                      <i class="fa fa-twitter" aria-hidden="true"></i>
                    </a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#" class="link-one">
                      <i class="fa fa-instagram" aria-hidden="true"></i>
                    </a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#" class="link-one">
                      <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                    </a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#" class="link-one">
                      <i class="fa fa-dribbble" aria-hidden="true"></i>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card-box-d">
          <div class="card-img-d">
            <img src="assets/img/agent-5.jpg" alt="" class="img-d img-fluid">
          </div>
          <div class="card-overlay card-overlay-hover">
            <div class="card-header-d">
              <div class="card-title-d align-self-center">
                <h3 class="title-d">
                  <a href="agent-single.html" class="link-two">Emma Toledo
                    <br> Cascada</a>
                </h3>
              </div>
            </div>
            <div class="card-body-d">
              <p class="content-d color-text-a">
                Sed porttitor lectus nibh, Cras ultricies ligula sed magna dictum porta two.
              </p>
              <div class="info-agents color-a">
                <p>
                  <strong>Phone: </strong> +54 356 945234</p>
                <p>
                  <strong>Email: </strong> agents@example.com</p>
              </div>
            </div>
            <div class="card-footer-d">
              <div class="socials-footer d-flex justify-content-center">
                <ul class="list-inline">
                  <li class="list-inline-item">
                    <a href="#" class="link-one">
                      <i class="fa fa-facebook" aria-hidden="true"></i>
                    </a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#" class="link-one">
                      <i class="fa fa-twitter" aria-hidden="true"></i>
                    </a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#" class="link-one">
                      <i class="fa fa-instagram" aria-hidden="true"></i>
                    </a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#" class="link-one">
                      <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                    </a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#" class="link-one">
                      <i class="fa fa-dribbble" aria-hidden="true"></i>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> --}}
<!--/ Agents End /-->

<!--/ News Star /-->
{{-- <section class="section-news section-t8">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="title-wrap d-flex justify-content-between">
          <div class="title-box">
            <h2 class="title-a">Latest News</h2>
          </div>
          <div class="title-link">
            <a href="blog-grid.html">All News
              <span class="ion-ios-arrow-forward"></span>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div id="new-carousel" class="owl-carousel owl-theme">
      <div class="carousel-item-c">
        <div class="card-box-b card-shadow news-box">
          <div class="img-box-b">
            <img src="assets/img/post-2.jpg" alt="" class="img-b img-fluid">
          </div>
          <div class="card-overlay">
            <div class="card-header-b">
              <div class="card-category-b">
                <a href="#" class="category-b">House</a>
              </div>
              <div class="card-title-b">
                <h2 class="title-2">
                  <a href="blog-single.html">House is comming
                    <br> new</a>
                </h2>
              </div>
              <div class="card-date">
                <span class="date-b">18 Sep. 2017</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item-c">
        <div class="card-box-b card-shadow news-box">
          <div class="img-box-b">
            <img src="assets/img/post-5.jpg" alt="" class="img-b img-fluid">
          </div>
          <div class="card-overlay">
            <div class="card-header-b">
              <div class="card-category-b">
                <a href="#" class="category-b">Travel</a>
              </div>
              <div class="card-title-b">
                <h2 class="title-2">
                  <a href="blog-single.html">Travel is comming
                    <br> new</a>
                </h2>
              </div>
              <div class="card-date">
                <span class="date-b">18 Sep. 2017</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item-c">
        <div class="card-box-b card-shadow news-box">
          <div class="img-box-b">
            <img src="assets/img/post-7.jpg" alt="" class="img-b img-fluid">
          </div>
          <div class="card-overlay">
            <div class="card-header-b">
              <div class="card-category-b">
                <a href="#" class="category-b">Park</a>
              </div>
              <div class="card-title-b">
                <h2 class="title-2">
                  <a href="blog-single.html">Park is coming
                    <br> new</a>
                </h2>
              </div>
              <div class="card-date">
                <span class="date-b">18 Sep. 2017</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item-c">
        <div class="card-box-b card-shadow news-box">
          <div class="img-box-b">
            <img src="assets/img/post-3.jpg" alt="" class="img-b img-fluid">
          </div>
          <div class="card-overlay">
            <div class="card-header-b">
              <div class="card-category-b">
                <a href="#" class="category-b">Travel</a>
              </div>
              <div class="card-title-b">
                <h2 class="title-2">
                  <a href="#">Travel is comming
                    <br> new</a>
                </h2>
              </div>
              <div class="card-date">
                <span class="date-b">18 Sep. 2017</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> --}}
<!--/ News End /-->

<!--/ Testimonials Star /-->
{{-- <section class="section-testimonials section-t8 nav-arrow-a">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="title-wrap d-flex justify-content-between">
          <div class="title-box">
            <h2 class="title-a">Testimonials</h2>
          </div>
        </div>
      </div>
    </div>
    <div id="testimonial-carousel" class="owl-carousel owl-arrow">
      <div class="carousel-item-a">
        <div class="testimonials-box">
          <div class="row">
            <div class="col-sm-12 col-md-6">
              <div class="testimonial-img">
                <img src="assets/img/testimonial-1.jpg" alt="" class="img-fluid">
              </div>
            </div>
            <div class="col-sm-12 col-md-6">
              <div class="testimonial-ico">
                <span class="ion-ios-quote"></span>
              </div>
              <div class="testimonials-content">
                <p class="testimonial-text">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis, cupiditate ea nam praesentium
                  debitis hic ber quibusdam
                  voluptatibus officia expedita corpori.
                </p>
              </div>
              <div class="testimonial-author-box">
                <img src="assets/img/mini-testimonial-1.jpg" alt="" class="testimonial-avatar">
                <h5 class="testimonial-author">Albert & Erika</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item-a">
        <div class="testimonials-box">
          <div class="row">
            <div class="col-sm-12 col-md-6">
              <div class="testimonial-img">
                <img src="assets/img/testimonial-2.jpg" alt="" class="img-fluid">
              </div>
            </div>
            <div class="col-sm-12 col-md-6">
              <div class="testimonial-ico">
                <span class="ion-ios-quote"></span>
              </div>
              <div class="testimonials-content">
                <p class="testimonial-text">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis, cupiditate ea nam praesentium
                  debitis hic ber quibusdam
                  voluptatibus officia expedita corpori.
                </p>
              </div>
              <div class="testimonial-author-box">
                <img src="assets/img/mini-testimonial-2.jpg" alt="" class="testimonial-avatar">
                <h5 class="testimonial-author">Pablo & Emma</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> --}}
<!--/ Testimonials End /-->


@endsection