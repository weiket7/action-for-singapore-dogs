<?php use App\Helpers\ViewHelper; ?>

@extends('template', ['title'=>'ASD - Dogs In Need'])

@section('content')
  <div id="app" class="container content">
    <div class="row">
      <div class="col-sm-12">
        <article class="vertical-item">
          <img src="{{ url('assets/images/blog/'.ViewHelper::blogImageFolder($blog->type).'/'.$blog->image) }}" alt="" />
          
          <div class="item-content">
            <header class="entry-header">
              
              <h1 class="entry-title black bottommargin_10">
                Dogs in Need - {{ $blog->title }}
              </h1>
              <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
              Posted On: {{ ViewHelper::formatDate($blog->posted_on) }}
            </header>
            <br>
  
            <div class="entry-content">
              <p class="event-detail">
                {!! nl2br($blog->content) !!}
              </p>
            </div>
          </div>
        </article>
      </div>
    </div>
  </div>
@endsection