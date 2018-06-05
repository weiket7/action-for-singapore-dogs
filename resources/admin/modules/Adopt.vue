<template>
  <single-portlet title="Dogs">
    <form @submit.prevent="onSubmit()" class="m-form m-form--fit m-form--label-align-right" >
      <div class="form-group m-form__group row" :class="{ 'has-danger': errors.has('name') }">
        <label-component value="Name"></label-component>
        <textbox-component name='name' v-model="adopt.name" :error="errors.get('name')"></textbox-component>

        <label-component value="Status"></label-component>
        <select-component name="stat" v-model="adopt.stat" :options="{ 'A': 'Available', 'D': 'Adopted', 'C': 'Deceased'  }"></select-component>
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

        <label-component value="Microchip Date"></label-component>
        <datepicker-component name='microchip_date' v-model="adopt.microchip_date" :error="errors.get('microchip_date')"></datepicker-component>
      </div>

      <div class="form-group m-form__group row">
        <label-component value="Vaccinated"></label-component>
        <radio-component name="vaccinate" v-model="adopt.vaccinate" :options="{ 'Y': 'Yes', 'N': 'No' }"></radio-component>

        <label-component value="Vaccinate Date"></label-component>
        <datepicker-component name='vaccinate_date' v-model="adopt.vaccinate_date" :error="errors.get('vaccinate_date')"></datepicker-component>
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

      <hr>

      <div class="form-group m-form__group row">
        <label-component value="Have Rescue Info"></label-component>
        <radio-component name="have_rescue_info" v-model="adopt.have_rescue_info" :options="{ 'Y': 'Yes', 'N': 'N' }"></radio-component>

        <label-component v-show="adopt.have_rescue_info == 'Y'" value="Rescued On"></label-component>
        <textbox-component v-show="adopt.have_rescue_info == 'Y'" name='rescued_on' v-model="adopt.rescued_on" :error="errors.get('rescued_on')"></textbox-component>
      </div>

      <rescuer-component v-show="adopt.have_rescue_info == 'Y'" v-for="(rescuer, index) in rescuers"
                         v-on:update-rescuer="updateRescuer"
                         v-on:remove-rescuer="removeRescuer"
                         :index="index" :key="rescuer.rescuer_id"></rescuer-component>

      <hr>

      <div class="form-group m-form__group row">
        <label-component value="Under Foster"></label-component>
        <radio-component name="have_rescue_info" v-model="adopt.have_rescue_info" :options="{ 'Y': 'Yes', 'N': 'N' }"></radio-component>

        <label-component v-show="adopt.have_rescue_info == 'Y'" value="Rescued On"></label-component>
        <textbox-component v-show="adopt.have_rescue_info == 'Y'" name='rescued_on' v-model="adopt.rescued_on" :error="errors.get('rescued_on')"></textbox-component>
      </div>

      <rescuer-component v-show="adopt.have_rescue_info == 'Y'" v-for="(rescuer, index) in rescuers"
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

      <form-footer-component></form-footer-component>
    </form>
  </single-portlet>
</template>

<script>
  import axios from 'axios'
  import TextboxComponent from '../components/TextboxComponent'
  import TextareaComponent from '../components/TextareaComponent'
  import Select2Component from '../components/Select2Component'
  import SinglePortlet from '../components/SinglePortlet'
  import LabelComponent from '../components/LabelComponent'
  import TabsComponent from '../components/TabsComponent'
  import TabComponent from '../components/TabComponent'
  import FormFooterComponent from '../components/FormFooterComponent'
  import SelectComponent from '../components/SelectComponent'
  import RadioComponent from '../components/RadioComponent'
  import Errors from '../../common/errors'
  import RescuerComponent from "../components/RescuerComponent";
  import DatepickerComponent from "../components/DatepickerComponent";

  export default {
    name: "adopt",
    data() {
      return {
        adopt: {},
        rescuers: [{ type:"E", name:"", mobile:"", address:"" }],
        fosters: [{}],
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
      addFosterRow() {
        this.fosters.push({});
      },
      updateRescuer(o) {
        this.rescuers[o.index] = o.rescuer;
      },
      removeRescuer(index) {
        console.log("remove index = " + index);
        this.rescuers.splice(index, 1);
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
      DatepickerComponent,
      RescuerComponent,
      SinglePortlet,
      TextboxComponent,
      TextareaComponent,
      LabelComponent,
      FormFooterComponent,
      SelectComponent,
      RadioComponent,
      Select2Component,
      'tabs': TabsComponent,
      'tab': TabComponent,
    },
  }
</script>

<style scoped>

</style>