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

    <remark :remark1="adopt.remark1" :remark2="adopt.remark2" :remark3="adopt.remark3"></remark>

    <form-row>
      <div class="col-lg-2"></div>
      <div class="col-lg-10">
        <router-link :to="'/adopter/save/'+adopt.adopt_id+'?referrer=person'">
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
    name: "PersonAdopt",
    props: ['adopt', "index"],
    components: { Remark }
  }
</script>

<style scoped>

</style>