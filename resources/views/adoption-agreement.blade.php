@extends('template')

@section('content')
  <div id="app" class="container content">
    <h2 class="section_header bold text-center">Adoption Agreement</h2>
    
    <div class="row">
      <div class="col-md-3 col-center">
        <div class="adopt-grid-border">
          <div class="adopt-grid-image">
            <a href="{{ url('/adopt/'.$adopt->slug) }}">
              <img src="{{ url("assets/images/adopts/".$adopt->image) }}" class="img-responsive" alt="">
            </a>
          </div>
          <h3 class="adopt-grid-name">
            <a href="{{ url('/adopt/'.$adopt->slug) }}">{{ $adopt->name }}</a>
          </h3>
          <p class="adopt-grid-content">
            @if($adopt->gender == 'M')
              <i class="fas fa-mars"></i>
            @else
              <i class="fas fa-venus"></i>
            @endif
            <span>{{ $adopt->gender == 'M' ? 'Male' : 'Female' }}</span>
            <br>
      
            <i class="fas fa-birthday-cake"></i> {{ $adopt->age }}
            <br>
      
            <i class="fas fa-home"></i>
            <span>{{ $adopt->hdb == 'N' ? 'Not' : '' }}HDB Approved</span>
          </p>
        </div>
      </div>
    </div>
    <br>
    
    <form @submit.prevent="onSubmit()" class="form-horizontal">
      <h3 class="text-center no-mb">Personal Info</h3>
      
      <div class="form-group">
        <label class="col-sm-4 control-label"><b>Name</b></label>
        <div class="col-sm-8 no-mb">
          <p class="form-control-static">{{ $adoption_form->name }}</p>
        </div>
      </div>
      
      <div class="form-group">
        <label class="col-sm-4 control-label"><b>Email</b></label>
        <div class="col-sm-8 no-mb">
          <p class="form-control-static">{{ $adoption_form->email }}</p>
        </div>
      </div>
      
      <div class="form-group">
        <label class="col-sm-4 control-label"><b>Mobile</b></label>
        <div class="col-sm-8 no-mb">
          <p class="form-control-static">{{ $adoption_form->mobile }}</p>
        </div>
      </div>
      
      <div class="form-group">
        <label class="col-sm-4 control-label"><b>Birthday</b></label>
        <div class="col-sm-8 no-mb">
          <p class="form-control-static">{{ \App\Helpers\ViewHelper::formatDate($adoption_form->birthday) }}</p>
        </div>
      </div>
      
      <div class="form-group">
        <label class="col-sm-4 control-label"><b>Gender</b></label>
        <div class="col-sm-8 no-mb">
          <p class="form-control-static">{{ $adoption_form->gender == 'M' ? 'Male' : 'Female' }}</p>
        </div>
      </div>
      
      <div class="form-group">
        <label class="col-sm-4 control-label"><b>Address</b></label>
        <div class="col-sm-8 no-mb">
          <p class="form-control-static">{{ $adoption_form->address }}</p>
        </div>
      </div>
      
      <div class="form-group">
        <label class="col-sm-4 control-label"><b>Postal Code</b></label>
        <div class="col-sm-8 no-mb">
          <p class="form-control-static">{{ $adoption_form->postal }}</p>
        </div>
      </div>
      
      <hr>
      
      <h3 class="text-center no-mb">Questionnaire</h3>
      
      @foreach($answers as $answer)
        <div>
          @if($answer->is_header)
            <h4 class="adoption-form-header text-center">{{ $answer->question }}</h4>
          @else
            <div class="form-group">
              <label class="col-sm-4 control-label">{{ $answer->question }}</label>
              <div class="col-sm-8">
                <p class="form-control-static">{{ $answer->answer }}</p>
              </div>
            </div>
          @endif
        </div>
      @endforeach
      
      <div class="row">
        <div class="col-md-12 text-center">
          <button type="submit">I agree to the adoption agreement to adopt {{ $adopt->name }}</button>
        </div>
      </div>
  
      <div class="row">
        <div class="alert alert-success mt-10" v-show="success">
          Thank you, our rehomers will get in touch with you via email.
        </div>
        <div class="alert alert-danger mt-10" v-show="error">
          There were some errors, please check the form
        </div>
      </div>
    </form>
    @endsection
    
    @section('script')
      <script>
        var vm = new Vue({
          el: "#app",
          data: {
            adoption_form: {!! json_encode($adoption_form) !!},
            adopt: {!! json_encode($adopt) !!},
            agreement_token: '{{ $agreement_token }}',
            success: false,
            error: false,
            base_url: '{{ url('/') }}'
          },
          methods: {
            onSubmit: function() {
              axios.post(this.base_url+'/api/adoption-form/save-agreement/'+this.agreement_token)
                .then(response => {
                  this.success = true;
                  this.error = false;
                })
                .catch(error => {
                  this.error = true;
                  this.success = false;
                });
            }
          }
        })
      </script>
@endsection