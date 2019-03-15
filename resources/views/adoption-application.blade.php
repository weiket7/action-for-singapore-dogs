@extends('template')

@section('content')
  <div class="container content">
    <div class="row">
      <div class="col-md-12">
          <form @submit.prevent="onSubmit()" class="">
            <h3 class="text-center">Thank you for your interest in adopting</h3>
            
            <h5 class="text-center">
              Please fill in the short form below to share some information with us so that we can assist you in the adoption process.<br>
              Upon submission, our rehomers will get in touch with you via email.
            </h5>
            
            <div v-for="question in questions">
              <h4 v-if="question.is_header === 1 || question.is_header === '1'" class="adoption-form-header">@{{ question.content }}</h4>
              
              <div v-else class="form-group">
                <label class="control-label">@{{ question.content }} <span class="required">*</span></label>
                <input type="text" v-model="answers['answer-'+question.question_id]" :name="'answer-'+question.question_id" class="form-control">
  
                <span class="help-block error" v-if="required.indexOf('answer-'+question.question_id) >= 0">
                  Required
                </span>
              </div>
            </div>
            
            <div class="row mt-20">
              <div class="col-md-12 text-center">
                <button type="submit" class="theme_button" :disabled="loading">
                  <span class="glyphicon glyphicon-refresh glyphicon-refresh-animate" v-if="loading"></span>
                  @{{ loading ? "Processing" : "I want to adopt" }}
                </button>
  
                <div class="alert alert-danger mt-10" v-show="required.length > 0">
                  There were some errors, please check the form
                </div>
                <div class="alert alert-success mt-10" v-show="success">
                  Thank you, our rehomers will get in touch with you via email.
                </div>
              </div>
            </div>
          </form>
      </div>
    </div>
  </div>
@endsection

@section('css')
  <style>
    label {
      line-height: normal;
    }
    
    .form-group {
      margin-bottom: 5px;
    }
  </style>
@endsection

@section('script')
  <script>
    var vm = new Vue({
      el: "#app",
      data: {
        success: false,
        loading: false,
        application_token: '{{ $application_token }}',
        adoption_form: {!! json_encode($adoption_form) !!},
        questions: {!! json_encode($questions) !!},
        answers: {!! json_encode($answers) !!},
        base_url: '{{ url('/') }}',
        required: [],
      },
      methods: {
        onSubmit() {
          this.required = [];
          for (var key in this.answers) {
            if (this.answers.hasOwnProperty(key)) {
              //console.log(key + ' = '  + this.answers[key]);
              if (this.answers[key] === '') {
                this.required.push(key);
              }
            }
          }
          if (this.required.length >= 1) {
            return;
          }
  
          this.loading = true;
          
          axios.post(this.base_url+'/api/adoption-form/save-application/'+this.application_token, this.answers)
            .then(this.onSuccess)
            .catch(this.onError);
        },
        onSuccess() {
          this.loading = false;
          this.success = true;
        }
      },
    })
  </script>
@endsection