<template>
  <single-portlet title="Dogs">
    <tabs :tabs="['General', 'Adopter', 'Rescuer', 'Foster', 'Sponsor']">
      <tab :name="'General'" :active="true">
        <form @submit.prevent="onSubmit()" class="m-form m-form--fit m-form--label-align-right" >
          <div class="form-group m-form__group row" :class="{ 'has-danger': errors.has('name') }">
            <label-component value="Name"></label-component>
            <textbox-component name='name' v-model="adopt.name" :error="errors.get('name')"></textbox-component>
            
            <label-component value="Status"></label-component>
            <radio-component name="stat" v-model="adopt.stat" :options="{ 'A': 'Available', 'D': 'Adopted' }"></radio-component>
          </div>
          
          <div class="form-group m-form__group row">
            <label-component value="Foster"></label-component>
            <radio-component name="foster" v-model="adopt.stat" :options="{ 'D': 'Don\'t Need', 'N': 'Need', 'F': 'Fostered' }"></radio-component>
            
            <label-component value="Location"></label-component>
            <select-component name='location' v-model="adopt.location" :options="{ 'C': 'ARC', 'R': 'Rescuer', 'F':'Foster', 'A': 'Adopter' }" :error="errors.get('location')"></select-component>
          </div>
          
          <div class="form-group m-form__group row">
            <label-component value="Rescued On"></label-component>
            <datepicker-component name='rescued_on' v-model="adopt.rescued_on" :error="errors.get('rescued_on')"></datepicker-component>
            
            <label-component value="Adopted On"></label-component>
            <datepicker-component name='adopted_on' v-model="adopt.adopted_on" :error="errors.get('adopted_on')"></datepicker-component>
          </div>
          
          <div class="form-group m-form__group row">
            <label-component value="Gender"></label-component>
            <radio-component name="gender" v-model="adopt.gender" :options="{ 'M': 'Male', 'F': 'Female' }"></radio-component>
            
            <label-component value="Birthday"></label-component>
            <datepicker-component name='birthday' v-model="adopt.birthday" :error="errors.get('birthday')"></datepicker-component>
          </div>
          
          <div class="form-group m-form__group row">
            <label-component value="Breed"></label-component>
            <textbox-component name='breed' v-model="adopt.breed" :error="errors.get('breed')"></textbox-component>
            
            <label-component value="Colour"></label-component>
            <textbox-component name='colour' v-model="adopt.colour" :error="errors.get('colour')"></textbox-component>
          </div>
          
          <div class="form-group m-form__group row">
            <label-component value="Microchipped"></label-component>
            <radio-component name="microchip" v-model="adopt.microchip" :options="{ 'Y': 'Yes', 'N': 'No' }"></radio-component>
            
            <label-component value="Microchip Date" v-show="adopt.microchip == 'Y'"></label-component>
            <datepicker-component name='microchip_date' v-model="adopt.microchip_date" :error="errors.get('microchip_date')" v-show="adopt.microchip == 'Y'"></datepicker-component>
          </div>
          
          <div class="form-group m-form__group row">
            <label-component value="Vaccinated"></label-component>
            <radio-component name="vaccinate" v-model="adopt.vaccinate" :options="{ 'Y': 'Yes', 'N': 'No' }"></radio-component>
            
            <label-component value="Vaccinate Date" v-show="adopt.vaccinate == 'Y'"></label-component>
            <datepicker-component name='vaccinate_date' v-model="adopt.vaccinate_date" :error="errors.get('vaccinate_date')" v-show="adopt.vaccinate == 'Y'"></datepicker-component>
          </div>
          
          <div class="form-group m-form__group row">
            <label-component value="HDB Approved"></label-component>
            <radio-component name="hdb" v-model="adopt.hdb" :options="{ 'Y': 'Yes', 'N': 'No' }"></radio-component>
          </div>
          
          <div class="form-group m-form__group row">
            <label-component value="Health"></label-component>
            <textarea-component name='health' v-model="adopt.health" :error="errors.get('health')"></textarea-component>
            
            <label-component value="Behaviour"></label-component>
            <textarea-component name='behaviour' v-model="adopt.behaviour" :error="errors.get('behaviour')"></textarea-component>
          </div>
          
          <form-footer></form-footer>
        </form>
      </tab>
      <tab :name="'Adopter'">
        <form @submit.prevent="onSubmit()" class="m-form m-form--fit m-form--label-align-right" >
          <adopter-component v-for="(adopter, index) in adopters"
                             v-on:update-adopter="updateFoster"
                             v-on:remove-adopter="removeFoster"
                             :index="index" :key="adopter.adopter_id"></adopter-component>
          
          <div class="form-group m-form__group row">
            <div class="col-lg-2"></div>
            <div class="col-lg-10">
              <button type="button" @click="addAdopterRow()" class="btn btn-metal btn-sm">
                Add Row
              </button>
            </div>
          </div>
          
          <form-footer></form-footer>
        </form>
      </tab>
      <tab :name="'Rescuer'">
        <form @submit.prevent="onSubmit()" class="m-form m-form--fit m-form--label-align-right" >
          <rescuer-component v-for="(rescuer, index) in rescuers"
                             v-on:update-rescuer="updateRescuer"
                             v-on:remove-rescuer="removeRescuer"
                             :index="index" :key="rescuer.rescuer_id"></rescuer-component>
          
          <div class="form-group m-form__group row">
            <div class="col-lg-2"></div>
            <div class="col-lg-10">
              <button type="button" @click="addRescuerRow()" class="btn btn-metal btn-sm">
                Add Row
              </button>
            </div>
          </div>
          
          <form-footer></form-footer>
        </form>
      </tab>
      <tab :name="'Foster'">
        <form @submit.prevent="onSubmit()" class="m-form m-form--fit m-form--label-align-right" >
          <foster-component v-for="(foster, index) in fosters"
                            v-on:update-foster="updateFoster"
                            v-on:remove-foster="removeFoster"
                            :index="index" :key="foster.foster_id"></foster-component>
          
          <div class="form-group m-form__group row">
            <div class="col-lg-2"></div>
            <div class="col-lg-10">
              <button type="button" @click="addFosterRow()" class="btn btn-metal btn-sm">
                Add Row
              </button>
            </div>
          </div>
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
        rescuers: [{ type:"E", name:"", mobile:"", address:"" }],
        fosters: [{}],
        adopters: [{}],
        errors: new Errors()
      }
    },
    methods: {
      onSubmit() {
        //alert('hey');
        axios.post('admin/adopt/save/' + this.$route.params.adopt_id, this.adopt)
          .then(this.onSuccess)
          .catch(error=>{
            this.errors.record(error.response.data.errors);
          });
      },
      onSuccess(response) {
        toastr.success("Hello world!");
      },
      addRescuerRow() {
        this.rescuers.push({});
      },
      updateRescuer(o) {
        this.rescuers[o.index] = o.rescuer;
      },
      removeRescuer(index) {
        this.rescuers.splice(index, 1);
      },
      addFosterRow() {
        this.fosters.push({});
      },
      updateFoster(o) {
        this.fosters[o.index] = o.rescuer;
      },
      removeFoster(index) {
        this.fosters.splice(index, 1);
      },
      addAdopterRow() {
        this.adopters.push({});
      },
      updateAdopter(o) {
        this.adopters[o.index] = o.rescuer;
      },
      removeAdopter(index) {
        this.adopters.splice(index, 1);
      }
    },
    created() {
      axios.get('api/adopt/get/' + this.$route.params.adopt_id)
        .then(response => {
          this.adopt = response.data
        })
        .catch(error => { console.log(error); })
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