<template>
  <div class="col-lg-3">
    <input type="text" :id="'datepicker-'+name" :name="name" :value="value" class="form-control" @input="updateValue($event.target.value)"/>
    <span class="m-form__help" v-if="error">
      {{ error }}
    </span>
  </div>
</template>

<script>
  export default {
    name: "datepicker-component",
    props: ['name', 'value', 'error'],
    methods: {
      updateValue: function (value) {
        this.$emit('input', value);
      }
    },
    mounted() {
      $('#txt-datepicker-'+this.name).datepicker({
        todayHighlight: true,
        orientation: "bottom left",
        templates: {
          leftArrow: '<i class="la la-angle-left"></i>',
          rightArrow: '<i class="la la-angle-right"></i>'
        },
        autoclose: true
      });

    }
  }
</script>

<style scoped="">
  .m-form__help {
    color: #f4516c;
  }
</style>