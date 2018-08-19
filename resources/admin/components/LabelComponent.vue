<template>
  <label class="col-lg-2 col-form-label">
    <slot></slot> <span v-if="required" class="required">*</span>
    <span v-if="text" class="m-form__help">
      {{ text }}
    </span>
  </label>
</template>

<script>
  export default {
    name: "label-component",
    props: {
      required: {type: Boolean, default: false, required: false},
      text: {type: String, required: false}
    }
  }
</script>

<style scoped>

</style>