<template>
  <single-portlet title="Adoption Form">
    <form @submit.prevent="onSubmit()" class="m-form m-form--fit m-form--label-align-right" >
      <form-row>
        <label-component>Status</label-component>
        <static-text>{{ adoption_form_stats[adoption_form.stat] }}</static-text>
        
        <label-component>Name</label-component>
        <static-text>{{ adoption_form.name }}</static-text>
      </form-row>
      
      <form-row>
        <label-component>Email</label-component>
        <static-text>{{ adoption_form.email }}</static-text>
        
        <label-component>Mobile</label-component>
        <static-text>{{ adoption_form.mobile }}</static-text>
      </form-row>
  
      <form-row>
        <label-component>Birthday</label-component>
        <static-text>{{ adoption_form.birthday | formatDate }}</static-text>
  
        <label-component>Gender</label-component>
        <static-text>{{ adoption_form.gender | showGender }}</static-text>
      </form-row>
  
      <form-row>
        <label-component>Address</label-component>
        <static-text>{{ adoption_form.address }}</static-text>
    
        <label-component>Postal</label-component>
        <static-text>{{ adoption_form.postal }}</static-text>
      </form-row>
  
      <!--<form-row>
        <label-component>Url</label-component>
        <static-text>
          <router-link :to="'../adoption-form/token/'+adoption_form.token" exact>
            adoption-form/token/{{ adoption_form.token }}
          </router-link>
        </static-text>
    
      </form-row>-->
      
      <hr>
      
      <form-row v-for="answer in answers" :key="answer.id">
        <label class="col-lg-4 col-form-label">
          {{ answer.question }}
        </label>
        <label class="col-lg-8 col-form-label static-text">
          {{ answer.answer }}
        </label>
      </form-row>
  
      <form-footer v-if="adoption_form.stat === 'S'">
        <button type="submit" class="btn btn-success">Approve</button>
      </form-footer>
    </form>
  </single-portlet>
</template>

<script>
  import axios from 'axios';
  import Errors from '../../common/errors'
  import FormMixin from '../form-mixin';
  
  export default {
    name: "adoption_form",
    data() {
      return {
        adoption_form: {},
        adoption_form_stats: {},
        answers: {},
        errors: new Errors(),
        loaded: false
      }
    },
    methods: {
      onSubmit() {
        let url = 'api/adoption-form/approve/'+this.$route.params.adoption_form_id;
        axios.post(url, this.adoption_form)
          .then(this.onSuccess)
          .catch(this.onError);
      },
      onSuccess(response) {
        toastr.success("Approved");
        this.adoption_form.stat = 'A';
      },
    },
    created() {
      axios.get('api/adoption-form/get/' + this.$route.params.adoption_form_id)
        .then(response => {
          this.adoption_form = response.data.adoption_form;
          this.adoption_form_stats = response.data.adoption_form_stats;
          this.answers = response.data.answers;
          this.loaded = true;
        }).catch(error => {
        console.log(error);
      })
    },
    mixins: [FormMixin]
  }
</script>

<style scoped>
  .static-text {
    text-align: left !important;
  }
</style>