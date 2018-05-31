<template>
    <label class="col-lg-2 col-form-label">
        {{ value }} <span v-if="required" class="required">*</span>
    </label>
</template>

<script>
  export default {
    name: "label-component",
    props: {
      value: {type: String, required: true},
      required: {type: Boolean, default: false}
    }
  }
</script>

<style scoped>

</style>