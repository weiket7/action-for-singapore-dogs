<template>
  <single-portlet title="Adoption Form">
    <tabs :tabs="tabs">
      <tab :name="'General'" :active="true">
        <form @submit.prevent="onSubmit()" class="m-form m-form--fit m-form--label-align-right" >
          <form-row>
            <label-component>Status</label-component>
            <static-text v-if="isPendingSignature">
              Approved<br>
              Email has been sent<br>
              Please contact {{ adoption_form.gender == "M" ? "him" : "her" }} to check his email and sign
            </static-text>
            <static-text v-else>{{ adoption_form_stats[adoption_form.stat] }}</static-text>
  
            <label-component>Dog(s) {{ adoption_form.gender == "M" ? "he" : "she" }}'s interested in</label-component>
            <static-text>
              {{ interested_in.length}}
              <span v-for="(dog_name, adopt_id, index) in interested_in">
                <router-link :to="'/adopt/save/'+adopt_id">{{ dog_name }}</router-link><span v-if="index != Object.keys(interested_in).length - 1">, </span>
              </span>
            </static-text>

          </form-row>
          
          <form-row>
            <label-component>Name</label-component>
            <static-text>{{ adoption_form.name }}</static-text>
            
            <label-component>NRIC / FIN</label-component>
            <static-text>{{ adoption_form.identification_number }}</static-text>
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

          <template v-if="isApplication">
            <form-row>
              <label-component>Dog Name</label-component>
              <select2-component name='dog_name' url="api/adopt/search"
                                 event_name="select-adopt"
                                 v-on:select-adopt="selectAdopt" :error="errors.get('adopt_id')"></select2-component>

              <label-component>Adopted On</label-component>
              <datepicker-component name="adopted_on" v-model="adoption_form.adopted_on" :error="errors.get('adopted_on')"></datepicker-component>
            </form-row>

            <form-row>
              <label-component>Remark 1</label-component>
              <textarea-component v-model="adoption_form.remark1"></textarea-component>
            </form-row>
  
            <form-row>
              <label-component>Remark 2</label-component>
              <textarea-component v-model="adoption_form.remark2"></textarea-component>
            </form-row>
            <form-row>
              <label-component>Remark 3</label-component>
              <textarea-component v-model="adoption_form.remark3"></textarea-component>
            </form-row>
          </template>
          
          <template v-if="isPendingSignature || isAgreement">
            <form-row>
              <label-component required>Dog Name</label-component>
              <static-text>
                <router-link :to="'/adopt/save/'+adopt.adopt_id">{{ adopt.name }}</router-link>
              </static-text>

              <label-component required>Adopted On</label-component>
              <static-text>{{ adoption_form.adopted_on | formatDate }}</static-text>
            </form-row>

            <remark :remark1="adoption_form.remark1" :remark2="adoption_form.remark2" :remark3="adoption_form.remark3"></remark>
          </template>
          
          <form-footer v-show="isEnquiry || isApplication || isPendingSignature">
            <button type="submit" v-if="isApplication" class="btn btn-success">Approve</button>
  
            <button type="button" class="btn btn-danger" data-toggle="confirmation">Delete</button>
          </form-footer>
        </form>
      </tab>
      <tab :name="'Questionnaire'">
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
  import Remark from '../modules/Remark'

  
  export default {
    name: "adoption_form",
    data() {
      return {
        adoption_form: {},
        adoption_form_stats: {},
        interested_in: {},
        adopt: {},
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
        toastr.success("Approved, email has been sent, please contact "
          + (this.adoption_form.gender === "M" ? "him" : "her")
          + " to check his email and sign");
        this.getAdoptionForm();
      },
      selectAdopt: function(adopt_id) {
        this.adoption_form.adopt_id = adopt_id;
      },
      getAdoptionForm() {
        axios.get('api/adoption-form/get/' + this.$route.params.adoption_form_id)
          .then(response => {
            this.adoption_form = response.data.adoption_form;
            this.adoption_form_stats = response.data.adoption_form_stats;
            this.answers = response.data.answers;
            this.interested_in = response.data.interested_in;
            if (this.adoption_form.adopt_id) {
              this.adopt = response.data.adopt;
            }
            if (this.isApplication) {
              this.adoption_form.adopted_on = moment().format('YYYY-MM-DD');
            }
            this.loaded = true;
          }).catch(this.onError);
      },
      deleteAdoptionForm() {
        axios.post('api/adoption-form/delete/' + this.$route.params.adoption_form_id)
          .then(response => {
            this.$router.push('/adoption-form');
          }).catch(this.onError);
      }
    },
    computed: {
      tabs() {
        let tabs = ['General'];
        if (this.isApplication || this.isPendingSignature || this.isAgreement) {
          tabs.push('Questionnaire');
        }
        return tabs;
      },
      isEnquiry() {
        return this.adoption_form.stat === 'E';
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
      this.getAdoptionForm();
    },
    mounted() {
      //toastr.options.timeOut = 0;
      //toastr.options.extendedTimeOut = 0;
  
      let vue = this
      $('[data-toggle=confirmation]').confirmation({
        rootSelector: '[data-toggle=confirmation]',
      }).on("confirmed.bs.confirmation", function() {
        toastr.success("Adoption form deleted");
        vue.deleteAdoptionForm();
      });
    },
    components: { Remark },
    mixins: [FormMixin]
  }
</script>

<style scoped>
  .static-text {
    text-align: left !important;
  }
</style>