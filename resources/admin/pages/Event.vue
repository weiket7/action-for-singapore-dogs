<template>
  <single-portlet title="Event">
    <form @submit.prevent="onSubmit()" class="m-form m-form--fit m-form--label-align-right" >
      <form-row>
        <label-component required>Name</label-component>
        <textbox-component name='name' v-model="event.name" :error="errors.get('name')"></textbox-component>

        <label-component>Adoption Drive</label-component>
        <radio-component name="adoption_drive" v-model="event.adoption_drive" :options="{ '1': 'Yes', '0': 'No' }" :error="errors.get('adoption_drive')"></radio-component>
      </form-row>

      <form-row>
        <label-component required>Location</label-component>
        <textbox-component name="location" v-model="event.location" :error="errors.get('location')"></textbox-component>

        <label-component required>Date</label-component>
        <datepicker-component name="date" v-model="event.date" v-if="loaded"></datepicker-component>
      </form-row>

      <form-row>
        <label-component required>Time</label-component>
        <textbox-component name='time' v-model="event.time" :error="errors.get('time')"></textbox-component>

        <label-component v-show="event.adoption_drive">Duration</label-component>
        <textbox-component name='duration' v-model="event.duration" :error="errors.get('duration')" v-show="event.adoption_drive"></textbox-component>
      </form-row>

      <form-row>
        <label-component v-show="event.adoption_drive">Cost</label-component>
        <textbox-component name="cost" v-model="event.cost" :error="errors.get('cost')" v-show="event.adoption_drive"></textbox-component>
      </form-row>

      <form-row>
        <label-component>Description</label-component>
        <textarea-component v-model="event.desc"></textarea-component>

        <label-component>Image</label-component>
        <image-component v-model="event.image" name="image"
                         v-on:update-image="updateImage" folder="events"
                         :src="event.image" :error="errors.get('image')"></image-component>
      </form-row>

      <hr>

      <form-row>
        <label-component>Search</label-component>
        <select2-component name='dog_name' url="api/adopt/search"
                           event_name="select-adopt"
                           v-on:select-adopt="selectAdopt"></select2-component>
      </form-row>

      <form-row>
        <label-component>Dogs</label-component>
        <static-text>
          <table class="table">
            <tr v-for="(adopt, index) in adopts">
              <td>{{ adopt.name }}</td>
              <td @click="removeAdopt(index)">X</td>
            </tr>
          </table>
        </static-text>
      </form-row>

      <form-footer>
        <button type="submit" class="btn btn-success">Save</button>
        <button type="button" class="btn btn-danger" data-toggle="confirmation">Delete</button>
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
        image_new: null,
        adopts: [],
      }
    },
    methods: {
      selectAdopt(adopt_id) {
        axios.get('api/adopt/get-single/'+adopt_id)
          .then(response => {
            this.adopts.push(response.data)
          });
      },
      removeAdopt(index) {
        this.adopts.splice(index, 1);
      },
      onSubmit() {
        let url = 'api/event/save';
        if (!this.is_create) {
          url += '/'+ this.$route.params.event_id
        }
        
        let form_data = this.event;
        form_data.adopt_ids = this.adopt_ids;

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
      },
      deleteEvent() {
        axios.post('api/event/delete/'+this.$route.params.event_id)
          .then(response => {
            toastr.success("Event deleted");
            this.$router.push('/event');
          })
          .catch(this.onError);
      }
    },
    computed: {
      is_create() {
        return this.$route.path == "/event/save";
      },
      adopt_ids() {
        let adopt_ids = [];
        for (let key in this.adopts) {
          if (this.adopts.hasOwnProperty(key)) {
            adopt_ids.push(this.adopts[key].adopt_id);
          }
        }
        return adopt_ids.join(",");
      }
    },
    created() {
      if (this.is_create) {
        this.loaded = true;
      } else {
        axios.get('api/event/get/' + this.$route.params.event_id)
          .then(response => {
            this.event = response.data.event;
            this.adopts = response.data.adopts;
            this.loaded = true;
          })
          .catch(error => {
            console.log(error);
          })
      }
    },
    mounted() {
      let vue = this
      $('[data-toggle=confirmation]').confirmation({
        rootSelector: '[data-toggle=confirmation]',
      }).on("confirmed.bs.confirmation", function() {
        vue.deleteEvent();
      });
    },
    components: {
      ImageComponent
    },
    mixins: [FormMixin]
  }
</script>

<style scoped>

</style>
