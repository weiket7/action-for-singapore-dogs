@extends('template', [
'title'=>'ASD - Volunteer at Adoption & Rescue Centre',
"meta_desc"=>"You can help Action for Singapore Dogs and the dogs by volunteering to help at Adoption & Rescue Centre, with rescuing, rehoming, fostering, publicity, fund raising, events and logistics."
])

@section('content')
  <div id="app" class="container content">
    <div class="row">
      <div class="col-md-10 col-md-offset-1 text-center">
        <h2 class="section_header bold">
          Be A Volunteer
        </h2>
      </div>
    </div>
    <div class="row mt-20">
      <div class="col-md-12">
        <!--<h2 class="black highlight">Donator</h2>-->
        <p>
          {!! nl2br($contents['Volunteer Content'])  !!}
        </p>
        <br><br>

        <div class="row text-center">
          <div class="col-xs-3 text-center clickable" @click="selectedActivity = 'rehoming'">
            <img src="assets/images/rehoming.webp" class="img-rounded">
            <br>Rehoming
          </div>
          <div class="col-xs-3 text-center clickable" @click="selectedActivity = 'fostering'">
            <img src="assets/images/fostering.webp" class="img-rounded">
            <br>Fostering
          </div>
          <div class="col-xs-3 text-center clickable" @click="selectedActivity = 'volunteer'">
            <img src="assets/images/volunteer.webp" class="img-rounded">
            <br>Volunteer at ASD Canine Rehoming Centre (ACRC)
          </div>
          <div class="col-xs-3 text-center clickable" @click="selectedActivity = 'publicity'">
            <img src="assets/images/fund-raising.webp" class="img-rounded">
            <br>Fund Raising & Publicity
          </div>
        </div>
        <div class="row text-center">
          <div class="col-xs-3 text-center clickable" @click="selectedActivity = 'logistics'">
            <img src="assets/images/logistics.webp" class="img-rounded">
            <br>Logistics & Transport
          </div>
          <div class="col-xs-3 text-center clickable" @click="selectedActivity = 'students'">
            <img src="assets/images/students.webp" class="img-rounded">
            <br>For Students
          </div>
          <div class="col-xs-3 text-center clickable" @click="selectedActivity = 'corporate'">
            <img src="assets/images/corporate.webp" class="img-rounded">
            <br>For Corporate Volunteering
          </div>
        </div>

        <div class="mt-10 mb-20 text-center">(Click on the image to learn more)</div>
        <div class="row">
          <div class="col-md-12">
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
            <div v-if="selectedActivity == 'logistics'">
              {!! nl2br($contents['Volunteer Logistics']) !!}
            </div>
            <div v-if="selectedActivity == 'students'">
              {!! nl2br($contents['Volunteer Students']) !!}
            </div>
            <div v-if="selectedActivity == 'corporate'">
              {!! nl2br($contents['Volunteer Corporate']) !!}
            </div>
          </div>
        </div>
        <br>

        <form @submit.prevent="onSubmit()" class="donator-form topmargin_30 form-horizontal" id="donatorform" method="post" action="">
          <volunteer-field name="Name" :error="errors.get('name')" :required="true">
            <input type="text" v-model="volunteer.name" maxlength="50" class="form-control" autofocus>
          </volunteer-field>
          
          <volunteer-field name="Email" :error="errors.get('email')" :required="true">
            <input type="email" v-model="volunteer.email" maxlength="100" class="form-control">
          </volunteer-field>
          
          <volunteer-field name="Mobile" :error="errors.get('mobile')" :required="true">
            <input type="text" v-model="volunteer.mobile" maxlength="20" class="form-control">
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
            <input type="text" v-model="volunteer.occupation" maxlength="100" class="form-control">
          </volunteer-field>
          
          <volunteer-field name="Availability" :error="errors.get('availability')" :required="true">
            <label class="radio-inline">
              <input type="radio" v-model="volunteer.availability" name="availability" value="Weekday"> Weekdays only
            </label>
            <label class="radio-inline">
              <input type="radio" v-model="volunteer.availability" name="availability" value="Weekend"> Weekends only
            </label>
            <label class="radio-inline">
              <input type="radio" v-model="volunteer.availability" name="availability" value="Flexible"> Flexible
            </label>
          </volunteer-field>
          
          <volunteer-field name="I'm interested in" :error="errors.get('interests')" :required="true">
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
                <input type="checkbox" v-model="volunteer.interests" value="Volunteering at ACRC"> Volunteer at ASD Canine Rehoming Centre (ACRC)
              </label>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" v-model="volunteer.interests" value="Fund Raising & Publicity"> Fund Raising & Publicity
              </label>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" v-model="volunteer.interests" value="Logistics"> Logistics & Transport
              </label>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" v-model="volunteer.interests" value="For Students"> For Students
              </label>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" v-model="volunteer.interests" value="For Corporate"> For Corporate Volunteering
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
            <input type="text" v-model="volunteer.current_no_of_dogs" maxlength="100" class="form-control">
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
          
          <volunteer-field name="Area to help in" :error="errors.get('fund_raising')" v-if="has_publicity">
            <select v-model="volunteer.publicity_area" class="form-control">
              <option value=""></option>
              <option value="Booth volunteer at Events">Booth Volunteer at Events</option>
              <option value="Design and Content Creation">Design and Content Creation</option>
              <option value="Photographers and Videographers">Photographers and Videographers</option>
              <option value="Fundraising / Campaign / Event Organizer">Fund Raising / Campaign / Event Organizer</option>
              <option value="Others">Others</option>
            </select>
          </volunteer-field>
          
          <volunteer-field name="Average age of participating students: " :error="errors.get('students_average_age')" v-if="has_students">
            <input type="text" v-model="volunteer.students_average_age" maxlength="100" class="form-control">
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
          return this.volunteer.interests.indexOf("Fund Raising & Publicity") >= 0;
        },
        has_logistics: function() {
          return this.volunteer.interests.indexOf("Logistics") >= 0;
        },
        has_students: function() {
          return this.volunteer.interests.indexOf("For Students") >= 0;
        }
      }
    })
  </script>
@endsection