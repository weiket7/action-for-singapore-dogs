<template>
  <single-portlet title="Banners">
    <div class="table-responsive">
      <table class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>Status</th>
          <th>Image</th>
          <th>Url</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="banner in banners">
          <td>{{ banner.donated_on | formatDate}}</td>
          <td>
            <router-link v-bind:to="'/banner/'+banner.banner_id">{{ banner.name }}</router-link>
          </td>
          <td>{{ banner.amount  }}</td>
          <td>{{ banner_stats[banner.stat] }}</td>
        </tr>
        </tbody>
      </table>
    </div>
  </single-portlet>
</template>

<script>
  import axios from 'axios'

  export default {
    name: "BannerList",
    data() {
      return {
        banners: {}
      }
    },
    created() {
      axios.get('api/banner')
        .then(response=>{
          this.banners = response.data.banners;
          this.banner_stats = response.data.banner_stats;
        })
    }
  }
</script>

<style scoped>

</style>