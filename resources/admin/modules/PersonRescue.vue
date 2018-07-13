<template>
  <div>
    <form-row>
      <label-component>Dog Name</label-component>
      <static-text><router-link :to="'/adopt/save/'+rescue.adopt_id">{{ rescue.name }}</router-link></static-text>
    </form-row>

    <remark :remark1="rescue.remark1" :remark2="rescue.remark2" :remark3="rescue.remark3"></remark>

    <form-row>
      <div class="col-lg-2"></div>
      <div class="col-lg-10">
        <router-link :to="'/rescuer/save/'+rescue.rescuer_id+'?referrer=person'">
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
    name: "person-rescue",
    props: ['rescue', "index"],
    components: { Remark }
  }
</script>

<style scoped>

</style>