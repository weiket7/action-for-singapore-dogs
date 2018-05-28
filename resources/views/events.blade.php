@extends('template')

@section("content")
  <div id="app" class="container">
    <div class="row">
      
      <div class="col-sm-7 col-md-8 col-lg-8">
        
        <article v-for="event in events" class="post format-small-image">
          <div class="side-item">
            <div class="row">
              <div class="col-md-5">
                <div class="item-media entry-thumbnail">
                  <img src="images/events/01.jpg" alt="">
                  <div class="media-links">
                    <a class="abs-link" title="" href="event-single-right.html"></a>
                  </div>
                </div>
              </div>
              
              <div class="col-md-7">
                <div class="item-content">
                  <h4 class="entry-title">
                    <a href="event-single-right.html" rel="bookmark">@{{ event.name }}</a>
                  </h4>
                  
                  <p class="event-detail highlight">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                     @{{ event.location }}
                    <br>
                    <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                    @{{ event.date | formatDate }}
                    <br>
                    <i class="fa fa-clock" aria-hidden="true"></i> @{{ event.time }}
                  </p>
                  <p>Stet clita kasd gubergren, no sea takimata sanctus sed diam voluptua.</p>
                  <p class="topmargin_30">
                    <a href="event-single-right.html" class="theme_button inverse wide_button bottommargin_0">Read More</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
  
          <hr class="divider_40">
        </article>
        
        <div class="row columns_margin_0">
          <div class="col-sm-12 text-center">
            <div class="row columns_padding_0">
              <div class="col-sm-4 text-center text-sm-left">
                <a href="#" class="theme_button inverse margin_0">Prev page</a>
              </div>
              <div class="col-sm-4 text-center">
                
                <ul class="pagination block">
                  <li class="active"><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                </ul>
              
              </div>
              <div class="col-sm-4 text-center text-sm-right">
                <a href="#" class="theme_button inverse margin_0">Next page</a>
              </div>
            </div>
          </div>
        </div>
      
      </div>
      <!--eof .col-sm-8 (main content)-->
      
      <!-- sidebar -->
      <aside class="col-sm-5 col-md-4 col-lg-4">
        
        <div class="widget widget_text">
          
          <h3 class="widget-title">Upcoming event</h3>
          <div class="textwidget">
            <img src="images/gallery/07.jpg" alt="" />
            <h4><a href="event-single-right.html">Picanha pig leberkas</a></h4>
            <p>Shank kevin prosciutto pork belly. Rump pancetta kielbasa porchetta. Beef brisket pig cupim venison.</p>
            <p class="item-meta highlight">
              <span>
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                NYC 21th street #43
              </span>
                  <span class="text-uppercase">
                <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                MAY 20, 5 P.M.
              </span>
            </p>
          </div>
        </div>
        
        <div class="widget widget_search">
          <h3 class="widget-title">Search post</h3>
          <form method="get" class="searchform form-inline" action="./">
            <div class="form-group">
              <label class="screen-reader-text" for="widget-search">Search for:</label>
              <input id="widget-search" type="text" value="" name="search" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="theme_button">Search</button>
          </form>
        </div>
        
        <div class="widget widget_categories">
          
          <h3 class="widget-title">Categories</h3>
          <ul class="greylinks">
            <li>
              <a href="#">
                <i class="fa fa-heart rightpadding_5" aria-hidden="true"></i> Donation</a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-user-plus rightpadding_5" aria-hidden="true"></i> Volunteering</a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-home rightpadding_5" aria-hidden="true"></i> Adoption</a>
            </li>
          </ul>
        </div>
        
        <div class="widget widget_recent_posts">
          
          <h3 class="widget-title">Recent Posts</h3>
          <ul class="greylinks">
            <li>
              <div class="media">
                <div class="media-left media-middle">
                  <img src="images/recent_post1.jpg" alt="" />
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
                  <img src="images/recent_post2.jpg" alt="" />
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
                  <img src="images/recent_post3.jpg" alt="" />
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
      
      
      </aside>
      <!-- eof aside sidebar -->
    
    </div>
  </div>
@endsection

@section('script')
  <script>
    var vm = new Vue({
      el: "#app",
      data: {
        events: {}
      },
      created: function() {
        axios.get('api/events')
          .then(response => {
            this.events = response.data;
          })
          .catch(error => { console.log(error); })
      }
    });
  </script>
@endsection