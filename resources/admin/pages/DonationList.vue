<template>
  <single-portlet title="Donations">
    <div class="m-loader m-loader--lg" style="width: 30px; display: inline-block;" v-if="loading"></div>
    <div class="table-responsive" v-else>
      <table class="table table-bordered table-hover">
        <thead>
        <tr>
          <th width="80px">Status</th>
          <th width="150px">Name</th>
          <th width="200px">Email</th>
          <th width="80px">Amount</th>
          <th width="150px">Payment Method</th>
          <th>Donated On</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="donation in donations">
          <td>{{ donation_stats[donation.stat] }}</td>
          <td>
            <router-link v-bind:to="'/donation/save/'+donation.donation_id">{{ donation.name }}</router-link>
          </td>
          <td>{{ donation.email }}</td>
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
        donation_stats: {},
        loading: true,
      }
    },
    created() {
      axios.get('api/donation')
        .then(response=>{
          this.donations = response.data.donations;
          this.payment_methods = response.data.payment_methods;
          this.donation_stats = response.data.donation_stats;
          this.loading = false;
        })
    }
  }
</script>