<template>
  <single-portlet :title="is_create ? 'Add Adopter' : 'Update Adopter'">
    <form @submit.prevent="onSubmit()" class="m-form m-form--fit m-form--label-align-right" >
      <form-row>
        <label-component>Dog Name</label-component>
        <select2-component name='dog_name' url="api/adopt/search" v-if="has_adopt_id == false && is_create"
                           event_name="select-adopt"
                           v-on:select-adopt="selectAdopt"></select2-component>
        <static-text v-else>
          <router-link :to="'/adopt/save/'+adopt.adopt_id">{{ adopt.name }}</router-link>
        </static-text>
  
        <label-component>Location</label-component>
        <static-text>{{ adopt.location }}</static-text>
      </form-row>
  
      <form-row>
        <label-component>Person Name</label-component>
        <select2-component name='person_name' url="api/person/search" v-if="is_create"
                           event_name="select-person"
                           v-on:select-person="selectPerson"></select2-component>
        <static-text v-else>
          <router-link :to="'/person/save/'+person.person_id">{{ person.name }}</router-link>
        </static-text>

        <label-component>Email</label-component>
        <static-text>{{ person.email }}</static-text>
      </form-row>
  
      <form-row>
        <label-component>Mobile</label-component>
        <static-text>{{ person.mobile }}</static-text>

        <label-component>Address</label-component>
        <static-text>{{ person.address }}</static-text>
      </form-row>
      
      <form-row>
        <label-component>Adopted On</label-component>
        <datepicker-component name="adopted_on" v-model="adopter.adopted_on" v-if="is_create || adopter.adopted_on"></datepicker-component>
        
        <label-component v-show="!is_create">Returned</label-component>
        <radio-component name="returned" v-model="adopter.returned" :value="adopter.returned"
                         :options="{'1': 'Yes', '0': 'No'}" v-show="!is_create"></radio-component>
      </form-row>
      
      <form-row v-show="adopter.returned == 1">
        <label-component>Returned On</label-component>
        <datepicker-component name="returned_on" v-model="adopter.returned_on" v-if="is_create || adopter.adopted_on"></datepicker-component>
        
        <label-component>Reason</label-component>
        <textarea-component name="return_reason" :value="adopter.return_reason"></textarea-component>
      </form-row>
      
      <person-remark></person-remark>
  
      <div class="m-portlet__foot m-portlet__foot--fit">
        <div class="m-form__actions">
          <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-10">
              <button type="submit" class="btn btn-success">
                Save
              </button>
              <button type="submit" class="btn btn-metal">
                Remove
              </button>
            </div>
          </div>
        </div>
      </div>
    </form>
  
  </single-portlet>
</template>

<script>
  import PersonRemark from "../modules/PersonRemark";
  import axios from 'axios';
  import FormMixin from '../form-mixin';
  
  export default {
    name: "Adopter",
    data() {
      return {
        adopter: {},
        adopt: {},
        person: {}
      }
    },
    computed: {
      is_create() {
        return this.$route.path === "/adopter/save";
      },
      has_adopt_id() {
        return this.$route.query.adopt_id > 0;
      }
    },
    methods: {
      selectAdopt(adopt_id) {
        axios.get('api/adopt/get-single/'+adopt_id)
          .then(response => {
            this.adopt = response.data;
            this.adopter.adopt_id = this.adopt.adopt_id;
          });
      },
      selectPerson(person_id) {
        axios.get('api/person/get-single/'+person_id)
          .then(response => {
            this.person = response.data;
            this.adopter.person_id = this.person.person_id;
          });
      },
      onSubmit() {
        let url = 'api/adopter/save';
        if (!this.is_create) {
          url += '/'+ this.$route.params.adopter_id
        }
        axios.post(url, this.adopter)
          .then(this.onSuccess)
          .catch(this.onError);
      },
      onSuccess(response) {
        if (this.is_create) {
          toastr.success("Adopter added");
          this.$router.push('/person/save/'+person_id);
        }
        toastr.success("Adopter updated");
        this.tabs = this.generateTabs();
      },
    },
    created() {
      if (this.has_adopt_id) {
        this.selectAdopt(this.$route.query.adopt_id);
      }
      if (this.is_create) {
        this.adopter.adopted_on = moment().format('YYYY-MM-DD');
      } else {
        axios.get('api/adopter/get/'+this.$route.params.adopter_id)
          .then(response => {
            this.adopt = response.data.adopt;
            this.adopter = response.data.adopter;
            this.person = response.data.person;
          });
      }
    },
    components: {PersonRemark},
    mixins: [FormMixin]
  }
</script>