<template>
  <label class="col-lg-3 col-form-label static-text"><slot></slot></label>
</template>

<script>
  export default {
    name: "static-text",
    props: {
      value: {type: String, required: false},
    }
  }
</script>

<style scoped>
  .static-text {
    text-align: left !important;
  }
</style>