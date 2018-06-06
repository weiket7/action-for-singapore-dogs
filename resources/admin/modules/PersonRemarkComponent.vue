<template>
  <div>
    <label-component>Remarks</label-component>
    <div class="col-lg-2">
      <select name="" class="form-control">
        <option>Type</option>
        <option>Home</option>
        <option>Work</option>
        <option>Personality</option>
      </select>
    </div>
    <div class="col-lg-5">
      <input type="text" class="form-control">
    </div>
  </div>
</template>

<script>
  export default {
    name: "person-remark"
  }
</script>

<style scoped>

</style>