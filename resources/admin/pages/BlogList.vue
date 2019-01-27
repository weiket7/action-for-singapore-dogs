<template>
  <single-portlet title="Blogs" create_link="blog/save">
    <div class="table-responsive">
      <table class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>Name</th>
          <th>Date</th>
          <th>Time</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="blog in blogs">
          <td width="450px">
            <router-link v-bind:to="'/blog/save/'+blog.blog_id">{{ blog.name }}</router-link>
          </td>
          <td>{{ blog.date | formatDate }}</td>
          <td>{{ blog.time }}</td>
        </tr>
        </tbody>
      </table>
    </div>
  </single-portlet>
</template>

<script>
  import axios from 'axios'
  import SinglePortlet from '../components/SinglePortlet'
  import "../../common/filters"
  
  export default {
    name: "blogs",
    data() {
      return {
        blogs: [],
        blog_stats: {}
      }
    },
    created() {
      axios.get('api/blog')
        .then(response => {
          this.blogs = response.data.blogs;
          this.blog_stats = response.data.blog_stats;
        })
        .catch(this.onError);
    }
  }
</script>

<style scoped>

</style>