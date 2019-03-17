@extends('template', [
'title'=>'ASD - Basic Obedience Class',
'meta_desc'=>'basic obedience class'
])

@section('content')
  <div class="container content">
    <h2 class="section_header bold text-center">Dog Listener Academy</h2>
    
    <div class="row">
      <div class="col-sm-12">
  
        <span>
          {!! nl2br($content) !!}
          <br>
          <h2>Basic Obedience Classes</h2>
          
          @foreach($events as $event)
            {{ $event->name }}<br>
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
          @endforeach
          
          <div class="alert alert-info">
            Click <a href="{{ url('basic-obedience-class-form') }}">here</a> to sign up
          </div>
        </span>
      </div>
    </div>
  </div>
@endsection