<template>
  <div>
    <form-row>
      <label-component>Name</label-component>
      <static-text>
        <router-link :to="'/person/save/'+adopter.person_id">{{ adopter.name }}</router-link>
      </static-text>
      
      <label-component>Email</label-component>
      <static-text>{{ adopter.email }}</static-text>
    </form-row>
    
    <form-row>
      <label-component>Mobile</label-component>
      <static-text>{{ adopter.mobile }}</static-text>
      
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

    <remark :remark1="adopter.remark1" :remark2="adopter.remark2" :remark3="adopter.remark3"></remark>
  
    <form-row>
      <div class="col-lg-2"></div>
      <div class="col-lg-10">
        <router-link :to="'/adopter/save/'+adopter.adopter_id+'?referrer=adopt'">
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
    name: "adopt-adopter",
    props: ['index', 'adopter'],
    components: { Remark }
  }
</script>

<style scoped>
</style>