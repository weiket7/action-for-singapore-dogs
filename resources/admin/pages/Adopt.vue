<template>
  <single-portlet :title="is_create ? 'Add Dog' : 'Update Dog'">
    <tabs :tabs="tabs">
      <tab :name="'General'" :active="true">
        <form @submit.prevent="onSubmit()" class="m-form m-form--fit m-form--label-align-right" >
          <form-row>
            <label-component required>Name</label-component>
            <textbox-component v-model="adopt.name" :error="errors.get('name')"></textbox-component>

            <label-component required>Status</label-component>
            <radio-component v-model="adopt.stat" :options="{ 'A': 'Available', 'D': 'Adopted' }" :error="errors.get('stat')" v-if="!is_create"></radio-component>
            <static-text v-else>Active</static-text>
          </form-row>

          <form-row v-if="adopt.adopt_id">
            <label-component>Location</label-component>
            <select-component v-model="adopt.location" :options="location_options" :error="errors.get('location')"></select-component>
            
            <label-component>Rescued On</label-component>
            <datepicker-component name="rescued_on" v-model="adopt.rescued_on" :error="errors.get('rescued_on')"></datepicker-component>
          </form-row>
          
          <form-row v-if="adopt.location == 'Others'">
            <label-component>Other Location</label-component>
            <textbox-component v-model="adopt.location_other" :error="errors.get('location_other')"></textbox-component>
          </form-row>

          <form-row>
            <label-component required>Gender</label-component>
            <radio-component v-model="adopt.gender" :options="{ 'M': 'Male', 'F': 'Female' }" :error="errors.get('gender')"></radio-component>

            <label-component required>Birthday</label-component>
            <datepicker-component name="birthday" v-model="adopt.birthday" :error="errors.get('birthday')" :months="true" v-if="loaded"></datepicker-component>
          </form-row>

          <form-row>
            <label-component required>Breed</label-component>
            <textbox-component v-model="adopt.breed" :error="errors.get('breed')"></textbox-component>

            <label-component>Colour</label-component>
            <textbox-component v-model="adopt.colour" :error="errors.get('colour')"></textbox-component>
          </form-row>

          <form-row>
            <label-component>Microchipped</label-component>
            <radio-component v-model="adopt.microchip" :options="{ 1: 'Yes', 0: 'No' }" :error="errors.get('microchip')"></radio-component>

            <label-component v-show="adopt.microchip">Microchip Date</label-component>
            <datepicker-component name="microchip_date" v-model="adopt.microchip_date" :error="errors.get('microchip_date')" v-show="adopt.microchip"></datepicker-component>
          </form-row>

          <form-row v-show="adopt.microchip">
            <label-component>Microchip No</label-component>
            <textbox-component v-model="adopt.microchip_no" :error="errors.get('microchip_no')"></textbox-component>
          </form-row>

          <form-row>
            <label-component>Vaccinated</label-component>
            <radio-component v-model="adopt.vaccinate" :options="{ 1: 'Yes', 0: 'No' }"></radio-component>

            <label-component v-show="adopt.vaccinate">Vaccinate Date 1</label-component>
            <datepicker-component name="vaccinate_date1" v-model="adopt.vaccinate_date" :error="errors.get('vaccinate_date')" v-show="adopt.vaccinate"></datepicker-component>
          </form-row>
          
          <form-row v-show="adopt.vaccinate">
            <label-component>Vaccinate Date 2</label-component>
            <datepicker-component name="vaccinate_date2" v-model="adopt.vaccinate_date" :error="errors.get('vaccinate_date')" v-show="adopt.vaccinate"></datepicker-component>
  
            <label-component>Vaccinate Date 3</label-component>
            <datepicker-component name="vaccinate_date3" v-model="adopt.vaccinate_date" :error="errors.get('vaccinate_date')" v-show="adopt.vaccinate"></datepicker-component>
          </form-row>

          <form-row>
            <label-component>HDB Approved</label-component>
            <radio-component v-model="adopt.hdb" :options="{ 1: 'Yes', 0: 'No' }" :error="errors.get('hdb')"></radio-component>
          </form-row>

          <form-row>
            <label-component>Health</label-component>
            <textarea-component v-model="adopt.health" :error="errors.get('health')"></textarea-component>

            <label-component>Behaviour</label-component>
            <textarea-component v-model="adopt.behaviour" :error="errors.get('behaviour')"></textarea-component>
          </form-row>
  
          <form-row>
            <label-component>Image 1</label-component>
            <image-component v-model="adopt.image" name="image"
                             v-on:update-image="updateImage" folder="adopts"
                             :src="adopt.image" :error="errors.get('image_new')"></image-component>
          </form-row>
  
          <form-footer>
            <button type="submit" class="btn btn-success">Save</button>
          </form-footer>
        </form>
      </tab>
      <tab :name="'Adopter'">
        <form @submit.prevent="onSubmit()" class="m-form m-form--fit m-form--label-align-right" >
          <adopt-adopter v-for="(adopter, index) in adopters" v-if="adopter"
                         v-on:update-person="updateAdopter"
                         v-on:remove-person="removeAdopter"
                         :adopter="adopter" :index="index" :key="adopter.person_id"></adopt-adopter>

          <form-row>
            <div class="col-lg-2"></div>
            <div class="col-lg-10">
              <router-link :to="'/adopter/save?adopt_id='+adopt.adopt_id">
                <button type="button" class="btn btn-primary">
                  Add Adopter
                </button>
              </router-link>
            </div>
          </form-row>

        </form>
      </tab>
      <tab :name="'Rescuer'">
        <form @submit.prevent="onSubmit()" class="m-form m-form--fit m-form--label-align-right" >
          <adopt-rescuer v-for="(rescuer, index) in rescuers"
                         v-on:update-person="updateRescuer"
                         v-on:remove-person="removeRescuer"
                         :rescuer="rescuer" :index="index" :key="rescuer.person_id"></adopt-rescuer>

          <form-row>
            <div class="col-lg-2"></div>
            <div class="col-lg-10">
              <router-link :to="'/rescuer/save?adopt_id='+adopt.adopt_id">
                <button type="button" class="btn btn-primary">
                  Add Rescuer
                </button>
              </router-link>
            </div>
          </form-row>
        </form>
      </tab>
      <tab :name="'Foster'">
        <form @submit.prevent="onSubmit()" class="m-form m-form--fit m-form--label-align-right" >
          <foster-component v-for="(foster, index) in fosters"
                            v-on:update-person="updateFoster"
                            v-on:remove-person="removeFoster"
                            :foster="foster" :index="index" :key="foster.person_id"></foster-component>
          <form-row>
            <div class="col-lg-2"></div>
            <div class="col-lg-10">
              <router-link :to="'/foster/save?adopt_id='+adopt.adopt_id">
                <button type="button" class="btn btn-primary">
                  Add Foster
                </button>
              </router-link>
            </div>
          </form-row>
        </form>
      </tab>
    </tabs>
  </single-portlet>
