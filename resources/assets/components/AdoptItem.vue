<template>
  <div :class="'col-md-'+col">
    <div class="adopt-grid-border">
      <div class="adopt-grid-image">
        <router-link :to="'adopt/'+adopt.slug">
          <img :src="'assets/images/adopts/'+adopt.image" alt="">
        </router-link>
      </div>
      <h3 class="adopt-grid-name">
        <a :href="'adopt/'+adopt.name">{{ adopt.name }}</a>
      </h3>
      <p class="adopt-grid-content">
        <i v-if="adopt.gender == 'M'" class="fas fa-mars"></i>
        <i v-else class="fas fa-venus"></i>
        <span v-if="adopt.gender == 'M'">Male</span>
        <span v-else>Female</span>
        <br>

        <i class="fas fa-birthday-cake"></i> {{ adopt.age }}
        <br>

        <i class="fas fa-home"></i>
        <span v-if="adopt.hdb">HDB Approved</span>
        <span v-else>Not HDB Approved</span><br>
      </p>
      <div class="row">
        <div class="col-xs-8">
          <router-link :to="'adopt/'+adopt.slug" class="theme_button inverse margin_0">Learn More</router-link>
        </div>
        <div class="col-xs-4 text-right">
          <i class="fas fa-heart fa-2x" :class="{'highlight': highlight}"></i>
        </div>
      </div>
    </div>
    </div>

</template>

<script>
  export default {
    name: "adopt-item",
    props: ['adopt', 'col', 'highlight']
  }
</script>

<style scoped>
  @media (min-width: 768px) {
    .adopt-grid-image {
      height: 200px;
      overflow-y: hidden;
    }
  }
  .adopt-grid-border {
    border: 1px solid #ddd;
    padding: 5px;
  }
  .adopt-grid-name {
    margin-top: 5px;
    margin-bottom: 10px;
  }
  .adopt-grid-content {
    line-height: 24px;
  }
</style>