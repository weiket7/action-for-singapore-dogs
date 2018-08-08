<template>
  <single-portlet title="Volunteer">
    <form @submit.prevent="onSubmit()" class="m-form m-form--fit m-form--label-align-right" >
      <form-row>
        <label-component required>Name</label-component>
        <textbox-component v-model="volunteer.name"></textbox-component>
  
        <label-component required>Status</label-component>
        <radio-component v-model="volunteer.stat" :options="volunteer_stats"></radio-component>
      </form-row>
      
      <form-row>
        <label-component required>Email</label-component>
        <textbox-component v-model="volunteer.email"></textbox-component>
        
        <label-component required>Mobile</label-component>
        <textbox-component v-model="volunteer.mobile"></textbox-component>
      </form-row>

      <form-row>
        <label-component required>Gender</label-component>
        <radio-component v-model="volunteer.gender" :options="{ 'M': 'Male', 'F': 'Female' }" :error="errors.get('gender')"></radio-component>

        <label-component required>Birthday</label-component>
        <datepicker-component name="birthday" v-model="volunteer.birthday" :error="errors.get('birthday')" v-if="volunteer.birthday"></datepicker-component>
      </form-row>
      
      <form-row>
        <label-component>Interested In</label-component>
        <checkbox-component v-model="interests" :options="interested_in_options" v-if="volunteer"></checkbox-component>
      </form-row>
  
      <form-footer>
        <button type="submit" class="btn btn-success">Save</button>
        <button type="button" class="btn btn-danger" data-toggle="confirmation">Delete</button>
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
    methods: {
      onSubmit() {
        let url = 'api/volunteer/save';
        if (!this.is_create) {
          url += '/'+ this.$route.params.volunteer_id
        }

        this.volunteer.interests = this.interests;

        axios.post(url, this.volunteer)
          .then(this.onSuccess)
          .catch(this.onError);
      },
      onSuccess(response) {
        if (this.is_create) {
          toastr.success("Volunteer added");
          this.volunteer.volunteer_id = response.data;
          this.$router.push('/volunteer/save/'+this.volunteer.volunteer_id);
          return;
        }
        toastr.success("Volunteer updated");
      },
      deleteVolunteer() {
        axios.post('api/delete-record?table=volunteer&column=volunteer_id&id='+this.$route.params.volunteer_id)
          .then(response => {
            toastr.success("Volunteer deleted");
            this.$router.push('/volunteer');
          })
          .catch(this.onError);
      }
    },
    computed: {
      is_create() {
        return this.$route.path == "/volunteer/save";
      },
    },
    created() {
      axios.get("api/volunteer/get/" + this.$route.params.volunteer_id)
        .then(response => {
          this.volunteer = response.data.volunteer;
          this.volunteer_stats = response.data.volunteer_stats;
          this.interests = response.data.interests;
        })
        .catch(this.onError );
    },
    mounted() {
      let vue = this
      $('[data-toggle=confirmation]').confirmation({
        rootSelector: '[data-toggle=confirmation]',
      }).on("confirmed.bs.confirmation", function() {
        vue.deleteVolunteer();
      });
    }
  }
</script>

<style scoped>

</style>