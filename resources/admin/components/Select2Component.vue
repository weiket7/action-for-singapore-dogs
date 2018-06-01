<template>
  <div class="col-lg-3">
    <select id="abc" :name="name" class="form-control m-input" @change="updateValue($event.target.value)">

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
      name: {type: String, required: true},
      options: {required: true},
      error: { type: String, required: false}
    },
    mounted() {
      $('#abc').select2({
        placeholder: "Search",
        ajax: {
          url: 'admin/rescuer/search',
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
        alert();
      });
    }

  }
</script>