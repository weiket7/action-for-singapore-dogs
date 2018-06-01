<template>
  <single-portlet title="Dogs">
    <tabs :tabs="['General', 'Rescuer', 'Foster']">
      <tab :name="'General'" :active="true">
        <form @submit.prevent="onSubmit()" class="m-form m-form--fit m-form--label-align-right" >
          <div class="form-group m-form__group row" :class="{ 'has-danger': errors.has('name') }">
            <label-component value="Name"></label-component>
            <textbox-component name='name' v-model="dog.name" :error="errors.get('name')"></textbox-component>

            <label-component value="Status"></label-component>
            <select-component name="stat" v-model="dog.stat" :options="{ 'A': 'Available', 'D': 'Adopted', 'C': 'Deceased'  }"></select-component>
          </div>

          <div class="form-group m-form__group row">
            <label-component value="Gender"></label-component>
            <radio-component name="gender" v-model="dog.gender" :options="{ 'M': 'Male', 'F': 'Female' }"></radio-component>

            <label-component value="Birthday"></label-component>
            <textbox-component name='birthday' v-model="dog.birthday" :error="errors.get('birthday')"></textbox-component>
          </div>

          <div class="form-group m-form__group row">
            <label-component value="Breed"></label-component>
            <textbox-component name='breed' v-model="dog.breed" :error="errors.get('breed')"></textbox-component>

            <label-component value="Colour"></label-component>
            <textbox-component name='colour' v-model="dog.colour" :error="errors.get('colour')"></textbox-component>
          </div>

          <div class="form-group m-form__group row">
            <label-component value="Microchipped"></label-component>
            <radio-component name="microchip" v-model="dog.microchip" :options="{ 'Y': 'Yes', 'N': 'No' }"></radio-component>
          </div>

          <div class="form-group m-form__group row">
            <label-component value="Vaccinated"></label-component>
            <radio-component name="vaccinate" v-model="dog.vaccinate" :options="{ 'Y': 'Yes', 'N': 'No' }"></radio-component>
          </div>

          <div class="form-group m-form__group row">
            <label-component value="HDB Approved"></label-component>
            <radio-component name="hdb" v-model="dog.hdb" :options="{ 'Y': 'Yes', 'N': 'No' }"></radio-component>
          </div>

          <div class="form-group m-form__group row">
            <label-component value="Health"></label-component>
            <textarea-component name='health' v-model="dog.health" :error="errors.get('health')"></textarea-component>

            <label-component value="Behaviour"></label-component>
            <textarea-component name='behaviour' v-model="dog.behaviour" :error="errors.get('behaviour')"></textarea-component>
          </div>

          <hr>

          <div class="form-group m-form__group row">
            <label-component value="Rescued On"></label-component>
            <textbox-component name='rescued_on' v-model="dog.rescued_on" :error="errors.get('rescued_on')"></textbox-component>
          </div>

          <form-footer-component></form-footer-component>
        </form>
      </tab>
      <tab :name="'Rescuer'">
        <form @submit.prevent="onSubmit()" class="m-form m-form--fit m-form--label-align-right" >
          <rescuer-component v-for="rescuer in rescuers" :key="rescuer.rescuer_id"></rescuer-component>

          <form-footer-component></form-footer-component>
        </form>
      </tab>
      <tab :name="'Foster'">

      </tab>
    </tabs>
  </single-portlet>
</template>

<script>
  import axios from 'axios'
  import TextboxComponent from '../components/TextboxComponent'
  import TextareaComponent from '../components/TextareaComponent'
  import Select2Component from '../components/Select2Component'
  import SinglePortlet from '../components/SinglePortlet'
  import LabelComponent from '../components/LabelComponent'
  import TextComponent from '../components/TextComponent'
  import TabsComponent from '../components/TabsComponent'
  import TabComponent from '../components/TabComponent'
  import FormFooterComponent from '../components/FormFooterComponent'
  import SelectComponent from '../components/SelectComponent'
  import RadioComponent from '../components/RadioComponent'
  import Errors from '../../common/errors'
  import RescuerComponent from "../components/RescuerComponent";

  export default {
    name: "dog",
    data() {
      return {
        dog: {},
        brands: {},
        categories: {},
        rescuers: [{}],
        errors: new Errors()
      }
    },
    components: {
      RescuerComponent,
      SinglePortlet,
      TextboxComponent,
      TextareaComponent,
      LabelComponent,
      TextComponent,
      FormFooterComponent,
      SelectComponent,
      RadioComponent,
      Select2Component,
      'tabs': TabsComponent,
      'tab': TabComponent,
    },
    methods: {
      onSubmit() {
        //alert('hey');
        axios.post('admin/dog/save/' + this.$route.params.adopt_id, this.dog)
          .then(this.onSuccess)
          .catch(error=>{
            this.errors.record(error.response.data.errors);
          });
      },
      onSuccess(response) {
        toastr.success("Hello world!");
      }
    },
    created() {
      axios.get('admin/adopt/get/' + this.$route.params.adopt_id)
        .then(response => {
          this.dog = response.data
        })
        .catch(error => { console.log(error); })
    }
  }
</script>

<style scoped>

</style>