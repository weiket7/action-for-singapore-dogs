<template>
  <div>
    <form-row>
      <label-component>Remark 1</label-component>
      <label class="col-lg-9 col-form-label static-text">{{ remark1 }}</label>
    </form-row>
    <form-row>
      <label-component>Remark 2</label-component>
      <label class="col-lg-9 col-form-label static-text">{{ remark2 }}</label>
    </form-row>
    <form-row>
      <label-component>Remark 3</label-component>
      <label class="col-lg-9 col-form-label static-text">{{ remark3 }}</label>
    </form-row>
  </div>
</template>

<script>
  export default {
    name: "remark",
    props: ['remark1', 'remark2', 'remark3']
  }
</script>

<style scoped>

</style>