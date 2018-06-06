<template>
  <single-portlet title="Dogs" create_link="adopt/save">
    <div class="table-responsive">
      <table class="table table-bordered table-hover">
        <thead>
        <tr>
          <th width="80px">Status</th>
          <th>Name</th>
          <th>Gender</th>
          <th>Age</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="adopt in adopts">
          <td><!--{{ProductStat::$values[p.stat]}}--></td>
          <td width="450px">
            <router-link v-bind:to="'/adopt/save/'+adopt.adopt_id">{{ adopt.name }}</router-link>
          </td>
          <td>{{ adopt.gender == 'M' ? 'Male' : 'Female'   }}</td>
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
        adopt_stat: {}
      }
    },
    created() {
      axios.get('api/adopt')
        .then(response => {
          this.adopts = response.data
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