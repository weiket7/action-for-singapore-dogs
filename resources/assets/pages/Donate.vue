<template>
  <div id="app" class="container content">
    <div class="row">
      <div class="col-sm-12">
        <div class="vertical-item content-overlap">
          <div class="item-media">
            <img src="assets/images/donate-banner.jpg" alt="" />
          </div>
          <div class="item-content with_padding_big with_border theme_background fontsize_18">
            <i class="fa fa-heart highlight top_icon" aria-hidden="true"></i>
            <!--<p class="text-center grey">You are donating for the project:</p>-->
            <h1 class="entry-title black text-center">Donate</h1>
            <form @submit.prevent="onSubmit()" method="post" action="" class="donate-form">
              <div class="form-horizontal">
                <div class="form-group mt-10">
                  <label for="name" class="col-sm-3 control-label">Name <span class="required">*</span></label>
                  <div class="col-sm-9">
                    <input type="text" v-model="donation.name" id="name" class="form-control" autofocus="autofocus">
                    <span class="help-block error" v-if="errors.get('name')">
                      {{ errors.get('name') }}
                    </span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="email" class="col-sm-3 control-label">Email <span class="required">*</span></label>
                  <div class="col-sm-9">
                    <input type="email" v-model="donation.email" id="email" class="form-control">
                    <span class="help-block error" v-if="errors.get('email')">
                      {{ errors.get('email') }}
                    </span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="mobile" class="col-sm-3 control-label">Mobile <span class="required">*</span></label>
                  <div class="col-sm-9">
                    <input type="text" v-model="donation.mobile" id="mobile" class="form-control">
                    <span class="help-block error" v-if="errors.get('mobile')">
                      {{ errors.get('mobile') }}
                    </span>
                  </div>
                </div>

                <div class="form-group">
                  <label for="mobile" class="col-sm-3 control-label">Amount <span class="required">*</span></label>
                  <div class="col-sm-9">
                    <div class="btn-group" data-toggle="buttons">
                      <label class="btn btn-primary" @click="chooseAmount(10)">
                        <input type="radio" name="amount" value="10"> $10
                      </label>
                      <label class="btn btn-primary" @click="chooseAmount(20)">
                        <input type="radio" name="amount" value="20"> $20
                      </label>
                      <label class="btn btn-primary" @click="chooseAmount(50)">
                        <input type="radio" name="amount" value="50"> $50
                      </label>
                      <label class="btn btn-primary" @click="chooseAmount(100)">
                        <input type="radio" name="amount" value="50"> $100
                      </label>
                      <label class="btn btn-primary" @click="customAmount()">
                        <input type="radio" v-model="donation.amount" name="amount" value="custom"> Custom Amount
                      </label>
                    </div>
                    <span class="help-block error" v-if="errors.get('amount')">
                      {{ errors.get('amount') }}
                    </span>

                    <div v-if="custom_amount == true">
                      <input type="text" v-model="donation.amount" class="form-control">
                      (Minimum $10)
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="mobile" class="col-sm-3 control-label">Payment Method <span class="required">*</span></label>
                  <div class="col-sm-9">
                    <div class="btn-group" data-toggle="buttons">
                      <label class="btn btn-primary" @click="donation.payment_method = 'paynow'">
                        <input type="radio" name="payment_method" value="paynow"> PayNow
                      </label>
                      <label class="btn btn-primary" @click="donation.payment_method = 'giro'">
                        <input type="radio" name="payment_method" value="giro"> Giro
                      </label>
                      <label class="btn btn-primary" @click="donation.payment_method = 'banktransfer'">
                        <input type="radio" name="payment_method" value="banktransfer"> Bank Transfer
                      </label>
                      <label class="btn btn-primary" @click="donation.payment_method = 'cheque'">
                        <input type="radio" name="payment_method" value="cheque"> Cheque
                      </label>
                      <label class="btn btn-primary" @click="donation.payment_method = 'paypal'">
                        <input type="radio" name="payment_method" value="paypal"> PayPal
                      </label>
                    </div>

                    <span class="help-block error" v-if="errors.get('payment_method')">
                      {{ errors.get('payment_method') }}
                    </span>
                  </div>
                </div>

                <div class="form-group">
                  <div v-if="donation.payment_method == 'cheque'" class="col-sm-offset-3 col-sm-9">
                    Please make the cheque payable to:<br>
                    Action For Singapore Dogs Society
                    <br><br>
                    And send to:<br>
                    ASD c/o Ricky Yeo<br>
                    3 Jambol Place, Singapore 119330
                  </div>
                  <div v-if="donation.payment_method == 'banktransfer'" class="col-sm-offset-3 col-sm-9">
                    Please transfer to:<br>
                    Bank: OCBC<br>
                    Account No: 650322456001<br>
                    Account Name: Action For Singapore Dogs Society<br>
                    Branch Code: 650<br>
                    Bank Code: 7339
                  </div>
                  <div v-if="donation.payment_method == 'paypal'" class="col-sm-offset-3 col-sm-9">
                    You will be redirected to PayPal upon submission
                  </div>
                  <div v-if="donation.payment_method == 'giro'" class="col-sm-offset-3 col-sm-9">
                    GIRO is the convenient and hassle free way of contributing every monthly automatically.<br>
                    Please download this <a href="assets/pdf/action-for-singapore-dogs-donate-giro-form.pdf" target="_blank">form</a>, print it out, fill it up and send it to the address stated on the form.<br>
                    <i>(Please note the minimum sum is $10)</i>
                  </div>
                  <div v-if="donation.payment_method == 'paynow'" class="col-sm-offset-3 col-sm-9">
                    Please PayNow to:<br>
                    9123 4567
                  </div>
                </div>

                <div class="form-group" v-show="needRefNo">
                  <label for="ref_no" class="col-sm-3 control-label">Reference No <span class="required">*</span></label>
                  <div class="col-sm-9">
                    <input type="text" id="ref_no" v-model="donation.ref_no" class="form-control">
                    <span class="help-block error" v-if="errors.get('ref_no')">
                      {{ errors.get('ref_no') }}
                    </span>
                  </div>
                </div>

                <div class="form-group" v-show="showTransferDate">
                  <label for="transfer_date" class="col-sm-3 control-label">Transfer Date</label>
                  <div class="col-sm-9">
                    <input type="text" id="transfer_date" :value="default_date" class="form-control datepicker" readonly>
                  </div>
                </div>

                <div class="form-group" >
                  <div class="col-sm-offset-3 col-sm-9">
                    <button type="submit" class="theme_button">
                      Submit
                    </button>

                    <div class="alert alert-success mt-10" v-show="success">
                      Thank you for your donation
                    </div>
                    <div class="alert alert-danger mt-10" v-show="errors.any()">
                      There were some errors, please check the form
                    </div>
                  </div>
                </div>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import axios from 'axios';
  import moment from 'moment';
  import Errors from '../../common/errors';

  export default {
    name: "Donate",
    data() {
      return {
        custom_amount: false,
        default_date: moment().format("DD MMM YYYY"),
        donation: { payment_method: "" },
        success: false,
        errors: new Errors()
      }
    },
    methods: {
      chooseAmount(amount) {
        this.donation.amount = amount;
        this.custom_amount = false;
      },
      customAmount() {
        this.custom_amount = true;
      },
      updateTransferDate(date) {
        this.donation.transfer_date = date;
      },
      onSubmit() {
        axios.post('api/donation/form', this.donation)
          .then(this.onSuccess)
          .catch(this.onError);
      },
      onSuccess(response) {
        this.success = true;
        this.errors = new Errors();
      },
      onError(error) {
        this.success = false;
        this.errors.record(error.response.data.errors);
      },
    },
    computed: {
      needRefNo: function() {
        return this.donation.payment_method == 'banktransfer' || this.donation.payment_method == 'cheque' || this.donation.payment_method == "paynow";
      },
      showTransferDate: function() {
        return this.donation.payment_method != "giro";
      }
    },
    mounted() {
      let vue = this
      $(".datepicker").datepicker({
        dateFormat: 'd M yy',
        onSelect: function(value, date) {
          vue.updateTransferDate(moment(value, 'DD MMM YYYY').format('YYYY-MM-DD'));
        }
      });
    }
  }
</script>

<style scoped>

</style>