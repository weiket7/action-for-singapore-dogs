<template>
  <div>
    <form-row>
      <label-component>Name</label-component>
      <static-text>
        <router-link :to="'/person/save/'+rescuer.person_id">{{ rescuer.name }}</router-link>
      </static-text>
    
      <label-component>Mobile</label-component>
      <static-text>{{ rescuer.mobile }}</static-text>
    </form-row>
  
    <form-row>
      <label-component>Address</label-component>
      <static-text>{{ rescuer.address }}</static-text>
    </form-row>
  
    <form-row>
      <label-component>Adopted On</label-component>
      <static-text>{{ rescuer.adopted_on | formatDate }}</static-text>
    
      <label-component>Returned</label-component>
      <static-text>{{ rescuer.returned ? "Yes" : "No" }}</static-text>
    </form-row>
  
    <form-row v-show="rescuer.returned == 1">
      <label-component>Returned On</label-component>
      <static-text>{{ rescuer.returned_on | formatDate }}</static-text>
    
      <label-component>Reason</label-component>
      <static-text>{{ rescuer.return_reason }}</static-text>
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
  import PersonRemark from "./PersonRemark";
  import PersonComponent from "./PersonComponent";

  export default {
    name: "adopt-rescuer",
    props: ['index', 'rescuer'],
    methods: {
      updatePerson(person) {
        this.$emit('update-person', { index: this.index, person: person });
      },
    },
    components: {
      PersonRemark,
      PersonComponent
    },
  }
</script>

<style scoped>
</style>