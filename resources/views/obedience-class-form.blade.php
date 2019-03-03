@extends('template', ['title'=>'ASD - Boarding Request'])

@section('content')
  <div id="app" class="container content">
    <div class="row">
      <div class="col-md-10 col-md-offset-1 text-center">
        <h2 class="section_header bold">Boarding Services</h2>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-12">
        <form @submit.prevent="onSubmit()" class="form-horizontal" id="donatorform" method="post" action="">
          <volunteer-field name="Name" :error="errors.get('name')" :required="true">
            <input type="text" v-model="boarding.name" class="form-control" autofocus>
          </volunteer-field>
          
          <volunteer-field name="Email" :error="errors.get('email')" :required="true">
            <input type="email" v-model="boarding.email" class="form-control">
          </volunteer-field>
          
          <volunteer-field name="Mobile" :error="errors.get('mobile')" :required="true">
            <input type="text" v-model="boarding.mobile" class="form-control">
          </volunteer-field>
          
          <volunteer-field name="Breed of Dog" :error="errors.get('breed')" :required="true">
            <input type="text" v-model="boarding.breed" class="form-control">
          </volunteer-field>
          
          <volunteer-field name="Gender of Dog" :error="errors.get('gender')" :required="true">
            <label class="radio-inline">
              <input type="radio" v-model="boarding.gender" name="gender" value="M"> Male
            </label>
            <label class="radio-inline">
              <input type="radio" v-model="boarding.gender" name="gender" value="F"> Female
            </label>
          </volunteer-field>
          
          <volunteer-field name="Whether dog is sterilised" :error="errors.get('gender')" :required="true">
            <label class="radio-inline">
              <input type="radio" v-model="boarding.sterilised" name="sterilised" value="Y"> Yes
            </label>
            <label class="radio-inline">
              <input type="radio" v-model="boarding.sterilised" name="sterilised" value="N"> No
            </label>
          </volunteer-field>
          
          <volunteer-field name="Start Date" :error="errors.get('start_date')" :required="true">
            <input type="text" id="start_date" class="form-control datepicker" readonly>
          </volunteer-field>
          
          <volunteer-field name="End Date" :error="errors.get('end_date')" :required="true">
            <input type="text" id="end_date" class="form-control datepicker" readonly>
          </volunteer-field>
          
          <div class="form-group">
            <div class="col-sm-12 col-sm-offset-3">
              <button type="submit" name="submit" class="theme_button">Submit</button>
              
              <div class="alert alert-success mt-10" v-show="success">
                Thank you, your boarding request has been received.
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
      name: "BoardingRequest",
      el: "#app",
      data: {
        boarding: { name: "", mobile: "", email: "", start_date: "", end_date: "" },
        success: false,
        selectedActivity: false,
        errors: new Errors()
      },
      mounted: function() {
        var vue = this
        $("#start_date").datepicker({
          changeMonth: true,
          changeYear: true,
          dateFormat: 'd M yy',
          yearRange: "-100:+0",
          onSelect: function(value, date) {
            vue.updateStartDate(moment(value, 'DD MMM YYYY').format('YYYY-MM-DD'));
          }
        });
        $("#end_date").datepicker({
          changeMonth: true,
          changeYear: true,
          dateFormat: 'd M yy',
          yearRange: "-100:+0",
          onSelect: function(value, date) {
            vue.updateEndDate(moment(value, 'DD MMM YYYY').format('YYYY-MM-DD'));
          }
        });
      },
      methods: {
        updateStartDate: function(date) {
          this.boarding.start_date = date;
        },
        updateEndDate: function(date) {
          this.boarding.end_date = date;
        },
        onSubmit: function() {
          axios.post('api/boarding/form', this.boarding)
            .then(this.onSuccess)
            .catch(this.onError);
        },
        onSuccess: function(response) {
          this.success = true;
          this.errors = new Errors();
        },
        onError: function(error) {
          if (error.response.status == 500) {
            alert("A system error occurred");
            return;
          }
          this.success = false;
          this.errors.record(error.response.data.errors);
        },
      }
    })
  </script>
@endsection