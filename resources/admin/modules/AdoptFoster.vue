<template>
  <div>
    <form-row>
      <label-component>Name</label-component>
      <static-text>
        <router-link :to="'/person/save/'+foster.person_id">{{ foster.name }}</router-link>
      </static-text>
  
      <label-component>Email</label-component>
      <static-text>{{ foster.email }}</static-text>
    </form-row>
  
    <form-row>
      <label-component>Mobile</label-component>
      <static-text>{{ foster.mobile }}</static-text>
      
      <label-component>Address</label-component>
      <static-text>{{ foster.address }}</static-text>
    </form-row>
    
    <div class="form-group m-form__group row">
      <label-component>Start Date</label-component>
        <static-text>{{ foster.start_date | formatDate }}</static-text>
    
      <label-component>End Date</label-component>
      <static-text>{{ foster.end_date | formatDate }}</static-text>
    </div>

    <remark :remark1="foster.remark1" :remark2="foster.remark2" :remark3="foster.remark3"></remark>

    <form-row>
      <div class="col-lg-2"></div>
      <div class="col-lg-10">
        <router-link :to="'/foster/save/'+foster.foster_id">
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
  import Remark from './Remark'

  export default {
    name: "adopt-foster",
    props: ['index', 'foster'],
    components: { Remark }
  }
</script>

<style scoped>

</style>