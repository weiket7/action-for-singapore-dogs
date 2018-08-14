<div class="col-md-3">
  <div class="adopt-grid-border">
    <div class="adopt-grid-image">
      <a href="{{ url('adopt/'.$adopt->slug) }}">
        <img src="{{ url('assets/images/adopts/'.$adopt->image) }}" alt="">
      </a>
    </div>
    <h3 class="adopt-grid-name">
      <a href="{{ url('adopt/'.$adopt->slug) }}">{{ $adopt->name }}</a>
    </h3>
    <p class="adopt-grid-content">
      @if($adopt->gender == 'M')
        <i class="fas fa-mars"></i>
        <span>Male</span>
      @else
        <i class="fas fa-venus"></i>
        <span>Female</span>
      @endif
      <br>
      
      <i class="fas fa-birthday-cake"></i> {{ $adopt->age }}
      <br>
      
      <i class="fas fa-home"></i>
      
      <span>
        @if($adopt->hdb)
          HDB Approved
        @else
          Not HDB Approved
        @endif
      </span><br>
    </p>
    <div class="row">
      <div class="col-xs-8">
        <a href="{{ url('adopt/'.$adopt->slug) }}" class="theme_button inverse margin_0">Learn More</a>
      </div>
      <div class="col-xs-4 text-right">
        <i @click="heartAdopt" :class="{'highlight': highlight}" class="fas fa-heart fa-2x adopt-heart"></i>
      </div>
    </div>
  </div>
</div>