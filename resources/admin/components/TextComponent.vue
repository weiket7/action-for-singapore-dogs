<template>
  <div class="col-lg-3 col-form-label field-text">
    {{ value }} <span v-if="required" class="required">*</span>
  </div>
</template>

<script>
  export default {
    name: "text-component",
    props: {
      value: {type: String, required: true},
      required: {type: Boolean, default: false}
    }
  }
</script>

<style scoped>

</style>