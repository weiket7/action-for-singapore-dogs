@extends('template')

@section('content')
  <div id="app" class="container content">
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
            <div class="alert alert-danger mt-10" v-show="error">
              There were some errors, please check the form
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
        adoption_form: {!! json_encode($adoption_form) !!},
        agreement_token: '{{ $agreement_token }}',
        answers: {},
        success: false,
        error: false,
        base_url: '{{ url('/') }}'
      },
      methods: {
        onSubmit() {
          axios.post(this.base_url+'/api/adoption-form/save-agreement/'+this.agreement_token)
            .then(response => {
              this.success = true;
              this.error = false;
            })
            .catch(error => {
              this.error = true;
              this.success = false;
            });
        }
      }
    })
  </script>
@endsection