@extends('template', [
'title'=>'ASD - '.$page->title,
'meta_desc'=>$page->meta_desc
])

@section('content')
  <div class="container content">
    <h2 class="section_header bold text-center">{{ $page->title }}</h2>

    <div class="row">
      <div class="col-sm-12">
  
        <span>
          {!! nl2br($page->content) !!}
        </span>
      </div>
    </div>
  </div>
@endsection