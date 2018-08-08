<template>
  <div class="form-group">
    <label class="col-sm-3 control-label">{{ name }} <span class="required">*</span></label>
    <div class="col-sm-9">
      <slot></slot>
      <span class="help-block error" v-if="error">
        {{ error }}
      </span>
    </div>
  </div>
</template>

<script>
  export default {
    name: "volunteer-field",
    props: ["name", "error"]
  }
</script>

<style scoped>

</style>