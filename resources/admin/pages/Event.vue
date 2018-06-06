<template>
  <single-portlet title="Events">
    <form @submit.prevent="onSubmit()" class="m-form m-form--fit m-form--label-align-right" >
      <div class="form-group m-form__group row" :class="{ 'has-danger': errors.has('name') }">
        <label-component value="Status"></label-component>
        <radio-component name="stat" v-model="event.stat" :options="{ 'A': 'Available', 'H': 'Hidden' }"></radio-component>

        <label-component value="Name"></label-component>
        <textbox-component name='name' v-model="event.name" :error="errors.get('name')"></textbox-component>
      </div>

      <div class="form-group m-form__group row">
        <label-component value="Location"></label-component>
        <textbox-component name="location" v-model="event.location" :error="errors.get('location')"></textbox-component>

        <label-component value="Date"></label-component>
        <textbox-component name='date' v-model="event.date" :error="errors.get('date')"></textbox-component>
      </div>

      <div class="form-group m-form__group row">
        <label-component value="Time"></label-component>
        <textbox-component name='time' v-model="event.time" :error="errors.get('time')"></textbox-component>

        <label-component value="Duration"></label-component>
        <textbox-component name='duration' v-model="event.duration" :error="errors.get('duration')"></textbox-component>
      </div>

      <div class="form-group m-form__group row">
        <label-component value="Cost"></label-component>
        <textbox-component name="cost" v-model="event.cost" :error="errors.get('cost')"></textbox-component>
      </div>

      <form-footer></form-footer>
    </form>
  </single-portlet>
</template>

<script>
  import axios from 'axios'
  import Errors from '../../common/errors'

  export default {
    name: "event",
    data() {
      return {
        event: {},
        brands: {},
        categories: {},
        rescuers: [{}],
        errors: new Errors()
      }
    },
    methods: {
      onSubmit() {
        //alert('hey');
        axios.post('admin/event/save/' + this.$route.params.adopt_id, this.event)
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
      axios.get('api/events/' + this.$route.params.event_id)
        .then(response => {
          this.event = response.data
        })
        .catch(error => { console.log(error); })
    }
  }
</script>

<style scoped>

</style>