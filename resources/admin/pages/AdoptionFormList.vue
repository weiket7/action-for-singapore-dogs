<template>
  <single-portlet title="Adoption Forms" create_link="adoption_form/save">
    <div class="table-responsive">
      <table class="table table-bordered table-hover">
        <thead>
        <tr>
          <th width="80px ">Status</th>
          <th>Name</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="adoption_form in adoption_forms">
          <td>{{ adoption_form_stats[adoption_form.stat] }}</td>
          <td>
            <router-link :to="'/adoption-form/save/'+adoption_form.adoption_form_id">
              {{ adoption_form.name }}
            </router-link>
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
    name: "AdoptionFormList",
    data() {
      return {
        adoption_forms: {},
        adoption_form_stats: {}
      }
    },
    created() {
      axios.get('api/adoption-form')
        .then(response=>{
          this.adoption_forms = response.data.adoption_forms;
          this.adoption_form_stats = response.data.adoption_form_stats;
        })
    }
  }
</script>

<style scoped>

</style>