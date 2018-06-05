<template>
  <single-portlet title="Rescuers">
    <div class="table-responsive">
      <table class="table table-bordered table-hover">
        <thead>
        <tr>
          <th width="80px">Status</th>
          <th>Name</th>
          <th>Mobile</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="rescuer in rescuers">
          <td><!--{{ProductStat::$values[p.stat]}}--></td>
          <td width="450px">
            <router-link v-bind:to="'/rescuers/'+rescuer.rescuer_id">{{ rescuer.name }}</router-link>
          </td>
          <td>{{ rescuer.mobile }}</td>
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
    name: "rescuers",
    data() {
      return {
        rescuers: [],
      }
    },
    created() {
      axios.get('api/rescuer')
        .then(response => {
          this.rescuers = response.data
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