<template>
  <div>
    <div v-for="(remark, index) in remarks" class="form-group m-form__group row">
      <label-component>Remarks</label-component>

      <div class="col-lg-2">
        <select name="" class="form-control">
          <option>Type</option>
          <option>Home</option>
          <option>Work</option>
          <option>Personality</option>
        </select>
      </div>
      <div class="col-lg-6">
        <input type="text" class="form-control">
      </div>

      <div class="col-lg-2">
        <button type="button" @click="removeRemarkRow(index)" class="btn btn-metal btn-sm">X</button>
        <button type="button" v-show="index === (remarks.length-1)" @click="addRemarkRow(index)" class="btn btn-metal btn-sm">+</button>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    name: "person-remark",
    data() {
      return {
        remarks: [{}]
      }
    },
    methods: {
      addRemarkRow() {
        this.remarks.push({});
      },
      removeRemarkRow(index) {
        console.log('remove remark row = ' + index);
        this.remarks.splice(index, 1);
      }
    }
  }
</script>

<style scoped>

</style>