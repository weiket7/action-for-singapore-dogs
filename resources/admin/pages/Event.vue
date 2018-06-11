<template>
  <single-portlet title="Events">
    <form @submit.prevent="onSubmit()" class="m-form m-form--fit m-form--label-align-right" >
      <div class="form-group m-form__group row" :class="{ 'has-danger': errors.has('name') }">
        <label-component>Status</label-component>
        <radio-component name="stat" v-model="event.stat" :options="{ 'A': 'Available', 'H': 'Hidden' }"></radio-component>

        <label-component>Name</label-component>
        <textbox-component name='name' v-model="event.name" :error="errors.get('name')"></textbox-component>
      </div>

      <div class="form-group m-form__group row">
        <label-component>Location</label-component>
        <textbox-component name="location" v-model="event.location" :error="errors.get('location')"></textbox-component>

        <label-component>Date</label-component>
        <datepicker-component name="date" v-model="event.date" v-if="event.date"></datepicker-component>
      </div>

      <div class="form-group m-form__group row">
        <label-component>Time</label-component>
        <textbox-component name='time' v-model="event.time" :error="errors.get('time')"></textbox-component>

        <label-component>Duration</label-component>
        <textbox-component name='duration' v-model="event.duration" :error="errors.get('duration')"></textbox-component>
      </div>

      <div class="form-group m-form__group row">
        <label-component>Cost</label-component>
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
        axios.post('api/event/save/' + this.$route.params.event_id, this.event)
          .then(this.onSuccess)
          .catch(this.onError);
      },
      onSuccess(response) {
        let message = this.is_create ? "Event added" : "Event updated";
        toastr.success(message);
      },
      onError(error) {
        if (error.response.status == 500) {
          toastr.error("A system error occurred");
          return;
        }
        toastr.error("There were some errors, please check the form");
        this.errors.record(error.response.data.errors);
      },
    },
    computed: {
      is_create() {
        return this.$route.path == "/event/save";
      }
    },
    created() {
      axios.get('api/event/get/' + this.$route.params.event_id)
        .then(response => {
          this.event = response.data
        })
        .catch(error => { console.log(error); })
    }
  }
</script>

<style scoped>

</style>