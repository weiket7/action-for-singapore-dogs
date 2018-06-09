<template>
  <div>
    <form-row>
      <label-component>Dog Name</label-component>
      <static-text><router-link :to="'/adopt/save/'+foster.adopt_id">{{ foster.name }}</router-link></static-text>
    </form-row>
    
    <form-row>
      <label-component>Start Date</label-component>
      <static-text>{{ foster.start_date | formatDate }}</static-text>
      
      <label-component>End Date</label-component>
      <static-text>{{ foster.end_date | formatDate }}</static-text>
    </form-row>
    
    <person-remark></person-remark>
    
    <hr>
  </div>
</template>

<script>
  import PersonRemark from "../modules/PersonRemark";
  
  export default {
    name: "person-foster",
    props: ['foster', "index"],
    components: {
      PersonRemark
    }
  }
</script>

<style scoped>

</style>