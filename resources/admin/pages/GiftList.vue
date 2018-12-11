<template>
  <single-portlet title="Gifts" create_link="gift/save">
    <div class="table-responsive">
      <table class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>Name</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Image</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="gift in gifts">
          <td>
            <router-link :to="'/gift/save/'+gift.gift_id">
              {{ gift.name }}
            </router-link>
          </td>
          <td>${{ gift.price }}</td>
          <td>{{ gift.quantity }}</td>
          <td>
              <img :src="'assets/images/gifts/'+gift.image" style="max-height: 70px">
          </td>
        </tr>
        </tbody>
      </table>
    </div>
  </single-portlet>
</template>

<script>
  import axios from 'axios'

  export default {
    name: "GiftShopList",
    data() {
      return {
        gifts: {},
        gift_stats: {}
      }
    },
    created() {
      axios.get('api/gift')
        .then(response=>{
          this.gifts = response.data.gifts;
          this.gift_stats = response.data.gift_stats;
        })
    }
  }
</script>

<style scoped>

</style>