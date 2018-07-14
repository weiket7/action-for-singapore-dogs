<template>
  <div class="col-lg-3">
    <div :class="className">
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
      name: { type: String, required: false},
      value: { required: false},
      error: { type: String, required: false},
      inline: { type: Boolean, required: false, default: false },
      options: {required: true}
    },
    methods: {
      updateValue: function (value) {
        if (value === "1") {
          value = 1;
        }
        if (value === "0") {
          value = 0;
        }
        this.$emit('input', value);
      }
    },
    computed: {
      className() {
        return this.inline ? 'm-radio-inline' : 'm-radio-list';
      }
    }
  }
</script>

<style scoped>

</style>