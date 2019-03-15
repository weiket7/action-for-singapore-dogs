@extends('template', [
'title'=>'ASD - Volunteer at Adoption & Rescue Centre',
"meta_desc"=>"You can help Action for Singapore Dogs and the dogs by volunteering to help at Adoption & Rescue Centre, with rescuing, rehoming, fostering, publicity, fund raising, events and logistics."
])

@section('content')
  <div id="app" class="container content">
    <div class="row">
      <div class="col-md-10 col-md-offset-1 text-center">
        <h2 class="section_header bold">Be A
          <span class="highlight">Volunteer</span>
        </h2>
      </div>
    </div>
    <div class="row mt-20">
      <div class="col-md-6">
        <!--<h2 class="black highlight">Donator</h2>-->
        <p>
          {!! nl2br($contents['Volunteer Content'])  !!}
        </p>
        <form @submit.prevent="onSubmit()" class="donator-form topmargin_30 form-horizontal" id="donatorform" method="post" action="">
          <volunteer-field name="Name" :error="errors.get('name')" :required="true">
            <input type="text" v-model="volunteer.name" class="form-control" autofocus>
          </volunteer-field>
          
          <volunteer-field name="Email" :error="errors.get('email')" :required="true">
            <input type="email" v-model="volunteer.email" class="form-control">
          </volunteer-field>
          
          <volunteer-field name="Mobile" :error="errors.get('mobile')" :required="true">
            <input type="text" v-model="volunteer.mobile" class="form-control">
          </volunteer-field>
          
          <volunteer-field name="Birthday" :error="errors.get('birthday')" :required="true">
            <input type="text" class="form-control datepicker" readonly>
          </volunteer-field>
          
          <volunteer-field name="Gender" :error="errors.get('gender')" :required="true">
            <label class="radio-inline">
              <input type="radio" v-model="volunteer.gender" name="gender" value="M"> Male
            </label>
            <label class="radio-inline">
              <input type="radio" v-model="volunteer.gender" name="gender" value="F"> Female
            </label>
          </volunteer-field>
          
          <volunteer-field name="Occupation" :error="errors.get('occupation')" :required="true">
            <input type="text" v-model="volunteer.occupation" class="form-control">
          </volunteer-field>
          
          <volunteer-field name="Amount of time you can afford" :error="errors.get('availability')" :required="true">
            <input type="text" v-model="volunteer.availability" class="form-control">
          </volunteer-field>
          
          <volunteer-field name="I'm interested in" :error="errors.get('interests')" :required="true">
            <div class="checkbox">
              <label>
                <input type="checkbox" v-model="volunteer.interests" value="Rescuing"> Rescuing
              </label>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" v-model="volunteer.interests" value="Rehoming"> Rehoming
              </label>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" v-model="volunteer.interests" value="Fostering"> Fostering
              </label>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" v-model="volunteer.interests" value="Volunteering"> Volunteer at Adoption & Rescue Centre (ARC)
              </label>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" v-model="volunteer.interests" value="Publicity"> Publicity
              </label>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" v-model="volunteer.interests" value="Fund Raising & Events"> Fund Raising & Events
              </label>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" v-model="volunteer.interests" value="Logistics"> Logistics & Transport
              </label>
            </div>
          </volunteer-field>
          
          <volunteer-field name="Preferred dog size" :error="errors.get('preferred_dog_size')" v-if="has_fostering">
            <select class="form-control" v-model="volunteer.preferred_dog_size">
              <option>No preference</option>
              <option>Large</option>
              <option>Medium</option>
              <option>Small</option>
            </select>
          </volunteer-field>
          
          <volunteer-field name="Number of dogs currently" :error="errors.get('current_no_of_dogs')" v-if="has_fostering">
            <input type="text" v-model="volunteer.current_no_of_dogs" class="form-control">
          </volunteer-field>
          
          <volunteer-field name="Type of vehicle" :error="errors.get('vehicle')" v-if="has_logistics">
            <select class="form-control" v-model="volunteer.vehicle">
              <option value=""></option>
              <option>Car</option>
              <option>Van</option>
              <option>Lorry</option>
              <option>Mini Bus</option>
            </select>
          </volunteer-field>
          
          <volunteer-field name="Area to help in" :error="errors.get('publicity_area')" v-if="has_publicity">
            <select v-model="publicity_area" class="form-control">
              <option value=""></option>
              <option value="Designing">Designing</option>
              <option value="Pamphlet Distribution">Pamphlet Distribution</option>
              <option value="Media Producer">Media Producer</option>
              <option value="Education Counsellor">Education Counsellor</option>
            </select>
          </volunteer-field>
          
          <div class="form-group">
            <div class="col-sm-12 col-sm-offset-3">
              <button type="submit" class="theme_button" :disabled="loading">
                <span class="glyphicon glyphicon-refresh glyphicon-refresh-animate" v-if="loading"></span>
                @{{ loading ? "Processing" : "Submit" }}
              </button>
              
              <div class="alert alert-success mt-10" v-show="success">
                Thank you
              </div>
              <div class="alert alert-danger mt-10" v-show="errors.any()">
                There were some errors, please check the form
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="col-md-6 bottommargin_0">
        <div class="row text-center">
          <div class="col-xs-3 text-center clickable" @click="selectedActivity = 'rescuing'">
            <img src="assets/images/rescue.jpg" class="img-rounded">
            <br>Rescuing
          </div>
          <div class="col-xs-3 text-center clickable" @click="selectedActivity = 'rehoming'">
            <img src="assets/images/rehoming.jpg" class="img-rounded">
            <br>Rehoming
          </div>
          <div class="col-xs-3 text-center clickable" @click="selectedActivity = 'fostering'">
            <img src="assets/images/fostering.jpg" class="img-rounded">
            <br>Fostering
          </div>
          <div class="col-xs-3 text-center clickable" @click="selectedActivity = 'volunteer'">
            <img src="assets/images/volunteer.png" class="img-rounded">
            <br>Volunteer at Adoption & Rescue Centre (ARC)
          </div>
        </div>
        <div class="row text-center">
          <div class="col-xs-3 text-center clickable" @click="selectedActivity = 'fund-raising'">
            <img src="assets/images/fund-raising.jpg" class="img-rounded">
            <br>Fund Raising
          </div>
          <div class="col-xs-3 text-center clickable" @click="selectedActivity = 'publicity'">
            <img src="assets/images/publicity.jpg" class="img-rounded">
            <br>Publicity
          </div>
          <div class="col-xs-3 text-center clickable" @click="selectedActivity = 'logistics'">
            <img src="assets/images/logistics.gif" class="img-rounded">
            <br>Logistics & Transport
          </div>
        </div>

        <div class="mt-10 mb-20 text-center">(Click on the image to learn more)</div>
        <div class="row">
          <div class="col-md-12">
            <div v-if="selectedActivity == 'rescuing'">
              {!! nl2br($contents['Volunteer Rescuing']) !!}
            </div>
            <div v-if="selectedActivity == 'rehoming'">
              {!! nl2br($contents['Volunteer Rehoming']) !!}
            </div>
            <div v-if="selectedActivity == 'fostering'">
              {!! nl2br($contents['Volunteer Fostering']) !!}
            </div>
            <div v-if="selectedActivity == 'volunteer'">
              {!! nl2br($contents['Volunteer Volunteer']) !!}
            </div>
            <div v-if="selectedActivity == 'fund-raising'">
              {!! nl2br($contents['Volunteer Fund Raising']) !!}
            </div>
            <div v-if="selectedActivity == 'publicity'">
              {!! nl2br($contents['Volunteer Publicity']) !!}
            </div>
            <div v-if="selectedActivity == 'logistics'">
              {!! nl2br($contents['Volunteer Logistics']) !!}
            </div>
          </div>
        </div>
        
      </div>
      
      
    </div>
  </div>

