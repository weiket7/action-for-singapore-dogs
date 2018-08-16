<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
  <?php
    $title = isset($title) ? $title : "Action for Singapore Dogs";
    $meta_desc = isset($meta_desc) ? $meta_desc : "Action for Singapore Dogs";
  ?>
  <title>{{ $title }}</title>
  <meta charset="utf-8">
  <!--[if IE]>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <![endif]-->
  <meta name="description" content="{{ $meta_desc }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="manifest" href="{{ asset("manifest.json") }}">
  <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
  
  <meta property="og:title" content="{{ $title }}"/>
  <!--<meta property="og:image" content=""/>-->
  <meta property="og:site_name" content="Action for Singapore Dogs"/>
  <meta property="og:description" content="{{ $meta_desc }}"/>
  
  <link rel="stylesheet" href="{{ asset("assets/css/bootstrap.min.css") }}">
  <link rel="stylesheet" href="{{ asset("assets/css/fonts.css") }}">
  <link rel="stylesheet" href="{{ asset("assets/css/main.css") }}" class="color-switcher-link">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset("assets/css/jquery.bxslider.css") }}">
  <link rel="stylesheet" href="{{ asset("assets/css/jquery-ui.min.css") }}">
  <link rel="stylesheet" href="{{ asset("assets/css/custom.css") }}">
  
  <script src="{{ asset("assets/js/vendor/modernizr-2.6.2.min.js") }}"></script>
  <!--[if lt IE 9]>
  <script src="{{ asset("assets/js/vendor/html5shiv.min.js") }}"></script>
  <script src="{{ asset("assets/js/vendor/respond.min.js") }}"></script>
  <script src="{{ asset("assets/js/vendor/jquery-1.12.4.min.js") }}"></script>
  <![endif]-->
  
  <link rel="shortcut icon" href="{{ asset("favicon.ico") }}" />
</head>

<body>
<!--[if lt IE 9]>
<div class="bg-danger text-center">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/" class="highlight">upgrade your browser</a> to improve your experience.</div>
<![endif]-->

