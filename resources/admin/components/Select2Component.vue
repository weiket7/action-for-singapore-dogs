<template>
  <div class="col-lg-3">
    <select :id="name" :name="name" class="form-control m-input" @change="updateValue($event.target.value)">

    </select>
    <span class="m-form__help" v-if="error">
      {{ error }}
    </span>
  </div>
</template>

<script>
  export default {
    name: "select2-component",
    props: {
      name: {type: String, required: true },
      url: { type: String, required: true },
      error: { type: String, required: false },
      event_name: { type: String, required: false }
    },
    mounted() {
      var vue = this
      $("#"+this.name).select2({
        width: '100%',
        //minimumInputLength: 2,
        placeholder: "Search",
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
      }).on("select2:select", function() {
        vue.$emit(vue.event_name, $(this).val())
      });
    }

  }
</script>