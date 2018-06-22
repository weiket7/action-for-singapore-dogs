<template>
  <single-portlet title="Adoption Form">
    <form @submit.prevent="onSubmit()" class="m-form m-form--fit m-form--label-align-right" >
      <form-row>
        <label-component>Status</label-component>
        <radio-component name="stat" v-model="adoption_form.stat" :options="adoption_form_stats" :error="errors.get('stat')"></radio-component>
        
        <label-component>Name</label-component>
        <textbox-component v-model="adoption_form.name" :error="errors.get('name')"></textbox-component>
      </form-row>
      
      <form-row>
        <label-component>Email</label-component>
        <textbox-component v-model="adoption_form.email" :error="errors.get('email')"></textbox-component>
        
        <label-component>Mobile</label-component>
        <textbox-component v-model="adoption_form.mobile" :error="errors.get('mobile')"></textbox-component>
      </form-row>
  
      <form-row>
        <label-component required>Birthday</label-component>
        <datepicker-component name="birthday" v-model="adoption_form.birthday" :error="errors.get('birthday')" v-if="loaded"></datepicker-component>
  
        <label-component required>Gender</label-component>
        <radio-component v-model="adoption_form.gender" :options="{ 'M': 'Male', 'F': 'Female' }" :error="errors.get('gender')"></radio-component>
      </form-row>
  
      <form-row>
        <label-component>Address</label-component>
        <textbox-component v-model="adoption_form.address" :error="errors.get('address')"></textbox-component>
    
        <label-component>Postal</label-component>
        <textbox-component v-model="adoption_form.postal" :error="errors.get('postal')"></textbox-component>
      </form-row>
      
      <hr>
      
      <table class="table table-bordered">
        <tr v-for="answer in answers">
          <td width="50%">{{ answer.question }}</td>
          <td>{{ answer.answer }}</td>
        </tr>
      </table>
      
      <form-footer></form-footer>
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
        let url = 'api/adoption_form/save';
        if (!this.is_create) {
          url += '/'+ this.$route.params.adoption_form_id
        }
        
        axios.post(url, this.adoption_form, config)
          .then(this.onSuccess)
          .catch(this.onError);
      },
      onSuccess(response) {
        if (this.is_create) {
          toastr.success("Banner added");
          return;
        }
        toastr.success("Banner updated");
        let adoption_form_id = response.data;
        this.$router.push('/adoption_form/save/'+adoption_form_id);
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
    computed: {
      is_create() {
        return this.$route.path == "/adoption_form/save";
      }
    },
    mixins: [FormMixin]
  }
</script>

<style scoped>

</style>