<div id="app">
  <section class="page_toplogo table_section table_section_md ls">
    <div class="container">
      <div class="row">
        <div class="col-md-4 text-md-left">
          <a href="{{ url('/') }}" class="logo">
            <img src="{{ asset('assets/images/action-for-singapore-dogs-logo.png')}}" alt="" />
          </a>
          <!-- header toggler -->
          <span class="toggle_menu">
            <span></span>
          </span>
        </div>
        <div class="col-md-8 text-center text-md-right">
          <div class="media small-teaser">
            <div class="media-left top-email-icon">
              <div class="teaser_icon highlight fontsize_18">
                <i class="fa fa-envelope"></i>
              </div>
            </div>
            <div class="media-body">
              <div class="visible-lg visible-md">
                <p>
                  <a href="mailto:info@asdsingapore.com">info@asdsingapore.com</a>
                </p>
              </div>
              <div class="hidden-lg hidden-md">
                <h4>
                  <a href="mailto:info@asdsingapore.com">Email</a>
                </h4>
              </div>
            </div>
          </div>
          
          <a id="link-i-want-to-adopt" href="{{ url('i-want-to-adopt') }}" class="media small-teaser top-heart">
            <div class="media-left top-heart-icon">
              <div id="heart_icon" class="teaser_icon fontsize_18">
                <i class="fa fa-heart fa-2x"></i>
              </div>
            </div>
            <div class="media-body top-heart-number">
              <h4 id="heart_count">
              
              </h4>
            </div>
          </a>
          
          <div class="inline-block">
            <a href="https://www.facebook.com/asdsingapore/" target="_blank" class="social-icon border-icon color-icon rounded-icon soc-facebook"></a>
            <a href="https://www.instagram.com/asdsingapore" target="_blank" class="social-icon border-icon color-icon rounded-icon soc-instagram"></a>
          </div>
        
        </div>
      
      </div>
    </div>
  </section>
  
  <header class="page_header header_yellow bordered_items">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 text-center">
          <!-- main nav start -->
          <nav class="mainmenu_wrapper">
            <ul class="mainmenu nav sf-menu">
              <li class="active">
                <a href="{{ url('/') }}" :data-target="'home'" class="menu-single">Home</a>
              </li>
              <li>
                <a href="#">About</a>
                <ul>
                  <li>
                    <a href="{{ url('pages/who-we-are') }}" :data-target="'coming-soon'">Who We Are</a>
                  </li>
                  <li>
                    <a href="{{ url('pages/adoption-rescue-centre-arc') }}" :data-target="'coming-soon'">Adoption & Rescue Centre (ARC)</a>
                  </li>
                  <li>
                    <a href="{{ url('pages/boarding-services') }}" :data-target="'coming-soon'">Boarding Services</a>
                  </li>
                  <li>
                    <a href="{{ url('pages/media') }}" :data-target="'coming-soon'">Media</a>
                  </li>
                  <li>
                    <a href="{{ url('pages/dog-listener-academy') }}" :data-target="'coming-soon'">Dog Listener Academy</a>
                  </li>
                </ul>
              </li>
              
              <li>
                <a href="#">Adopt</a>
                <ul>
                  <li>
                    <a href="{{ url('dogs-for-adoption') }}">Dogs for Adoption</a>
                  </li>
                  <li>
                    <a href="{{ url('pages/why-adopt-a-dog') }}">Why Adopt a Dog</a>
                  </li>
                  <li>
                    <a href="{{ url('pages/adoption-procedure') }}">Adoption Procedure</a>
                  </li>
                  <li>
                    <a href="{{ url('pages/project-adore') }}">Project Adore</a>
                  </li>
                  <li>
                    <a href="{{ url('pages/gone-to-loving-homes') }}">Gone to Loving Homes</a>
                  </li>
                </ul>
              </li>
              
              <li>
                <a href="#">Donate / Sponsor</a>
                <ul>
                  <li>
                    <a href="{{ url('donate') }}" :data-target="'donate'">Make a Donation</a>
                  </li>
                  <li>
                    <a href="{{ url('pages/sponsor') }}" :data-target="'coming-soon'">Sponsor</a>
                  </li>
                  <li>
                    <a href="{{ url('pages/gift-shop') }}" :data-target="'coming-soon'">Gift Shop</a>
                  </li>
                  <li>
                    <a href="{{ url('pages/dogs-in-need') }}" :data-target="'coming-soon'">Dogs in Need</a>
                  </li>
                </ul>
              </li>
              <li>
                <a href="{{ url('volunteer') }}" :data-target="'volunteer'" class="menu-single">Volunteer</a>
              </li>
              <li>
                <a href="{{ url('events') }}" :data-target="'events'" class="menu-single">Events</a>
              </li>
              <li>
                <a href="{{ url('contact') }}" :data-target="'contact'" class="menu-single">Contact</a>
              </li>
            </ul>
          </nav>
          <!-- eof main nav -->
        </div>
      </div>
    </div>
  </header>
  
  <section class="ls">
    @yield('content')
  </section>
  
  <footer class="page_footer ds ms parallax">
    <div class="container">
      <div class="row columns_padding_50 bottommargin_20">
        <div class="col-md-4">
          <a href="./" class="logo topmargin_20">
            <img src="{{ asset('assets/images/action-for-singapore-dogs-logo.png') }}" alt="" />
          </a>
        </div>
        
        <div class="col-md-4">
          <p class="topmargin_20">A society set up to help the stray and abandoned dogs in Singapore</p>
        </div>
        
        <div class="col-md-4">
          <div class="fontsize_18 topmargin_20">
            <i class="fa fa-envelope highlight rightpadding_5"></i>
            <span class="grey"><a href="mailto:info@asdsingapore.com">info@asdsingapore.com</a></span>
          </div>
          <div class="darklinks topmargin_10">
            <a class="social-icon theme-color-icon soc-facebook" href="https://www.facebook.com/asdsingapore/" title="Facebook"></a>
            <a class="social-icon theme-color-icon soc-instagram" href="https://www.instagram.com/asdsingapore" title="Instagram"></a>
            <a class="social-icon theme-color-icon soc-youtube" href="#" title="Youtube"></a>
          </div>
        </div>
      </div>
    </div>
  </footer>

</div>

<script>
  var base_url = '{{ url('/') }}'
</script>

<script src="{{ asset("assets/js/compressed.js" )}}"></script>
<script src="{{ asset("assets/js/main.js" )}}"></script>
<script src="{{ asset("vendor.js" ) }}"></script>
<script src="{{ asset("app.js" ) }}"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-62167634-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  
  gtag('config', 'UA-62167634-3');
  
  $(document).ready(function() {
    window.updateHeartHeader();
  })
</script>

@section('script')

@show

</body>

</html>