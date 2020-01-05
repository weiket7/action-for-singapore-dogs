<template>
  <single-portlet title="Dogs" create_link="adopt/save">
    <div class="row">
      <div class="col-md-2"><static-text>Status</static-text></div>
      <div class="col-md-4">
        <select class="form-control m-input" @change="filterAdopts($event.target.value)">
          <option value="All">All</option>
          <option value="A">Available</option>
          <option value="D">Adopted</option>
        </select>
      </div>
    </div>
    <br>

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
        <tr v-for="adopt in filteredAdopts">
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
        selectedStatus: null,
        filteredAdopts: [],
        adopts: [],
        adopt_stats: {},
        loading: true,
      }
    },
    methods: {
      filterAdopts(selectedStatus) {
        if(selectedStatus === 'All') {
          this.filteredAdopts = this.adopts;
          return;
        }
        this.filteredAdopts = this.adopts.filter((adopt) => {
          return adopt.stat === selectedStatus;
        });
      }
    },
    created() {
      axios.get('api/adopt')
        .then(response => {
          this.adopts = response.data.adopts;
          this.filteredAdopts = response.data.adopts;
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