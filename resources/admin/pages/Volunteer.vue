<template>
  <single-portlet title="Volunteer">
    <form @submit.prevent="onSubmit()" class="m-form m-form--fit m-form--label-align-right" >
      <form-row>
        <label-component>Name</label-component>
        <textbox-component v-model="volunteer.name"></textbox-component>
  
        <label-component>Status</label-component>
        <radio-component v-model="volunteer.stat" :options="volunteer_stats"></radio-component>
      </form-row>
      
      <form-row>
        <label-component>Email</label-component>
        <textbox-component v-model="volunteer.email"></textbox-component>
        
        <label-component>Mobile</label-component>
        <textbox-component v-model="volunteer.mobile"></textbox-component>
      </form-row>

      <form-row>
        <label-component required>Gender</label-component>
        <radio-component v-model="volunteer.gender" :options="{ 'M': 'Male', 'F': 'Female' }" :error="errors.get('gender')"></radio-component>

        <label-component>Birthday</label-component>
        <datepicker-component name="birthday" v-model="volunteer.birthday" :error="errors.get('birthday')" v-if="volunteer.birthday"></datepicker-component>
      </form-row>
      
      <form-row>
        <label-component>Interested In</label-component>
        <checkbox-component :value="interests" :options="interested_in_options" v-if="volunteer"></checkbox-component>
      </form-row>
  
      <form-footer>
        <button type="submit" class="btn btn-success">Save</button>
      </form-footer>
    </form>
  </single-portlet>
</template>

<script>
  import axios from 'axios'
  import Errors from "../../common/errors";
  
  export default {
    name: "Volunteer",
    data() {
      return {
        volunteer: {},
        volunteer_stats: [],
        interests: [],
        interested_in_options: ['Rescuing', 'Rehoming', 'Fostering', 'Volunteering', 'Publicity', 'Fund Raising & Events', 'Logistics'],
        errors: new Errors(),
      }
    },
    created() {
      axios.get("api/volunteer/get/" + this.$route.params.volunteer_id)
        .then(response => {
          this.volunteer = response.data.volunteer;
          this.volunteer_stats = response.data.volunteer_stats;
          this.interests = response.data.interests;
        })
        .catch(error => { console.log(error); });
    }
    
  }
</script>

<style scoped>

</style>