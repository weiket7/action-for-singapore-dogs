@extends('template')

@section('content')
  <div class="container content">
    <div class="row">
      <div class="col-md-12">
        <div class="text-center">
          <div class="alert alert-danger mt-10" v-if="error">
            Error
          </div>
          
          <form @submit.prevent="onSubmit()" v-else class="form-horizontal">
            <h3>Thank you for your interest in adopting</h3>
            
            <h5>
              Please fill in the short form below to share some information with us so that we can assist you in the adoption process.<br>
              Upon submission, our rehomers will get in touch with you via email.
            </h5>
            
            <div v-for="question in questions">
              <h4 v-if="question.is_header" class="adoption-form-header text-center">@{{ question.content }}</h4>
              
              <div v-else class="form-group">
                <label class="col-sm-4 control-label">@{{ question.content }}</label>
                <div class="col-sm-8">
                  <input type="text" v-model="answers['answer-'+question.question_id]" :name="'answer-'+question.question_id" class="form-control">
                </div>
              </div>
            </div>
            
            <hr>
            
            <div class="row">
              <div class="col-md-12 text-center">
                <button type="submit">I want to adopt</button>
                
                <div class="alert alert-success mt-10" v-show="success">
                  Thank you, our rehomers will get in touch with you via email.
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script>
    var vm = new Vue({
      el: "#app",
      data: {
        success: false,
        error: false,
        application_token: '{{ $application_token }}',
        adoption_form: {!! json_encode($adoption_form) !!},
        questions: {!! json_encode($questions) !!},
        answers: {!! json_encode($answers) !!},
        base_url: '{{ url('/') }}'
      },
      methods: {
        onSubmit() {
          axios.post(this.base_url+'/api/adoption-form/save-application/'+this.application_token, this.answers)
            .then(this.onSuccess)
            .catch(this.onError);
        },
        onSuccess() {
          this.success = true;
        }
      },
    })
  </script>
@endsection