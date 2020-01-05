<template>
  <single-portlet title="Dogs" create_link="adopt/save">
    <div class="m-loader m-loader--lg" style="width: 30px; display: inline-block;" v-if="loading"></div>
    <div class="table-responsive" v-else>
      <table class="table table-bordered table-hover">
        <thead>
        <tr>
          <th width="50px">#</th>
          <th width="80px">Status</th>
          <th>Name</th>
          <th>Gender</th>
          <th>Age</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="adopt in adopts">
          <td>{{ adopt.adopt_id }}</td>
          <td>{{ adopt_stats[adopt.stat] }}</td>
          <td width="450px">
            <router-link v-bind:to="'/adopt/save/'+adopt.adopt_id">{{ adopt.name }}</router-link>
          </td>
          <td>{{ adopt.gender | showGender  }}</td>
          <td>{{ adopt.age}}</td>
        </tr>
        </tbody>
      </table>
    </div>
  </single-portlet>
</template>

<script>
  import axios from 'axios'
  import SinglePortlet from "../components/SinglePortlet";

  export default {
    name: "adopt-list",
    data() {
      return {
        adopts: [],
        adopt_stats: {},
        loading: true,
      }
    },
    created() {
      axios.get('api/adopt')
        .then(response => {
          this.adopts = response.data.adopts;
          this.adopt_stats = response.data.adopt_stats;
          this.loading = false;
        })
        .catch(error => {
          console.log(error);
        })
    },
    components: {
      SinglePortlet
    }
  }
</script>

<style scoped>

</style>