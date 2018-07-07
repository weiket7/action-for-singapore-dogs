<template>
  <single-portlet title="Pages" create_link="page/save">
    <div class="table-responsive">
      <table class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>Name</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="page in pages">
          <td width="450px">
            <router-link v-bind:to="'/page/save/'+page.page_id">{{ page.name }}</router-link>
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
      }
    },
    created() {
      axios.get('api/page')
        .then(response => {
          this.pages = response.data;
        })
        .catch(this.onError);
    }
  }
</script>

<style scoped>

</style>