<template>
  <div>
    <form-row>
      <label-component>Dog Name</label-component>
      <static-text><router-link :to="'/adopt/save/'+adopt.adopt_id">{{ adopt.name }}</router-link></static-text>
    </form-row>
    
    <form-row>
      <label-component>Adopted On</label-component>
      <static-text>{{ adopt.adopted_on }}</static-text>
      
      <label-component>Returned</label-component>
      <static-text>{{ adopt.returned ? "Yes" : "No" }}</static-text>
    </form-row>
    
    <form-row class="form-group m-form__group row" v-show="adopt.returned == 1">
      <label-component>Returned On</label-component>
      <static-text>{{ adopt.returned_on | formatDate }}</static-text>
      
      <label-component>Reason</label-component>
      <static-text>{{ adopt.return_reason }}</static-text>
    </form-row>
    
    <person-remark>
    
    </person-remark>
    
    <hr>
  </div>
</template>

<script>
  import PersonRemark from "../modules/PersonRemark";
  
  export default {
    name: "PersonAdopt",
    props: ['adopt', "index"],
    components: {
      PersonRemark
    }
  }
</script>

<style scoped>

</style>