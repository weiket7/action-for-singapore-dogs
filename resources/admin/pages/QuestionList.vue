<template>
  <single-portlet title="Questions" create_link="question/save">
    <div class="table-responsive">
      <table class="table table-bordered table-hover">
        <thead>
        <tr>
          <th width="80px">Position</th>
          <th width="80px">Header</th>
          <th>Question</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="question in questions">
          <td>{{ question.position }}</td>
          <td>{{ question.is_header ? "Yes" : "" }}</td>
          <td>
            <router-link :to="'/question/save/'+question.question_id">
              {{ question.content }}
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
    name: "BannerList",
    data() {
      return {
        questions: {}
      }
    },
    created() {
      axios.get('api/question')
        .then(response=>{
          this.questions = response.data;
        })
    }
  }
</script>

<style scoped>

</style>