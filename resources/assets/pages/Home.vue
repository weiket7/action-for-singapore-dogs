<template>
  <div>
    <div class="container mt-30">
      <div class="row">
        <div class="col-md-8">
          <div class="bxslider">
            <div><img :src="'assets/images/dimple.jpg'" title="Funky roots"></div>
            <div><img :src="'assets/images/dimple.jpg'" title="The long and winding road"></div>
            <div><img :src="'assets/images/dimple.jpg'" title="Happy trees"></div>
          </div>
        </div>
        <div class="col-md-4">
          <h2 class="section_header bold">Events</h2>
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
                  <a href="blog-single-right.html" class="highlight">ADOPT</a>
                </h3>
                <p>
                  At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis um voluptatum deleniti atque
                </p>
                <p class="topmargin_30">
                  <a href="blog-single-right.html" class="theme_button inverse">Read more</a>
                </p>
              </div>
            </article>
          </div>

          <div class="col-md-4 col-sm-6">
            <article class="vertical-item">
              <div class="item-content">
                <h3 class="entry-title">
                  <a href="blog-single-right.html" class="highlight">Donate</a>
                </h3>
                <p>
                  At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis um voluptatum deleniti atque
                </p>
                <p class="topmargin_30">
                  <a href="blog-single-right.html" class="theme_button inverse">Read more</a>
                </p>
              </div>
            </article>
          </div>

          <div class="col-md-4 col-sm-6 col-sm-offset-3 col-md-offset-0">
            <article class="vertical-item">
              <div class="item-content">
                <h3 class="entry-title">
                  <a href="blog-single-right.html" class="highlight">Volunteer</a>
                </h3>
                <p>
                  At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis um voluptatum deleniti atque
                </p>
                <p class="topmargin_30">
                  <a href="blog-single-right.html" class="theme_button inverse">Read more</a>
                </p>
              </div>
            </article>
          </div>
        </div>
      </div>
    </section>

    <section id="dogs-for-adoption" class="mt-30">
      <div class="container">
        <div class="row">
          <h2 class="section_header bold text-center">
            <span class="">Dogs for Adoption</span>
          </h2>
        </div>
        <div class="row">
          <div class="visible-lg visible-md">
            <div class="bxslider">
              <div v-for="chunk in adopts" class="row bxslider-row">
                <div v-for="adopt in chunk" class="col-md-3">
                  <adopt-item :adopt="adopt" :key="adopt.adopt_id"></adopt-item>
                </div>
              </div>
            </div>
          </div>

          <div class="hidden-lg hidden-md">
            <div class="bxslider">
              <div class="row bxslider-row">
                <div class="col-xs-6 adopt-grid-border"><div class="adopt-grid-image"><a href="#/adopt/Kodomo" class=""><img src="assets/images/adopts/kodomo.jpg" alt=""></a></div> <h3 class="adopt-grid-name"><a href="adopt/Kodomo">Kodomo</a></h3> <p class="adopt-grid-content"><i class="fas fa-venus"></i> <span data-v-ffd1d23e="">Female</span> <br data-v-ffd1d23e=""> <i class="fas fa-birthday-cake"></i> 12 yrs 1 mth
                  <br data-v-ffd1d23e=""> <i class="fas fa-home"></i> <span data-v-ffd1d23e="">Not HDB Approved</span><br data-v-ffd1d23e=""></p> <a href="#/adopt/Kodomo" class="theme_button inverse margin_0">Learn More</a></div>

                <div class="col-xs-6 adopt-grid-border"><div class="adopt-grid-image"><a href="#/adopt/Kodomo" class=""><img src="assets/images/adopts/kodomo.jpg" alt=""></a></div> <h3 class="adopt-grid-name"><a href="adopt/Kodomo">Kodomo</a></h3> <p class="adopt-grid-content"><i class="fas fa-venus"></i> <span data-v-ffd1d23e="">Female</span> <br data-v-ffd1d23e=""> <i class="fas fa-birthday-cake"></i> 12 yrs 1 mth
                  <br data-v-ffd1d23e=""> <i class="fas fa-home"></i> <span data-v-ffd1d23e="">Not HDB Approved</span><br data-v-ffd1d23e=""></p> <a href="#/adopt/Kodomo" class="theme_button inverse margin_0">Learn More</a></div>
              </div>

              <div class="row bxslider-row">
                <div class="col-xs-6 adopt-grid-border"><div class="adopt-grid-image"><a href="#/adopt/Kodomo" class=""><img src="assets/images/adopts/kodomo.jpg" alt=""></a></div> <h3 class="adopt-grid-name"><a href="adopt/Kodomo">Kodomo</a></h3> <p class="adopt-grid-content"><i class="fas fa-venus"></i> <span data-v-ffd1d23e="">Female</span> <br data-v-ffd1d23e=""> <i class="fas fa-birthday-cake"></i> 12 yrs 1 mth
                  <br data-v-ffd1d23e=""> <i class="fas fa-home"></i> <span data-v-ffd1d23e="">Not HDB Approved</span><br data-v-ffd1d23e=""></p> <a href="#/adopt/Kodomo" class="theme_button inverse margin_0">Learn More</a></div>

                <div class="col-xs-6 adopt-grid-border"><div class="adopt-grid-image"><a href="#/adopt/Kodomo" class=""><img src="assets/images/adopts/kodomo.jpg" alt=""></a></div> <h3 class="adopt-grid-name"><a href="adopt/Kodomo">Kodomo</a></h3> <p class="adopt-grid-content"><i class="fas fa-venus"></i> <span data-v-ffd1d23e="">Female</span> <br data-v-ffd1d23e=""> <i class="fas fa-birthday-cake"></i> 12 yrs 1 mth
                  <br data-v-ffd1d23e=""> <i class="fas fa-home"></i> <span data-v-ffd1d23e="">Not HDB Approved</span><br data-v-ffd1d23e=""></p> <a href="#/adopt/Kodomo" class="theme_button inverse margin_0">Learn More</a></div>
              </div>
            </div>
          </div>

          <div class="col-md-12 text-center">
            <a href="#/adopt/Kodomo" class="theme_button btn-view-adoption margin_0">View All Dog for Adoption</a>
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
                  <a href="blog-single-right.html">Rescue</a>
                </h3>
                <p>
                  At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis um voluptatum deleniti atque
                </p>
                <p class="topmargin_30">
                  <a href="blog-single-right.html" class="theme_button inverse">Read more</a>
                </p>
              </div>
            </article>
          </div>

          <div class="col-md-4 col-sm-6">
            <article class="vertical-item">
              <div class="item-content">
                <h3 class="entry-title">
                  <a href="blog-single-right.html">Rehabilitate</a>
                </h3>
                <p>
                  At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis um voluptatum deleniti atque
                </p>
                <p class="topmargin_30">
                  <a href="blog-single-right.html" class="theme_button inverse">Read more</a>
                </p>
              </div>
            </article>
          </div>

          <div class="col-md-4 col-sm-6 col-sm-offset-3 col-md-offset-0">
            <article class="vertical-item">
              <div class="item-content">
                <h3 class="entry-title">
                  <a href="blog-single-right.html">Rehome</a>
                </h3>
                <p>
                  At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis um voluptatum deleniti atque
                </p>
                <p class="topmargin_30">
                  <a href="blog-single-right.html" class="theme_button inverse">Read more</a>
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
        adopts: {},
      }
    },
    mounted() {

      axios.get('api/adopt/random')
        .then(response => {
          let adopts = response.data;
          this.num_of_adopts = Object.keys(adopts).length;
          this.adopts = chunk(adopts, 4);

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
  .bx-wrapper {
    margin-bottom: 30px;
  }
  .btn-view-adoption {
    padding: 15px;
    font-size: 20px;
  }
</style>