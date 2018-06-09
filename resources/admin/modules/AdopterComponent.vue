<template>
  <div>
    <person-component :index="index" type="adopter" :person="adopter" v-on:update-person="updatePerson"></person-component>
    
    <form-row>
      <label-component>Adopted On</label-component>
      <datepicker-component :name="'adopter-adopted_on-'+index" v-model="adopter.adopted_on"></datepicker-component>
      
      <label-component>Returned</label-component>
      <radio-component name="returned" v-model="adopter.returned" :value="adopter.returned" :options="{'1': 'Yes', '0': 'No'}"></radio-component>
    </form-row>
    
    <form-row v-show="adopter.returned == 1">
      <label-component>Returned On</label-component>
      <datepicker-component :name="'adopter-returned_on-'+index" v-model="adopter.returned_on"></datepicker-component>
      
      <label-component>Reason</label-component>
      <textarea-component name="return_reason" :value="adopter.return_reason"></textarea-component>
    </form-row>
    
    <person-remark></person-remark>
    
    <form-row>
      <div class="col-lg-2"></div>
      <div class="col-lg-10">
        <button type="button" @click="updateAdopter()" class="btn btn-success">
          Save
        </button>
        <button type="button" @click="$emit('remove-adopter', index)" class="btn btn-metal">
          Remove
        </button>
      </div>
    </form-row>
    
    <hr>
  </div>
</template>

<script>
  import PersonRemark from "./PersonRemark";
  import PersonComponent from "./PersonComponent";
  
  export default {
    name: "adopter-component",
    props: ['index', 'adopter'],
    methods: {
      updatePerson(person) {
        this.$emit('update-person', { index: this.index, person: person });
      },
    },
    components: {
      PersonComponent,
      PersonRemark
    }
  }
</script>

<style scoped>
</style>