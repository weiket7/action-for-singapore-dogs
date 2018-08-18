<template>
  <single-portlet title="Page">
    <form @submit.prevent="onSubmit()" class="m-form m-form--fit m-form--label-align-right" >
      <form-row>
        <label-component>Title</label-component>
        <div class="col-lg-9">
          <input type="text" v-model="page.title" class="form-control">
        </div>
      </form-row>

      <form-row>
        <label-component>Meta Description</label-component>
        <div class="col-lg-9">
          <textarea v-model="page.meta_desc" class="form-control"></textarea>
        </div>
      </form-row>

      <form-row>
        <label-component>Content</label-component>
        <div class="col-lg-9">
          <textarea name="" id="editor">@{{ page.content }}
          </textarea>
        </div>
      </form-row>

      <form-row>
        <label-component>Show</label-component>
        <radio-component name="show" v-model="show" :options="{ 'A': 'Adoption Drive', 'F': 'Free Text' }"></radio-component>
      </form-row>

      <form-row v-show="show == 'F'">
        <label-component>Free Text</label-component>
        <div class="col-lg-9">
          <textarea id="editor" class="form-control" rows="5">

          </textarea>
        </div>
      </form-row>

      <form-footer>
        <button type="submit" class="btn btn-success">Save</button>
      </form-footer>
    </form>
  </single-portlet>
</template>

<script>
  import ClassicEditor from '@ckeditor/ckeditor5-build-classic'

  export default {
    name: "PageHome",
    data() {
      return {
        show: null
      }
    },
    mounted() {
      axios.get("api/page/get/home")
        .then(response => {
          this.page = response.data;

          let vue = this
          ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
              vue.editor = editor;
            }).catch(error => { console.log(error) })
        });
    }
  }
</script>

<style scoped>

</style>