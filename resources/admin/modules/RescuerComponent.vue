<template>
  <div>
    <person-component :index="index" type="rescuer" :person="rescuer" v-on:update-person="updatePerson"></person-component>

    <person-remark></person-remark>
  
    <div class="form-group m-form__group row">
      <div class="col-lg-2"></div>
      <div class="col-lg-10">
        <button type="button" class="btn btn-success">
          Save
        </button>
        <button type="button" @click="$emit('remove-rescuer', index)" class="btn btn-metal">
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
    name: "rescuer-component",
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