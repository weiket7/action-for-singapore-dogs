<template>
  <single-portlet title="Adoption Form">
    <tabs :tabs="tabs">
      <tab :name="'General'" :active="true">
        <form @submit.prevent="onSubmit()" class="m-form m-form--fit m-form--label-align-right" >
          <form-row>
            <label-component>Status</label-component>
            <static-text v-if="adoption_form.stat === 'S'">
              Approved<br>
              Email has been sent<br>
              Please contact him to check his email and sign
            </static-text>
            <static-text v-else>{{ adoption_form_stats[adoption_form.stat] }}</static-text>

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

          <template v-if="adoption_form.stat === 'P'">
            <form-row>
              <label-component>Dog Name</label-component>
              <select2-component name='dog_name' url="api/adopt/search"
                                 event_name="select-adopt"
                                 v-on:select-adopt="selectAdopt"></select2-component>

              <label-component>Adopted On</label-component>
              <datepicker-component name="adopted_on" v-model="adoption_form.adopted_on"></datepicker-component>
            </form-row>

            <form-row>
              <label-component>Remark</label-component>
              <textarea-component v-model="adoption_form.remark"></textarea-component>
            </form-row>

            <form-footer>
              <button type="submit" class="btn btn-success">Approve</button>
            </form-footer>
          </template>
          <template v-if="isPendingSignature || isAgreement">
            <form-row>
              <label-component>Dog Name</label-component>
              <static-text>{{ adoption_form.adopt_id }}</static-text>

              <label-component>Adopted On</label-component>
              <static-text>{{ adoption_form.adopted_on | formatDate }}</static-text>
            </form-row>

            <form-row>
              <label-component>Remark</label-component>
              <static-text>{{ adoption_form.remark }}</static-text>
            </form-row>
          </template>
        </form>
      </tab>
      <tab :name="'Agreement'">
        <form-row v-for="answer in answers" :key="answer.id">
          <label class="col-lg-4 col-form-label">
            {{ answer.question }}
          </label>
          <label class="col-lg-8 col-form-label static-text">
            {{ answer.answer }}
          </label>
        </form-row>
      </tab>
    </tabs>
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
        toastr.success("Approved, email has been sent, please contact him to check his email and sign");
        this.adoption_form.stat = 'S';
      },
      selectAdopt: function(adopt_id) {
        this.adoption_form.adopt_id = adopt_id;
      },

    },
    computed: {
      tabs() {
        let tabs = ['General'];
        if (this.isApplication || this.isPendingSignature || this.isAgreement) {
          tabs.push('Agreement');
        }
        return tabs;
      },
      isApplication() {
        return this.adoption_form.stat === 'P';
      },
      isPendingSignature() {
        return this.adoption_form.stat === 'S';
      },
      isAgreement() {
        return this.adoption_form.stat === 'A';
      }
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