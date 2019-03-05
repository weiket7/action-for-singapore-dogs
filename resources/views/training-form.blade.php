@extends('template', ['title'=>'ASD - Boarding Request'])

@section('content')
  <div id="app" class="container content">
    <div class="row">
      <div class="col-md-10 col-md-offset-1 text-center">
        <h2 class="section_header bold">Basic Obedience Class Form</h2>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-12">
        <form @submit.prevent="onSubmit()" class="form-horizontal" method="post" action="">
          <volunteer-field name="Name" :error="errors.get('name')" :required="true">
            <input type="text" v-model="training.name" class="form-control" autofocus>
          </volunteer-field>
          
          <volunteer-field name="Email" :error="errors.get('email')" :required="true">
            <input type="email" v-model="training.email" class="form-control">
          </volunteer-field>
          
          <volunteer-field name="Mobile" :error="errors.get('mobile')" :required="true">
            <input type="text" v-model="training.mobile" class="form-control">
          </volunteer-field>
  
          <volunteer-field name="Date of Class" :error="errors.get('date')" :required="true">
            <select class="form-control" v-model="training.date">
              <option v-for="(display_date, sql_date) in dates" :value="sql_date">@{{ display_date }}</option>
            </select>
          </volunteer-field>
          
          <volunteer-field name="Breed of Dog" :error="errors.get('breed')" :required="true">
            <input type="text" v-model="training.breed" class="form-control">
          </volunteer-field>
          
          <volunteer-field name="Gender of Dog" :error="errors.get('gender')" :required="true">
            <label class="radio-inline">
              <input type="radio" v-model="training.gender" name="gender" value="M"> Male
            </label>
            <label class="radio-inline">
              <input type="radio" v-model="training.gender" name="gender" value="F"> Female
            </label>
          </volunteer-field>
  
          <volunteer-field name="Age of Dog" :error="errors.get('breed')" :required="true">
            <input type="text" v-model="training.age" class="form-control">
          </volunteer-field>
          
          <volunteer-field name="Whether dog is sterilised" :error="errors.get('gender')" :required="true">
            <label class="radio-inline">
              <input type="radio" v-model="training.sterilised" name="sterilised" value="Y"> Yes
            </label>
            <label class="radio-inline">
              <input type="radio" v-model="training.sterilised" name="sterilised" value="N"> No
            </label>
          </volunteer-field>
          
          <div class="form-group">
            <div class="col-sm-12 col-sm-offset-3">
              <button type="submit" name="submit" class="theme_button">Submit</button>
              
              <div class="alert alert-success mt-10" v-show="success">
                Thank you, your basic obedience class request has been received.
              </div>
              <div class="alert alert-danger mt-10" v-show="errors.any()">
                There were some errors, please check the form
              </div>
            </div>
          </div>
  
          {{ $content }}
        </form>
      </div>
    </div>
  </div>
@endsection


@section('script')
  <script>
    var vm = new Vue({
      name: "TrainingForm",
      el: "#app",
      data: {
        training: { name: "", mobile: "", email: "", date: "" },
        success: false,
        dates: {!! json_encode($dates) !!},
        selectedActivity: false,
        errors: new Errors()
      },
      methods: {
        onSubmit: function() {
          axios.post('api/training/form', this.training)
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