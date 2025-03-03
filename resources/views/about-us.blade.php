@extends('template', [
  'title'=>'ASD - Dogs for Adoption',
])

@section('content')
  <div id="app" class="container content">
    <h2 class="section_header bold text-center">Who We Are</h2>
  
    {{-- <iframe width="560" height="315" src="https://www.youtube.com/embed/8e2qHk043zE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <br><br> --}}

    {!! nl2br($content) !!}

    {{-- <video width="600" height="400" controls>
      <source src="ASD - A Decade of Love, Hope & Dogs.mp4" type="video/mp4">
      Your browser does not support the video tag.
    </video>
    <br><small>Source: https://vimeo.com/61993034</small> --}}
  </div>
@endsection