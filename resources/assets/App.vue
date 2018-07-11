<template>
  <div id="box_wrapper">
    <section class="page_toplogo table_section table_section_md ls">
      <div class="container">
        <div class="row">
          <div class="col-md-4 text-md-left">
            <router-link :to="'/'" class="logo">
              <img src="assets/images/action-for-singapore-dogs-logo.png" alt="" />
            </router-link>
            <!-- header toggler -->
            <span class="toggle_menu">
								<span></span>
							</span>
          </div>
          <div class="col-md-8 text-center text-md-right">
            <div class="media small-teaser">
              <div class="media-left top-email-icon">
                <div class="teaser_icon highlight fontsize_18">
                  <i class="fa fa-envelope"></i>
                </div>
              </div>
              <div class="media-body">
                <div class="visible-lg visible-md">
                  <p>
                    <a href="mailto:info@asdsingapore.com">info@asdsingapore.com</a>
                  </p>
                </div>
                <div class="hidden-lg hidden-md">
                  <h4>
                    <a href="mailto:info@asdsingapore.com">Email</a>
                  </h4>
                </div>
              </div>
            </div>
            
            <router-link :to="'/i-want-to-adopt'" class="media small-teaser top-heart">
              <div class="media-left top-heart-icon">
                <div class="teaser_icon fontsize_18" :class="{'highlight': hearts > 0}">
                  <i class="fa fa-heart fa-2x"></i>
                </div>
              </div>
              <div class="media-body top-heart-number">
                <h4>
                  {{ heart_count }}
                </h4>
              </div>
            </router-link>
            
            <div class="inline-block">
              <a href="https://www.facebook.com/asdsingapore/" target="_blank" class="social-icon border-icon color-icon rounded-icon soc-facebook"></a>
              <a href="https://www.instagram.com/asdsingapore" target="_blank" class="social-icon border-icon color-icon rounded-icon soc-instagram"></a>
            </div>
          
          </div>
        
        </div>
      </div>
    </section>
    
    <header class="page_header header_yellow bordered_items">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 text-center">
            <!-- main nav start -->
            <nav class="mainmenu_wrapper">
              <ul class="mainmenu nav sf-menu">
                <li class="active">
                  <router-link :to="'/'" :data-target="'home'" class="menu-single">Home</router-link>
                </li>
                <li>
                  <a href="#">About</a>
                  <ul>
                    <li>
                      <router-link :to="'/pages/who-we-are'" :data-target="'coming-soon'">Who We Are</router-link>
                    </li>
                    <li>
                      <router-link :to="'/pages/adoption-rescue-centre-arc'" :data-target="'coming-soon'">Adoption & Rescue Centre (ARC)</router-link>
                    </li>
                    <li>
                      <router-link :to="'/pages/boarding-services'" :data-target="'coming-soon'">Boarding Services</router-link>
                    </li>
                    <li>
                      <router-link :to="'/pages/media'" :data-target="'coming-soon'">Media</router-link>
                    </li>
                    <li>
                      <router-link :to="'/pages/dog-listener-academy'" :data-target="'coming-soon'">Dog Listener Academy</router-link>
                    </li>
                  </ul>
                </li>
                
                <li>
                  <a href="#">Adopt</a>
                  <ul>
                    <li>
                      <router-link :to="'/dogs-for-adoption'" :data-target="'adopt'">Dogs for Adoption</router-link>
                    </li>
                    <li>
                      <router-link :to="'/pages/why-adopt-a-dog'" :data-target="'coming-soon'">Why Adopt a Dog</router-link>
                    </li>
                    <li>
                      <router-link :to="'/pages/adoption-procedure'" :data-target="'coming-soon'">Adoption Procedure</router-link>
                    </li>
                    <li>
                      <router-link :to="'/pages/project-adore'" :data-target="'coming-soon'">Project Adore</router-link>
                    </li>
                    <li>
                      <router-link :to="'/pages/gone-to-loving-homes'" :data-target="'coming-soon'">Gone to Loving Homes</router-link>
                    </li>
                  </ul>
                </li>
                
                <li>
                  <a href="#">Donate / Sponsor</a>
                  <ul>
                    <li>
                      <router-link :to="'/donate'" :data-target="'donate'">Make a Donation</router-link>
                    </li>
                    <li>
                      <router-link to="/pages/sponsor" :data-target="'coming-soon'">Sponsor</router-link>
                    </li>
                    <li>
                      <router-link to="/pages/gift-shop" :data-target="'coming-soon'">Gift Shop</router-link>
                    </li>
                    <li>
                      <router-link to="/pages/dogs-in-need" :data-target="'coming-soon'">Dogs in Need</router-link>
                    </li>
                  </ul>
                </li>
                <li>
                  <router-link :to="'/volunteer'" :data-target="'volunteer'" class="menu-single">Volunteer</router-link>
                </li>
                <li>
                  <router-link :to="'/events'" :data-target="'events'" class="menu-single">Events</router-link>
                </li>
                <li>
                  <router-link :to="'/contact'" :data-target="'contact'" class="menu-single">Contact</router-link>
                </li>
              </ul>
            </nav>
            <!-- eof main nav -->
          </div>
        </div>
      </div>
    </header>
    
    <section class="ls">
      <router-view v-on:unheart-adopt="unheartAdopt"
        v-on:heart-adopt="heartAdopt">
        
      </router-view>
    </section>
    
    <footer class="page_footer ds ms parallax">
      <div class="container">
        <div class="row columns_padding_50 bottommargin_20">
          <div class="col-md-4">
            <a href="./" class="logo topmargin_20">
              <img src="assets/images/action-for-singapore-dogs-logo.png" alt="" />
            </a>
          </div>
          
          <div class="col-md-4">
            <p class="topmargin_20">A society set up to help the stray and abandoned dogs in Singapore</p>
          </div>
        
          <div class="col-md-4">
            <div class="fontsize_18 topmargin_20">
              <i class="fa fa-envelope highlight rightpadding_5"></i>
              <span class="grey"><a href="mailto:info@asdsingapore.com">info@asdsingapore.com</a></span>
            </div>
            <div class="darklinks topmargin_10">
              <a class="social-icon theme-color-icon soc-facebook" href="https://www.facebook.com/asdsingapore/" title="Facebook"></a>
              <a class="social-icon theme-color-icon soc-instagram" href="https://www.instagram.com/asdsingapore" title="Instagram"></a>
              <a class="social-icon theme-color-icon soc-youtube" href="#" title="Youtube"></a>
            </div>
          </div>
        </div>
      </div>
    </footer>

  </div>
</template>

<script>
  export default {
    name: "app",
    data() {
      return {
        hearts: []
      }
    },
    methods: {
      heartAdopt(adopt_id) {
        this.hearts.push(adopt_id);
      },
      unheartAdopt(adopt_id) {
        let index = this.hearts.indexOf(adopt_id);
        this.hearts.splice(index, 1);
      }
    },
    computed: {
      heart_count() {
        return this.hearts.length
      }
    },
    created() {
      let hearts = localStorage.getItem('hearts');
      if (hearts != null) {
        this.hearts = JSON.parse(hearts);
      }
    }
  }
</script>

<style scoped>
  .ds .greylinks a {
    color: #ffffff;
  }

  .entry-date {
    color :#666666;
  }
  .top-email-icon {
    padding-right: 5px;
  }
</style>