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
      },
    },
    mounted() {
      //bootstrap datepicker sql format = yyyy-mm-dd
      //bootstrap datepicker display format = dd M yyyy
      //moment sql format = YYYY-MM-DD
      //moment display format = DD MMM YYYY
      let options = {
        todayHighlight: true,
        orientation: "bottom left",
        templates: {
          leftArrow: '<i class="la la-angle-left"></i>',
          rightArrow: '<i class="la la-angle-right"></i>'
        },
        autoclose: true,
      };
      if (this.months) {
        options["viewMode"] = "months";
        options["minViewMode"] = "months";
        options["format"] = "M yyyy";
      } else {
        options["format"] = "dd M yyyy";
      }

      if (this.value) {
        let date = moment(this.value, 'YYYY-MM-DD');
        this.display_value = this.months ? date.format('MMM YYYY') : date.format('DD MMM YYYY');
        options["defaultViewDate"] = this.display_value;
      }
      let vue = this
      //without nextTick, when click datepicker then click outside, value will be gone
      this.$nextTick(function() {
        $('#datepicker-'+this.name).datepicker(options).on('changeDate', function() {
          let value = $(this).val();
          let date = vue.months ? moment(value, 'MMM YYYY').startOf("month") : moment(value, 'DD MMM YYYY');
          vue.updateValue(date.format('YYYY-MM-DD'));
        });
      });
    }
  }
</script>