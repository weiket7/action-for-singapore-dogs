@extends('template', ['title'=>'ASD Events - Adoption drives, basic obedience classes etc'])

@section('content')
  <div id="app" class="container content">
    <div class="row">
      
      <div class="col-sm-7 col-md-8 col-lg-8">
        
        <div v-for="event in events">
          <div class="side-item">
            <a :href="'event/' + event.slug" v-if="event.image">
              <div class="item-media entry-thumbnail">
                <img :src="'assets/images/events/'+event.image" alt="">
              </div>
            </a>
            
            <h4 class="entry-title">
              <a :href="'event/' + event.slug">@{{ event.name }}</a>
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
            <!--<p>Stet clita kasd gubergren, no sea takimata sanctus sed diam voluptua.</p>-->
            <p>
              <a :href="'event/' + event.slug" class="theme_button inverse bottommargin_0">Learn More</a>
            </p>
          </div>
          
          <hr class="divider_20">
        </div>
      
      </div>
      <!--eof .col-sm-8 (main content)-->
      
      <!-- sidebar -->
      <div class="col-sm-5 col-md-4 col-lg-4">
        
        <div class="widget">
          
          <h3 class="widget-title">Showing</h3>
          <div class="checkbox">
            <label>
              <input type="checkbox" v-model="showing" name="showing" value="upcoming">
              Upcoming
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" v-model="showing" name="showing" value="past">
              Past
            </label>
          </div>
        </div>
        
        <div class="widget mt-30">
          <h3 class="widget-title">Type</h3>
          <div class="checkbox">
            <label>
              <input type="checkbox" v-model="type" name="type" value="A">
              Adoption Drives
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" v-model="type" name="type" value="B">
              Basic Obedience Classes
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" v-model="type" name="type" value="S">
              Social Events
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" v-model="type" name="type" value="O">
              Others
            </label>
          </div>
        </div>
        <br>
        
        <button type="button" @click="filterEvent" class="theme_button inverse margin_0">Search</button>
      </div>
      <!-- eof aside sidebar -->
    
    </div>
  </div>
@endsection

@section('script')
  <script>
    var vm = new Vue({
      name: "events",
      el: "#app",
      data: {
        events: {!! json_encode($events) !!},
        showing: [],
        type: [],
      },
      methods: {
        filterEvent() {
          let data = {
            showing: this.showing,
            type: this.type,
          };
          axios.post('api/event/filter', data)
            .then(response => {
              this.events = response.data.events;
            })
        }
      },
    })
  </script>

@endsection
