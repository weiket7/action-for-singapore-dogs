<template>
  <single-portlet title="Testimonial">
    <form @submit.prevent="onSubmit()" class="m-form m-form--fit m-form--label-align-right" >
      <form-row>
        <label-component required>Dog Name</label-component>
        <textbox-component v-model="testimonial.dog_name" :error="errors.get('dog_name')"></textbox-component>

        <label-component required>Quote</label-component>
        <textarea-component v-model="testimonial.quote" :rows="8" :error="errors.get('quote')"></textarea-component>
      </form-row>

      <form-row>
        <label-component required>Content</label-component>
        <textarea-component v-model="testimonial.content" :rows="8" :error="errors.get('content')"></textarea-component>

        <label-component required>Image<br>(820 x 340 px)</label-component>
        <image-component v-model="testimonial.image" name="image"
                         v-on:update-image="updateImage" folder="boarding"
                         :src="testimonial.image" :error="errors.get('image_new')"></image-component>
      </form-row>

      <form-footer>
        <button type="submit" class="btn btn-success">Save</button>
        <button type="button" class="btn btn-danger" data-toggle="confirmation" v-if="testimonial.testimonial_id != 1">Delete</button>
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
    name: "testimonial",
    data() {
      return {
        testimonial: {},
        errors: new Errors(),
        image_new: null,
      }
    },
    methods: {
      updateImage(file) {
        this.image_new = file;
      },
      onSubmit() {
        let url = 'api/testimonial/save';
        if (!this.is_create) {
          url += '/'+ this.$route.params.testimonial_id
        }

        let form_data = this.testimonial;
        let config = {};
        if (this.image_new) {
          form_data = new FormData();
          this.appendObjectToFormData(this.testimonial, form_data);
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
          toastr.success("Testimonial added");
          return;
        }
        toastr.success("Testimonial updated");
        let testimonial_id = response.data;
        this.$router.push('/testimonial/save/'+testimonial_id);
      },
      deleteTestimonial() {
        axios.post('api/delete-record?table=testimonial&column=testimonial_id&id='+this.$route.params.testimonial_id)
          .then(response => {
            toastr.success("Testimonial deleted");
            this.$router.push('/testimonial');
          })
          .catch(this.onError);
      }
    },
    created() {
      let url = 'api/testimonial/get';
      if (!this.is_create) {
        url += '/'+ this.$route.params.testimonial_id
      }
      axios.get(url)
        .then(response => {
          this.testimonial = response.data.testimonial;
        }).catch(error => {
        console.log(error);
      })
    },
    mounted() {
      let vue = this
      $('[data-toggle=confirmation]').confirmation({
        rootSelector: '[data-toggle=confirmation]',
      }).on("confirmed.bs.confirmation", function() {
        vue.deleteTestimonial();
      });
    },
    computed: {
      is_create() {
        return this.$route.path == "/testimonial/save";
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