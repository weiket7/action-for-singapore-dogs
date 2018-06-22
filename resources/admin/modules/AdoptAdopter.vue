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
  
    <form-row>
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
  export default {
    name: "adopt-adopter",
    props: ['index', 'adopter'],
  }
</script>

<style scoped>
</style>