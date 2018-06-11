<template>
  <div class="col-lg-3">
    <input type="file" :name="name" :value="value" class="form-control" @input="updateValue($event.target.value)"/>
    <span class="m-form__help m-form__error" v-if="error">
      {{ error }}
    </span>
    <br>
    <img :src="'assets/images/'+src" v-if="src" style="max-height: 150px">
  </div>
</template>

<script>
  export default {
    name: "image-component",
    props: {
      name: { type: String, required: false },
      value: { required: false },
      error: { type: String, required: false },
      src: { required: false }
    },
    methods: {
      updateValue: function (value) {
        this.$emit('input', value);
      }
    }
  }
</script>