<template>
  <single-portlet title="User">
    <form @submit.prevent="onSubmit()" class="m-form m-form--fit m-form--label-align-right" >
      <form-row>
        <label-component required>Username</label-component>
        <textbox-component name='username' v-model="user.username" :error="errors.get('username')"></textbox-component>
      </form-row>

      <form-row>
        <label-component>Permissions</label-component>
        <checkbox-component v-model="user.permissions" :options="permissions"></checkbox-component>
      </form-row>

      <form-footer>
        <button type="submit" class="btn btn-success">Save</button>
        <button type="button" class="btn btn-danger" data-toggle="confirmation">Delete</button>
      </form-footer>
    </form>
  </single-portlet>
</template>

<script>
  import axios from 'axios'
  import Errors from '../../common/errors'
  import FormMixin from '../form-mixin';

  export default {
    name: "user",
    data() {
      return {
        user: {},
        errors: new Errors(),
        permissions: ['Dogs', 'People', 'Volunteer', 'Sponsorships', 'Donations', 'Banners', 'Events',
          'Adoption Forms', 'Users', 'Pages']
      }
    },
    methods: {
      onSubmit() {
        axios.post(url, this.user)
          .then(this.onSuccess)
          .catch(this.onError);
      },
      onSuccess(response) {
        if (this.is_create) {
          toastr.success("User added");
          return;
        }
        toastr.success("User updated");
        let user_id = response.data;
        this.$router.push('/user/save/'+user_id);
      },
      deleteUser() {
        axios.post('api/user/delete/'+this.$route.params.user_id)
          .then(response => {
            toastr.success("User deleted");
            this.$router.push('/user');
          })
          .catch(this.onError);
      }
    },
    computed: {
      is_create() {
        return this.$route.path == "/user/save";
      },
    },
    created() {
      if (this.is_create) {
        this.loaded = true;
      } else {
        axios.get('api/user/get/' + this.$route.params.user_id)
          .then(response => {
            this.user = response.data.user;
          })
          .catch(error => {
            console.log(error);
          })
      }
    },
    mounted() {
      let vue = this
      $('[data-toggle=confirmation]').confirmation({
        rootSelector: '[data-toggle=confirmation]',
      }).on("confirmed.bs.confirmation", function() {
        vue.deleteUser();
      });
    },
    mixins: [FormMixin]
  }
</script>

<style scoped>

</style>