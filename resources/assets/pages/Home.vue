<template>
  <div>
    <div class="container content">
      <div class="row">
        <div class="col-md-8">
          <div class="bxslider">
            <div v-for="banner in banners">
              <router-link :to="'/'+banner.url" v-if="banner.url">
                <img :src="'assets/images/banners/'+banner.image" :title="banner.name">
              </router-link>
              <img :src="'assets/images/banners/'+banner.image" :title="banner.name" v-else>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <h2 class="section_header bold">Events</h2>
          <h4 class="entry-title">
            Basic Obedience Class
          </h4>

          <p class="event-detail">
            Our Basic Obedience Foundation Class incorporate the Amichien Bonding (TM) principles which are the foundation of your relationship with your dog.
            <br><br>
            <i aria-hidden="true" class="fa fa-map-marker"></i>
            Bishan Park II
            <br> <i aria-hidden="true" class="fa fa-calendar-check-o"></i>
            15 Jun 2018
            <br> <i aria-hidden="true" class="fa fa-clock"></i> 4.30 pm to 6.00pm (1.5hrs)
            <span><br><i aria-hidden="true" class="fas fa-ruler-horizontal"></i> 6 weeks, every Sunday
                  </span> <span><br><i aria-hidden="true" class="fa fa-dollar-sign"></i> 350
                  </span></p>
        </div>
      </div>
    </div>

    <section id="how-you-can-help" style="background-color:#f2f2f2" class="pt-30 mt-30">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1 text-center">
            <h2 class="section_header bold">
              How you can help
            </h2>
          </div>
        </div>
        <div class="row columns_margin_bottom_30 columns_margin_top_0">
          <div class="col-md-4 col-sm-6">
            <article class="vertical-item">
              <div class="item-content">
                <h3 class="entry-title">
                  <router-link :to="'/dogs-for-adoption'" class="bold">ADOPT</router-link>
                </h3>
                <p>
                  At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis um voluptatum deleniti atque
                </p>
                <p class="topmargin_30">
                  <router-link :to="'/dogs-for-adoption'" class="theme_button">View Dogs for Adoption</router-link>
                </p>
              </div>
            </article>
          </div>

          <div class="col-md-4 col-sm-6">
            <article class="vertical-item">
              <div class="item-content">
                <h3 class="entry-title">
                  <router-link :to="'/donate'" class="bold">Donate</router-link>
                </h3>
                <p>
                  At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis um voluptatum deleniti atque
                </p>
                <p class="topmargin_30">
                  <router-link :to="'/donate'" class="theme_button">Make a Donation</router-link>
                </p>
              </div>
            </article>
          </div>

          <div class="col-md-4 col-sm-6 col-sm-offset-3 col-md-offset-0">
            <article class="vertical-item">
              <div class="item-content">
                <h3 class="entry-title">
                  <router-link :to="'/volunteer'" class="bold">Volunteer</router-link>
                </h3>
                <p>
                  At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis um voluptatum deleniti atque
                </p>
                <p class="topmargin_30">
                  <router-link :to="'/volunteer'" class="theme_button">Be a Volunteer</router-link>
                </p>
              </div>
            </article>
          </div>
        </div>
      </div>
    </section>

    <section id="dogs-for-adoption" class="mt-30 mb-30">
      <div class="container">
        <div class="row">
          <h2 class="section_header bold text-center">
            <span class="">Dogs for Adoption</span>
          </h2>
        </div>
        <div class="row">
          <div class="visible-lg visible-md">
            <div class="bxslider">
              <div v-for="chunk in adopts_desktop" class="row bxslider-row">
                <div v-for="adopt in chunk" class="col-md-3">
                  <adopt-item :adopt="adopt" :key="adopt.adopt_id"></adopt-item>
                </div>
              </div>
            </div>
          </div>

          <div class="hidden-lg hidden-md">
            <div class="bxslider">
              <div v-for="chunk in adopts_mobile" class="row bxslider-row">
                <div v-for="adopt in chunk" class="col-xs-6">
                  <adopt-item :adopt="adopt" :key="adopt.adopt_id"></adopt-item>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-12 text-center">
            <a href="#/adopt/Kodomo" class="theme_button btn-view-adoption margin_0">View Dogs for Adoption</a>
          </div>
        </div>
      </div>
    </section>

    <section id="what-we-do" style="background-color:#f2f2f2" class="pt-30">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1 text-center">
            <h2 class="section_header bold">
              what we do
            </h2>
          </div>
        </div>
        <div class="row columns_margin_bottom_30 columns_margin_top_0">
          <div class="col-md-4 col-sm-6">
            <article class="vertical-item">
              <div class="item-content">
                <h3 class="entry-title">
                  <router-link :to="'/coming-soon'" class="bold">Rescue</router-link>
                </h3>
                <p>
                  At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis um voluptatum deleniti atque
                </p>
                <p class="topmargin_30">
                  <router-link :to="'/coming-soon'" class="theme_button inverse">Learn More</router-link>
                </p>
              </div>
            </article>
          </div>

          <div class="col-md-4 col-sm-6">
            <article class="vertical-item">
              <div class="item-content">
                <h3 class="entry-title">
                  <router-link :to="'/coming-soon'" class="bold">Rehabilitate</router-link>
                </h3>
                <p>
                  At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis um voluptatum deleniti atque
                </p>
                <p class="topmargin_30">
                  <router-link :to="'/coming-soon'" class="theme_button inverse">Learn More</router-link>
                </p>
              </div>
            </article>
          </div>

          <div class="col-md-4 col-sm-6 col-sm-offset-3 col-md-offset-0">
            <article class="vertical-item">
              <div class="item-content">
                <h3 class="entry-title">
                  <router-link :to="'/coming-soon'" class="bold">Rehome</router-link>
                </h3>
                <p>
                  At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis um voluptatum deleniti atque
                </p>
                <p class="topmargin_30">
                  <router-link :to="'/coming-soon'" class="theme_button inverse">Learn More</router-link>
                </p>
              </div>
            </article>
          </div>
        </div>
      </div>
    </section>

    <!--<section id="about" class="cs section_padding_0 columns_padding_0 columns_margin_0">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4 col-sm-6 after_cover color_bg_1 light bg_teaser text-center">
            <div class="toppadding_60 bottompadding_60 inline-block text-left">
              <h2 class="bold">.01 Donator</h2>
              <a href="careers.html" class="theme_button inverse">Learn more</a>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 after_cover color_bg_1 medium bg_teaser text-center">
            <div class="toppadding_60 bottompadding_60 inline-block text-left">
              <h2 class="bold">.02 Volunteer</h2>
              <a href="careers.html" class="theme_button inverse">Learn more</a>
            </div>
          </div>
          <div class="col-md-4 col-sm-12 after_cover color_bg_1 darken bg_teaser text-center">
            <div class="toppadding_60 bottompadding_60 inline-block text-left">
              <h2 class="bold">.03 Adopter</h2>
              <a href="careers.html" class="theme_button inverse">Learn more</a>
            </div>
          </div>
        </div>
      </div>
    </section>-->

    <!--<section class="ds page_video parallax section_padding_100 table_section table_section_md columns_padding_0 columns_margin_0">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-md-push-6">
            <div class="embed-responsive embed-responsive-2by1 topmargin_20">
              <a href="https://www.youtube.com/embed/xKxrkht7CpY" class="embed-placeholder">
                <img src="images/video.jpg" alt="">
              </a>
            </div>
          </div>
          <div class="col-md-6 col-md-pull-6">
            <div class="with_padding_big with_border thick_border right-offset">
              <h2 class="section_header">
                <strong>135 dogs for adoption</strong>
              </h2>
              <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
              <p class="inline-vertical-center">

                <a href="donation.html" class="theme_button wide_button inverse2 margin_0">Dogs for Adoption</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>-->
  </div>

</template>

<script>
  import AdoptItem from "../components/AdoptItem";
  import axios from 'axios'
  import chunk from 'lodash.chunk';
  import Adopt from "./Adopt";

  export default {
    components: {
      Adopt,
      AdoptItem
    },
    name: "home",
    data() {
      return {
        adopts_desktop: {},
        adopts_mobile: {},
        banners: {}
      }
    },
    mounted() {
      axios.get('api/home')
        .then(response => {
          this.banners = response.data.banners;
          let adopts = response.data.adopts;
          this.num_of_adopts = Object.keys(adopts).length;
          this.adopts_desktop = chunk(adopts, 4);
          this.adopts_mobile = chunk(adopts, 2);

          this.$nextTick(function() {
            $('.bxslider').bxSlider();
          });
        })
        .catch(error => { console.log(error); })
    }
  }
</script>

<style scoped>
  .bxslider-row {
    margin-left: 0;
    margin-right: 0;
  }
  .btn-view-adoption {
    padding: 15px;
    font-size: 20px;
  }
</style>