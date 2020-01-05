<template>
  <single-portlet title="Users" create_link="user/save">
    <div class="m-loader m-loader--lg" style="width: 30px; display: inline-block;" v-if="loading"></div>
    <div class="table-responsive" v-else>
      <table class="table table-bordered table-hover">
        <thead>
        <tr>
          <!--<th width="80px">Status</th>-->
          <th>Username</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="user in users">
          <td width="450px">
            <router-link v-bind:to="'/user/save/'+user.id">{{ user.username }}</router-link>
          </td>
        </tr>
        </tbody>
      </table>
    </div>
  </single-portlet>
</template>

<script>
  import axios from 'axios'
  import "../../common/filters"
  
  export default {
    name: "users",
    data() {
      return {
        users: [],
        loading: true,
      }
    },
    created() {
      axios.get('api/user')
        .then(response => {
          this.users = response.data;
          this.loading = false;
        })
        .catch(error => {
          console.log(error);
        })
    }
  }
</script>

<style scoped>

</style>