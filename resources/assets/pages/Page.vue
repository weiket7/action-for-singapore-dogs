<template>
  <div class="container content">
    <div class="row">
      <div class="col-sm-12">
        <h2>{{ page.title }}</h2>

        <span v-html="page.content"></span>
      </div>
    </div>
  </div>
</template>

<script>
  import axios from 'axios'

  export default {
    name: "page",
    data() {
      return {
        page: {}
      }
    },
    created() {
      axios.get('api/page/get/'+this.$route.params.slug)
        .then(response => {
          this.page = response.data;
        });
    }
  }
</script>

<style scoped>

</style>