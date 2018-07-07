<template>
  <single-portlet title="Page">
    <form @submit.prevent="onSubmit()" class="m-form m-form--fit m-form--label-align-right" >
      <form-row>
        <label-component>Name</label-component>
        <textbox-component v-model="page.name"></textbox-component>
      </form-row>
      
      <form-row>
        <label-component>Content</label-component>
        <div class="col-lg-9">
          <textarea name="" id="editor" v-html="page.content" class="pre">
          </textarea>
          <span v-html="page.content" class="pre"></span>
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
  import axios from 'axios'
  import FormMixin from '../form-mixin';

  export default {
    name: "page",
    data() {
      return {
        page: {}
      }
    },
    methods: {
      onSubmit() {
        var t = document.getElementById('editor').innerHTML;
        console.log(t);
        this.page.content = t;
        axios.post("api/page/save/"+this.$route.params.page_id, this.page)
          .then(response => {
            toastr.success("Page updated");
          }).catch(this.onError);
      }
    },
    created() {
    
    },
    mounted() {
      axios.get("api/page/get/"+this.$route.params.page_id)
        .then(response => {
          this.page = response.data;
  
          ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .then( editor => {
              //console.log( editor );
            } )
            .catch( error => {
              //console.error( error );
            } );
        });
      
    },
    mixins: [FormMixin]
  }
  
</script>

<style scoped>
  .pre {
    white-space:pre;
  }
</style>