<template>
  <div id="app" class="container mt-30">
    <div class="row">

      <div class="col-sm-7 col-md-8 col-lg-8">

        <div v-if="num_of_pages > 1" class="row columns_padding_0">
          <div class="col-sm-4 text-center text-sm-left">
            <a href="#" class="theme_button inverse margin_0">Prev page</a>
          </div>
          <div class="col-sm-4 text-center">
            Current Page: {{ current_page }} / {{ num_of_pages }}
          </div>
          <div class="col-sm-4 text-center text-sm-right">
            <a href="#" class="theme_button inverse margin_0">Next page</a>
          </div>
        </div>

        <div v-for="chunk in adopts" class="row">
          <adopt-item v-for="adopt in chunk" :adopt="adopt"
                      :key="adopt.adopt_id" col="4"
                      :highlight="hasHeart(adopt.adopt_id)"
                      v-on:heart-adopt="heartAdopt"></adopt-item>
        </div>

        <div v-if="num_of_pages > 1" class="row columns_padding_0">
          <div class="col-sm-4 text-center text-sm-left">
            <a href="#" class="theme_button inverse margin_0">Prev page</a>
          </div>
          <div class="col-sm-4 text-center">
            Current Page: {{ current_page }} / {{ num_of_pages }}
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
              <input type="radio" name="optionsRadios" value="option1">
              Yes
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="optionsRadios" value="option2">
              No
            </label>
          </div>

          <h3 class="widget-title mt-30">Gender</h3>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="optionsRadios" value="option1">
              Male
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="optionsRadios" value="option2">
              Female
            </label>
          </div>

          <h3 class="widget-title mt-30">Age</h3>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="optionsRadios" value="option1">
              0-3
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="optionsRadios" value="option2">
              4-7
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="optionsRadios" value="option2">
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
  import chunk from 'lodash.chunk';
  import AdoptItem from "../components/AdoptItem";

  export default {
    components: {AdoptItem},
    name: "Adopt",
    data() {
      return {
        adopts: {},
        adopts_per_page: 12,
        adopt_count: 0,
        current_page: 1,
        hearts: []
      }
    },
    computed: {
      num_of_pages() {
        return Math.ceil(this.adopt_count / this.adopts_per_page);
      }
    },
    methods: {
      nextPage() {
        if(this.current_page < this.num_of_pages) {
          this.current_page++;
        }
      },
      heartAdopt(adopt_id) {
        //this.hearts.push(adopt_id);
        if (this.hearts.indexOf(adopt_id) >= 0 === false) {
            this.hearts.push(adopt_id);
          localStorage.setItem('hearts', JSON.stringify(this.hearts));
          this.$emit('heart-adopt', adopt_id);
        }
      },
      hasHeart(adopt_id) {
        return this.hearts.indexOf(adopt_id) >= 0;
      }
    },
    created: function() {
      axios.get('api/adopt/page/'+this.current_page)
        .then(response => {
          let adopts = response.data.adopts;
          this.adopt_count = response.data.adopt_count;
          this.adopts = chunk(adopts, 3);
        })
        .catch(error => { console.log(error); });
      
      let hearts = localStorage.getItem('hearts');
      //console.log('adopt.vue hearts = ' + hearts);
      if (hearts != null) {
        this.hearts = hearts;
      }
    }
  }
</script>

<style scoped>
</style>