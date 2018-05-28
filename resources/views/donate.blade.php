@extends("template")

@section("content")
  <div id="app" class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="vertical-item content-overlap">
          <div class="item-media">
            <img src="{{ asset("assets/images/donate-banner.jpg") }}" alt="" />
          </div>
          <div class="item-content with_padding_big with_border theme_background fontsize_18">
            <i class="fa fa-heart highlight top_icon" aria-hidden="true"></i>
            {{--<p class="text-center grey">You are donating for the project:</p>--}}
            <h3 class="entry-title black text-center">Donate</h3>
            <form method="post" action="" class="donate-form">
              {{ csrf_field() }}
              <div class="form-horizontal">
                <div class="form-group mt-10">
                  <label for="name" class="col-sm-2 control-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" id="name" class="form-control" autofocus="autofocus">
                  </div>
                </div>
                <div class="form-group">
                  <label for="email" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" name="email" id="email" class="form-control" id="email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="mobile" class="col-sm-2 control-label">Mobile</label>
                  <div class="col-sm-10">
                    <input type="text" name="mobile" id="mobile" class="form-control" id="mobile">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="mobile" class="col-sm-2 control-label">Amount</label>
                  <div class="col-sm-10">
                    <div class="btn-group" data-toggle="buttons">
                      <label class="btn btn-primary" @click="custom_amount = false">
                        <input type="radio" name="amount" value="10"> $10
                      </label>
                      <label class="btn btn-primary" @click="custom_amount = false">
                        <input type="radio" name="amount" value="20"> $20
                      </label>
                      <label class="btn btn-primary" @click="custom_amount = false">
                        <input type="radio" name="amount" value="50"> $50
                      </label>
                      <label class="btn btn-primary" @click="custom_amount = true">
                        <input type="radio" name="amount" value="custom"> Custom Amount
                      </label>
                      
                      <input type="text" name="custom_amount" v-if="custom_amount == true" class="form-control">
                    </div>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="mobile" class="col-sm-2 control-label">Payment Method</label>
                  <div class="col-sm-10">
                    <div class="btn-group" data-toggle="buttons">
                      <label class="btn btn-primary" @click="payment_method = 'paynow'">
                        <input type="radio" name="payment_method" value="paynow"> PayNow
                      </label>
                      <label class="btn btn-primary" @click="payment_method = 'giro'">
                        <input type="radio" name="payment_method" value="giro"> Giro
                      </label>
                      <label class="btn btn-primary" @click="payment_method = 'banktransfer'">
                        <input type="radio" name="payment_method" value="banktransfer"> Bank Transfer
                      </label>
                      <label class="btn btn-primary" @click="payment_method = 'cheque'">
                        <input type="radio" name="payment_method" value="cheque"> Cheque
                      </label>
                      <label class="btn btn-primary" @click="payment_method = 'paypal'">
                        <input type="radio" name="payment_method" value="paypal"> PayPal
                      </label>
                    </div>
                  </div>
                </div>
                
                <div class="form-group">
                  <div v-if="payment_method == 'cheque'" class="col-sm-offset-2 col-sm-10">
                    Please make the cheque payable to:<br>
                    Action For Singapore Dogs Society
                    <br><br>
                    And send to:<br>
                    ASD c/o Ricky Yeo<br>
                    3 Jambol Place, Singapore 119330
                  </div>
                  <div v-if="payment_method == 'banktransfer'" class="col-sm-offset-2 col-sm-10">
                    Please transfer to:<br>
                    Bank: OCBC<br>
                    Account No: 650322456001<br>
                    Account Name: Action For Singapore Dogs Society<br>
                    Branch Code: 650<br>
                    Bank Code: 7339
                  </div>
                  <div v-if="payment_method == 'paypal'" class="col-sm-offset-2 col-sm-10">
                    You will be redirected to PayPal upon submission
                  </div>
                  <div v-if="payment_method == 'giro'" class="col-sm-offset-2 col-sm-10">
                    GIRO is the convenient and hassle free way of contributing every monthly automatically.<br>
                    Please download this <a href="{{asset("assets/pdf/action-for-singapore-dogs-donate-giro-form.pdf")}}" target="_blank">form</a>, print it out, fill it up and send it to the address stated on the form.<br>
                    <i>(Please note the minimum sum is $10)</i>
                  </div>
                  <div v-if="payment_method == 'paynow'" class="col-sm-offset-2 col-sm-10">
                    Please PayNow to:<br>
                    9123 4567
                  </div>
                </div>
  
                <div class="form-group" v-if="needRefNo">
                  <label for="mobile" class="col-sm-2 control-label">Reference No</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>
  
                <div class="form-group" >
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="theme_button">
                      Submit
                    </button>
                  </div>
                </div>

              </div>
            </form>
          
          </div>
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
        custom_amount: false,
        payment_method: "",
      },
      computed: {
        needRefNo: function() {
          return this.payment_method == 'banktransfer' || this.payment_method == 'cheque' || this.payment_method == "paynow";
        }
      },
      methods: {
      }
    });
  </script>
@endsection