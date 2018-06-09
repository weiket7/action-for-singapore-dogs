<template>
  <single-portlet title="Person">
    <tabs :tabs="tabs">
      <tab name="General" active>
        <form @submit.prevent="onSubmit()" class="m-form m-form--fit m-form--label-align-right" >
          <form-row>
            <label-component>Name</label-component>
            <textbox-component v-model="person.name"></textbox-component>
  
            <label-component>Email</label-component>
            <textbox-component v-model="person.email"></textbox-component>
          </form-row>
          
          <form-row>
            <label-component>Mobile</label-component>
            <textbox-component v-model="person.mobile"></textbox-component>
            
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
        </div>
      </tab>
      <tab name="Rescue">
        <div class="m-form m-form--fit m-form--label-align-right">
          <person-rescue v-for="(rescue, index) in rescues" :rescue="rescue" :index="index" :key="rescue.adopt_id"></person-rescue>
        </div>
      </tab>
      <tab name="Foster">
        <div class="m-form m-form--fit m-form--label-align-right">
          <person-foster v-for="(foster, index) in fosters" :foster="foster" :index="index" :key="foster.adopt_id"></person-foster>
        </div>
      </tab>
    </tabs>
  </single-portlet>
</template>

<script>
  import axios from 'axios';
  import CheckboxComponent from "../components/CheckboxComponent";
  import PersonAdopt from "../modules/PersonAdopt";
  import PersonFoster from "../modules/PersonFoster";
  import PersonRescue from "../modules/PersonRescue";

  export default {
    name: "Person",
    components: {
      PersonAdopt,
      PersonFoster,
      PersonRescue,
      CheckboxComponent
    },
    data() {
      return {
        person: {},
        adopts: [],
        fosters: [],
        rescues: [],
        tabs: ['General']
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
        console.log(JSON.stringify(this.person));
        if (this.person.is_adopter) {
          tabs.push('Adopt');
        }
        if (this.person.is_rescuer) {
          tabs.push('Rescue');
        }
        if (this.person.is_foster) {
          tabs.push('Foster');
        }
        if (this.person.is_volunteer) {
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
      if(!this.is_create) {
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
  }
</script>

<style scoped>

</style>