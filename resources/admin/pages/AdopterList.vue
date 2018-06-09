<template>
  <single-portlet title="Adopters">
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
        <tr v-for="adopter in adopters">
          <td><!--{{ProductStat::$values[p.stat]}}--></td>
          <td width="450px">
            <router-link v-bind:to="'/adopters/'+adopter.adopter_id">{{ adopter.name }}</router-link>
          </td>
          <td>{{ adopter.mobile }}</td>
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
    name: "adopters",
    data() {
      return {
        adopters: [],
      }
    },
    created() {
      axios.get('api/person?type=adopter')
        .then(response => {
          this.adopters = response.data
        })
        .catch(error => {
          console.log(error);
        })
    }
  }
</script>

<style scoped>

</style>