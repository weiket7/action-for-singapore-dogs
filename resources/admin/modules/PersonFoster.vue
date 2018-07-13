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

    <remark :remark1="foster.remark1" :remark2="foster.remark2" :remark3="foster.remark3"></remark>

    <form-row>
      <div class="col-lg-2"></div>
      <div class="col-lg-10">
        <router-link :to="'/foster/save/'+foster.adopt_id+'?referrer=person'">
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
    name: "person-foster",
    props: ['foster', "index"],
    components: { Remark }
  }
</script>

<style scoped>

</style>