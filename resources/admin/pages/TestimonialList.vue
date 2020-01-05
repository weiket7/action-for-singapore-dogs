<template>
  <single-portlet title="Testimonials" create_link="testimonial/save">
    <div class="m-loader m-loader--lg" style="width: 30px; display: inline-block;" v-if="loading"></div>
    <div class="table-responsive" v-else>
      <table class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>Dog Name</th>
          <th>Quote</th>
          <th>Content</th>
          <th>Image</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="testimonial in testimonials">
          <td>
            <router-link :to="'/testimonial/save/'+testimonial.testimonial_id">
              {{ testimonial.dog_name }}
            </router-link>
          </td>
          <td>{{ testimonial.quote }}</td>
          <td>{{ testimonial.content }}</td>
          <td>
              <img :src="'assets/images/boarding/'+testimonial.image" style="max-height: 70px">
          </td>
        </tr>
        </tbody>
      </table>
    </div>
  </single-portlet>
</template>

<script>
  import axios from 'axios'

  export default {
    name: "TestimonialList",
    data() {
      return {
        testimonials: {},
        testimonial_stats: {},
        loading: true,
      }
    },
    created() {
      axios.get('api/testimonial')
        .then(response=>{
          this.testimonials = response.data.testimonials;
          this.testimonial_stats = response.data.testimonial_stats;
          this.loading = false;
        })
    }
  }
</script>

<style scoped>

</style>