<template>
  <div class="container content">
    <div class="row">
      <div class="col-md-12">
        <div class="text-center">
          <form @submit.prevent="onSubmit()" class="form-horizontal">
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
        success: false
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
      axios.get('api/adoption-form/get-agreement/'+this.$route.params.token).then(response => {
        this.adoption_form = response.data.adoption_form;
        this.answers = response.data.answers;
      });
    },
  }
</script>

<style scoped>

</style>