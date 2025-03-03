<template>
  <single-portlet title="Blog">
    <form @submit.prevent="onSubmit()" class="m-form m-form--fit m-form--label-align-right" >
      <form-row>
        <label-component>Title</label-component>
        <textbox-component v-model="blog.title" :error="errors.get('title')"></textbox-component>
        
        <label-component>Type</label-component>
        <select-component v-model="blog.type" :options="blog_types" has-empty="true" :error="errors.get('type')"></select-component>
      </form-row>
      
      <form-row>
        <label-component>Posted On</label-component>
        <datepicker-component name="posted_on" v-model="blog.posted_on" :error="errors.get('posted_on')" v-if="loaded"></datepicker-component>
        
        <label-component>Image</label-component>
        <image-component v-model="blog.image" name="image"
                         v-on:update-image="updateImage" :folder="folder"
                         :src="blog.image" :error="errors.get('image_new')"></image-component>
      </form-row>
      
      <form-row>
        <label-component>Content</label-component>
        <div class="col-lg-9">
          <textarea name="" id="editor">{{ blog.content }}
          </textarea>
        </div>
      </form-row>
      
      <form-footer>
        <button type="submit" class="btn btn-success">Save</button>
        <button type="button" class="btn btn-warning" @click="archiveBlog">{{ blog.archive ? 'Unarchive' : 'Archive' }}</button>
        <button type="button" id="btn-archive" class="btn btn-danger" data-toggle="confirmation">Delete</button>
      </form-footer>
    </form>
  </single-portlet>
</template>

<script>
  import axios from 'axios'
  import Errors from '../../common/errors'
  import FormMixin from '../form-mixin';
  import ClassicEditor from '@ckeditor/ckeditor5-build-classic'
  import ImageComponent from "../components/ImageComponent";
  
  export default {
    name: "blog",
    data() {
      return {
        blog: {},
        blog_types: {},
        editor: null,
        errors: new Errors(),
        image_new: null,
        loaded: false
    }
    },
    methods: {
      onSubmit() {
        this.blog.content = this.editor.getData();
        
        let form_data = this.blog;
        
        let config = {};
        if (this.image_new) {
          form_data = new FormData();
          this.appendObjectToFormData(this.blog, form_data);
          form_data.append("image_new", this.image_new);
          
          config = {
            headers: {
              'content-type': 'multipart/form-data'
            }
          };
        }
        
        let url = 'api/blog/save';
        if (!this.is_create) {
          url += '/'+ this.$route.params.blog_id
        }
        
        axios.post(url, form_data, config)
          .then(this.onSuccess)
          .catch(this.onError);
      },
      onSuccess(response) {
        this.errors.clear();
        if (this.is_create) {
          toastr.success("Blog added");
          this.blog.blog_id = response.data;
          this.$router.push('/blog/save/'+this.blog.blog_id);
          return;
        }
        toastr.success("Blog updated");
      },
      updateImage(file) {
        this.image_new = file;
      },
      deleteBlog() {
        axios.post('api/delete-record?table=blog&column=blog_id&id='+this.$route.params.blog_id)
          .then(response => {
            toastr.success("Blog deleted");
            this.$router.push('/blog');
          })
          .catch(this.onError);
      },
      archiveBlog() {
        axios.post('api/blog/archive/'+this.$route.params.blog_id)
          .then(response => {
            toastr.success("Blog archived");
            this.$router.push('/blog');
          })
          .catch(this.onError);
      }
    },
    mounted() {
      axios.get("api/blog/get/" + this.$route.params.blog_id)
        .then(response => {
          this.blog = this.is_create ? {} : response.data.blog;
          this.blog_types = response.data.blog_types;
  
          let vue = this
          ClassicEditor.create(document.querySelector('#editor'), {
            ckfinder: {
              uploadUrl: 'api/upload-image?folder=blog'
            }
          }).then(editor => {
            vue.editor = editor;
          }).catch(error => {
            console.log(error)
          });
  
          this.loaded = true;
        });
  
      let vue = this
      $('[data-toggle=confirmation]').confirmation({
        rootSelector: '[data-toggle=confirmation]',
      }).on("confirmed.bs.confirmation", function() {
        vue.deleteBlog();
      });
    },
    computed: {
      is_create() {
        return this.$route.path == "/blog/save";
      },
      folder() {
        if (this.blog.type == 'G') {
          return 'blog/gone-to-good-homes';
        }
        if (this.blog.type == 'I') {
          return 'blog/dogs-in-need';
        }
        if (this.blog.type == 'N') {
          return 'blog/news-flash';
        }
        return "";
      }
    },
    components: {
      ImageComponent
    },
    mixins: [FormMixin],
  }

</script>

<style scoped>
  .pre {
    white-space:pre;
  }
</style>