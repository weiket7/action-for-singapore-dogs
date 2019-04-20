@extends('template', [
  "title"=>"Action for Singapore Dogs",
  "meta_desc"=>"Action for Singapore Dogs (ASD) is a non-profit organisation dedicated to improving welfare of dogs and finding homes for the ".$adopt_count." dogs who are available for adoption."
])

@section('content')
  <div id="app" class="container content">
    <div class="row">
      <div class="col-md-7">
        <div class="bxslider">
          @foreach($banners as $banner)
            @if($banner->link_to != 'None')
              <?php if ($banner->link_to == 'Event') {
                $url = '/event/'.$banner->event_slug;
              } else if ($banner->link_to == 'Blog') {
                $url = '/blog/post/'.$banner->blog_slug;
              } ?>
              <a href="{{ url($url) }}">
                <img src="{{ asset('assets/images/banners/'.$banner->image) }}" title="{{ $banner->name }}" />
              </a>
            @else
              <img src="{{ asset('assets/images/banners/'.$banner->image) }}" title="{{ $banner->name }}" />
            @endif
          @endforeach
        </div>
      </div>
      <div class="col-md-5">
        <h4 class="entry-title home-title">
          {{ $contents['Home Banner Title'] }}
        </h4>
  
        <p class="event-detail">
          {!!  $contents['Home Banner Content'] !!}
        </p>
      </div>
    </div>
  </div>
  
  <section id="how-you-can-help" style="background-color:#f2f2f2" class="pt-30 mt-30">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-md-offset-1 text-center">
          <h2 class="section_header bold">
            How You Can Help
          </h2>
        </div>
      </div>
      <div class="row columns_margin_bottom_30 columns_margin_top_0">
        <div class="col-md-4 col-sm-6">
          <article class="vertical-item">
            <div class="item-content">
              <h3 class="entry-title">
                <a href="{{ url('dogs-for-adoption') }}" class="bold">ADOPT</a>
              </h3>
              <p>
                {!! $contents['Home Adopt'] !!}
              </p>
              <p class="topmargin_30">
                <a href="{{ url('/dogs-for-adoption') }}" class="theme_button">View Dogs for Adoption</a>
              </p>
            </div>
          </article>
        </div>
        
        <div class="col-md-4 col-sm-6">
          <article class="vertical-item">
            <div class="item-content">
              <h3 class="entry-title">
                <a href="{{ url('/donate') }}" class="bold">Donate</a>
              </h3>
              <p>
                {!! $contents['Home Donate'] !!}
              </p>
              <p class="topmargin_30">
                <a href="{{ url('/donate') }}" class="theme_button">Make a Donation</a>
              </p>
            </div>
          </article>
        </div>
        
        <div class="col-md-4 col-sm-6 col-sm-offset-3 col-md-offset-0">
          <article class="vertical-item">
            <div class="item-content">
              <h3 class="entry-title">
                <a href="{{ url('/volunteer') }}" class="bold">Volunteer</a>
              </h3>
              <p>
                {!! $contents['Home Volunteer'] !!}
              </p>
              <p class="topmargin_30">
                <a href="{{ url('/volunteer') }}" class="theme_button">Be a Volunteer</a>
              </p>
            </div>
          </article>
        </div>
      </div>
    </div>
  </section>
  
  <section id="dogs-for-adoption" class="mt-30 mb-30">
    <div class="container">
      <div class="row text-center">
        <h2 class="section_header bold text-center no-mb">
          Dogs for Adoption
        </h2>
        Showing 8 out of {{ $adopt_count }} dogs for adoption
      </div>
      <div class="row">
        <div class="visible-lg visible-md">
          <div class="bxslider">
            <div v-for="chunk in adopts_desktop" class="bxslider-row">
              <div v-for="adopt in chunk" class="col-xs-3">
                <adopt-item :adopt="adopt" :key="adopt.adopt_id" :highlight="hasHeart(adopt.adopt_id)" v-on:heart-adopt="heartAdopt"></adopt-item>
              </div>
            </div>
          </div>
        </div>
        
        <div class="hidden-lg hidden-md">
          <div class="bxslider">
            <div v-for="chunk in adopts_mobile" class="bxslider-row">
              <div v-for="adopt in chunk" class="col-xs-6">
                <adopt-item :adopt="adopt" :key="adopt.adopt_id" :highlight="hasHeart(adopt.adopt_id)" v-on:heart-adopt="heartAdopt"></adopt-item>
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-md-12 text-center mt-20">
          <a href="{{url('dogs-for-adoption')}}" class="theme_button btn-view-adoption margin_0">View Dogs for Adoption</a>
        </div>
      </div>
    </div>
  </section>
  
  <section id="what-we-do" style="background-color:#f2f2f2" class="pt-30">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-md-offset-1 text-center">
          <h2 class="section_header bold">
            What We Do
          </h2>
        </div>
      </div>
      <div class="row columns_margin_bottom_30 columns_margin_top_0">
        <div class="col-md-4 col-sm-6">
          <article class="vertical-item">
            <div class="item-content">
              <h3 class="entry-title">
                <a href="{{ url('/blog/dogs-in-need') }}" class="bold">Rescue</a>
              </h3>
              <p>
                {!! $contents['Home Rescue'] !!}
              </p>
              <p class="topmargin_30">
                <a href="{{ url('/blog/dogs-in-need') }}" class="theme_button inverse">Learn More</a>
              </p>
            </div>
          </article>
        </div>
        
        <div class="col-md-4 col-sm-6">
          <article class="vertical-item">
            <div class="item-content">
              <h3 class="entry-title">
                <a href="{{ url('/blog/dogs-in-need') }}" class="bold">Rehabilitate</a>
              </h3>
              <p>
                {!! $contents['Home Rehabilitate'] !!}
              </p>
              <p class="topmargin_30">
                <a href="{{ url('/blog/dogs-in-need') }}" class="theme_button inverse">Learn More</a>
              </p>
            </div>
          </article>
        </div>
        
        <div class="col-md-4 col-sm-6 col-sm-offset-3 col-md-offset-0">
          <article class="vertical-item">
            <div class="item-content">
              <h3 class="entry-title">
                <a href="{{ url('/blog/gone-to-loving-homes') }}" class="bold">Rehome</a>
              </h3>
              <p>
                {!! $contents['Home Rehome'] !!}
              </p>
              <p class="topmargin_30">
                <a href="{{ url('/blog/gone-to-loving-homes') }}" class="theme_button inverse">Learn More</a>
              </p>
            </div>
          </article>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('script')
  <script>
    var vm = new Vue({
      el: "#app",
      data: {
        adopts: {!!  json_encode($adopts) !!},
        adopts_desktop: [],
        adopts_mobile: [],
        hearts: []
      },
      created() {
        this.adopts_desktop = _.chunk(this.adopts, 4);
        this.adopts_mobile = _.chunk(this.adopts, 2);
        this.hearts = window.getHearts();
      },
      methods: {
        hasHeart(adopt_id) {
          if (window.objectIsEmpty(this.hearts)) {
            return false;
          }
          return this.hearts.indexOf(adopt_id) >= 0;
        },
        heartAdopt(adopt_id) {
          window.addOrRemoveHearts(this.hearts, adopt_id);
        },
      }
    });
    
    //https://github.com/stevenwanderski/bxslider-4/issues/1188
    //https://github.com/stevenwanderski/bxslider-4/issues/1240
    $('.bxslider').bxSlider({ touchEnabled: false });
  </script>
@endsection