<template>
  <div class="col-lg-3">
    <div :class="class_name">
      <label v-for="(val, key) in options" class="m-checkbox">
        <input type="checkbox" v-bind:value="key" :checked="value == key" :name="name" @change="updateValue($event.target.value)">
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
    name: "checkbox-component",
    props: {
      name: { type: String, required: false},
      value: { required: false},
      error: { type: String, required: false},
      inline: { type: Boolean, required: false, default: false },
      options: {required: true}
    },
    methods: {
      updateValue: function (value) {
        this.$emit('input', value);
      }
    },
    computed: {
      class_name() {
        return this.inline ? 'm-checkbox-inline' : 'm-checkbox-list';
      }
    }
  }
</script>

<style scoped>

</style>