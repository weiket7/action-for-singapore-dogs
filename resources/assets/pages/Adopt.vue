<template>
  <div id="app" class="container mt-30">
    <div class="row">

      <div class="col-sm-7 col-md-8 col-lg-8">

        <div class="row columns_padding_0">
          <div class="col-sm-4 text-center text-sm-left">
            <a href="#" class="theme_button inverse margin_0">Prev page</a>
          </div>
          <div class="col-sm-4 text-center">
            Current Page: 1 / {{ num_of_pages }}
          </div>
          <div class="col-sm-4 text-center text-sm-right">
            <a href="#" class="theme_button inverse margin_0">Next page</a>
          </div>
        </div>

        <div v-for="chunk in adopts" class="row">
          <adopt-item v-for="adopt in chunk" :adopt="adopt" :key="adopt.adopt_id"></adopt-item>
        </div>

        <hr>

        <div class="row columns_padding_0">
          <div class="col-sm-4 text-center text-sm-left">
            <a href="#" class="theme_button inverse margin_0">Prev page</a>
          </div>
          <div class="col-sm-4 text-center">
            Current Page: 1 / {{ num_of_pages }}

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
  import chunk from 'lodash.chunk';
  import AdoptItem from "../components/AdoptItem";

  export default {
    components: {AdoptItem},
    name: "Adopt",
    data() {
      return {
        adopts: {},
        adopts_per_page: 8,
        num_of_adopts: 0,
      }
    },
    computed: {
      num_of_pages: function() {
        return Math.ceil(this.num_of_adopts / this.adopts_per_page);
      }
    },
    methods: {
      nextPage: function() {

      }
    },
    created: function() {
      axios.get('api/adopt/')
        .then(response => {
          let adopts = response.data;
          this.num_of_adopts = Object.keys(adopts).length;
          this.adopts = chunk(adopts, 3);
        })
        .catch(error => { console.log(error); })
    }
  }
</script>

<style scoped>
  .checkbox, .radio {
    margin-top: 3px;
    margin-bottom: 3px;
  }
  @media (min-width: 768px) {
    .form-horizontal .control-label {
      padding-top: 5px;
    }
  }
  .widget > h3, .widget-title {
    margin-bottom: 5px;
  }
</style>