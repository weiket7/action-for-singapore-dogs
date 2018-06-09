<template>
  <div class="col-lg-3">
    <input type="text" :id="'datepicker-'+name" :name="name" :value="display_value" class="form-control" @input="updateValue($event.target.value)" readonly/>
    <span class="m-form__help m-form__error" v-if="error">
      {{ error }}
    </span>
  </div>
</template>

<script>
  export default {
    name: "datepicker-component",
    data() {
      return {
          display_value: ""
      }
    },
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
      this.display_value = moment(this.value, 'YYYY-MM-DD').format('DD MMM YYYY');
      //moment display format = DD MMM YYYY
      //console.log('name='+this.name+' value='+this.value+' display_value='+this.display_value);
      let options = {
        todayHighlight: true,
        defaultViewDate: this.display_value,
        format: "dd M yyyy",
        orientation: "bottom left",
        templates: {
          leftArrow: '<i class="la la-angle-left"></i>',
          rightArrow: '<i class="la la-angle-right"></i>'
        },
        autoclose: true
      };
      let vue = this
      $('#datepicker-'+this.name).datepicker(options).on('changeDate', function() {
        vue.updateValue($(this).val());
      });
    }
  }
</script>