<template>
  <div class="col-lg-3">
    <textarea :name="name" class="form-control" @input="updateValue($event.target.value)" :rows="rows">{{ value }}</textarea>
    <span class="m-form__help m-form__error" v-if="error">
      {{ error }}
    </span>
  </div>
</template>

<script>
  export default {
    name: "textarea-component",
    props: {
      name: { type: String, required: false},
      value: { required: false},
      error: { type: String, required: false},
      rows: { type: Number, required: false}
    },
    methods: {
      updateValue: function (value) {
        this.$emit('input', value);
      }
    }
  }
</script>

<style scoped="">
  .m-form__help {
    color: #f4516c;
  }
</style>