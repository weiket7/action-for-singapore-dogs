<template>
  <div id="app" class="container content">
    <div class="row">
      <div class="col-sm-12">
        <div itemscope="" class="product type-product row columns_padding_25">

          <div class="col-sm-6">
            <div class="images">
              <img :src="'assets/images/adopts/' + adopt.image" class="attachment-shop_single wp-post-image" alt="" title="">
            </div>
          </div>

          <div class="summary entry-summary col-sm-6">
            <h1 itemprop="name" class="product_title entry-title black">{{ adopt.name }}</h1>

            <p>
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

            <div itemprop="description">
              <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis um voluptatum deleniti atque orrupti quos dolores et quas molestias. Excepturi sint occaecati cupiditate.</p>
            </div>

            <ul class="nav nav-tabs" role="tablist">
              <li class="active"><a href="#tab1" role="tab" data-toggle="tab">Adopt</a></li>
              <li><a href="#tab2" role="tab" data-toggle="tab">Sponsor</a></li>
            </ul>

            <div class="tab-content">
              <div class="tab-pane fade in active" id="tab1">
                <form class="form-horizontal" method="post">
                  Would you like to adopt {{ adopt.name }}? Click this
                  <i class="fa fa-heart fa-2x"></i> to add {{ adopt.gender == 'M' ? "him" : "her"}}
                  to your Likes list.
                  <br><br>

                  When you are ready, go to your <router-link :to="'/i-want-to-adopt'">Likes</router-link> list
                  to fill in the adoption form.
                </form>
              </div>
              <div class="tab-pane fade" id="tab2">
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                  consequat.
                </p>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est, enim saepe libero iure tenetur optio nisi aliquam molestias ratione magnam ab ut quod possimus hic suscipit doloremque, deleniti ipsa quia!</p>
              </div>
            </div>

            <p class="topmargin_20">
              <span class="rightpadding_20 fontsize_18 grey">Share:</span>
              <span class="small-icons">
					<a href="#" class="social-icon color-icon bg-icon rounded-icon soc-facebook"></a>
					<a href="#" class="social-icon color-icon bg-icon rounded-icon soc-twitter"></a>
				</span>
            </p>

          </div>
        </div>
        <!-- .product.row -->
      </div>
    </div>
  </div>
</template>

<script>
  import axios from 'axios'

  export default {
    name: "AdoptView",
    data() {
      return {
        adopt: {}
      }
    },
    created: function() {
      console.log(this.$route);
      axios.get('api/adopt/slug/'+this.$route.params.slug)
        .then(response => {
          this.adopt = response.data;
        })
        .catch(error => { console.log(error); })
    }
  }
</script>

<style scoped>

</style>