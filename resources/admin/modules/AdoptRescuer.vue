<template>
  <div>
    <form-row>
      <label-component>Name</label-component>
      <static-text>
        <router-link :to="'/person/save/'+rescuer.person_id">{{ rescuer.name }}</router-link>
      </static-text>
  
      <label-component>Email</label-component>
      <static-text>{{ rescuer.email }}</static-text>
    </form-row>
  
    <form-row>
      <label-component>Mobile</label-component>
      <static-text>{{ rescuer.mobile }}</static-text>
      
      <label-component>Address</label-component>
      <static-text>{{ rescuer.address }}</static-text>
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
        <router-link :to="'/rescuer/save/'+rescuer.rescuer_id">
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
    name: "adopt-rescuer",
    props: ['index', 'rescuer'],
  }
</script>

<style scoped>
</style>