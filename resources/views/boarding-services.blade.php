@extends('template', ['title'=>'ASD - Boarding Services'])

@section('content')
  <div class="container content">
    <div class="row">
      <div class="col-md-10 col-md-offset-1 text-center">
        <h2 class="section_header bold">Boarding Services</h2>
      </div>
    </div>
  
    <div class="row">
      <div class="col-md-12">
        {!! $content !!}
      </div>
    </div>
  
    @foreach($testimonials as $testimonial)
      <div class="row">
        <div class="col-md-3">
          <img class="media-object" src="{{ asset('assets/images/boarding/'.$testimonial->image) }}">
        </div>
        <div class="col-md-9">
          {{ $testimonial->content }}
          <blockquote>
            <p>{{ $testimonial->quote }}</p>
          </blockquote>
        </div>
      </div>
      @if(! $loop->last)
        <hr>
      @endif
    @endforeach
  </div>
@endsection