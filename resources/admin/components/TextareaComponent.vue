<template>
  <div class="col-lg-3">
    <textarea :name="name" class="form-control" @input="updateValue($event.target.value)" rows="3">
      {{ value }}
    </textarea>
    <span class="m-form__help" v-if="error">
      {{ error }}
    </span>
  </div>
</template>

<script>
  export default {
    name: "textarea-component",
    props: ['name', 'value', 'error'],
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