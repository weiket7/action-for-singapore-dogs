<template>
  <single-portlet title="Donation">
    <form @submit.prevent="onSubmit()" class="m-form m-form--fit m-form--label-align-right" >
      <form-row>
        <label-component required>Name</label-component>
        <textbox-component v-model="donation.name"></textbox-component>

        <label-component required>Status</label-component>
        <radio-component v-model="donation.stat" :options="donation_stats"></radio-component>
      </form-row>

      <form-row>
        <label-component required>Mobile</label-component>
        <textbox-component v-model="donation.mobile"></textbox-component>

        <label-component required>Email</label-component>
        <textbox-component v-model="donation.email"></textbox-component>
      </form-row>

      <form-row>
        <label-component required>Amount</label-component>
        <textbox-component v-model="donation.amount"></textbox-component>

        <label-component required>Payment Method</label-component>
        <radio-component v-model="donation.payment_method" :options="payment_methods"></radio-component>
      </form-row>

      <form-row>
        <label-component v-show="showRefNo">Ref No</label-component>
        <textbox-component v-model="donation.ref_no" v-show="showRefNo"></textbox-component>

        <label-component v-show="showTransferDate">Transfer Date</label-component>
        <datepicker-component name="transfer_date" v-model="donation.transfer_date" :error="errors.get('transfer_date')" v-if="loaded && showTransferDate"></datepicker-component>
      </form-row>
  
      <form-footer>
        <button type="submit" class="btn btn-success">Save</button>
        <button type="button" class="btn btn-danger" data-toggle="confirmation">Delete</button>
      </form-footer>
    </form>
  </single-portlet>
</template>

<script>
  import axios from 'axios'
  import Errors from "../../common/errors";

  export default {
    name: "Donation",
    data() {
      return {
        donation: {},
        donation_stats: [],
        payment_methods: [],
        errors: new Errors(),
        loaded: false,
      }
    },
    methods: {
      onSubmit() {
        let url = 'api/donation/save';
        if (!this.is_create) {
          url += '/'+ this.$route.params.donation_id
        }

        axios.post(url, this.donation)
          .then(this.onSuccess)
          .catch(this.onError);
      },
      onSuccess(response) {
        if (this.is_create) {
          toastr.success("Donation added");
          this.donation.donation_id = response.data;
          this.$router.push('/donation/save/'+this.donation.donation_id);
          return;
        }
        toastr.success("Donation updated");
      },
      deleteDonation() {
        axios.post('api/donation/delete/'+this.$route.params.donation_id)
          .then(response => {
            toastr.success("Donation deleted");
            this.$router.push('/donation');
          })
          .catch(this.onError);
      }
    },
    computed: {
      showRefNo: function() {
        return this.donation.payment_method == 'B' || this.donation.payment_method == 'Q' || this.donation.payment_method == "N";
      },
      showTransferDate: function() {
        return this.donation.payment_method == 'B' || this.donation.payment_method == 'Q' || this.donation.payment_method == "N";
      }
    },
    created() {
      axios.get("api/donation/get/" + this.$route.params.donation_id)
        .then(response => {
          this.donation = response.data.donation;
          this.donation_stats = response.data.donation_stats;
          this.payment_methods = response.data.payment_methods;
          this.loaded = true;
        })
        .catch(error => { console.log(error); });
    },
    mounted() {
      let vue = this
      $('[data-toggle=confirmation]').confirmation({
        rootSelector: '[data-toggle=confirmation]',
      }).on("confirmed.bs.confirmation", function() {
        vue.deleteDonation();
      });
    },

  }
</script>

<style scoped>

</style>