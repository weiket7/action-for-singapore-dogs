<template>
  <single-portlet :title="is_create ? 'Add Dog' : 'Update Dog'">
  <tabs :tabs="tabs">
    <tab :name="'General'" :active="true">
      <form @submit.prevent="onSubmit()" class="m-form m-form--fit m-form--label-align-right" >
        <form-row>
          <label-component required>Name</label-component>
          <textbox-component v-model="adopt.name" :error="errors.get('name')"></textbox-component>

          <label-component required>Status</label-component>
          <radio-component v-model="adopt.stat" :options="{ 'A': 'Available', 'D': 'Adopted' }" :error="errors.get('stat')"></radio-component>
        </form-row>

        <form-row>
          <label-component>Foster</label-component>
          <radio-component v-model="adopt.foster" :options="{ 'D': 'Don\'t Need', 'N': 'Need', 'F': 'Fostered' }" :error="errors.get('foster')"></radio-component>
  
          <label-component>Rescued On</label-component>
          <datepicker-component name="rescued_on" v-model="adopt.rescued_on" :error="errors.get('rescued_on')"></datepicker-component>
          </form-row>

        <form-row v-if="adopt.adopt_id">
          <label-component>Location</label-component>
          <select-component v-model="adopt.location" :options="location_options" :error="errors.get('location')"></select-component>
        </form-row>

        <form-row>
          <label-component required>Gender</label-component>
          <radio-component v-model="adopt.gender" :options="{ 'M': 'Male', 'F': 'Female' }" :error="errors.get('gender')"></radio-component>

          <label-component>Birthday</label-component>
          <datepicker-component name="birthday" :value="adopt.birthday | formatDate"
                                v-on:input = "adopt.birthday = $event"
                                :error="errors.get('birthday')"></datepicker-component>
        </form-row>

        <form-row>
          <label-component>Breed</label-component>
          <textbox-component v-model="adopt.breed" :error="errors.get('breed')"></textbox-component>

          <label-component>Colour</label-component>
          <textbox-component v-model="adopt.colour" :error="errors.get('colour')"></textbox-component>
        </form-row>

        <form-row>
          <label-component>Microchipped</label-component>
          <radio-component v-model="adopt.microchip" :options="{ 'Y': 'Yes', 'N': 'No' }" :error="errors.get('microchip')"></radio-component>

          <label-component v-show="adopt.microchip == 'Y'">Microchip Date</label-component>
          <datepicker-component name="microchip_date" v-model="adopt.microchip_date" :error="errors.get('microchip_date')" v-show="adopt.microchip == 'Y'"></datepicker-component>
        </form-row>

        <form-row>
          <label-component>Vaccinated</label-component>
          <radio-component v-model="adopt.vaccinate" :options="{ 'Y': 'Yes', 'N': 'No' }"></radio-component>

          <label-component v-show="adopt.vaccinate == 'Y'">Vaccinate Date</label-component>
          <datepicker-component name="vaccinate_date" v-model="adopt.vaccinate_date" :error="errors.get('vaccinate_date')" v-show="adopt.vaccinate == 'Y'"></datepicker-component>
        </form-row>

        <form-row>
          <label-component>HDB Approved</label-component>
          <radio-component v-model="adopt.hdb" :options="{ 'Y': 'Yes', 'N': 'No' }" :error="errors.get('hdb')"></radio-component>
        </form-row>

        <form-row>
          <label-component>Health</label-component>
          <textarea-component v-model="adopt.health" :error="errors.get('health')"></textarea-component>

          <label-component>Behaviour</label-component>
          <textarea-component v-model="adopt.behaviour" :error="errors.get('behaviour')"></textarea-component>
        </form-row>
  
        <form-footer></form-footer>
      </form>
    </tab>
    <tab :name="'Adopter'">
      <form @submit.prevent="onSubmit()" class="m-form m-form--fit m-form--label-align-right" >
        <adopter-component v-for="(adopter, index) in adopters"
                           v-on:update-adopter="updateAdopter"
                           v-on:remove-adopter="removeAdopter"
                           :adopter="adopter" :index="index" :key="adopter.person_id"></adopter-component>

        <form-row>
          <div class="col-lg-2"></div>
          <div class="col-lg-10">
            <button type="button" @click="addAdopterRow()" class="btn btn-metal">
              Add Row
            </button>
          </div>
        </form-row>
      </form>
    </tab>
    <tab :name="'Rescuer'">
      <form @submit.prevent="onSubmit()" class="m-form m-form--fit m-form--label-align-right" >
        <rescuer-component v-for="(rescuer, index) in rescuers"
                           v-on:update-rescuer="updateRescuer"
                           v-on:remove-rescuer="removeRescuer"
                           :rescuer="rescuer" :index="index" :key="rescuer.person_id"></rescuer-component>

        <form-row>
          <div class="col-lg-2"></div>
          <div class="col-lg-10">
            <button type="button" @click="addRescuerRow()" class="btn btn-metal">
              Add Row
            </button>
          </div>
        </form-row>
      </form>
    </tab>
    <tab :name="'Foster'">
      <form @submit.prevent="onSubmit()" class="m-form m-form--fit m-form--label-align-right" >
        <foster-component v-for="(foster, index) in fosters"
                          v-on:update-foster="updateFoster"
                          v-on:remove-foster="removeFoster"
                          :foster="foster" :index="index" :key="foster.person_id"></foster-component>

        <form-row>
          <div class="col-lg-2"></div>
          <div class="col-lg-10">
            <button type="button" @click="addFosterRow()" class="btn btn-metal">
              Add Row
            </button>
          </div>
        </form-row>
      </form>
    </tab>
    <tab :name="'Sponsor'">

    </tab>
  </tabs>
</single-portlet>
</template>

<script>
  import axios from 'axios'
  import Errors from '../../common/errors'
  import RescuerComponent from "../modules/RescuerComponent";
  import FosterComponent from "../modules/FosterComponent";
  import AdopterComponent from "../modules/AdopterComponent";
  
  export default {
    name: "adopt",
    data() {
      return {
        adopt: {},
        rescuers: [{}],
        fosters: [{}],
        adopters: [{}],
        errors: new Errors(),
      }
    },
    computed: {
      is_create() {
        return this.$route.path == "/adopt/save";
      },
      tabs() {
        let tabs = ['General'];
        if (! this.is_create) {
          tabs = ['General', 'Adopter', 'Rescuer', 'Foster', 'Sponsor'];
        }
        return tabs;
      },
      location_options() {
        let options = ['ARC'];
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
        var url = 'api/adopt/save';
        if (!this.is_create) {
          url += '/'+ this.$route.params.adopt_id
        }
        axios.post(url, this.adopt)
          .then(this.onSuccess)
          .catch(this.onError);
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
      addRescuerRow() {
        this.rescuers.push({});
      },
      updateRescuer(o) {
        this.$set(this.rescuers, o.index, o.person);
      },
      removeRescuer(index) {
        this.rescuers.splice(index, 1);
      },
      addFosterRow() {
        this.fosters.push({});
      },
      updateFoster(o) {
        this.$set(this.fosters, o.index, o.person);
      },
      removeFoster(index) {
        this.fosters.splice(index, 1);
      },
      addAdopterRow() {
        this.adopters.push({});
      },
      updateAdopter(o) {
        this.$set(this.adopters, o.index, o.person);
      },
      removeAdopter(index) {
        this.adopters.splice(index, 1);
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
          })
          .catch(error => { console.log(error); })
      }
    },
    components: {
      RescuerComponent,
      FosterComponent,
      AdopterComponent,
    },
  }
</script>

<style scoped>

</style>