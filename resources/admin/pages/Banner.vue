<template>
  <single-portlet title="Banner">
    <form @submit.prevent="onSubmit()" class="m-form m-form--fit m-form--label-align-right" >
      <form-row>
        <label-component required>Name</label-component>
        <textbox-component v-model="banner.name" :error="errors.get('name')"></textbox-component>

        <label-component required>Status</label-component>
        <radio-component v-model="banner.stat" :options="banner_stats" :inline="true"></radio-component>
      </form-row>

      <form-row>
        <label-component required>Link</label-component>
        <radio-component name="link_to" :options="['None', 'Event', 'Blog']" v-model="banner.link_to" :inline="true"></radio-component>

        <template v-if="banner.link_to == 'Blog'">
          <label-component>Blog</label-component>
          <select-component :options="blogs" v-model="banner.blog_id" has-empty="true"></select-component>
        </template>

        <template v-if="banner.link_to == 'Event'">
          <label-component>Event</label-component>
          <select-component :options="events" v-model="banner.event_id" has-empty="true" :error="errors.get('event_id')"></select-component>
        </template>
      </form-row>

      <form-row>
        <label-component required>Image<br>(820 x 340 px)</label-component>
        <image-component v-model="banner.image" name="image"
                         v-on:update-image="updateImage" folder="banners"
                         :src="banner.image" :error="errors.get('image_new')"></image-component>
      </form-row>

      <form-footer>
        <button type="submit" class="btn btn-success">Save</button>
        <button type="button" class="btn btn-danger" data-toggle="confirmation" v-if="banner.banner_id != 1">Delete</button>
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
        image_new: null,
        events: {},
        blogs: {},
        banner_stats: {}
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
        this.errors.clear();
        if (this.is_create) {
          toastr.success("Banner added");
          return;
        }
        toastr.success("Banner updated");
        let banner_id = response.data;
        this.$router.push('/banner/save/'+banner_id);
      },
      deleteBanner() {
        axios.post('api/delete-record?table=banner&column=banner_id&id='+this.$route.params.banner_id)
          .then(response => {
            toastr.success("Banner deleted");
            this.$router.push('/banner');
          })
          .catch(this.onError);
      }
    },
    created() {
      let url = 'api/banner/get';
      if (!this.is_create) {
        url += '/'+ this.$route.params.banner_id
      }
      axios.get(url)
        .then(response => {
          this.banner = response.data.banner;
          this.banner_stats = response.data.banner_stats;
          this.events = response.data.events;
          this.blogs = response.data.blogs;
        }).catch(error => {
        console.log(error);
      })
    },
    mounted() {
      let vue = this
      $('[data-toggle=confirmation]').confirmation({
        rootSelector: '[data-toggle=confirmation]',
      }).on("confirmed.bs.confirmation", function() {
        vue.deleteBanner();
      });
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