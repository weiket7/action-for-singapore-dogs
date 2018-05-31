<template>
  <single-portlet title="Dogs">
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
        <tr v-for="dog in dogs">
          <td><!--{{ProductStat::$values[p.stat]}}--></td>
          <td width="450px">
            <router-link v-bind:to="'/dogs/'+dog.adopt_id">{{ dog.name }}</router-link>
          </td>
          <td>{{ dog.gender }}</td>
          <td>{{ dog.age}}</td>
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
    name: "dog-list",
    data() {
      return {
        dogs: [],
        dog_stat: {}
      }
    },
    created() {
      axios.get('api/adopt')
        .then(response => {
          this.dogs = response.data
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