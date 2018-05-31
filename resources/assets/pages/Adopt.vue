<template>
  <div id="app" class="container">
    <div class="row">

      <div class="col-sm-7 col-md-8 col-lg-8">

        <div class="shop-sorting">

          <form class="form-inline content-justify vertical-center">
              <span class="bottommargin_10">
                <a href="#" id="toggle_shop_view" class=""></a>
                <span>Showing 1-9 of 30 results</span>
              </span>

            <span class="bottommargin_10">
              <label class="sr-only" for="orderby">Sort By:</label>
              <select class="form-control orderby" name="orderby" id="orderby">
                <option value="menu_order" selected>Sort By</option>
                <option value="popularity">Name</option>
                <option value="rating">Gender</option>
                <option value="date"></option>
                <option value="price">Low To High</option>
                <option value="price-desc">High To Low</option>
              </select>
            </span>

          </form>

        </div>


        <div class="columns-3">

          <ul id="products" class="products list-unstyled grid-view">
            <li v-for="dog in dogs" class="product type-product">
              <div class="side-item">
                <div class="row">
                  <div class="col-md-6">
                    <div class="item-media">
                      <router-link :to="'adopt/'+dog.slug">
                        <img :src="'assets/images/dogs/'+dog.image" alt="">
                      </router-link>
                    </div>
                    <div class="item-content">
                      <h3>
                        <a :href="'adopt/'+dog.name">{{ dog.name }}</a>
                      </h3>
                      <p>
                        <i v-if="dog.gender == 'M'" class="fas fa-mars"></i>
                        <i v-else class="fas fa-venus"></i>
                        <span v-if="dog.gender == 'M'">Male</span>
                        <span v-else>Female</span>
                        <br>

                        <i class="fas fa-birthday-cake"></i> {{ dog.age }}
                        <br>

                        <i class="fas fa-home"></i>
                        <span v-if="dog.hdb">HDB Approved</span>
                        <span v-else>Not HDB Approved</span><br>
                      </p>
                      <p>
                        <a href="#" class="theme_button inverse margin_0">Learn More</a>
                      </p>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="item-content">
                      <div class="star-rating" title="Rated 4.00 out of 5">
															<span style="width:40%">
																<strong class="rating">2.00</strong> out of 5
															</span>
                      </div>
                      <h3>
                        <a href="shop-product-right.html">Capicola boudin</a>
                      </h3>

                      <h4>Product Description</h4>
                      <p class="product-description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo odit, expedita est aspernatur accusamus sit dolorem et illo distinctio corporis, neque, error ipsa, eum? Suscipit fugiat totam voluptatum necessitatibus ex.
                      </p>

                      <h4>Product price</h4>

                      <span class="price">
															<span class="amount highlight">$200</span>
														</span>


                    </div>
                  </div>

                </div>
              </div>
            </li>

          </ul>

        </div>
        <!-- eof .columns-* -->

        <hr class="divider_30">

        <div class="row columns_padding_0">
          <div class="col-sm-4 text-center text-sm-left">
            <a href="#" class="theme_button inverse margin_0">Prev page</a>
          </div>
          <div class="col-sm-4 text-center">

            <!--<ul class="pagination block">-->
              <!--<li class="active"><a href="#">1</a></li>-->
              <!--<li><a href="#">2</a></li>-->
              <!--<li><a href="#">3</a></li>-->
              <!--<li><a href="#">4</a></li>-->
              <!--<li><a href="#">5</a></li>-->
            <!--</ul>-->

            <ul class="pagination block">
              <li v-for="num in num_of_pages"><a href="#">{{ num }}</a></li>
            </ul>

          </div>
          <div class="col-sm-4 text-center text-sm-right">
            <a href="#" class="theme_button inverse margin_0">Next page</a>
          </div>
        </div>

      </div>
      <!--eof .col-sm-8 (main content)-->


      <!-- sidebar -->
      <aside class="col-sm-5 col-md-4 col-lg-4">

        <div class="widget widget_categories2">
          <h3 class="widget-title">Name</h3>
          <input type="text" class="form-control">

          <h3 class="widget-title mt-30">HDB Approved</h3>
          <div class="radio">
            <label>
              <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">
              Yes
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
              No
            </label>
          </div>

          <h3 class="widget-title mt-30">Gender</h3>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="optionsRadios" id="optionsRadios1" value="option1">
              Male
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="optionsRadios" id="optionsRadios2" value="option2">
              Female
            </label>
          </div>

          <h3 class="widget-title mt-30">Age</h3>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="optionsRadios" id="optionsRadios1" value="option1">
              0-3
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="optionsRadios" id="optionsRadios2" value="option2">
              4-7
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="optionsRadios" id="optionsRadios2" value="option2">
              8+
            </label>
          </div>

        </div>
      </aside>
    </div>
    <!-- eof aside sidebar -->
  </div>
</template>

<script>
  import axios from 'axios'

  export default {
    name: "Adopt",
    data() {
      return {
        dogs: {},
        dogs_per_page: 8,
      }
    },
    computed: {
      num_of_pages: function() {
        return Math.ceil(this.num_of_dogs / this.dogs_per_page);
      },
      num_of_dogs: function() {
        return Object.keys(this.dogs).length;
      }
    },
    methods: {
      nextPage: function() {

      }
    },
    created: function() {
      axios.get('api/adopt/')
        .then(response => {
          this.dogs = response.data;
        })
        .catch(error => { console.log(error); })
    }
  }
</script>

<style scoped>

</style>