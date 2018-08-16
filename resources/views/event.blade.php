@extends('template')

@section('content')
  <div id="app" class="container content">
    <div class="row">
      <div class="col-sm-12">
        <article class="vertical-item">
          @if($event->image)
            <div class="item-media">
              <img src="{{ url('assets/images/events/'.$event->image) }}" alt="" />
            </div>
          @endif
          
          <div class="item-content">
            @if($event->is_adoption_drive)
              <header class="entry-header">
                
                <h1 class="entry-title black bottommargin_10">
                  {{ $event->name }}
                </h1>
              </header>
            @endif
            
            <div class="entry-content">
              @if($event->is_adoption_drive)
                <p class="event-detail">
                  <i class="fa fa-map-marker" aria-hidden="true"></i>
                  {{ $event->location }}
                  <br>
                  <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                  {{ ViewHelper::formatDate($event->date) }}
                  <br><br>
                  
                  {{ $event->desc }}
                </p>
                
                <div v-for="chunk in adopts" class="row">
                  <div class="col-md-3" v-for="adopt in chunk" >
                    <adopt-item :adopt="adopt" :key="adopt.adopt_id"></adopt-item>
                  </div>
                </div>
              @else
              
                <p class="event-detail">
                  <i class="fa fa-map-marker" aria-hidden="true"></i>
                  {{ $event->location }}
                  <br>
                  <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                  {{ ViewHelper::formatDate($event->date) }}
                  <br>
                  <i class="fa fa-clock" aria-hidden="true"></i> {{ $event->time }}
                  @if($event->duration)
                    <span>
                      <br><i class="fas fa-ruler-horizontal" aria-hidden="true"></i> {{ $event->duration }}
                    </span>
                  @endif
                  @if($event->cost)
                    <span>
                    <br><i class="fa fa-dollar-sign" aria-hidden="true"></i> {{ $event->cost }}
                  </span>
                  @endif
                  <br><br>
                  
                  {{ $event->desc }}
                </p>
              @endif
              
              <p class="topmargin_30">
                <div class="fb-share-button"
                     :data-href="url"
                     data-layout="button_count" data-size="large"
                     data-mobile-iframe="true">
                  <a target="_blank" :href="url"
                     class="fb-xfbml-parse-ignore">Share</a>
                </div>
              </p>
            </div>
          </div>
        </article>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script>
    var vm = new Vue({
      el: "#app",
      data: {
        adopts_raw: {!! json_encode($adopts) !!}
      },
      computed: {
        url() {
          return window.location.href;
        },
        adopts() {
          return _.chunk(this.adopts_raw, 4);
        }
      }
    })
  </script>
@endsection