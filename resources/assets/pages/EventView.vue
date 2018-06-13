<template>
  <div class="container content">
      <div class="row">
        <div class="col-sm-12">
          <article class="vertical-item">
            <div class="item-media">
              <img :src="'assets/images/donate-banner.jpg'" alt="" />
            </div>
            <div class="item-content">

              <header class="entry-header">

                <h1 class="entry-title black bottommargin_10">
                  <a href="event-single-left.html" rel="bookmark">Gathering books for children in Nigeria</a>
                </h1>

                <div class="content-justify vertical-center bottommargin_30">
                  <div class="item-meta highlight margin_0">
												<span>
													<i class="fa fa-map-marker" aria-hidden="true"></i>
													NYC 21th street #43
												</span>
                    <span class="text-uppercase">
													<i class="fa fa-calendar-check-o" aria-hidden="true"></i>
													MAY 20, 5 P.M.
												</span>
                  </div>
                </div>


              </header>
              <!-- .entry-header -->

              <div class="entry-content">
                <p>
                  Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut  wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat.
                </p>
                <p>Turducken ham hock biltong jerky tongue drumstick, pork chop meatloaf landjaeger. Doner filet mignon kevin turkey swine fatback. Ground round pig pork chop cow. Pork turducken spare ribs pork chop meatloaf tri-tip leberkas beef ribs doner ham t-bone capicola ground round jerky landjaeger.</p>

                <blockquote>
                  Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa
                  <div class="item-meta">
                    <h5>John Doe, head volunteer</h5>
                  </div>
                </blockquote>

                <p class="topmargin_30">
                  <span class="rightpadding_20 fontsize_18 grey">Share:</span>
                  <span class="small-icons">
										<a href="#" class="social-icon color-icon bg-icon rounded-icon soc-facebook"></a>
										<a href="#" class="social-icon color-icon bg-icon rounded-icon soc-twitter"></a>
										<a href="#" class="social-icon color-icon bg-icon rounded-icon soc-linkedin"></a>
									</span>
                </p>
              </div>
            </div>
          </article>
        </div>
      </div>
    </div>
</template>

<script>
  import axios from 'axios'

  export default {
    name: "event-view",
    data() {
      return {
        slug: '{{ $slug }}',
        event: {}
      }
    },
    created: function() {
      axios.get('api/event/get/'+this.$route.params.slug)
        .then(response => {
          this.event = response.data;
        })
        .catch(error => { console.log(error); })
    }
  }
</script>

<style scoped>

</style>