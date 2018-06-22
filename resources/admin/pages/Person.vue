<template>
  <single-portlet title="Person">
    <tabs :tabs="tabs">
      <tab name="General" active>
        <form @submit.prevent="onSubmit()" class="m-form m-form--fit m-form--label-align-right" >
          <form-row>
            <label-component>Name</label-component>
            <textbox-component v-model="person.name" :error="errors.get('name')"></textbox-component>
  
            <label-component>Email</label-component>
            <textbox-component v-model="person.email" :error="errors.get('email')"></textbox-component>
          </form-row>
          
          <form-row>
            <label-component>Mobile</label-component>
            <textbox-component v-model="person.mobile" :error="errors.get('mobile')"></textbox-component>
            
            <label-component>Birthday</label-component>
            <datepicker-component name="birthday" v-model="person.birthday" v-if="person.birthday" :error="errors.get('birthday')"></datepicker-component>
          </form-row>

          <form-row>
            <label-component>Address</label-component>
            <textbox-component v-model="person.address" :error="errors.get('address')"></textbox-component>

            <label-component>Postal</label-component>
            <textbox-component v-model="person.postal" :error="errors.get('postal')"></textbox-component>
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
          
          <form-row v-if="person.is_adopter && person.adoption_form_id">
            <label-component>Adoption Form</label-component>
            <static-text><router-link :to="'/adoption-form/save/'+person.adoption_form_id">View</router-link></static-text>
          </form-row>
  
          <form-footer>
            <button type="submit" class="btn btn-success">Save</button>
          </form-footer>
        </form>
      </tab>
      <tab name="Adopt">
        <div class="m-form m-form--fit m-form--label-align-right">
          <person-adopt v-for="(adopt, index) in adopts" :adopt="adopt" :index="index" :key="adopt.adopt_id" v-if="adopts.length > 0"></person-adopt>
          <div v-if="adopts.length == 0">
            No dogs yet
          </div>
  
          <form-row>
            <div class="col-lg-2"></div>
            <div class="col-lg-10">
              <router-link :to="'/adopter/save?person_id='+person.person_id">
                <button type="button" class="btn btn-primary">
                  Add Dog
                </button>
              </router-link>
            </div>
          </form-row>
        </div>
      </tab>
      <tab name="Rescue">
        <div class="m-form m-form--fit m-form--label-align-right">
          <person-rescue v-for="(rescue, index) in rescues" :rescue="rescue" :index="index" :key="rescue.adopt_id" v-if="rescues.length > 0"></person-rescue>
          <div v-if="rescues.length == 0">
            No dogs yet
          </div>
          
          <form-row>
            <div class="col-lg-2"></div>
            <div class="col-lg-10">
              <router-link :to="'/rescuer/save?person_id='+person.person_id">
                <button type="button" class="btn btn-primary">
                  Add Dog
                </button>
              </router-link>
            </div>
          </form-row>
        </div>
      </tab>
      <tab name="Foster">
        <div class="m-form m-form--fit m-form--label-align-right">
          <person-foster v-for="(foster, index) in fosters" :foster="foster" :index="index" :key="foster.adopt_id" v-if="fosters.length > 0"></person-foster>
          <div v-if="fosters.length == 0">
            No dogs yet
          </div>
          
          <form-row>
            <div class="col-lg-2"></div>
            <div class="col-lg-10">
              <router-link :to="'/foster/save?person_id='+person.person_id">
                <button type="button" class="btn btn-primary">
                  Add Dog
                </button>
              </router-link>
            </div>
          </form-row>
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
  import Errors from "../../common/errors";

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
        tabs: ['General'],
        errors: new Errors(),
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