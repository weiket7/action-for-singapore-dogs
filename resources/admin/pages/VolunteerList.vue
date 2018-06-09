<template>
  <single-portlet title="Volunteers">
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
        <tr v-for="volunteer in volunteers">
          <td><!--{{ProductStat::$values[p.stat]}}--></td>
          <td width="450px">
            <router-link v-bind:to="'/volunteer/'+volunteer.volunteer_id">{{ volunteer.name }}</router-link>
          </td>
          <td>{{ volunteer.mobile }}</td>
        </tr>
        </tbody>
      </table>
    </div>
  </single-portlet>
</template>

<script>
  import axios from 'axios'
  import "../../common/filters"
  
  export default {
    name: "volunteers",
    data() {
      return {
        volunteers: [],
      }
    },
    created() {
      axios.get('api/volunteer')
        .then(response => {
          this.volunteers = response.data
        })
        .catch(error => {
          console.log(error);
        })
    }
  }
</script>

<style scoped>

</style>