<template>
  <div>
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
            <label class="control-label">Name</label>
            <input type="text" name="name" v-model="form.name" class="form-control" autofocus>
            <span class="help-block error" v-if="errors.get('name')">
              {{ errors.get('name') }}
            </span>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group no-mb">
            <label class="control-label">Email</label>
            <input type="email" name="email" v-model="form.email" class="form-control">
            <span class="help-block error" v-if="errors.get('email')">
              {{ errors.get('email') }}
            </span>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group no-mb">
            <label class="control-label">Mobile</label>
            <input type="text" name="mobile" v-model="form.mobile" class="form-control">
            <span class="help-block error" v-if="errors.get('mobile')">
              {{ errors.get('mobile') }}
            </span>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group no-mb">
            <label class="control-label">Birthday</label>
            <input type="text" name="birthday" v-model="form.birthday" class="form-control datepicker" readonly>
            <span class="help-block error" v-if="errors.get('birthday')">
              {{ errors.get('birthday') }}
            </span>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group no-mb">
            <label class="control-label">Gender</label>
            <div class="radio">
              <label class="radio-inline">
                <input type="radio" v-model="form.gender" name="gender" value="M"> Male
              </label>
              <label class="radio-inline">
                <input type="radio" v-model="form.gender" name="gender" value="F"> Female
              </label>
            </div>
            <span class="help-block error" v-if="errors.get('gender')">
              {{ errors.get('gender') }}
            </span>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group no-mb">
            <label class="control-label">Address</label>
            <input type="text" v-model="form.address" class="form-control">
            <span class="help-block error" v-if="errors.get('address')">
              {{ errors.get('address') }}
            </span>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group no-mb">
            <label class="control-label">Postal Code</label>
            <input type="text" v-model="form.postal" class="form-control">
            <span class="help-block error" v-if="errors.get('postal')">
              {{ errors.get('postal') }}
            </span>
          </div>
        </div>
      </div>
      
      <hr>

      <div class="row">
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
</template>

<script>
  import axios from 'axios'
  import moment from 'moment';
  import Errors from '../../common/errors';

  export default {
    name: "adoption-form",
    data() {
      return {
        success: false,
        errors: new Errors(),
        form: {},
        hearts: [],
      }
    },
    methods: {
      updateBirthday(date) {
        this.form.birthday = date;
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
      onError(error) {
        this.success = false;
        this.errors.record(error.response.data.errors);
      },
    },
    mounted() {
      let vue = this
      $(".datepicker").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'd M yy',
        onSelect: function (value, date) {
          vue.updateBirthday(moment(value, 'DD MMM YYYY').format('YYYY-MM-DD'));
        }
      });
  
      let hearts = localStorage.getItem('hearts');
      if (hearts != null) {
        this.form.hearts = JSON.parse(hearts);
      }
    }
  }
</script>

<style scoped>

</style>