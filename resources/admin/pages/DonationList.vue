<template>
  <single-portlet title="Donations">
    <div class="table-responsive">
      <table class="table table-bordered table-hover">
        <thead>
        <tr>
          <th width="80px">Status</th>
          <th>Name</th>
          <th width="100px">Amount</th>
          <th width="150px">Payment Method</th>
          <th>Donated On</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="donation in donations">
          <td>{{ donation_stats[donation.stat] }}</td>
          <td>
            <router-link v-bind:to="'/donation/'+donation.donation_id">{{ donation.name }}</router-link>
          </td>
          <td>{{ donation.amount | formatNumber }}</td>
          <td>{{ payment_methods[donation.payment_method] }}</td>
          <td>{{ donation.donated_on | formatDate}}</td>
        </tr>
        </tbody>
      </table>
    </div>
  </single-portlet>
</template>

<script>
  import axios from 'axios'

  export default {
    name: "DonationList",
    data() {
      return {
        donations: {},
        donation_stats: {}
      }
    },
    created() {
      axios.get('api/donation')
        .then(response=>{
          this.donations = response.data.donations;
          this.payment_methods = response.data.payment_methods;
          this.donation_stats = response.data.donation_stats;
        })
    }
  }
</script>