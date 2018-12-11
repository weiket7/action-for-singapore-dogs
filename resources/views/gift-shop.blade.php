@extends('template', ['title'=>'ASD - Gift Shop'])

@section('content')
  <div id="app" class="container content">
    <div class="row">
      <div class="col-md-10 col-md-offset-1 text-center">
        <h2 class="section_header bold">Gift Shop</h2>
      </div>
    </div>
    
    <div class="alert alert-info">
      To purchase, please email us at <a href="mailto:info@asdsingapore.com">info@asdsingapore.com</a>.
    </div>
    
    @foreach($gift_chunks as $chunk)
      <div class="row">
        @foreach($chunk as $gift)
          <div class="col-md-3 text-center" >
            <img src="{{ url("assets/images/gifts/".$gift->image) }}">
            <br>
            <b>{{ $gift->name }}</b>
            <br>Price: ${{ $gift->price }}
            <br>Quantity: {{ $gift->quantity }}
          </div>
        @endforeach
      </div>
    @endforeach
  </div>
@endsection