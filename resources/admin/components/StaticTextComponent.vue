<template>
  <label class="col-lg-3 col-form-label static-text">{{ value }}</label>
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

</style>