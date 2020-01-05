<template>
  <single-portlet title="Blogs" create_link="blog/save">
    <div class="m-loader m-loader--lg" style="width: 30px; display: inline-block;" v-if="loading"></div>
    <div class="table-responsive" v-else>
      <table class="table table-bordered table-hover">
        <thead>
        <tr>
          <th width="150px">Type</th>
          <th>Name</th>
          <th>Posted On</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="blog in blogs">
          <td>{{ blog_types[blog.type] }}</td>
          <td width="450px">
            <router-link v-bind:to="'/blog/save/'+blog.blog_id">{{ blog.title }}</router-link>
          </td>
          <td>{{ blog.posted_on | formatDate }}</td>
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
        blog_types: {},
        loading: true,
      }
    },
    created() {
      axios.get('api/blog')
        .then(response => {
          this.blogs = response.data.blogs;
          this.blog_types = response.data.blog_types;
          this.loading = false;
        })
        .catch(this.onError);
    }
  }
</script>

<style scoped>

</style>