<template>
  <single-portlet title="Events">
    <div class="table-responsive">
      <table class="table table-bordered table-hover">
        <thead>
        <tr>
          <th width="80px">Status</th>
          <th>Name</th>
          <th>Date</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="event in events">
          <td><!--{{ProductStat::$values[p.stat]}}--></td>
          <td width="450px">
            <router-link v-bind:to="'/events/'+event.event_id">{{ event.name }}</router-link>
          </td>
          <td>{{ event.date | formatDate }}</td>
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
      }
    },
    created() {
      axios.get('api/events')
        .then(response => {
          this.events = response.data
        })
        .catch(error => {
          console.log(error);
        })
    },
    components: {
      SinglePortlet,
    }
  }
</script>

<style scoped>

</style>