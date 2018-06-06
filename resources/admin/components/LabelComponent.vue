<template>
    <label class="col-lg-2 col-form-label">
        <slot></slot> <span v-if="required" class="required">*</span>
    </label>
</template>

<script>
  export default {
    name: "label-component",
    props: {
      required: {type: Boolean, default: false}
    }
  }
</script>

<style scoped>

</style>