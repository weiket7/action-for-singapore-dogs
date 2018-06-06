<template>
  <single-portlet title="Create Dog">
    <div @submit.prevent="onSubmit()" class="m-form m-form--fit m-form--label-align-right" >
      <form-row>
        <label-component>Name</label-component>
        <textbox-component name='name' v-model="adopt.name" :error="errors.get('name')"></textbox-component>

        <label-component>Status</label-component>
        <radio-component name="stat" v-model="adopt.stat" :options="{ 'A': 'Available', 'D': 'Adopted' }"></radio-component>
      </form-row>

      <form-row>
        <label-component>Foster</label-component>
        <radio-component name="foster" v-model="adopt.stat" :options="{ 'D': 'Don\'t Need', 'N': 'Need', 'F': 'Fostered' }"></radio-component>

        <label-component>Location</label-component>
        <select-component name='location' v-model="adopt.location" :options="{ 'C': 'ARC', 'R': 'Rescuer', 'F':'Foster', 'A': 'Adopter' }" :error="errors.get('location')"></select-component>
      </form-row>

      <form-row>
        <label-component>Rescued On</label-component>
        <datepicker-component name='rescued_on' v-model="adopt.rescued_on" :error="errors.get('rescued_on')"></datepicker-component>
      </form-row>

      <form-row>
        <label-component>Gender</label-component>
        <radio-component name="gender" v-model="adopt.gender" :options="{ 'M': 'Male', 'F': 'Female' }"></radio-component>

        <label-component>Birthday</label-component>
        <datepicker-component name='birthday' v-model="adopt.birthday" :error="errors.get('birthday')"></datepicker-component>
      </form-row>

      <form-row>
        <label-component>Breed</label-component>
        <textbox-component name='breed' v-model="adopt.breed" :error="errors.get('breed')"></textbox-component>

        <label-component>Colour</label-component>
        <textbox-component name='colour' v-model="adopt.colour" :error="errors.get('colour')"></textbox-component>
      </form-row>

      <form-row>
        <label-component>Microchipped</label-component>
        <radio-component name="microchip" v-model="adopt.microchip" :options="{ 'Y': 'Yes', 'N': 'No' }"></radio-component>

        <label-component value="Microchip Date" v-show="adopt.microchip == 'Y'"></label-component>
        <datepicker-component name='microchip_date' v-model="adopt.microchip_date" :error="errors.get('microchip_date')" v-show="adopt.microchip == 'Y'"></datepicker-component>
      </form-row>

      <form-row>
        <label-component>Vaccinated</label-component>
        <radio-component name="vaccinate" v-model="adopt.vaccinate" :options="{ 'Y': 'Yes', 'N': 'No' }"></radio-component>

        <label-component v-show="adopt.vaccinate == 'Y'">Vaccinate Date</label-component>
        <datepicker-component name='vaccinate_date' v-model="adopt.vaccinate_date" :error="errors.get('vaccinate_date')" v-show="adopt.vaccinate == 'Y'"></datepicker-component>
      </form-row>

      <form-row>
        <label-component>HDB Approved</label-component>
        <radio-component name="hdb" v-model="adopt.hdb" :options="{ 'Y': 'Yes', 'N': 'No' }"></radio-component>
      </form-row>

      <form-row>
        <label-component>Health</label-component>
        <textarea-component name='health' v-model="adopt.health" :error="errors.get('health')"></textarea-component>

        <label-component>Behaviour</label-component>
        <textarea-component name='behaviour' v-model="adopt.behaviour" :error="errors.get('behaviour')"></textarea-component>
      </form-row>

      <form-footer></form-footer>
    </div>
  </single-portlet>
</template>

<script>
  import Errors from '../../common/errors'

  export default {
    name: "adopt-create",
    data() {
      return {
        adopt: {},
        errors: new Errors()
      }
    },
  }
</script>

<style scoped>

</style>