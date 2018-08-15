@extends('template')

@section('content')
  <div id="app" class="container content">
    <div class="row">
      <div class="col-md-12 text-center">
        <h2 class="section_header bold">
          <span>LIKES</span></h2>
      </div>
    </div>
    
    <div class="row" v-if="adopt_count === 0">
      <div class="col-md-12 text-center">
        <h3>Please view <a href="dogs-for-adoption" class="highlight bold">Dogs for Adoption</a> and click the <i class="fas fa-heart highlight"></i> to add them to your Likes.</h3>
      </div>
    </div>
    
    <div class="row" v-if="adopt_count === 1">
      <div class="col-md-3 col-center">
        <adopt-item :adopt="adopts[0]" :key="adopts[0].adopt_id" :highlight="hasHeart(adopts[0].adopt_id)" v-on:heart-adopt="heartAdopt"></adopt-item>
      </div>
    </div>
    <div class="row" v-if="adopt_count === 2">
      <div class="col-md-3"></div>
      <div class="col-md-3" v-for="adopt in adopts">
        <adopt-item :adopt="adopt" :key="adopt.adopt_id" :highlight="hasHeart(adopt.adopt_id)" v-on:heart-adopt="heartAdopt"></adopt-item>
      </div>
      <div class="col-md-3"></div>
    </div>
    <div class="row row-col-3" v-if="adopt_count === 3">
      <div class="col-md-3 center-col-3" v-for="adopt in adopts">
        <adopt-item :adopt="adopt" :key="adopt.adopt_id" :highlight="hasHeart(adopt.adopt_id)" v-on:heart-adopt="heartAdopt"></adopt-item>
      </div>
    </div>
    <div class="row" v-if="adopt_count >= 4" v-for="chunk in adopts">
      <div class="col-md-3" v-for="adopt in chunk">
        <adopt-item :adopt="adopt" :key="adopt.adopt_id"
                    :highlight="hasHeart(adopt.adopt_id)" v-on:heart-adopt="heartAdopt"></adopt-item>
      </div>
    </div>
    
    <hr v-if="adopt_count > 0">
    
    <div v-if="adopt_count > 0 && !isInterested" class="row">
      <div class="col-md-12 text-center">
        <button type="button" @click="interested">I'm interested in adopting</button>
      </div>
    </div>
    
    <div v-if="isInterested">
      <div class="row">
        <div class="col-md-12 text-center">
          <h3>Thank you for your interest in adopting</h3>
          
          <h5>
            Please fill in the short form below to share some information with us so that we can assist you in the adoption process.<br>
          </h5>
        </div>
      </div>
      
      <form @submit.prevent="onSubmit()">
        <h4 class="adoption-form-header">Personal Info</h4>
        
        <div class="row">
          <div class="col-md-6">
            <div class="form-group no-mb">
              <label class="control-label">Name <span class="required">*</span></label>
              <input type="text" name="name" v-model="form.name" class="form-control" autofocus>
              <span class="help-block error" v-if="errors.get('name')">
                @{{ errors.get('name') }}
              </span>
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="form-group no-mb">
              <label class="control-label">Email <span class="required">*</span></label>
              <input type="email" name="email" v-model="form.email" class="form-control">
              <span class="help-block error" v-if="errors.get('email')">
              @{{ errors.get('email') }}
            </span>
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-6">
            <div class="form-group no-mb">
              <label class="control-label">Mobile <span class="required">*</span></label>
              <input type="text" name="mobile" v-model="form.mobile" class="form-control">
              <span class="help-block error" v-if="errors.get('mobile')">
              @{{ errors.get('mobile') }}
            </span>
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="form-group no-mb">
              <label class="control-label">Birthday <span class="required">*</span></label>
              <input type="text" name="birthday" v-model="form.birthday" class="form-control datepicker" readonly>
              <span class="help-block error" v-if="errors.get('birthday')">
              @{{ errors.get('birthday') }}
            </span>
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-6">
            <div class="form-group no-mb">
              <label class="control-label">Gender <span class="required">*</span></label>
              <div class="radio">
                <label class="radio-inline">
                  <input type="radio" v-model="form.gender" name="gender" value="M"> Male
                </label>
                <label class="radio-inline">
                  <input type="radio" v-model="form.gender" name="gender" value="F"> Female
                </label>
              </div>
              <span class="help-block error" v-if="errors.get('gender')">
              @{{ errors.get('gender') }}
            </span>
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="form-group no-mb">
              <label class="control-label">Address <span class="required">*</span></label>
              <input type="text" v-model="form.address" class="form-control">
              <span class="help-block error" v-if="errors.get('address')">
              @{{ errors.get('address') }}
            </span>
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-6">
            <div class="form-group no-mb">
              <label class="control-label">Postal Code <span class="required">*</span></label>
              <input type="text" v-model="form.postal" class="form-control">
              <span class="help-block error" v-if="errors.get('postal')">
              @{{ errors.get('postal') }}
            </span>
            </div>
          </div>
        </div>
        
        <div class="row mt-20">
          <div class="col-md-12 text-center">
            <button type="submit">I want to adopt</button>
            
            <div class="alert alert-success mt-10" v-show="success">
              Thank you, our rehomers will get in touch with you via email.
            </div>
            <div class="alert alert-danger mt-10" v-show="errors.any()">
              There were some errors, please check the form
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection

@section('script')
  <script>
    var vm = new Vue({
      el: "#app",
      data: {
        form: {},
        success: false,
        errors: new Errors(),
        adopts: {},
        adopt_count: 0,
        isInterested: false,
      },
      methods: {
        heartAdopt(adopt_id) {
          window.heartAdopt(this.adopt.adopt_id);
          this.has_heart = !this.has_heart;
        },
        hasHeart(adopt_id) {
          /*console.log(this.form.hearts);
          console.log(adopt_id);
          console.log(this.form.hearts.indexOf(adopt_id) >= 0);*/
          return this.form.hearts.indexOf(adopt_id) >= 0;
        },
        updateBirthday(date) {
          this.form.birthday = date;
        },
        interested() {
          this.isInterested = true;
          this.$nextTick(function() {
            let vue = this
            $(".datepicker").datepicker({
              changeMonth: true,
              changeYear: true,
              dateFormat: 'd M yy',
              onSelect: function (value, date) {
                vue.updateBirthday(moment(value, 'DD MMM YYYY').format('YYYY-MM-DD'));
              }
            });
          })
        },
        onSubmit() {
          axios.post("api/adoption-form/enquiry", this.form)
            .then(this.onSuccess)
            .catch(this.onError);
        },
        onSuccess(response) {
          this.success = true;
          this.errors = new Errors();
        },
      },
      created() {
        this.form.hearts = window.getHearts();
        
        axios.get("api/adopt/list/"+this.form.hearts).then(
          response => {
            let adopts = response.data;
            this.adopt_count = adopts.length;
            if (this.adopt_count >= 4) {
              adopts = _.chunk(response.data, 4);
            }
            this.adopts = adopts;
          }).catch(error => { console.log(error); });
  
      }
    })
  </script>
@endsection
