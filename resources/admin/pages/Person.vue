<template>
  <single-portlet title="Person">
    <tabs :tabs="tabs">
      <tab name="General" active>
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
      </tab>
      <tab name="Adopt">
        <div class="m-form m-form--fit m-form--label-align-right">
          <person-adopt v-for="(adopt, index) in adopts" :adopt="adopt" :index="index" :key="adopt.adopt_id"></person-adopt>
  
          <form-row>
            <div class="col-lg-2"></div>
            <div class="col-lg-10">
              <button type="button" @click="addAdoptRow()" class="btn btn-metal">
                Add Adopter
              </button>
            </div>
          </form-row>
        </div>
      </tab>
      <tab name="Rescue"></tab>
      <tab name="Foster"></tab>
    </tabs>
  </single-portlet>
</template>

<script>
  import axios from 'axios';
  import CheckboxComponent from "../components/CheckboxComponent";
  import PersonAdopt from "../modules/PersonAdopt";
  
  export default {
    name: "Person",
    components: {
      PersonAdopt,
      CheckboxComponent
    },
    data() {
      return {
        person: {},
        adopts: [],
        fosters: [],
        rescues: [],
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
        if (this.person.is_foster == "1") {
          tabs.push('Foster');
        }
        if (this.person.is_volunteer == "1") {
          tabs.push('Volunteer');
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
      addAdoptRow() {
        this.adopts.push({});
      },
    },
    created() {
      axios.get("api/person/get/" + this.$route.params.person_id)
        .then(response => {
          this.person = response.data.person;
          this.adopts = response.data.adopts;
          this.fosters = response.data.fosters;
          this.rescues = response.data.rescues;
          this.tabs = this.generateTabs();
        })
        .catch(error => { console.log(error); });
    }
  }
</script>

<style scoped>

</style>