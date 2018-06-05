<template>
  <single-portlet title="Fosters">
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
        <tr v-for="foster in fosters">
          <td><!--{{ProductStat::$values[p.stat]}}--></td>
          <td width="450px">
            <router-link v-bind:to="'/fosters/'+foster.foster_id">{{ foster.name }}</router-link>
          </td>
          <td>{{ foster.mobile }}</td>
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
    name: "fosters",
    data() {
      return {
        fosters: [],
      }
    },
    created() {
      axios.get('api/foster')
        .then(response => {
          this.fosters = response.data
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