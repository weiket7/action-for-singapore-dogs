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
                    <a :href="base_url + '/events/' + event.slug" rel="bookmark">@{{ event.name }}</a>
                  </h4>
                  
                  <p class="event-detail">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                     @{{ event.location }}
                    <br>
                    <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                    @{{ event.date | formatDate }}
                    <br>
                    <i class="fa fa-clock" aria-hidden="true"></i> @{{ event.time }}
                    <span v-if="event.duration">
                      <br><i class="fas fa-ruler-horizontal" aria-hidden="true"></i> @{{ event.duration }}
                    </span>
                    <span v-if="event.cost">
                      <br><i class="fa fa-dollar-sign" aria-hidden="true"></i> @{{ event.cost }}
                    </span>
                  </p>
                  {{--<p>Stet clita kasd gubergren, no sea takimata sanctus sed diam voluptua.</p>--}}
                  <p>
                    <a href="event-single-right.html" class="theme_button inverse bottommargin_0">Learn More</a>
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
      <div class="col-sm-5 col-md-4 col-lg-4">
        
        <div class="widget">
  
          <h3 class="widget-title">Showing</h3>
          <div class="radio">
            <label>
              <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">
              Upcoming
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
              Past
            </label>
          </div>
        </div>
  
        <div class="widget mt-30">
          <h3 class="widget-title">Type</h3>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="optionsRadios" id="optionsRadios2" value="option2">
              Basic Obedience Class
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="optionsRadios" id="optionsRadios1" value="option1">
              Adoption Drive
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="optionsRadios" id="optionsRadios2" value="option2">
              Others
            </label>
          </div>
        </div>
        
      
      </div>
      <!-- eof aside sidebar -->
    
    </div>
  </div>
@endsection

@section('script')
  <script>
    var vm = new Vue({
      el: "#app",
      data: {
        events: {},
        base_url: '{{ url('/') }}'
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