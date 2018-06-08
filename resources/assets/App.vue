<template>
  <div id="box_wrapper">
    <section class="page_toplogo table_section table_section_md ls">
      <div class="container">
        <div class="row">
          <div class="col-md-4 text-center text-md-left">
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
                <h4>
                  Email:
                </h4>
                <p>
                  <a href="mailto:info@asdsingapore.com">info@asdsingapore.com</a>
                </p>
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
                  <router-link :to="'/about'" :data-target="'about'">About</router-link>
                  <ul>
                    <li>
                      <a href="index.html">Who We Are</a>
                    </li>
                    <li>
                      <a href="index.html">Adoption & Rescue Centre (ARC)</a>
                    </li>
                    <li>
                      <a href="index_singlepage.html">Media</a>
                    </li>
                    <li>
                      <a href="index_singlepage.html">Annual Reports</a>
                    </li>
                  </ul>
                </li>
                
                <li>
                  <a href="#">Adopt</a>
                  <ul>
                    <li>
                      <router-link :to="'/adopt'" :data-target="'adopt'">Adoption Gallery</router-link>
                    </li>
                    <li>
                      <a href="index_singlepage.html">Why Adopt a Dog</a>
                    </li>
                    <li>
                      <a href="index_singlepage.html">Adoption Procedure</a>
                    </li>
                    <li>
                      <a href="index_singlepage.html">Project Adore</a>
                    </li>
                  </ul>
                </li>
                
                <li>
                  <router-link :to="'/volunteer'" :data-target="'volunteer'">Volunteer</router-link>
                </li>
                
                <li>
                  <router-link :to="'/donate'" :data-target="'donate'">Donate</router-link>
                </li>
                <li>
                  <router-link :to="'/events'" :data-target="'events'">Events</router-link>
                </li>
                <li>
                  <router-link :to="'/contact'" :data-target="'contact'">Contact</router-link>
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
              <img src="assets/images/logo-dark.png" alt="" />
            </a>
            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis um voluptatum deleniti atque orrupti quos </p>
            <div class="media fontsize_18">
              <i class="fa fa-search highlight rightpadding_5"></i>
              address:
              <span class="grey">12 Ave., New York</span>
            </div>
            <div class="media fontsize_18">
              <i class="fa fa-envelope highlight rightpadding_5"></i>
              email:
              <span class="grey">info@giving.com</span>
            </div>
            <div class="media fontsize_18">
              <i class="fa fa-phone highlight rightpadding_5"></i>
              phone:
              <span class="grey">800 516 3290</span>
            </div>
            <div class="topmargin_30 darklinks">
              <a class="social-icon theme-color-icon soc-facebook" href="#" title="Facebook"></a>
              <a class="social-icon theme-color-icon soc-twitter" href="#" title="Twitter"></a>
              <a class="social-icon theme-color-icon soc-google" href="#" title="Google"></a>
              <a class="social-icon theme-color-icon soc-linkedin" href="#" title="LinkedIn"></a>
              <a class="social-icon theme-color-icon soc-flickr" href="#" title="Flickr"></a>
              <a class="social-icon theme-color-icon soc-rss" href="#" title="Rss"></a>
            </div>
          </div>
          
          <div class="col-md-4 col-sm-6">
            <div class="topmargin_20">
              <div class="widget widget_recent_posts">
                
                <h3 class="widget-title">From the blog</h3>
                <ul class="greylinks">
                  <li>
                    <div class="media">
                      <div class="media-left media-middle">
                        <img src="assets/images/recent_post1.jpg" alt="" />
                      </div>
                      <div class="media-body media-middle">
                        <h4><a href="blog-single-right.html">Missioners in charge</a></h4>
                        <div class="entry-meta grey darklinks">
														<span class="entry-date">
															<time datetime="2017-03-13T08:50:40+00:00">
																23th of april
															</time>
														</span>
                          <span>|</span>
                          <span>
															<i class="fa fa-heart" aria-hidden="true"></i>
															2
														</span>
                          <a href="blog-single-right.html#comments">
                            <i class="fa fa-comment" aria-hidden="true"></i>
                            4
                          </a>
                        </div>
                      </div>
                    </div>
                  </li>
                  
                  <li>
                    <div class="media">
                      <div class="media-left media-middle">
                        <img src="assets/images/recent_post2.jpg" alt="" />
                      </div>
                      <div class="media-body media-middle">
                        <h4><a href="blog-single-right.html">Celebrating the adoption</a></h4>
                        <div class="entry-meta grey darklinks">
														<span class="entry-date">
															<time datetime="2017-03-13T08:50:40+00:00">
																5th of april
															</time>
														</span>
                          <span>|</span>
                          <span>
															<i class="fa fa-heart" aria-hidden="true"></i>
															3
														</span>
                          <a href="blog-single-right.html#comments">
                            <i class="fa fa-comment" aria-hidden="true"></i>
                            1
                          </a>
                        </div>
                      </div>
                    </div>
                  </li>
                  
                  <li>
                    <div class="media">
                      <div class="media-left media-middle">
                        <img src="assets/images/recent_post3.jpg" alt="" />
                      </div>
                      <div class="media-body media-middle">
                        <h4><a href="blog-single-right.html">Charity for everyone</a></h4>
                        <div class="entry-meta grey darklinks">
														<span class="entry-date">
															<time datetime="2017-03-13T08:50:40+00:00">
																25th of april
															</time>
														</span>
                          <span>|</span>
                          <span>
															<i class="fa fa-heart" aria-hidden="true"></i>
															6
														</span>
                          <a href="blog-single-right.html#comments">
                            <i class="fa fa-comment" aria-hidden="true"></i>
                            18
                          </a>
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
              <h3 class="widget-title">Our Happy faces</h3>
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