<template>
  <single-portlet title="Banners" create_link="banner/save">
    <div class="m-loader m-loader--lg" style="width: 30px; display: inline-block;" v-if="loading"></div>
    <div class="table-responsive" v-else>
      <table class="table table-bordered table-hover">
        <thead>
        <tr>
          <th width="80px">Position</th>
          <th>Name</th>
          <th>Image</th>
          <th>Url</th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td></td>
          <td>
            <router-link to="/page/save/1">Title</router-link>
          </td>
          <td></td>
          <td>{{ home_banner_title }}</td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td>
            <router-link to="/page/save/2">Content</router-link>
          </td>
          <td></td>
          <td>{{ home_banner_content }}</td>
          <td></td>
        </tr>
        <tr v-for="banner in banners">
          <td><input type="text" class="form-control" v-model="banner.position"></td>
          <td>
            <router-link :to="'/banner/save/'+banner.banner_id">
              {{ banner.name }}
            </router-link>
          </td>
          <td>
              <img :src="'assets/images/banners/'+banner.image" style="max-height: 150px">
          </td>
          <td>{{ banner.url }}</td>
        </tr>
        </tbody>
      </table>
    </div>

    <div class="row">
      <div class="col-md-12 text-center">
        <button type="submit" class="btn btn-success" @click="saveBannerList()">Save</button>
      </div>
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
        banner_stats: {},
        home_banner_title: "",
        home_banner_content: "",
        loading: true,
      }
    },
    methods: {
      saveBannerList() {
        axios.post('api/banner', { banners: this.banners })
          .then(response => {
            toastr.success("Banners updated");
          })
      }
    },
    created() {
      axios.get('api/banner')
        .then(response=>{
          this.banners = response.data.banners;
          this.banner_stats = response.data.banner_stats;
          this.home_banner_title = response.data.home_banner_title;
          this.home_banner_content = response.data.home_banner_content;
          this.loading = false;
        })
    }
  }
</script>
