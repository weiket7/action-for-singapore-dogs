<template>
  <div>
    <person-component :index="index" type="foster" :person="foster" v-on:update-person="updateFoster"></person-component>
  
    <div class="form-group m-form__group row">
      <label-component>Start Date</label-component>
      <datepicker-component :name="'foster-start_date-'+index" :value="foster.start_date | formatDate"></datepicker-component>
    
      <label-component>End Date</label-component>
      <datepicker-component :name="'foster-end_date-'+index" :value="foster.end_date | formatDate"></datepicker-component>
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
      updateFoster(person) {
        this.$emit('update-foster', { index: this.index, person: person });
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