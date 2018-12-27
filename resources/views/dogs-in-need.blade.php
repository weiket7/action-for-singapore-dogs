<?php use App\Helpers\ViewHelper; ?>

@extends('template', ['title'=>'ASD - Dogs In Need'])

@section('content')
  <div id="app" class="container content">
    @foreach($dogs_in_need as $d)
      <div class="row">
        <div class="col-md-4">
  
          <a href="{{ url('dogs-in-need/'.$d->dog_name) }}">
            <img src="{{ url('assets/images/dogs-in-need/'.$d->image) }}" alt="" />
          </a>
        </div>
        
        <div class="col-md-8">
          <a href="{{ url('dogs-in-need/'.$d->dog_name) }}">
            <h4 class="blog-title">{{ $d->title }}</h4>
          </a>
          <p class="event-detail">Posted On: {{ ViewHelper::formatDate($d->posted_on) }}</p>
          <p>{{ ViewHelper::limitContent($d->content, 300) }}...</p>
        </div>
      </div>
      
      <hr>
    @endforeach
  </div>
@endsection