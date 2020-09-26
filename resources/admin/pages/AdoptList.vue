<template>
  <single-portlet title="Dogs" create_link="adopt/save">
    <div class="row">
      <div class="col-md-2"><static-text>Status</static-text></div>
      <div class="col-md-4">
        <select class="form-control m-input" v-model="selectedStatus">
          <option value="All">All</option>
          <option v-for="(key, value) in adopt_stats" :value="value" :key="key">{{ key }}</option>
        </select>
      </div>
    </div>

    <div class="row">
      <div class="col-md-2"><static-text>Name</static-text></div>
      <div class="col-md-4">
        <input type="text" class="form-control" v-model="searchName"/>
      </div>
    </div>
    <br>

    <div class="m-loader m-loader--lg" style="width: 30px; display: inline-block;" v-if="loading"></div>
    <div class="table-responsive" v-else>
      <table class="table table-bordered table-hover">
        <thead>
        <tr>
          <th width="50px">#</th>
          <th width="220px">Status</th>
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
        selectedStatus: 'All',
        searchName: null,
        filteredAdopts: [],
        adopts: [],
        adopt_stats: {},
        loading: true,
      }
    },
    methods: {
      filterAdopts() {
        let filteredAdopts = this.adopts;
        if(this.selectedStatus !== 'All') {
          filteredAdopts = filteredAdopts.filter(adopt => {
            return adopt.stat === this.selectedStatus;
          });
        }
        if(this.searchName) {
          filteredAdopts = filteredAdopts.filter(adopt => {
            console.log(adopt.name + " " + adopt.name.indexOf(this.searchName));
            return adopt.name.toLowerCase().indexOf(this.searchName.toLowerCase()) >= 0;
          });
        }
        this.filteredAdopts = filteredAdopts;
      }
    },
    watch: {
      searchName: function() {
        this.filterAdopts();
      },
      selectedStatus: function() {
        this.filterAdopts();
      },
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