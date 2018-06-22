<template>
  <single-portlet title="Banner">
    <form @submit.prevent="onSubmit()" class="m-form m-form--fit m-form--label-align-right" >
      <form-row>
        <label-component>Status</label-component>
        <radio-component name="stat" v-model="banner.stat" :options="{ 'A': 'Available', 'H': 'Hidden' }" :error="errors.get('stat')"></radio-component>

        <label-component>Name</label-component>
        <textbox-component v-model="banner.name" :error="errors.get('name')"></textbox-component>
      </form-row>

      <form-row>
        <label-component>Url</label-component>
        <textbox-component v-model="banner.url" :error="errors.get('url')"></textbox-component>

        <label-component>Image</label-component>
        <image-component v-model="banner.image" name="image"
                         v-on:update-image="updateImage" folder="banners"
                         :src="banner.image" :error="errors.get('image')"></image-component>
      </form-row>
  
      <form-footer>
        <button type="submit" class="btn btn-success">Save</button>
      </form-footer>
    </form>
  </single-portlet>
</template>

<script>
  import axios from 'axios';
  import Errors from '../../common/errors'
  import ImageComponent from "../components/ImageComponent";
  import FormMixin from '../form-mixin';

  export default {
    name: "banner",
    data() {
      return {
        banner: {},
        errors: new Errors(),
        image_new: null
      }
    },
    methods: {
      updateImage(file) {
        this.image_new = file;
      },
      onSubmit() {
        let url = 'api/banner/save';
        if (!this.is_create) {
          url += '/'+ this.$route.params.banner_id
        }

        let form_data = this.banner;
        let config = {};
        if (this.image_new) {
          form_data = new FormData();
          this.appendObjectToFormData(this.banner, form_data);
          form_data.append("image_new", this.image_new);

          config = {
            headers: {
              'content-type': 'multipart/form-data'
            }
          };
        }

        axios.post(url, form_data, config)
          .then(this.onSuccess)
          .catch(this.onError);
      },
      onSuccess(response) {
        if (this.is_create) {
          toastr.success("Banner added");
          return;
        }
        toastr.success("Banner updated");
        let banner_id = response.data;
        this.$router.push('/banner/save/'+banner_id);
      },
    },
    created() {
      if (! this.is_create) {
        axios.get('api/banner/get/' + this.$route.params.banner_id)
          .then(response => {
            this.banner = response.data.banner;
            this.banner_stats = response.data.banner_stats;
          }).catch(error => {
          console.log(error);
        })
      }
    },
    computed: {
      is_create() {
        return this.$route.path == "/banner/save";
      }
    },
    components: {
      ImageComponent
    },
    mixins: [FormMixin]
  }
</script>

<style scoped>

</style>