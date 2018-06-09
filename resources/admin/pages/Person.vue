<template>
  <single-portlet title="Person">
    <tabs :tabs="tabs">
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
        <radio-component v-model="person.is_adopter" :options="{'1':'Yes', '0': 'No'}"></radio-component>
        
        <label-component>Rescuer</label-component>
        <radio-component v-model="person.is_rescuer" :options="{'1':'Yes', '0': 'No'}"></radio-component>
      </form-row>
  
      <form-row>
        <label-component>Foster</label-component>
        <radio-component name="" v-model="person.is_foster" :options="{'1':'Yes', '0': 'No'}"></radio-component>
        
        <label-component>Volunteer</label-component>
        <radio-component name="" v-model="person.is_volunteer" :options="{'1':'Yes', '0': 'No'}"></radio-component>
      </form-row>
      
      <form-footer></form-footer>
    </form>
    </tabs>
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
        person: {},
        tabs: []
      }
    },
    computed: {
      is_create() {
        return this.$route.path == "/person/save";
      },
    },
    methods: {
      generateTabs() {
        let tabs = ['General'];
        if (this.person.is_adopter == "1") {
          tabs.push('Adopt');
        }
        if (this.person.is_rescuer == "1") {
          tabs.push('Rescue');
        }
        return tabs;
      },
      onSubmit() {
        let url = 'api/person/save';
        if (!this.is_create) {
          url += '/'+ this.$route.params.person_id
        }
        axios.post(url, this.person)
          .then(this.onSuccess)
          .catch(this.onError);
      },
      onError(error) {
        if (error.response.status == 500) {
          toastr.error("A system error occurred");
          return;
        }
        toastr.error("There were some errors, please check the form");
        this.errors.record(error.response.data.errors);
      },
      onSuccess(response) {
        if (this.is_create) {
          toastr.success("Person added");
          this.$router.push('/person/save/'+person_id);
        }
        toastr.success("Person updated");
        this.tabs = this.generateTabs();
      },
    },
    created() {
      axios.get("api/person/get/" + this.$route.params.person_id)
        .then(response => {
          this.person = response.data;
          this.tabs = this.generateTabs();
        })
        .catch(error => { console.log(error); });
    }
  }
</script>

<style scoped>

</style>