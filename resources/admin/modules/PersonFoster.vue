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
        <router-link :to="'/foster/save/'+foster.adopt_id">
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