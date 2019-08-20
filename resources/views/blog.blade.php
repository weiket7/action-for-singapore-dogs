<?php use App\Helpers\ViewHelper; ?>

@extends('template', ['title'=>'ASD - '.$type])

@section('content')
  <div id="app" class="container content">
    <div class="row">
      <div class="col-md-10 col-md-offset-1 text-center">
        <h2 class="section_header bold">{{ $type }}</h2>
      </div>
    </div>
    
    @foreach($posts as $post)
      <div class="row">
        <div class="col-md-4">
  
          <a href="{{ url('blog/post/'.$post->slug) }}">
            <img src="{{ url('assets/images/blog/'.ViewHelper::blogImageFolder($post->type).'/'.$post->image) }}" alt="" />
          </a>
        </div>
        
        <div class="col-md-8">
          <a href="{{ url('blog/post/'.$post->slug) }}">
            <h4 class="blog-title">{{ $post->title }}</h4>
          </a>
          <p class="event-detail">Posted On: {{ ViewHelper::formatDate($post->posted_on) }}</p>
          <p>{!!  nl2br(ViewHelper::limitContent($post->content, 300))  !!}...</p>
        </div>
      </div>
      
      <hr>
    @endforeach
  </div>
@endsection