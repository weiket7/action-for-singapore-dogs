<template>
  <single-portlet :title="is_create ? 'Add Foster' : 'Update Foster'">
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
        <select2-component name='person_name' url="api/person/search" v-if="has_person_id == false && is_create"
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
        <label-component>Start Date</label-component>
        <datepicker-component name="start_date" v-model="foster.start_date" v-if="is_create || foster.start_date"></datepicker-component>
        
        <label-component>End Date</label-component>
        <datepicker-component name="end_date" v-model="foster.end_date" v-if="is_create || foster.end_date"></datepicker-component>
      </form-row>

      <form-row>
        <label-component>Remark 1</label-component>
        <div class="col-lg-8">
          <input type="text" v-model="foster.remark1" class="form-control" maxlength="500">
        </div>
      </form-row>

      <form-row>
        <label-component>Remark 2</label-component>
        <div class="col-lg-8">
          <input type="text" v-model="foster.remark2" class="form-control" maxlength="500">
        </div>
      </form-row>

      <form-row>
        <label-component>Remark 3</label-component>
        <div class="col-lg-8">
          <input type="text" v-model="foster.remark3" class="form-control" maxlength="500">
        </div>
      </form-row>
  
      <div class="m-portlet__foot m-portlet__foot--fit">
        <div class="m-form__actions">
          <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-10">
              <button type="submit" class="btn btn-success">
                Save
              </button>
              <button type="button" data-toggle="confirmation" class="btn btn-metal" v-if="!is_create">
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
  import axios from 'axios';
  import FormMixin from '../form-mixin'
  
  export default {
    name: "Foster",
    data() {
      return {
        foster: {},
        adopt: {},
        person: {}
      }
    },
    computed: {
      is_create() {
        return this.$route.path === "/foster/save";
      },
      has_adopt_id() {
        return this.$route.query.adopt_id > 0;
      },
      has_person_id() {
        return this.$route.query.person_id > 0;
      }
    },
    methods: {
      selectAdopt(adopt_id) {
        axios.get('api/adopt/get-single/'+adopt_id)
          .then(response => {
            this.adopt = response.data;
            this.foster.adopt_id = this.adopt.adopt_id;
          });
      },
      selectPerson(person_id) {
        axios.get('api/person/get-single/'+person_id)
          .then(response => {
            this.person = response.data;
            this.foster.person_id = this.person.person_id;
          });
      },
      deleteFoster() {
        axios.post('api/delete-record?table=foster&column=foster_id&id='+this.$route.params.foster_id)
          .then(response => {
            toastr.success("Foster deleted");
            if (this.$route.query.referrer == "adopt") {
              this.$router.push('/adopt/save/'+this.foster.adopt_id);
            } else if (this.$route.query.referrer == "person") {
              this.$router.push('/person/save/'+this.foster.person_id);
            }
          }).catch(this.onError);
      },
      onSubmit() {
        let url = 'api/foster/save';
        if (!this.is_create) {
          url += '/'+ this.$route.params.foster_id
        }
        axios.post(url, this.foster)
          .then(this.onSuccess)
          .catch(this.onError);
      },
      onSuccess(response) {
        if (! this.is_create) {
          toastr.success("Foster updated");
        } else if (this.has_adopt_id) {
          toastr.success("Foster added");
          this.$router.push('/adopt/save/'+this.$route.query.adopt_id);
        } else if (this.has_person_id) {
          toastr.success("Dog added");
          this.$router.push('/person/save/'+this.$route.query.person_id);
        }
      },
    },
    created() {
      if (this.has_adopt_id) {
        this.selectAdopt(this.$route.query.adopt_id);
      }
      if (this.has_person_id) {
        this.selectPerson(this.$route.query.person_id);
      }
      if (!this.is_create) {
        axios.get('api/foster/get/'+this.$route.params.foster_id)
          .then(response => {
            this.adopt = response.data.adopt;
            this.foster = response.data.foster;
            this.person = response.data.person;
          });
      }
    },
    mounted() {
      var vue = this
      $('[data-toggle=confirmation]').confirmation({
        rootSelector: '[data-toggle=confirmation]',
      }).on("confirmed.bs.confirmation", function() {
        vue.deleteFoster();
      });
    },
    mixins: [FormMixin]
  }
</script>