<template>
  <div>
    <form-row>
      <label-component>Name</label-component>
      <static-text>
        <router-link :to="'/person/save/'+adopter.person_id">{{ adopter.name }}</router-link>
      </static-text>
      
      <label-component>Mobile</label-component>
      <static-text>{{ adopter.mobile }}</static-text>
    </form-row>
    
    <form-row>
      <label-component>Address</label-component>
      <static-text>{{ adopter.address }}</static-text>
    </form-row>
    
    <form-row>
      <label-component>Adopted On</label-component>
      <static-text>{{ adopter.adopted_on | formatDate }}</static-text>
      
      <label-component>Returned</label-component>
      <static-text>{{ adopter.returned ? "Yes" : "No" }}</static-text>
    </form-row>
    
    <form-row v-show="adopter.returned == 1">
      <label-component>Returned On</label-component>
      <static-text>{{ adopter.returned_on | formatDate }}</static-text>
      
      <label-component>Reason</label-component>
      <static-text>{{ adopter.return_reason }}</static-text>
    </form-row>
  
    <form-row v-show="adopter.returned == 1">
      <label-component>Remarks</label-component>
      <static-text>
        Home - Abc<br>
        Personality - Def
      </static-text>
    </form-row>
  
    <form-row>
      <div class="col-lg-2"></div>
      <div class="col-lg-10">
        <router-link :to="'/adopter/save/'+adopter.adopter_id">
          <button type="button" class="btn btn-success">
            Update
          </button>
        </router-link>
      </div>
    </form-row>
    
    <hr>
  </div>
</template>

<script>
  import axios from 'axios'
  import PersonRemark from "./PersonRemark";
  import PersonComponent from "./PersonComponent";
  
  export default {
    name: "adopt-adopter",
    data() {
      return {
        //is_create: false
      }
    },
    props: ['index', 'adopter'],
    computed: {
      is_create() {
        return this.adopter.person_id > 0 == false;
      }
    },
    methods: {
      existingPerson() {
        //this.is_create = false;
      },
      newPerson() {
        //this.is_create = true;
      },
      updatePerson(person) {
        this.$emit('update-person', { index: this.index, person: person });
      },
      updateAdopter() {
        let url = 'api/adopter/save';
        if (!this.is_create) {
          url += '/'+ this.adopter.person_id
        }
        axios.post(url, this.adopt)
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
          toastr.success("Dog added");
          return;
        }
        toastr.success("Dog updated");
        let adopt_id = response.data;
        this.$router.push('/adopt/save/'+adopt_id);
      },
    },
    components: {
      PersonComponent,
      PersonRemark
    }
  }
</script>

<style scoped>
</style>