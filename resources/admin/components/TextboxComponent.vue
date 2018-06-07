<template>
  <div class="col-lg-3">
    <input type="text" :name="name" :value="value" class="form-control" @input="updateValue($event.target.value)"/>
    <span class="m-form__help m-form__error" v-if="error">
      {{ error }}
    </span>
  </div>
</template>

<script>
  export default {
    name: "textbox-component",
    props: {
      name: { type: String, required: false},
      value: { required: false},
      error: { type: String, required: false},
    },
    methods: {
      updateValue: function (value) {
        this.$emit('input', value);
      }
    }
  }
</script>