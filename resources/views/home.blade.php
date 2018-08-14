@extends('template')

@section('content')
  <div class="container content">
    <div class="row">
      <div class="col-md-8">
        <div class="bxslider">
          @foreach($banners as $banner)
            @if($banner->url)
              <a href="{{ url($banner->url) }}">
                <img src="{{ asset('assets/images/banners/'.$banner->image) }}" title="banner.name" />
              </a>
            @else
              <img :src="'assets/images/banners/'+banner.image" :title="banner.name">
            @endif
          @endforeach
        </div>
      </div>
      <div class="col-md-4">
        <h2 class="section_header bold">Events</h2>
        <h4 class="entry-title">
          Basic Obedience Class
        </h4>
        
        <p class="event-detail">
          Our Basic Obedience Foundation Class incorporate the Amichien Bonding (TM) principles which are the foundation of your relationship with your dog.
          <br><br>
          <i aria-hidden="true" class="fa fa-map-marker"></i>
          Bishan Park II
          <br> <i aria-hidden="true" class="fa fa-calendar-check-o"></i>
          15 Jun 2018
          <br> <i aria-hidden="true" class="fa fa-clock"></i> 4.30 pm to 6.00pm (1.5hrs)
          <span><br><i aria-hidden="true" class="fas fa-ruler-horizontal"></i> 6 weeks, every Sunday
                  </span> <span><br><i aria-hidden="true" class="fa fa-dollar-sign"></i> 350
                  </span></p>
      </div>
    </div>
  </div>
  
  <section id="how-you-can-help" style="background-color:#f2f2f2" class="pt-30 mt-30">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-md-offset-1 text-center">
          <h2 class="section_header bold">
            How you can help
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
                At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis um voluptatum deleniti atque
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
                At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis um voluptatum deleniti atque
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
                At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis um voluptatum deleniti atque
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
      <div class="row">
        <h2 class="section_header bold text-center">
          <span class="">Dogs for Adoption</span>
        </h2>
      </div>
      <div class="row">
        <div class="visible-lg visible-md">
          <div class="bxslider">
            @foreach($adopts_desktop as $chunk)
              <div class="bxslider-row">
                @each('adopt-item', $chunk, 'adopt')
              </div>
            @endforeach
          </div>
        </div>
        
        <div class="hidden-lg hidden-md">
          <div class="bxslider">
            <div v-for="chunk in adopts_mobile" class="row bxslider-row">
              <div v-for="adopt in chunk" class="col-xs-6">
                <adopt-item :adopt="adopt" :key="adopt.adopt_id"></adopt-item>
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-md-12 text-center">
          <a href="#/adopt/Kodomo" class="theme_button btn-view-adoption margin_0">View Dogs for Adoption</a>
        </div>
      </div>
    </div>
  </section>
  
  <section id="what-we-do" style="background-color:#f2f2f2" class="pt-30">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-md-offset-1 text-center">
          <h2 class="section_header bold">
            what we do
          </h2>
        </div>
      </div>
      <div class="row columns_margin_bottom_30 columns_margin_top_0">
        <div class="col-md-4 col-sm-6">
          <article class="vertical-item">
            <div class="item-content">
              <h3 class="entry-title">
                <a href="{{ url('/coming-soon') }}" class="bold">Rescue</a>
              </h3>
              <p>
                At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis um voluptatum deleniti atque
              </p>
              <p class="topmargin_30">
                <a href="{{ url('/coming-soon') }}" class="theme_button inverse">Learn More</a>
              </p>
            </div>
          </article>
        </div>
        
        <div class="col-md-4 col-sm-6">
          <article class="vertical-item">
            <div class="item-content">
              <h3 class="entry-title">
                <a href="{{ url('/coming-soon') }}" class="bold">Rehabilitate</a>
              </h3>
              <p>
                At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis um voluptatum deleniti atque
              </p>
              <p class="topmargin_30">
                <a href="{{ url('/coming-soon') }}" class="theme_button inverse">Learn More</a>
              </p>
            </div>
          </article>
        </div>
        
        <div class="col-md-4 col-sm-6 col-sm-offset-3 col-md-offset-0">
          <article class="vertical-item">
            <div class="item-content">
              <h3 class="entry-title">
                <a href="{{ url('/coming-soon') }}" class="bold">Rehome</a>
              </h3>
              <p>
                At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis um voluptatum deleniti atque
              </p>
              <p class="topmargin_30">
                <a href="{{ url('/coming-soon') }}" class="theme_button inverse">Learn More</a>
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
    $('.bxslider').bxSlider();
  </script>
@endsection