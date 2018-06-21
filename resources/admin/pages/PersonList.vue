<template>
  <single-portlet title="People" create_link="/person/save">
    <!--<div class="table-responsive">
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>Types</th>
          </tr>
        </thead>
        <tr>
          <td>
            <checkbox-component :options="person_types"></checkbox-component>
          </td>
        </tr>
      </table>
    </div>-->
    
    <div class="table-responsive">
      <table class="table table-bordered table-hover">
        <thead>
        <tr>
          <th width="80px">Status</th>
          <th>Name</th>
          <th>Mobile</th>
          <th width="80px">Adopter</th>
          <th width="80px">Rescuer</th>
          <th width="80px">Foster</th>
          <th>Volunteer</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="person in persons">
          <td>{{ person_stats[person.stat]}}</td>
          <td width="450px">
            <router-link v-bind:to="'/person/save/'+person.person_id">{{ person.name }}</router-link>
          </td>
          <td>{{ person.mobile }}</td>
          <td><i class="fa fa-check" v-if="person.is_adopter"></i></td>
          <td><i class="fa fa-check" v-if="person.is_rescuer"></i></td>
          <td><i class="fa fa-check" v-if="person.is_foster"></i></td>
          <td><i class="fa fa-check" v-if="person.is_volunteer"></i></td>
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
        person_types: {"R":"Rescuer", "F":"Foster", "A":"Adopter", "V":"Volunteer"},
        person_stats: {}
      }
    },
    created() {
      axios.get('api/person')
        .then(response => {
          this.persons = response.data.persons;
          this.person_stats = response.data.person_stats;
        })
        .catch(error => {
          console.log(error);
        })
    }
  }
</script>

<style scoped>

</style>