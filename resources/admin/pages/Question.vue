<template>
  <single-portlet title="Question">
    <form @submit.prevent="onSubmit()" class="m-form m-form--fit m-form--label-align-right" >
      <form-row>
        <label-component>Is Header</label-component>
        <radio-component name="is_header" v-model="question.is_header" :options="{ '1': 'Yes', '0': 'No' }" :error="errors.get('is_header')"></radio-component>

        <label-component>Question</label-component>
        <textbox-component v-model="question.content" :error="errors.get('content')"></textbox-component>
      </form-row>
  
      <form-footer>
        <button type="submit" class="btn btn-success">Save</button>
      </form-footer>
    </form>
  </single-portlet>
</template>

<script>
  import axios from 'axios';
  import Errors from '../../common/errors'
  import ImageComponent from "../components/ImageComponent";
  import FormMixin from '../form-mixin';

  export default {
    name: "question",
    data() {
      return {
        question: {},
        errors: new Errors(),
        image_new: null
      }
    },
    methods: {
      updateImage(file) {
        this.image_new = file;
      },
      onSubmit() {
        let url = 'api/question/save';
        if (!this.is_create) {
          url += '/'+ this.$route.params.question_id
        }

        let form_data = this.question;
        let config = {};
        if (this.image_new) {
          form_data = new FormData();
          this.appendObjectToFormData(this.question, form_data);
          form_data.append("image_new", this.image_new);

          config = {
            headers: {
              'content-type': 'multipart/form-data'
            }
          };
        }

        axios.post(url, form_data, config)
          .then(this.onSuccess)
          .catch(this.onError);
      },
      onSuccess(response) {
        if (this.is_create) {
          toastr.success("Question added");
          return;
        }
        toastr.success("Question updated");
        let question_id = response.data;
        this.$router.push('/question/save/'+question_id);
      },
    },
    created() {
      if (! this.is_create) {
        axios.get('api/question/get/' + this.$route.params.question_id)
          .then(response => {
            this.question = response.data;
          }).catch(error => {
          console.log(error);
        })
      }
    },
    computed: {
      is_create() {
        return this.$route.path == "/question/save";
      }
    },
    components: {
      ImageComponent
    },
    mixins: [FormMixin]
  }
</script>

<style scoped>

</style>