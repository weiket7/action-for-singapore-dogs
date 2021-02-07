<template>
  <single-portlet title="Adoption Forms" create_link="adoption_form/save">
    <div class="row">
      <div class="col-md-2"><static-text>Name</static-text></div>
      <div class="col-md-4">
        <input type="text" class="form-control" v-model="name"/>
      </div>
      <div class="col-md-4">
        <input type="button" class="btn btn-primary" @click="searchAdoptionForm" value="Search">
      </div>
    </div>
    <br>

    <div class="m-loader m-loader--lg" style="width: 30px; display: inline-block;" v-if="loading"></div>
    <div class="table-responsive" v-else>
      <table class="table table-bordered table-hover">
        <thead>
        <tr>
          <th width="80px ">Status</th>
          <th>Name</th>
          <th>Enquired On</th>
          <th>Applied On</th>
          <th>Approved On</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="adoption_form in adoption_forms" :key="adoption_form.adoption_form_id">
          <td>{{ adoption_form_stats[adoption_form.stat] }}</td>
          <td>
            <router-link :to="'/adoption-form/save/'+adoption_form.adoption_form_id">
              {{ adoption_form.name }}
            </router-link>
          </td>
          <td>{{ adoption_form.enquired_on | formatDate }}</td>
          <td>{{ adoption_form.applied_on | formatDate }}</td>
          <td>{{ adoption_form.approved_on | formatDate }}</td>
        </tr>
        </tbody>
      </table>
    </div>
  </single-portlet>
</template>

<script>
import axios from "axios";

export default {
  name: "AdoptionFormList",
  data() {
    return {
      adoption_forms: {},
      adoption_form_stats: {},
      loading: true,
      name: "",
    };
  },
  created() {
    axios.get("api/adoption-form").then((response) => {
      this.adoption_forms = response.data.adoption_forms;
      this.adoption_form_stats = response.data.adoption_form_stats;
      this.loading = false;
    });
  },
  methods: {
    searchAdoptionForm() {
      axios.post("api/adoption-form/search", { name: this.name }).then((response) => {
        this.adoption_forms = response.data.adoption_forms;
        this.loading = false;
      });
    },
  },
};
</script>

<style scoped>
</style>
