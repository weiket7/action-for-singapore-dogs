<template>
  <single-portlet title="Pages" create_link="page/save">
    <div class="m-loader m-loader--lg" style="width: 30px; display: inline-block;" v-if="loading"></div>
    <div class="table-responsive" v-else>
      <table class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>Name</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="page in pages">
          <td width="450px">
            <router-link v-bind:to="'/page/save/'+page.page_id">{{ page.title }}</router-link>
          </td>
        </tr>
        </tbody>
      </table>
    </div>
  </single-portlet>
</template>

<script>
  import axios from 'axios'

  export default {
    name: "page-list",
    data() {
      return {
        pages: [],
        loading: true,
      }
    },
    created() {
      axios.get('api/page')
        .then(response => {
          this.pages = response.data;
          this.loading = false;
        })
        .catch(this.onError);
    }
  }
</script>

<style scoped>

</style>