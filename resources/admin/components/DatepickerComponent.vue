<template>
  <div class="col-lg-3">
    <input type="text" :id="'datepicker-'+name" :name="name" :value="value" class="form-control" @input="updateValue($event.target.value)"/>
    <span class="m-form__help m-form__error" v-if="error">
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
      //bootstrap datepicker sql format = yyyy-mm-dd
      //bootstrap datepicker display format = dd M yyyy
      //moment sql format = YYYY-DD-MM
      //moment display format = DD MMM YYYY
      let vue = this
      $('#datepicker-'+this.name).datepicker({
        todayHighlight: true,
        format: "d M yyyy",
        orientation: "bottom left",
        templates: {
          leftArrow: '<i class="la la-angle-left"></i>',
          rightArrow: '<i class="la la-angle-right"></i>'
        },
        autoclose: true
      }).on('changeDate', function() {
        vue.updateValue($(this).val());
      });
    }
  }
</script>

<style scoped="">
  .m-form__help {
    color: #f4516c;
  }
</style>