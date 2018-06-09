<template>
  <div>
    <person-component :index="index" type="foster" :person="foster" v-on:update-person="updatePerson"></person-component>
  
    <div class="form-group m-form__group row">
      <label-component>Start Date</label-component>
      <datepicker-component :name="'foster-start_date-'+index" v-model="foster.start_date" v-if="foster.start_date"></datepicker-component>
    
      <label-component>End Date</label-component>
      <datepicker-component :name="'foster-end_date-'+index" v-model="foster.end_date" v-if="foster.end_date"></datepicker-component>
    </div>

    <person-remark></person-remark>
  
    <div class="form-group m-form__group row">
      <div class="col-lg-2"></div>
      <div class="col-lg-10">
        <button type="button" class="btn btn-success">
          Save
        </button>
        <button type="button" @click="$emit('remove-foster', index)" class="btn btn-metal">
          Remove
        </button>
      </div>
    </div>
    
    <hr>
  </div>
</template>

<script>
  import PersonRemark from "./PersonRemark";
  import PersonComponent from "./PersonComponent";

  export default {
    name: "foster-component",
    props: ['index', 'foster'],
    methods: {
      updatePerson(person) {
        this.$emit('update-person', { index: this.index, person: person });
      },
    },
    components: {
      PersonRemark,
      PersonComponent
    }
  }
</script>

<style scoped>

</style>