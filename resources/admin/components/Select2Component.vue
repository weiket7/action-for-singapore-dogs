<template>
  <div class="col-lg-3">
    <select :id="name" :name="name" class="form-control m-input" @change="updateValue($event.target.value)">
    
    </select>
    <span class="m-form__help m-form__error" v-if="error">
      {{ error }}
    </span>
  </div>
</template>

<script>
  export default {
    name: "select2-component",
    props: {
      name: { type: String, required: false},
      error: { type: String, required: false},
      url: { type: String, required: true },
      event_name: { type: String, required: false },
      default_id: { required: false},
      default_text: { required: false},
    },
    computed: {
      has_default() {
        return this.default_id !== undefined && this.default_text !== undefined;
      }
    },
    mounted() {
      var options = {
        width: '100%',
        minimumInputLength: 2,
        ajax: {
          url: this.url,
          dataType: 'json',
          data: function (term, page) {
            return {
              term: term.term
            };
          },
          processResults: function (data) {
            return { results: data };
          },
        }
      };
      if (this.has_default) {
        options["data"] = [{
          id: this.default_id,
          text: this.default_text
        }];
      } else {
        options["placeholder"] = "Search";
      }
      var vue = this
      $("#"+this.name).select2(options).on("select2:select", function() {
        vue.$emit(vue.event_name, $(this).val())
      });
    }

  }
</script>