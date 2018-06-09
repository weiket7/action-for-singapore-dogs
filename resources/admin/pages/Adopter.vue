<template>
  <single-portlet :title="is_create ? 'Add Adopter' : 'Update Adopter'">
    <form @submit.prevent="onSubmit()" class="m-form m-form--fit m-form--label-align-right" >
      <form-row>
        <label-component>Dog Name</label-component>
        <select2-component name='dog_name' url="api/adopt/search" v-if="is_create"
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
  
        <label-component>Mobile</label-component>
        <static-text>{{ person.mobile }}</static-text>
      </form-row>
  
      <form-row>
        <label-component>Address</label-component>
        <static-text>{{ person.address }}</static-text>
      </form-row>
      
      <form-row>
        <label-component>Adopted On</label-component>
        <datepicker-component name="adopted_on" v-model="adopter.adopted_on" v-if="adopter.adopted_on"></datepicker-component>
        
        <label-component v-show="!is_create">Returned</label-component>
        <radio-component name="returned" v-model="adopter.returned" :value="adopter.returned"
                         :options="{'1': 'Yes', '0': 'No'}" v-show="!is_create"></radio-component>
      </form-row>
      
      <form-row v-show="adopter.returned == 1">
        <label-component>Returned On</label-component>
        <datepicker-component name="returned_on" v-model="adopter.returned_on" v-if="adopter.returned_on"></datepicker-component>
        
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
  
  export default {
    name: "Adopter",
    components: {PersonRemark},
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
      }
    },
    methods: {
      selectAdopt(adopt_id) {
        axios.get('api/adopt/get-single/'+adopt_id)
          .then(response => {
            this.adopt = response.data;
          });
      },
      selectPerson(person_id) {
        axios.get('api/person/get-single/'+person_id)
          .then(response => {
            this.person = response.data;
          });
      }
    },
    created() {
      if (!this.is_create) {
        axios.get('api/adopter/get/'+this.$route.params.adopter_id)
          .then(response => {
            this.adopt = response.data.adopt;
            this.adopter = response.data.adopter;
            this.person = response.data.person;
          });
      }
    }
  }
</script>