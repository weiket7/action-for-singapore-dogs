<template>
  <single-portlet title="People" create_link="/person/save">
    <div class="table-responsive">
      <table class="table table-bordered table-hover">
        <tr>
          <th>Types</th>
        </tr>
        <tr>
          <td>
            <checkbox-component :options="person_types" inline></checkbox-component>
          </td>
        </tr>
      </table>
    </div>
    
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
        <tr v-for="person in persons">
          <td><!--{{ProductStat::$values[p.stat]}}--></td>
          <td width="450px">
            <router-link v-bind:to="'/person/save/'+person.person_id">{{ person.name }}</router-link>
          </td>
          <td>{{ person.mobile }}</td>
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
    name: "persons",
    data() {
      return {
        persons: [],
        person_types: []
      }
    },
    created() {
      axios.get('api/person')
        .then(response => {
          this.persons = response.data.persons;
          this.person_types = response.data.person_types;
        })
        .catch(error => {
          console.log(error);
        })
    }
  }
</script>

<style scoped>

</style>