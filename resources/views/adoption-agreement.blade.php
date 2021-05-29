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
            <span>{{ $adopt->hdb == 'N' ? 'Not' : '' }} HDB Approved</span>
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
      
      <h3 class="text-center no-mb">Terms and Conditions</h3>
      
      <p>I, the Adopter, agree to abide by the following conditions:</p>
      <p>1. I understand that this is a permanent adoption. I am fully responsible for and must be committed to the dog's health and
      welfare throughout his/her entire life.</p>
      <p>2. I must allow home visits by rehoming personnel in order for them to help with potential problems associated with new
      adoptions and to assist with the adaptability of both the dog and myself.</p>
      <p>3. The dog must be vaccinated, microchipped and licensed. Puppies must receive 3 vaccinations in their first year, each to be
      carried out a month apart. This must be followed by annual vaccinations or as advised by the vet. (The cost of microchipping
      and the cost of vaccinations received up to the point of adoption are covered by the adoption fee).</p>
      <p>4. The dog must be sterilized. Sterilization must be done when the dog is at least six months of age, regardless of gender. (The
      cost of sterilization is covered by the adoption fee).</p>
      <p>5. I must contact and be willing to work with rehoming personnel on common problems associated with the introduction of the
      dog into his/her new environment.</p>
      <p>6. I must immediately inform ASD of any change in address, ownership or change in circumstances that may affect the mental
      or physical well being of the dog.</p>
      <p>7. If I intend to leave Singapore permanently, I will bring the dog along with me. At no time will I attempt to absolve my
      responsibility by abandoning the dog.</p>
      <p>8. In the unlikely event that I am considering giving up the dog or euthanizing him/her, I must contact ASD prior to making
      such a decision and allow ASD the discretion of rehoming the dog or making any other arrangements they deem fit.</p>
      <p>9. Should there be evidence of abuse (i.e. extreme malnutrition, unnecessary beatings, ill treatment etc.) and I remain adamant
      about maintaining this current treatment, ASD reserves the right to take possession of the dog and to make any decisions they
      deem fit. </p>

      
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