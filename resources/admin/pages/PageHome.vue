<template>
  <single-portlet title="Page">
    <form @submit.prevent="onSubmit()" class="m-form m-form--fit m-form--label-align-right" >
      <form-row>
        <label-component>Show</label-component>
        <radio-component name="show" v-model="home.show" :options="{ 'E': 'Event', 'F': 'Free Text' }"></radio-component>
      </form-row>
  
      <form-row v-show="home.show == 'F'">
        <label-component>Title</label-component>
        <div class="col-lg-9">
          <input type="text" v-model="home.title" class="form-control">
        </div>
      </form-row>
  
      <form-row v-show="home.show == 'F'">
        <label-component>Meta Description</label-component>
        <div class="col-lg-9">
          <textarea v-model="home.meta_desc" class="form-control"></textarea>
        </div>
      </form-row>
  
      <form-row v-show="home.show == 'F'">
        <label-component>Content</label-component>
        <div class="col-lg-9">
          <textarea name="" id="editor">{{ home.content }}
          </textarea>
        </div>
      </form-row>
  
      <form-row v-show="home.show == 'E'">
        <label-component>Event</label-component>
        <select-component :options="events" v-model="home.event_id" has-empty="true"></select-component>
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
    name: "PageHome",
    data() {
      return {
        home: {},
        events: []
      }
    },
    methods: {
      onSubmit() {
        this.home.content = this.editor.getData();
        axios.post("api/home/save", this.home)
          .then(response => {
            toastr.success("Page updated");
          }).catch(this.onError);
      }
    },
    mounted() {
      axios.get("api/home/get")
        .then(response => {
          this.home = response.data.home;
          this.events = response.data.events;
          
          let vue = this
          ClassicEditor.create(document.querySelector('#editor'), {
            ckfinder: {
              uploadUrl: 'api/upload-image?folder=pages'
            }
          }).then(editor => {
            vue.editor = editor;
          }).catch(error => {
            console.log(error)
          });
        })
    },
    mixins: [FormMixin]
  }
</script>

<style scoped>

</style>