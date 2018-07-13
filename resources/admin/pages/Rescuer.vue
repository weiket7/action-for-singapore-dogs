<template>
  <single-portlet :title="is_create ? 'Add Rescuer' : 'Update Rescuer'">
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
        <label-component>Remark 1</label-component>
        <div class="col-lg-8">
          <input type="text" v-model="rescuer.remark1" class="form-control" maxlength="500">
        </div>
      </form-row>

      <form-row>
        <label-component>Remark 2</label-component>
        <div class="col-lg-8">
          <input type="text" v-model="rescuer.remark2" class="form-control" maxlength="500">
        </div>
      </form-row>

      <form-row>
        <label-component>Remark 3</label-component>
        <div class="col-lg-8">
          <input type="text" v-model="rescuer.remark3" class="form-control" maxlength="500">
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
              <button type="submit" class="btn btn-danger">
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
    name: "Rescuer",
    data() {
      return {
        rescuer: {},
        adopt: {},
        person: {}
      }
    },
    computed: {
      is_create() {
        return this.$route.path === "/rescuer/save";
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
            this.rescuer.adopt_id = this.adopt.adopt_id;
          });
      },
      selectPerson(person_id) {
        axios.get('api/person/get-single/'+person_id)
          .then(response => {
            this.person = response.data;
            this.rescuer.person_id = this.person.person_id;
          });
      },
      onSubmit() {
        let url = 'api/rescuer/save';
        if (!this.is_create) {
          url += '/'+ this.$route.params.rescuer_id
        }
        axios.post(url, this.rescuer)
          .then(this.onSuccess)
          .catch(this.onError);
      },
      onSuccess(response) {
        if (! this.is_create) {
          toastr.success("Rescuer updated");
        } else if (this.has_adopt_id) {
          toastr.success("Rescuer added");
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
        this.rescuer.adopted_on = moment().format('YYYY-MM-DD');
      }
      if (this.has_person_id) {
        this.selectPerson(this.$route.query.person_id);
      }
      if (!this.is_create) {
        axios.get('api/rescuer/get/'+this.$route.params.rescuer_id)
          .then(response => {
            this.adopt = response.data.adopt;
            this.rescuer = response.data.rescuer;
            this.person = response.data.person;
          });
      }
    },
    mixins: [FormMixin]
  }
</script>