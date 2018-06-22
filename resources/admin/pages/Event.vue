<template>
  <single-portlet title="Events">
    <form @submit.prevent="onSubmit()" class="m-form m-form--fit m-form--label-align-right" >
      <div class="form-group m-form__group row" :class="{ 'has-danger': errors.has('name') }">
        <label-component required>Status</label-component>
        <radio-component name="stat" v-model="event.stat" :options="{ 'A': 'Available', 'H': 'Hidden' }" :error="errors.get('stat')"></radio-component>

        <label-component required>Name</label-component>
        <textbox-component name='name' v-model="event.name" :error="errors.get('name')"></textbox-component>
      </div>

      <div class="form-group m-form__group row">
        <label-component required>Location</label-component>
        <textbox-component name="location" v-model="event.location" :error="errors.get('location')"></textbox-component>

        <label-component required>Date</label-component>
        <datepicker-component name="date" v-model="event.date" v-if="loaded"></datepicker-component>
      </div>

      <div class="form-group m-form__group row">
        <label-component required>Time</label-component>
        <textbox-component name='time' v-model="event.time" :error="errors.get('time')"></textbox-component>

        <label-component>Duration</label-component>
        <textbox-component name='duration' v-model="event.duration" :error="errors.get('duration')"></textbox-component>
      </div>

      <div class="form-group m-form__group row">
        <label-component>Cost</label-component>
        <textbox-component name="cost" v-model="event.cost" :error="errors.get('cost')"></textbox-component>
  
        <label-component>Image</label-component>
        <image-component v-model="event.image" name="image"
                         v-on:update-image="updateImage" folder="events"
                         :src="event.image" :error="errors.get('image')"></image-component>
      </div>
  
      <form-footer>
        <button type="submit" class="btn btn-success">Save</button>
      </form-footer>
    </form>
  </single-portlet>
</template>

<script>
  import axios from 'axios'
  import Errors from '../../common/errors'
  import ImageComponent from "../components/ImageComponent";
  import FormMixin from '../form-mixin';

  export default {
    name: "event",
    data() {
      return {
        event: {},
        errors: new Errors(),
        image_new: null
      }
    },
    methods: {
      onSubmit() {
        let url = 'api/event/save';
        if (!this.is_create) {
          url += '/'+ this.$route.params.event_id
        }
  
        let form_data = this.event;
        let config = {};
        if (this.image_new) {
          form_data = new FormData();
          this.appendObjectToFormData(this.event, form_data);
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
          toastr.success("Event added");
          return;
        }
        toastr.success("Event updated");
        let event_id = response.data;
        this.$router.push('/event/save/'+event_id);
      },
      updateImage(file) {
        this.image_new = file;
      }
    },
    computed: {
      is_create() {
        return this.$route.path == "/event/save";
      }
    },
    created() {
      if (this.is_create) {
        this.loaded = true;
      } else {
        axios.get('api/event/get/' + this.$route.params.event_id)
          .then(response => {
            this.event = response.data;
            this.loaded = true;
          })
          .catch(error => {
            console.log(error);
          })
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