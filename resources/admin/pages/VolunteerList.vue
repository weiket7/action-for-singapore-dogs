<template>
  <single-portlet title="Volunteers">
    <div class="m-loader m-loader--lg" style="width: 30px; display: inline-block;" v-if="loading"></div>
    <div class="table-responsive" v-else>
      <table class="table table-bordered table-hover">
        <thead>
        <tr>
          <th width="80px">Status</th>
          <th>Name</th>
          <th>Email</th>
          <th>Mobile</th>
          <th>Interests</th>
          <th>Submitted On</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="volunteer in volunteers">
          <td>{{ volunteer_stats[volunteer.stat] }}</td>
          <td width="450px">
            <router-link :to="'/volunteer/save/'+volunteer.volunteer_id">{{ volunteer.name }}</router-link>
          </td>
          <td>{{ volunteer.email }}</td>
          <td>{{ volunteer.mobile }}</td>
          <td>{{ volunteer.interests.join(", ") }}</td>
          <td>{{ volunteer.created_on | formatDate}}</td>
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
        volunteer_stats: [],
        loading: true,
      }
    },
    created() {
      axios.get('api/volunteer')
        .then(response => {
          this.volunteers = response.data.volunteers;
          this.volunteer_stats = response.data.volunteer_stats;
          this.loading = false;
        })
        .catch(error => {
          console.log(error);
        })
    }
  }
</script>

<style scoped>

</style>