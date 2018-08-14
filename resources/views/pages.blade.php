@extends('template')

@section('content')
  <div class="container content">
    <div class="row">
      <div class="col-sm-12">
        <h2>{{ $page->title }}</h2>
        
        <span>
          {!! $page->content !!}
        </span>
      </div>
    </div>
  </div>
@endsection