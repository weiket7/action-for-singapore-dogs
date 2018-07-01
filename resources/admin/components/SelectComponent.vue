<template>
  <div class="col-lg-3">
    <select :name="name" :value="value" class="form-control m-input" @change="updateValue($event.target.value)">
      <option v-if="isArray" :value="val" v-for="(val, key) in options" :selected="value == val">
        {{ val }}
      </option>
      <option v-if="!isArray" :value="key" v-for="(val, key) in options" :selected="value == key">
        {{ val }}
      </option>
      
    </select>
    <span class="m-form__help m-form__error" v-if="error">
      {{ error }}
    </span>
  </div>
</template>

<script>
  export default {
    name: "select-component",
    props: {
      name: { type: String, required: false},
      value: { required: false},
      error: { type: String, required: false},
      options: {required: true}
    },
    methods: {
      updateValue: function (value) {
        this.$emit('input', value);
      },
    },
    computed: {
      isArray() {
        return Array.isArray(this.options);
      }
    }
  }
</script>

<style scoped>

</style>