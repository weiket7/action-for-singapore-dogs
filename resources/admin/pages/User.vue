<template>
  <single-portlet title="User">
    <form @submit.prevent="onSubmit()" class="m-form m-form--fit m-form--label-align-right" >
      <form-row>
        <label-component required>Username</label-component>
        <textbox-component name='username' v-model="user.username" :error="errors.get('username')"></textbox-component>
        
        <label-component :required="is_create">Password</label-component>
        <div class="col-lg-3">
          <input type="password" v-model="user.password" class="form-control">
          <span class="m-form__help m-form__error" v-if="errors.get('password')">
            {{ errors.get('password') }}
          </span>
        </div>
      </form-row>

      <form-row>
        <label-component>Permissions</label-component>
        <checkbox-component v-model="user_permissions" :options="permissions"></checkbox-component>
      </form-row>

      <form-footer>
        <button type="submit" class="btn btn-success">Save</button>
        <button type="button" class="btn btn-danger" data-toggle="confirmation" v-if="!this.is_create">Delete</button>
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
        permissions: [],
        user_permissions: []
      }
    },
    computed: {
      is_create() {
        return this.$route.path == "/user/save";
      },
    },
    methods: {
      onSubmit() {
        let url = 'api/user/save';
        if (!this.is_create) {
          url += '/'+ this.$route.params.user_id
        }
  
        this.user.user_permissions = this.user_permissions;
        
        axios.post(url, this.user)
          .then(this.onSuccess)
          .catch(this.onError);
      },
      onSuccess(response) {
        this.errors = new Errors();
        if (this.is_create) {
          toastr.success("User added");
          this.user.id = response.data;
          this.$router.push('/user/save/'+this.user.id);
          return;
        }
        toastr.success("User updated");
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
    created() {
      axios.get('api/user/get/' + this.$route.params.user_id)
        .then(response => {
          if (! this.is_create) {
          }
          this.user = response.data.user;
          this.user_permissions = response.data.user_permissions;
          this.permissions = response.data.permissions;
        })
        .catch(error => {
          console.log(error);
        })
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