<template>
  <single-portlet title="Rescuers" create_link="/rescuer/save">
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
      }
    },
    created() {
      axios.get('api/person?type=rescuer')
        .then(response => {
          this.persons = response.data.persons
        })
        .catch(error => {
          console.log(error);
        })
    }
  }
</script>

<style scoped>

</style>