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
              <p v-html="adopt.desc">
              </p>
            </div>

            <ul class="nav nav-tabs mt-20" role="tablist">
              <li class="active"><a href="#tab1" role="tab" data-toggle="tab">Adopt</a></li>
              <li><a href="#tab2" role="tab" data-toggle="tab">Sponsor</a></li>
            </ul>

            <div class="tab-content">
              <div class="tab-pane fade in active" id="tab1">
                <form class="form-horizontal" method="post">
                  
                  <span v-if="!hasHeart">
                    Are you interested in adopting {{ adopt.name }}? Click this <i @click="heartAdopt" class="fa fa-heart fa-2x adopt-heart"></i> to add {{ adopt.gender == 'M' ? "him" : "her"}} to your Likes.
                  </span>
                  
                  <span v-else>
                    {{ adopt.name }} is in your Likes. Click this <i @click="heartAdopt" class="fa fa-heart fa-2x adopt-heart highlight"></i> to remove {{ adopt.gender == 'M' ? "him" : "her"}}
                  </span>

                  <br><br>
                  
                  When you are ready, please go to your <router-link :to="'/i-want-to-adopt'">Likes</router-link>
                  to fill in the adoption form.
                </form>
              </div>
              <div class="tab-pane fade" id="tab2">
                <p>
                  You can sponsor {{ adopt.name }} by making a one-time donation using cheque or giro.
                  <br><br>
                  Please download and fill in this <a href="asd-sponsorship-form" target="_blank">sponsorship form</a>.
                  <br><br>
                  Following, please mail it to:<br>
                  3 Jambol Place<br>
                  Singapore 119330
                </p>

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
        adopt: {},
        hearts: [],
      }
    },
    methods: {
      heartAdopt() {
        let index = this.hearts.indexOf(this.adopt.adopt_id);
        if (index >= 0) {
          this.hearts.splice(index, 1);
          this.$emit('unheart-adopt');
        } else {
          this.hearts.push(this.adopt.adopt_id);
          this.$emit('heart-adopt');
        }
        localStorage.setItem('hearts', JSON.stringify(this.hearts));
      },
    },
    computed: {
      hasHeart() {
        return this.hearts.indexOf(this.adopt.adopt_id) >= 0;
      },
    },
    created: function() {
      axios.get('api/adopt/slug/'+this.$route.params.slug)
        .then(response => {
          this.adopt = response.data;
        })
        .catch(error => { console.log(error); })
  
      let hearts = localStorage.getItem('hearts');
      if (hearts != null) {
        this.hearts = JSON.parse(hearts);
      }
    }
  }
</script>

<style scoped>
  .tab-content {
    padding: 15px 15px;
  }
  .adopt-heart {
    cursor: pointer
  }
</style>