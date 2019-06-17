@extends('template')

@section('content')
  <div class="container content">
    <div class="row">
      <div class="col-md-12">
          <form id="form" method="post" action="">
            {{ csrf_field() }}
            
            <h3 class="text-center">
              @if(isset($submitted) == false)
                Thank you for your interest in adopting
              @else
                Thank you, our rehomers will get in touch with you via email.
              @endif
            </h3>
  
            @if(isset($submitted) == false)
              <h5 class="text-center">
                Please fill in the short form below to share some information with us so that we can assist you in the adoption process.<br>
                Upon submission, our rehomers will get in touch with you via email.
              </h5>
            @endif

          <?php $question_no = 1; ?>
          @foreach($questions as $question)
              @if($question->is_header == 1)
                <h4 class="adoption-form-header">{{ $question->content }}</h4>
              @endif
  
              <div v-else class="form-group">
                <label class="control-label"><b>{{ $question_no }}. {{ $question->content }} <span class="required">*</span></b></label>
                  
                  @if(isset($submitted))
                    <br>{{ $answers[$question->question_id] ?? "" }}
                  @else
                    <input type="text" name="answer-{{$question->question_id}}" data-question_id="{{ $question->question_id }}" maxlength="500" class="form-control">
                  @endif
                
                  <span class="help-block error" id="required-{{ $question->question_id }}" style="display:none">
                    Required
                  </span>
              </div>
              <?php $question_no++; ?>
            @endforeach
  
            @if(isset($submitted) == false)
              <div class="row mt-20">
                <div class="col-md-12 text-center">
                  <button id="btn-submit" type="button" class="theme_button" onclick="submitApplication()">
                    <span id="icon-processing" class="glyphicon glyphicon-refresh glyphicon-refresh-animate" style="display:none"></span>
                    Submit
                  </button>
                  
                  <div id="message-error" class="alert alert-danger mt-10" style="display:none">
                    There were some errors, please check the form
                  </div>
                </div>
              </div>
            @endif
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
    function submitApplication() {
      let empty_field = false;
      
      $(".form-control").each(function() {
        let question_id = $(this).data('question_id');
        if($(this).val() == "") {
          $("#required-"+question_id).show();
          empty_field = true;
        } else {
          $("#required-"+question_id).hide();
        }
      });
    
      if (empty_field) {
        $("#message-error").show();
        return;
      } else {
        $("#message-error").hide();
      }
  
      $("#icon-processing").show();
      $("#btn-submit").prop('disabled', true);
  
      $("#form").submit();

    }
  </script>
@endsection