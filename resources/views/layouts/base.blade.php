<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tychon Real Estate Limited</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
    {{-- <link href="assets/img/favicon.png" rel="icon"> --}}
    {{-- <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> --}}

    <!-- Google Fonts -->
    <link href="assets/https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Libraries CSS Files -->
    {{-- <link rel="stylesheet" href="{{asset('build/assets/app.b00e971d.css')}}"> --}}
    <link href="assets/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/lib/animate/animate.min.css" rel="stylesheet">
    <link href="assets/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

    {{-- <div class="click-closed"></div>
  <!--/ Form Search Star /-->
  <div class="box-collapse">
    <div class="title-box-d">
      <h3 class="title-d">Search Property</h3>
    </div>
    <span class="close-box-collapse right-boxed ion-ios-close"></span>
    <div class="box-collapse-wrap form">
      <form class="form-a">
        <div class="row">
          <div class="col-md-12 mb-2">
            <div class="form-group">
              <label for="Type">Keyword</label>
              <input type="text" class="form-control form-control-lg form-control-a" placeholder="Keyword">
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="Type">Type</label>
              <select class="form-control form-control-lg form-control-a" id="Type">
                <option selected>Type</option>
                <option value="Rent"> Rent</option>
                <option value="Buy"> Buy</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="city">City</label>
              <select class="form-control form-control-lg form-control-a" id="city">
                <option>All City</option>
                <option>Alabama</option>
                <option>Arizona</option>
                <option>California</option>
                <option>Colorado</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="bedrooms">Bedrooms</label>
              <select class="form-control form-control-lg form-control-a" id="bedrooms">
                <option>Any</option>
                <option>01</option>
                <option>02</option>
                <option>03</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="garages">Garages</label>
              <select class="form-control form-control-lg form-control-a" id="garages">
                <option>Any</option>
                <option>01</option>
                <option>02</option>
                <option>03</option>
                <option>04</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="bathrooms">Bathrooms</label>
              <select class="form-control form-control-lg form-control-a" id="bathrooms">
                <option>Any</option>
                <option>01</option>
                <option>02</option>
                <option>03</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="price">Min Price</label>
              <select class="form-control form-control-lg form-control-a" id="price">
                <option>Unlimite</option>
                <option>$50,000</option>
                <option>$100,000</option>
                <option>$150,000</option>
                <option>$200,000</option>
              </select>
            </div>
          </div>
          <div class="col-md-12">
            <button type="submit" class="btn btn-b">Search Property</button>
          </div>
        </div>
      </form>
    </div>
  </div> --}}
    <!--/ Form Search End /-->

    <!--/ Nav Star /-->
    <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
        <div class="container">
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
                aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <a class="navbar-brand text-brand" href="{{ route('/') }}"><img width="100px"
                    src="assets/img/tychon-logo.png" alt=""></a>
            {{-- <button type="button" class="btn btn-link nav-search navbar-toggle-box-collapse d-md-none" data-toggle="collapse"
        data-target="#navbarTogglerDemo01" aria-expanded="false">
        <span class="fa fa-search" aria-hidden="true"></span>
      </button> --}}
            <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ route('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('about') ? 'active' : '' }}"
                            href="{{ route('about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('all-properties') ? 'active' : '' }}"
                            href="{{ route('all-properties') }}">Properties</a>
                    </li>
                    {{-- <li class="nav-item">
            <a class="nav-link {{Request::is('agent') ? 'active':''}}" href="{{route('agent')}}">Agent</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{Request::is('blog') ? 'active':''}}" href="{{route('blog')}}">Blog</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              Property
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{route('buy')}}">Buy Property</a>
              <a class="dropdown-item" href="{{route('rent')}}">Rent Property</a>
              <a class="dropdown-item" href="{{route('all-properties')}}">All Properties</a>
            </div>
          </li> --}}
                    {{-- <li class="nav-item">
            <a class="nav-link {{Request::is('contact') ? 'active':''}}" href="{{route('contact')}}">Contact</a>
          </li> --}}
                    @if (Route::has('login'))
                        @auth
                            @if (Auth::user()->user_type === 'ADM')
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-success" href="#" data-toggle="dropdown"
                                        role="button" aria-haspopup="true" aria-expanded="true"> <span
                                            class="nav-label">User ({{ Auth::user()->name }})</a>
                                    <ul class="">
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('admin.categories') }}">Categories</a>
                                            <a class="dropdown-item" href="{{ route('admin.locations') }}">Locations</a>
                                            <a class="dropdown-item" href="{{ route('admin.properties') }}">Properties</a>
                                            <a class="dropdown-item" href="{{ route('admin.slides') }}">Slides</a>
                                            <a class="dropdown-item" href="{{ route('admin.priceRange') }}">Price Range</a>
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf

                                                <a class="dropdown-item" href="route('logout')"
                                                    onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                                    {{ __('Logout') }}
                                                </a>
                                            </form>
                                        </div>
                                    </ul>
                                </li>
                            @else
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-success" href="#" data-toggle="dropdown"
                                        role="button" aria-haspopup="true" aria-expanded="true"> <span
                                            class="nav-label">{{ Auth::user()->name }}</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="testimonial.html">User</a></li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <a class="text-dark" href="route('logout')"
                                                onclick="event.preventDefault();
                                      this.closest('form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                        </form>
                                    </ul>
                                </li>

                                {{-- @else
                  <a href="{{ route('login') }}" class="text-light"><button class="btn btn-success mr-1">Login</button></a>

              @if (Route::has('register'))
             
                  <a href="{{ route('register') }}" class=" text-light"> <button class="btn btn-success ">Register</button></a> --}}
                            @endif
                        @endauth
                    @endif

                </ul>
            </div>
            {{-- <button type="button" class="btn btn-b-n navbar-toggle-box-collapse d-none d-md-block" data-toggle="collapse"
        data-target="#navbarTogglerDemo01" aria-expanded="false">
        <span class="fa fa-search" aria-hidden="true"></span>
      </button> --}}
        </div>
    </nav>
    <!--/ Nav End /-->


    @yield('content')

    <div class="whatsapp-chat">
        <a href="https://wa.me/+2348115920875?text=I'm%20interested%20in%20your%20property" target="_blank">
            <img src="{{ asset('assets/img/whatsapp.png') }}" width="80px" height="80px" class="m-2"
                alt="">
        </a>
    </div>


    <!--/ footer Star /-->
    <section class="section-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <div class="widget-a">
                        <div class="w-header-a">
                            <a class="navbar-brand text-brand" href="{{ route('/') }}"><img width="200"
                                    src="assets/img/tychon-logo.png" alt=""></a>
                        </div>
                        <div class="w-body-a">
                            <p class="w-text-a color-text-a">
                                Tychon Real Estate Limited (TREL) is a real estate company built out of the necessity of
                                providing mankind with the best of real estate services and properties all across the
                                country.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 section-md-t3">
                    <div class="widget-a">
                        <div class="w-header-a">
                            <h3 class="w-title-a text-brand">Quick Links</h3>
                        </div>
                        <div class="w-body-a">
                            <div class="w-body-a">
                                <ul class="list-unstyled">
                                    <li class="item-list-a">
                                        <i class="fa fa-angle-right"></i> <a href="{{ route('/') }}">Home</a>
                                    </li>
                                    <li class="item-list-a">
                                        <i class="fa fa-angle-right"></i> <a href="{{ route('about') }}">About</a>
                                    </li>
                                    <li class="item-list-a">
                                        <i class="fa fa-angle-right"></i> <a
                                            href="{{ route('all-properties') }}">Properties</a>
                                    </li>
                                    {{-- <li class="item-list-a">
                  <i class="fa fa-angle-right"></i> <a href="#">Careers</a>
                </li>
                <li class="item-list-a">
                  <i class="fa fa-angle-right"></i> <a href="#">Affiliate</a>
                </li>
                <li class="item-list-a">
                  <i class="fa fa-angle-right"></i> <a href="#">Privacy Policy</a>
                </li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 section-md-t3">
                    <div class="widget-a">
                        <div class="w-header-a">
                            <h3 class="w-title-a text-brand">Contact Us</h3>
                        </div>
                        <div class="w-footer-a">
                            <ul class="list-unstyled">
                                <li class="color-a">
                                    <span class="color-text-a">Address :</span> No.10 Obollo Road, Nsukka Local
                                    Government Area, Enugu State.
                                </li>
                                <li class="color-a">
                                    <span class="color-text-a">Phone :</span> +234 (0) 8115920875
                                </li>
                                <li class="color-a">
                                    <span class="color-text-a">Email :</span> Tychonrealestatelimited@gmail.com
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    {{-- <nav class="nav-footer">
          <ul class="list-inline">
            <li class="list-inline-item">
              <a href="#">Home</a>
            </li>
            <li class="list-inline-item">
              <a href="#">About</a>
            </li>
            <li class="list-inline-item">
              <a href="#">Property</a>
            </li>
            <li class="list-inline-item">
              <a href="#">Blog</a>
            </li>
            <li class="list-inline-item">
              <a href="#">Contact</a>
            </li>
          </ul>
        </nav> --}}
                    <div class="socials-a">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="#">
                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">
                                    <i class="fa fa-twitter" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">
                                    <i class="fa fa-instagram" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">
                                    <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">
                                    <i class="fa fa-dribbble" aria-hidden="true"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="copyright-footer">
                        <p class="copyright color-text-a">
                            &copy; Copyright
                            <span class="color-a">2022.</span> All Rights Reserved.
                        </p>
                    </div>
                    <div class="credits">
                        <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=EstateAgency
          -->
                        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--/ Footer End /-->

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    <div id="preloader"></div>

    <!-- JavaScript Libraries -->
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}

    {{-- <script src="{{asset('build/assets/app.a1dd5ee6.js')}}"></script> --}}

    <script src="assets/lib/jquery/jquery.min.js"></script>
    <script src="assets/lib/jquery/jquery-migrate.min.js"></script>
    <script src="assets/lib/popper/popper.min.js"></script>
    <script src="assets/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/lib/easing/easing.min.js"></script>
    <script src="assets/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="assets/lib/scrollreveal/scrollreveal.min.js"></script>
    <!-- Contact Form JavaScript File -->
    <script src="assets/contactform/contactform.js"></script>

    <!-- Template Main Javascript File -->
    <script src="assets/js/main.js"></script>
    <!--Start of Tawk.to Script-->
    {{-- <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/62d88afb37898912e95ed4d7/1g8ettqqm';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script> --}}
    <!--End of Tawk.to Script-->


</body>

</html>
