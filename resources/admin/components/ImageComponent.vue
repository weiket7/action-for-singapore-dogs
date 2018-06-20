<template>
  <div class="col-lg-3">
    <input type="file" :name="name" @input="updateValue($event)" class="form-control">
    <span class="m-form__help m-form__error" v-if="error">
      {{ error }}
    </span>
    <br>
    <div :id="'image-' + name">
      <img :src="'assets/images/'+src" v-if="src" style="max-height: 150px"/>
    </div>

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
      previewImage: function(e) {

      },
      updateValue: function (e) {
        var reader = new FileReader();
        var vue = this
        reader.onload = function (e) {
          var img = $('<img/>', {
            style: 'max-height: 150px;',
            src: e.target.result
          });
          $('#image-'+vue.name).html(img);
        };
        var file = e.target.files[0];
        reader.readAsDataURL(file);

        this.$emit('update-image1', file);
      }
    }
  }
</script>