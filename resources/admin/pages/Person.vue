<template>
  <single-portlet title="People">
    <form @submit.prevent="onSubmit()" class="m-form m-form--fit m-form--label-align-right" >
      <form-row>
        <label-component>Name</label-component>
        <textbox-component v-model="person.name"></textbox-component>
        
        <label-component>Mobile</label-component>
        <textbox-component v-model="person.mobile"></textbox-component>
      </form-row>
      
      <form-row>
        <label-component>Address</label-component>
        <textbox-component v-model="person.address"></textbox-component>
      </form-row>
      
      <form-row>
        <label-component>Adopter</label-component>
        <radio-component v-model="person.is_rescuer" :options="{'1':'Yes', '0': 'No'}"></radio-component>
        
        <label-component>Rescuer</label-component>
        <radio-component v-model="person.is_rescuer" :options="{'1':'Yes', '0': 'No'}"></radio-component>
      </form-row>
  
      <form-row>
        <label-component>Foster</label-component>
        <radio-component v-model="person.is_foster" :options="{'1':'Yes', '0': 'No'}"></radio-component>
        
        <label-component>Sponsor</label-component>
        <radio-component v-model="person.is_sponsor" :options="{'1':'Yes', '0': 'No'}"></radio-component>
      </form-row>
      
      <form-footer></form-footer>
    </form>
  </single-portlet>
</template>

<script>
  import axios from 'axios';
  import CheckboxComponent from "../components/CheckboxComponent";
  
  export default {
    name: "Person",
    components: {CheckboxComponent},
    data() {
      return {
        person: {}
      }
    },
    created() {
      axios.get("api/person/get/" + this.$route.params.person_id)
        .then(response => {
          this.person = response.data;
        })
        .catch(error => { console.log(error); });
    }
  }
</script>

<style scoped>

</style>