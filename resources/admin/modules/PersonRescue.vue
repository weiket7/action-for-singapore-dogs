<template>
  <div>
    <form-row>
      <label-component>Dog Name</label-component>
      <static-text><router-link :to="'/adopt/save/'+rescue.adopt_id">{{ rescue.name }}</router-link></static-text>
    </form-row>

    <person-remark></person-remark>
    
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