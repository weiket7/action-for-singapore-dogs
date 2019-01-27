<?php use App\Helpers\ViewHelper; ?>

@extends('template', ['title'=>'ASD - Dogs In Need'])

@section('content')
  <div id="app" class="container content">
    <div class="row">
      <div class="col-sm-12">
        <article class="vertical-item">
          <div class="item-media">
            <img src="{{ url('assets/images/dogs-in-need/'.$dog_in_need->image) }}" alt="" class="img-responsive" style="width: auto; max-height: 300px"/>
          </div>
          
          <div class="item-content">
            <header class="entry-header">
              
              <h1 class="entry-title black bottommargin_10">
                Dogs in Need - {{ $dog_in_need->dog_name }}
              </h1>
              <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
              Posted On: {{ ViewHelper::formatDate($dog_in_need->posted_on) }}
            </header>
            <br>
  
            <div class="entry-content">
              <p class="event-detail">
                {!! nl2br($dog_in_need->content) !!}
              </p>
            </div>
          </div>
        </article>
      </div>
    </div>
  </div>
@endsection