@endsection

@section('script')
  <script>
    var vm = new Vue({
      name: "Volunteer",
      el: "#app",
      data: {
        volunteer: { name: "", mobile: "", email: "", interests: [] },
        success: false,
        loading: false,
        selectedActivity: false,
        errors: new Errors()
      },
      mounted: function() {
        var vue = this
        $(".datepicker").datepicker({
          changeMonth: true,
          changeYear: true,
          dateFormat: 'd M yy',
          yearRange: "-100:+0",
          onSelect: function(value, date) {
            vue.updateBirthday(moment(value, 'DD MMM YYYY').format('YYYY-MM-DD'));
          }
        });
      },
      methods: {
        updateBirthday: function(date) {
          this.volunteer.birthday = date;
        },
        onSubmit: function() {
          this.loading = true;
          axios.post('api/volunteer/form', this.volunteer)
            .then(this.onSuccess)
            .catch(this.onError);
        },
        onSuccess: function(response) {
          this.loading = false;
          this.success = true;
          this.errors = new Errors();
        },
        onError: function(error) {
          this.loading = false;
          this.success = false;
          if (error.response.status == 500) {
            alert("A system error occurred");
            return;
          }
          this.errors.record(error.response.data.errors);
        },
      },
      computed: {
        has_fostering: function() {
          return this.volunteer.interests.indexOf("Fostering") >= 0;
        },
        has_publicity: function() {
          return this.volunteer.interests.indexOf("Publicity") >= 0;
        },
        has_logistics: function() {
          return this.volunteer.interests.indexOf("Logistics") >= 0;
        }
      }
    })
  </script>
@endsection