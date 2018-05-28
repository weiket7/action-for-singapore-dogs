<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
  <title>Action for Singapore Dogs (ASD)</title>
  <meta charset="utf-8">
  <!--[if IE]>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <![endif]-->
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
  
  <link rel="stylesheet" href="{{ asset("assets/css/bootstrap.min.css") }}">
  <link rel="stylesheet" href="{{ asset("assets/css/animations.css") }}">
  <link rel="stylesheet" href="{{ asset("assets/css/fonts.css") }}">
  <link rel="stylesheet" href="{{ asset("assets/css/main.css") }}" class="color-switcher-link">
  <link rel="stylesheet" href="{{ asset("assets/css/shop.css") }}" class="color-switcher-link">
  <link rel="stylesheet" href="{{ asset("assets/css/custom.css") }}">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <script src="{{ asset("assets/js/vendor/modernizr-2.6.2.min.js") }}"></script>
  
  <!--[if lt IE 9]>
  <script src="{{ asset("assets/js/vendor/html5shiv.min.js") }}"></script>
  <script src="{{ asset("assets/js/vendor/respond.min.js") }}"></script>
  <script src="{{ asset("assets/js/vendor/jquery-1.12.4.min.js") }}"></script>
  <![endif]-->

</head>

<body>
<!--[if lt IE 9]>
<div class="bg-danger text-center">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/" class="highlight">upgrade your browser</a> to improve your experience.</div>
<![endif]-->

<!-- search modal -->
<div class="modal" tabindex="-1" role="dialog" aria-labelledby="search_modal" id="search_modal">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">
				<i class="rt-icon2-cross2"></i>
			</span>
  </button>
  <div class="widget widget_search">
    <form method="get" class="searchform search-form form-inline" action="./">
      <div class="form-group">
        <input type="text" value="" name="search" class="form-control" placeholder="Search keyword" id="modal-search-input">
      </div>
      <button type="submit" class="theme_button">Search</button>
    </form>
  </div>
</div>

<!-- Unyson messages modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="messages_modal">
  <div class="fw-messages-wrap ls with_padding">
    <!-- Uncomment this UL with LI to show messages in modal popup to your user: -->
    <!--
  <ul class="list-unstyled">
    <li>Message To User</li>
  </ul>
  -->
  
  </div>
</div>
<!-- eof .modal -->

