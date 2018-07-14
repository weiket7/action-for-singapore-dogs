<template>
  <div class="container content">
    <div class="row">
      <div class="col-md-12">
        <div class="text-center">
          <div class="alert alert-danger mt-10" v-if="error">
            Error
          </div>
  
          <form @submit.prevent="onSubmit()" v-else class="form-horizontal">
            <button type="submit">I agree to the adoption agreement</button>
    
            <div class="alert alert-success mt-10" v-show="success">
              Thank you
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import axios from 'axios'
  
  export default {
    name: "adoption-agreement",
    data() {
      return {
        adoption_form: {},
        answers: {},
        success: false,
        error: false,
      }
    },
    methods: {
      onSubmit() {
        axios.post('api/adoption-form/save-agreement/'+this.$route.params.token)
          .then(this.onSuccess)
          .catch(this.onError);
      },
      onSuccess() {
        this.success = true;
      }
    },
    created() {
      axios.get('api/adoption-form/get-agreement/'+this.$route.params.token)
        .then(response => {
          this.adoption_form = response.data.adoption_form;
          this.answers = response.data.answers;
        }).catch(error => {
          this.error =true;
        });
    },
  }
</script>

<style scoped>

</style>