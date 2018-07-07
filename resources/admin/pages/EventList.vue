<template>
  <single-portlet title="Events" create_link="event/save">
    <div class="table-responsive">
      <table class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>Name</th>
          <th>Date</th>
          <th>Time</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="event in events">
          <td width="450px">
            <router-link v-bind:to="'/event/save/'+event.event_id">{{ event.name }}</router-link>
          </td>
          <td>{{ event.date | formatDate }}</td>
          <td>{{ event.time }}</td>
        </tr>
        </tbody>
      </table>
    </div>
  </single-portlet>
</template>

<script>
  import axios from 'axios'
  import SinglePortlet from '../components/SinglePortlet'
  import "../../common/filters"

  export default {
    name: "events",
    data() {
      return {
        events: [],
        event_stats: {}
      }
    },
    created() {
      axios.get('api/event')
        .then(response => {
          this.events = response.data.events;
          this.event_stats = response.data.event_stats;
        })
        .catch(this.onError);
    }
  }
</script>

<style scoped>

</style>