<!-- wrappers for visual page editor and boxed version of template -->
<div id="canvas">
  <div id="box_wrapper">
    
    <!-- template sections -->
    
    <section class="page_toplogo table_section table_section_md ls">
      <div class="container">
        <div class="row">
          <div class="col-md-4 text-center text-md-left">
            <a href="./" class="logo">
              <img src="{{ asset("assets/images/action-for-singapore-dogs-logo.png") }}" alt="" />
            </a>
            <!-- header toggler -->
            <span class="toggle_menu">
								<span></span>
							</span>
          
          </div>
          <div class="col-md-8 text-center text-md-right">
            
            {{--<div class="media small-teaser">
                <div class="media-left">
                    <div class="teaser_icon highlight fontsize_18">
                        <i class="fa fa-phone"></i>
                    </div>
                </div>
                <div class="media-body">
                    <h4>
                        Phone:
                    </h4>
                    <p>
                        8(800)168-2159
                    </p>
                </div>
            </div>--}}
            
            <div class="media small-teaser">
              
              <div class="media-left">
                <div class="teaser_icon highlight fontsize_18">
                  <i class="fa fa-envelope"></i>
                </div>
              </div>
              <div class="media-body">
                <h4>
                  Email:
                </h4>
                <p>
                  <a href="mailto:info@asdsingapore.com">info@asdsingapore.com</a>
                </p>
              </div>
            </div>
            
            <div class="inline-block">
              <a href="https://www.facebook.com/asdsingapore/" target="_blank" class="social-icon border-icon color-icon rounded-icon soc-facebook"></a>
              <a href="https://www.instagram.com/asdsingapore" target="_blank" class="social-icon border-icon color-icon rounded-icon soc-instagram"></a>
            </div>
          
          </div>
        
        </div>
      </div>
    </section>
  
    <div>
      <header class="page_header header_yellow bordered_items">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 text-center">
              <!-- main nav start -->
              <nav class="mainmenu_wrapper">
                <ul class="mainmenu nav sf-menu">
                  <li class="active">
                    <a href="adopt">About</a>
                    <ul>
                      <li>
                        <a href="index.html">Who We Are</a>
                      </li>
                      <li>
                        <a href="index.html">Adoption & Rescue Centre (ARC)</a>
                      </li>
                      <li>
                        <a href="index_singlepage.html">Media</a>
                      </li>
                      <li>
                        <a href="index_singlepage.html">Media</a>
                      </li>
                    </ul>
                  </li>
                  
                  <li>
                    <a href="#">Adopt</a>
                    <ul>
                      <li>
                        <a href="{{ url("adopt") }}">Dogs for Adoption</a>
                      </li>
                      <li>
                        <a href="index_singlepage.html">Why Adopt a Dog</a>
                      </li>
                      <li>
                        <a href="index_singlepage.html">Adoption Procedure</a>
                      </li>
                      <li>
                        <a href="index_singlepage.html">Project Adore</a>
                      </li>
                    </ul>
                  </li>
                
                  <!-- blog -->
                  <li>
                    <a href="{{ url("volunteer") }}">Volunteer</a>
                  </li>
                  <!-- eof blog -->
                
                  <li>
                    <a href="{{ url("donate") }}">Donate</a>
                  </li>
                  <!-- eof features -->
                  <li>
                    <a href="about.html">Events</a>
                    <ul>
                      <li>
                        <a href="index.html">MultiPage</a>
                      </li>
                      <li>
                        <a href="index_singlepage.html">SinglePage</a>
                      </li>
                      <li>
                        <a href="admin_index.html">Admin Dashboard</a>
                      </li>
                    </ul>
                  </li>
                  <li>
                    <a href="{{ url("contact") }}">Contact</a>
                  </li>
                </ul>
              </nav>
              <!-- eof main nav -->
            </div>
          </div>
        </div>
      </header>
    
      <section class="ls mt-50">
        @yield("content")
      </section>
    </div>
    
    
    <footer class="page_footer ds ms parallax section_padding_50">
      <div class="container">
        
        <div class="row columns_padding_50">
          
          <div class="col-md-4">
            <a href="./" class="logo">
              <img src="{{ asset("assets/images/logo-dark.png") }}" alt="" />
            </a>
            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis um voluptatum deleniti atque orrupti quos </p>
            <div class="media fontsize_18">
              <i class="fa fa-search highlight rightpadding_5"></i>
              address:
              <span class="grey">12 Ave., New York</span>
            </div>
            <div class="media fontsize_18">
              <i class="fa fa-envelope highlight rightpadding_5"></i>
              email:
              <span class="grey">info@giving.com</span>
            </div>
            <div class="media fontsize_18">
              <i class="fa fa-phone highlight rightpadding_5"></i>
              phone:
              <span class="grey">800 516 3290</span>
            </div>
            <div class="topmargin_30 darklinks">
              <a class="social-icon theme-color-icon soc-facebook" href="#" title="Facebook"></a>
              <a class="social-icon theme-color-icon soc-twitter" href="#" title="Twitter"></a>
              <a class="social-icon theme-color-icon soc-google" href="#" title="Google"></a>
              <a class="social-icon theme-color-icon soc-linkedin" href="#" title="LinkedIn"></a>
              <a class="social-icon theme-color-icon soc-flickr" href="#" title="Flickr"></a>
              <a class="social-icon theme-color-icon soc-rss" href="#" title="Rss"></a>
            </div>
          </div>
          
          <div class="col-md-4 col-sm-6">
            <div class="topmargin_20">
              <div class="widget widget_recent_posts">
                
                <h3 class="widget-title">From the blog</h3>
                <ul class="greylinks">
                  <li>
                    <div class="media">
                      <div class="media-left media-middle">
                        <img src="{{ asset("assets/images/recent_post1.jpg") }}" alt="" />
                      </div>
                      <div class="media-body media-middle">
                        <h4><a href="blog-single-right.html">Missioners in charge</a></h4>
                        <div class="entry-meta grey darklinks">
														<span class="entry-date">
															<time datetime="2017-03-13T08:50:40+00:00">
																23th of april
															</time>
														</span>
                          <span>|</span>
                          <span>
															<i class="fa fa-heart" aria-hidden="true"></i>
															2
														</span>
                          <a href="blog-single-right.html#comments">
                            <i class="fa fa-comment" aria-hidden="true"></i>
                            4
                          </a>
                        </div>
                      </div>
                    </div>
                  </li>
                  
                  <li>
                    <div class="media">
                      <div class="media-left media-middle">
                        <img src="{{ asset("assets/images/recent_post2.jpg") }}" alt="" />
                      </div>
                      <div class="media-body media-middle">
                        <h4><a href="blog-single-right.html">Celebrating the adoption</a></h4>
                        <div class="entry-meta grey darklinks">
														<span class="entry-date">
															<time datetime="2017-03-13T08:50:40+00:00">
																5th of april
															</time>
														</span>
                          <span>|</span>
                          <span>
															<i class="fa fa-heart" aria-hidden="true"></i>
															3
														</span>
                          <a href="blog-single-right.html#comments">
                            <i class="fa fa-comment" aria-hidden="true"></i>
                            1
                          </a>
                        </div>
                      </div>
                    </div>
                  </li>
                  
                  <li>
                    <div class="media">
                      <div class="media-left media-middle">
                        <img src="{{ asset("assets/images/recent_post3.jpg") }}" alt="" />
                      </div>
                      <div class="media-body media-middle">
                        <h4><a href="blog-single-right.html">Charity for everyone</a></h4>
                        <div class="entry-meta grey darklinks">
														<span class="entry-date">
															<time datetime="2017-03-13T08:50:40+00:00">
																25th of april
															</time>
														</span>
                          <span>|</span>
                          <span>
															<i class="fa fa-heart" aria-hidden="true"></i>
															6
														</span>
                          <a href="blog-single-right.html#comments">
                            <i class="fa fa-comment" aria-hidden="true"></i>
                            18
                          </a>
                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          
          <div class="col-md-4 col-sm-6">
            <div class="widget widget_instagram topmargin_20">
              <h3 class="widget-title">Our Happy faces</h3>
              <div class="instafeed">
              
              </div>
            </div>
          </div>
        
        </div>
      </div>
    </footer>
    
    <section class="page_copyright ds ms parallax">
      <div class="container with_top_border">
        <div class="row">
          <div class="col-sm-12 text-center">
            <p class="greylinks">Copyright 2016 - <a href="#">MW Templates</a>. All Rights Reserved</p>
          </div>
        </div>
      </div>
    </section>
  
  </div>
  <!-- eof #box_wrapper -->
</div>
<!-- eof #canvas -->

<script src="{{ asset("assets/js/compressed.js") }}"></script>
<script src="{{ asset("assets/js/main.js") }}"></script>
<script src="{{ asset("assets/js/vue.js") }}"></script>
<script src="{{ asset("assets/js/axios.min.js") }}"></script>

@section('script')

@show

</body>

</html>
