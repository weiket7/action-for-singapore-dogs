<template>
  <single-portlet title="Banners" create_link="banner/save">
    <div class="table-responsive">
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
            <router-link to="/page/home">Home</router-link>
          </td>
          <td>{{ home_text }}</td>
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
        home_text: ""
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
          this.home_text = response.data.home_text;
        })
    }
  }
</script>
