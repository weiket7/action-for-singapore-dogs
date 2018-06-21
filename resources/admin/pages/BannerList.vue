<template>
  <single-portlet title="Banners" create_link="banner/save">
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
          <td>{{ banner_stats[banner.stat] }}</td>
          <td>
            <router-link :to="'/banner/'+banner.banner_id">
              <img :src="'assets/images/banners/'+banner.image" style="max-height: 150px">
            </router-link>
          </td>
          <td>{{ banner.url }}</td>
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
        banners: {},
        banner_stats: {}
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