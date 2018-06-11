<template>
  <div class="col-lg-3">
    <div :class="className">
      <label v-for="(val, key) in options" class="m-checkbox">
        <input type="checkbox" v-bind:value="key" :checked="isChecked(key, val)" :name="name" @change="updateValue($event.target.value)">
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
      },
      isChecked(key, val) {
        if (this.value === undefined) {
          return "";
        }
        if (typeof this.value === 'string') {
          return this.value === val || this.value === key;
        }
        //console.log("this.value " + this.value + " value="+value);
        return this.value.indexOf(key) >= 0 ||this.value.indexOf(val) >= 0;
      }
    },
    computed: {
      className() {
        return this.inline ? 'm-checkbox-inline' : 'm-checkbox-list';
      }
    }
  }
</script>

<style scoped>

</style>