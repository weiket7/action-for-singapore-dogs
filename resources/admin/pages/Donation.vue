<template>
  <single-portlet title="Donation">
    <form @submit.prevent="onSubmit()" class="m-form m-form--fit m-form--label-align-right" >
      <form-row>
        <label-component>Name</label-component>
        <textbox-component v-model="donation.name"></textbox-component>

        <label-component>Status</label-component>
        <radio-component v-model="donation.stat" :options="donation_stats"></radio-component>
      </form-row>

      <form-row>
        <label-component>Mobile</label-component>
        <textbox-component v-model="donation.mobile"></textbox-component>

        <label-component>Email</label-component>
        <textbox-component v-model="donation.email"></textbox-component>
      </form-row>

      <form-row>
        <label-component>Amount</label-component>
        <textbox-component v-model="donation.amount"></textbox-component>

        <label-component>Payment Method</label-component>
        <radio-component v-model="donation.payment_method" :options="payment_methods"></radio-component>
      </form-row>

      <form-footer></form-footer>
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
      }
    },
    created() {
      axios.get("api/donation/get/" + this.$route.params.donation_id)
        .then(response => {
          this.donation = response.data.donation;
          this.donation_stats = response.data.donation_stats;
          this.payment_methods = response.data.payment_methods;
        })
        .catch(error => { console.log(error); });
    }

  }
</script>

<style scoped>

</style>