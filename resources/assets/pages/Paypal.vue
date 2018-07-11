<template>
  <div class="container content">
    <h2>Please wait..</h2>

    <form id="paypal-form" name="_xclick" action="https://www.paypal.com/us/cgi-bin/webscr" method="post">
      <input type="hidden" name="cmd" value="_xclick" />
      <input type="hidden" name="business" value="info@asdsingapore.com" />
      <input type="hidden" name="currency_code" value="SGD" />
      <input type="hidden" name="item_name" value="Donation to Action for Singapore Dogs" />
      <input type="hidden" name="amount" :value="amount" />
    </form>
  </div>
</template>

<script>
  export default {
    name: "paypal.vue",
    data() {
      return {
        amount: 10
      }
    },
    mounted() {
      this.amount = this.$route.params.amount;
      document.getElementById("paypal-form").submit();
    }
  }
</script>

<style scoped>

</style>