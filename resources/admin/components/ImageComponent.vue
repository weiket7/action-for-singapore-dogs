<template>
  <div class="col-lg-3">
    <input type="file" :name="name" @input="updateValue($event)" class="form-control">
    <span class="m-form__help m-form__error" v-if="error">
      {{ error }}
    </span>
    <br>
    <div :id="'image-' + name">
      <img :src="'assets/images/'+folder+'/'+src" v-if="src" style="max-height: 150px"/>
    </div>
    <button type="button" class="btn btn-secondary" @click="deleteImage" v-if="canDelete && value != null">Delete</button>
  </div>
</template>

<script>
  export default {
    name: "image-component",
    props: {
      name: { type: String, required: false },
      value: { required: false },
      error: { type: String, required: false },
      src: { required: false },
      folder: { required: false },
      canDelete: { type: Boolean, required: false, default: false },
    },
    methods: {
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

        this.$emit('update-image', file);
      },
      deleteImage() {
        this.$emit('update-image', null);
      }
    }
  }
</script>