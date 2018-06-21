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
    props: {
      name: { type: String, required: true},
      value: { required: false},
      error: { type: String, required: false},
      months: { type: Boolean, required: false},
    },
    methods: {
      updateValue: function (value) {
        this.$emit('input', value);
      }
    },
    mounted() {
      //bootstrap datepicker sql format = yyyy-mm-dd
      //bootstrap datepicker display format = dd M yyyy
      //moment sql format = YYYY-MM-DD
      //moment display format = DD MMM YYYY
      this.display_value = "";
      if (this.value == undefined) {
        this.display_value = moment().format('DD MMM YYYY');
      }
      if (this.value) {
        this.display_value = moment(this.value, 'YYYY-MM-DD').format('DD MMM YYYY');
      }
      let options = {
        todayHighlight: true,
        defaultViewDate: this.display_value,

        orientation: "bottom left",
        templates: {
          leftArrow: '<i class="la la-angle-left"></i>',
          rightArrow: '<i class="la la-angle-right"></i>'
        },
        autoclose: true,
      };
      //console.log('options months='+this.months);
      if (this.months) {
        options["viewMode"] = "months";
        options["minViewMode"] = "months";
        options["format"] = "M yyyy";
      } else {
        options["format"] = "dd M yyyy";
      }
      let vue = this
      $('#datepicker-'+this.name).datepicker(options).on('changeDate', function() {
        let date = moment($(this).val(), 'DD MMM YYYY');
        if (vue.months) {
          date = moment($(this).val(), 'MMM YYYY').startOf("month");
        }
        let result = date.format('YYYY-MM-DD');
        //console.log('this val=' + $(this).val() + ' date=' + date + ' formatted date='+result);
        vue.updateValue(result);
      });
    }
  }
</script>