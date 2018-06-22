<template>
  <div>
    <form-row>
      <label-component>Dog Name</label-component>
      <static-text><router-link :to="'/adopt/save/'+rescue.adopt_id">{{ rescue.name }}</router-link></static-text>
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
        <router-link :to="'/rescuer/save/'+rescue.adopt_id">
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
    name: "person-rescue",
    props: ['rescue', "index"],
    components: {
      PersonRemark
    }
  }
</script>

<style scoped>

</style>