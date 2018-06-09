<template>
  <single-portlet title="Volunteer">
    <form @submit.prevent="onSubmit()" class="m-form m-form--fit m-form--label-align-right" >
      <form-row>
        <label-component>Name</label-component>
        <textbox-component v-model="volunteer.name"></textbox-component>
        
        <label-component>Mobile</label-component>
        <textbox-component v-model="volunteer.mobile"></textbox-component>
      </form-row>
      
      <form-row>
        <label-component>Address</label-component>
        <textbox-component v-model="volunteer.address"></textbox-component>
      </form-row>
      
      <form-row>
        <label-component>Interested In</label-component>
        <checkbox-component :options="interested_in_options"></checkbox-component>
      </form-row>
    
    </form>
  </single-portlet>
</template>

<script>
  import axios from 'axios'
  
  export default {
    name: "Volunteer",
    data() {
      return {
        volunteer: {},
        interested_in_options: ['Rescue', 'Rehoming', 'Foster', 'Volunteer at Adoption & Rescue Centre (ARC)', 'Publicity', 'Fund Raising & Events', 'Logistics']
      }
    },
    created() {
      axios.get("api/volunteer/get/" + this.$route.params.volunteer_id)
        .then(response => {
          this.volunteer = response.data;
        })
        .catch(error => { console.log(error); });
    }
    
  }
</script>

<style scoped>

</style>