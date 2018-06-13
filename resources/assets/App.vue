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
              <div class="media-left">
                <div class="teaser_icon highlight fontsize_18">
                  <i class="fa fa-envelope"></i>
                </div>
              </div>
              <div class="media-body">
                <div class="visible-lg visible-md">
                  <h4>
                    Email:
                  </h4>
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
                  <a href="#">About</a>
                  <ul>
                    <li>
                      <router-link :to="'/coming-soon'" :data-target="'coming-soon'">Who We Are</router-link>
                    </li>
                    <li>
                      <router-link :to="'/coming-soon'" :data-target="'coming-soon'">Adoption & Rescue Centre (ARC)</router-link>
                    </li>
                    <li>
                      <router-link :to="'/coming-soon'" :data-target="'coming-soon'">Boarding Services</router-link>
                    </li>
                    <li>
                      <router-link :to="'/coming-soon'" :data-target="'coming-soon'">Media</router-link>
                    </li>
                    <li>
                      <router-link :to="'/coming-soon'" :data-target="'coming-soon'">Annual Reports</router-link>
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
                      <router-link :to="'/coming-soon'" :data-target="'coming-soon'">Why Adopt a Dog</router-link>
                    </li>
                    <li>
                      <router-link :to="'/coming-soon'" :data-target="'coming-soon'">Adoption Procedure</router-link>
                    </li>
                    <li>
                      <router-link :to="'/coming-soon'" :data-target="'coming-soon'">Project Adore</router-link>
                    </li>
                    <li>
                      <router-link :to="'/coming-soon'" :data-target="'coming-soon'">Gone to Loving Homes</router-link>
                    </li>
                  </ul>
                </li>
                
                <li>
                  <a href="#">Donate</a>
                  <ul>
                    <li>
                      <router-link :to="'/donate'" :data-target="'donate'">Make a Donation</router-link>
                    </li>
                    <li>
                      <router-link :to="'/coming-soon'" :data-target="'coming-soon'">Sponsor</router-link>
                    </li>
                    <li>
                      <router-link :to="'/coming-soon'" :data-target="'coming-soon'">Gift Shop</router-link>
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
    
    <footer class="page_footer ds ms parallax section_padding_50">
      <div class="container">
        
        <div class="row columns_padding_50">
          
          <div class="col-md-4">
            <a href="./" class="logo">
              <img src="assets/images/action-for-singapore-dogs-logo.png" alt="" />
            </a>
            <p>A society set up to help the stray and abandoned dogs in Singapore</p>
            <div class="media fontsize_18">
              <i class="fa fa-envelope highlight rightpadding_5"></i>
              Email:
              <span class="grey">info@asdsingapore.com</span>
            </div>
            <div class="media fontsize_18">
              <i class="fa fa-search highlight rightpadding_5"></i>
              Address:
              <span class="grey">80 Lim Chu Kang Lane 1, Singapore 718911</span>
            </div>
            <div class="topmargin_30 darklinks">
              <a class="social-icon theme-color-icon soc-facebook" href="#" title="Facebook"></a>
              <a class="social-icon theme-color-icon soc-twitter" href="#" title="Twitter"></a>
              <a class="social-icon theme-color-icon soc-instagram" href="#" title="Instagram"></a>
              <a class="social-icon theme-color-icon soc-youtube" href="#" title="Youtube"></a>
            </div>
          </div>
          
          <div class="col-md-4 col-sm-6">
            <div class="topmargin_20">
              <div class="widget widget_recent_posts">
                
                <h3 class="widget-title">Gone to Loving Homes</h3>
                <ul class="greylinks">
                  <li>
                    <div class="media">
                      <div class="media-left media-middle">
                        <img src="assets/images/adopted/gg5.jpg" alt="" />
                      </div>
                      <div class="media-body media-middle">
                        <h4><a href="blog-single-right.html">Fluffy</a></h4>
                        <div class="entry-meta grey darklinks">
                          <span class="entry-date">
                            <time datetime="2017-03-13T08:50:40+00:00">
                              Adopted on 5 Feb 2018
                            </time>
                          </span>
                        </div>
                      </div>
                    </div>
                  </li>
                  
                  <li>
                    <div class="media">
                      <div class="media-left media-middle">
                        <img src="assets/images/adopted/gg4.jpg" alt="" />
                      </div>
                      <div class="media-body media-middle">
                        <h4><a href="blog-single-right.html">Sparkle</a></h4>
                        <div class="entry-meta grey darklinks">
                          <span class="entry-date">
                            <time datetime="2017-03-13T08:50:40+00:00">
                              Adopted on 10 Apr 2018
                            </time>
                          </span>
                        </div>
                      </div>
                    </div>
                  </li>
                  
                  <li>
                    <div class="media">
                      <div class="media-left media-middle">
                        <img src="assets/images/adopted/gg3.jpg" alt="" />
                      </div>
                      <div class="media-body media-middle">
                        <h4><a href="blog-single-right.html">Tinker</a></h4>
                        <div class="entry-meta grey darklinks">
                          <span class="entry-date">
                            <time datetime="2017-03-13T08:50:40+00:00">
                              Adopted on 6 Jun 2018
                            </time>
                          </span>
                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          
          <div class="col-md-4 col-sm-6">
            <div class="widget widget_instagram topmargin_20">
              <h3 class="widget-title">Instagram</h3>
              <div class="instafeed">
              
              </div>
            </div>
          </div>
        
        </div>
      </div>
    </footer>
    
    <section class="page_copyright ds ms parallax">
      <div class="container with_top_border">
        <div class="row">
          <div class="col-sm-12 text-center">
            <p class="greylinks">Copyright 2016 - <a href="#">MW Templates</a>. All Rights Reserved</p>
          </div>
        </div>
      </div>
    </section>
  
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
</style>