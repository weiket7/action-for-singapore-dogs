<template>
  <div class="col-lg-3">
    <div class="m-radio-inline">
      <label v-for="(val, key) in options" class="m-radio">
        <input type="radio" v-bind:value="key" :checked="value == key" :name="name" @change="updateValue($event.target.value)">
        {{ val }}
        <span></span>
      </label>
    </div>
    <span class="m-form__help m-form__error" v-if="error">
      {{ error }}
    </span>
  </div>
</template>

<script>
  export default {
    name: "radio-component",
    props: {
      options: {required: true},
      name: {type: String, required: false},
      value: {required: false},
      error: {required: false}
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