</template>

<script>
  import axios from 'axios'
  import Errors from '../../common/errors'
  import AdoptRescuer from "../modules/AdoptRescuer";
  import FosterComponent from "../modules/AdoptFoster";
  import AdoptAdopter from "../modules/AdoptAdopter";
  import ImageComponent from "../components/ImageComponent";
  import FormMixin from "../form-mixin";
  
  export default {
    name: "adopt",
    data() {
      return {
        adopt: {},
        rescuers: [{}],
        fosters: [{}],
        adopters: [{}],
        errors: new Errors(),
        image_new: null,
      }
    },
    computed: {
      is_create() {
        return this.$route.path == "/adopt/save";
      },
      tabs() {
        let tabs = ['General'];
        if (! this.is_create) {
          tabs = ['General', 'Adopter', 'Rescuer', 'Foster'];
        }
        return tabs;
      },
      location_options() {
        let options = ['ARC', "The Animal Lodge", "Others"];
        for (let i=0; i<this.adopters.length; i++) {
          options.push("Adopter " + this.adopters[i].name);
        }
        for (let i=0; i<this.rescuers.length; i++) {
          options.push("Rescuer " + this.rescuers[i].name);
        }
        for (let i=0; i<this.fosters.length; i++) {
          options.push("Foster " + this.fosters[i].name);
        }
        return options;
      }
    },
    methods: {
      onSubmit() {
        let url = 'api/adopt/save';
        if (!this.is_create) {
          url += '/'+ this.$route.params.adopt_id
        }
  
        let form_data = this.adopt;
        let config = {};
        if (this.image_new) {
          form_data = new FormData();
          this.appendObjectToFormData(this.adopt, form_data);
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
      appendObjectToFormData(obj, form_data) {
        for (let key in obj) {
          if (obj.hasOwnProperty(key)) {
            form_data.append(key, obj[key]);
          }
        }
      },
      onError(error) {
        if (error.response.status == 500) {
          toastr.error("A system error occurred");
          return;
        }
        toastr.error("There were some errors, please check the form");
        this.errors.record(error.response.data.errors);
      },
      onSuccess(response) {
        if (this.is_create) {
          toastr.success("Dog added");
          return;
        }
        toastr.success("Dog updated");
        let adopt_id = response.data;
        this.$router.push('/adopt/save/'+adopt_id);
      },
      updateRescuer(o) {
        this.$set(this.rescuers, o.index, o.person);
      },
      removeRescuer(index) {
        this.rescuers.splice(index, 1);
      },
      updateFoster(o) {
        this.$set(this.fosters, o.index, o.person);
      },
      removeFoster(index) {
        this.fosters.splice(index, 1);
      },
      updateAdopter(o) {
        this.$set(this.adopters, o.index, o.person);
      },
      removeAdopter(index) {
        this.adopters.splice(index, 1);
      },
      updateImage(file) {
        this.image_new = file;
      }
    },
    created() {
      if (! this.is_create) {
        axios.get('api/adopt/get/' + this.$route.params.adopt_id)
          .then(response => {
            this.adopt = response.data.adopt;
            this.fosters = response.data.fosters;
            this.adopters = response.data.adopters;
            this.rescuers = response.data.rescuers;
            this.loaded = true;
          })
          .catch(error => { console.log(error); })
      } else {
        this.adopt.stat = 'A';
        this.loaded = true;
      }
    },
    components: {
      AdoptRescuer,
      FosterComponent,
      AdoptAdopter,
      ImageComponent
    },
    mixins: [FormMixin]
  }
</script>

<style scoped>

</style>