<template>
  <div class="col-lg-3">
    <div class="m-radio-inline">
    <label v-for="(val, key) in options" class="m-radio">
      <input type="radio" v-bind:value="key" :checked="value == key" :name="name" @change="updateValue($event.target.value)">
        {{ val }}
      <span></span>
    </label>
    </div>
  </div>
</template>

<script>
  export default {
    name: "radio-component",
    props: {
      name: {type: String, required: true},
      value: {required: true},
      options: {required: true}
    },
    methods: {
      updateValue: function (value) {
        this.$emit('input', value);
      }
    }
  }
</script>

<style scoped>

</style>