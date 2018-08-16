@extends('template', [
'title'=>'ASD - '.$page->title,
'meta_desc'=>$page->meta_desc
])

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