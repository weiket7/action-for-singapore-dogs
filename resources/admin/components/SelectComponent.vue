<template>
  <div class="col-lg-3">
    <select :name="name" :value="value" class="form-control m-input" @change="updateValue($event.target.value)">
      <option :value="key" v-for="(val, key) in options" :selected="value == key">
        {{ val }}
      </option>
    </select>
    <span class="m-form__help" v-if="error">
      {{ error }}
    </span>
  </div>
</template>

<script>
  export default {
    name: "select-component",
    props: {
      name: {type: String, required: true},
      value: {required: true},
      options: {required: true},
      error: { type: String, required: false}
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