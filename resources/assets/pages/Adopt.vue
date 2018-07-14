<template>
  <div id="app" class="container content">
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
        
        <div v-for="chunk in adopt_chunks" class="row">
          <div class="col-md-4" v-for="adopt in chunk" >
            <adopt-item :adopt="adopt" :key="adopt.adopt_id"
                      :highlight="hasHeart(adopt.adopt_id)"
                      v-on:heart-adopt="heartAdopt"></adopt-item>
          </div>
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
        <h2>Search</h2>

        <div class="widget widget_categories2">
          <h3 class="widget-title">Dog Name</h3>
          <input type="text" class="form-control">
          
          <h3 class="widget-title mt-30">HDB Approved</h3>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="hdb" v-model="hdb" value="1">
              Yes
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="hdb" v-model="hdb" value="0">
              No
            </label>
          </div>
          
          <h3 class="widget-title mt-30">Gender</h3>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="gender" v-model="gender" value="M">
              Male
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="gender" v-model="gender" value="F">
              Female
            </label>
          </div>
          
          <h3 class="widget-title mt-30">Age</h3>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="age" value="1" v-model="age">
              0-3
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="age" value="2" v-model="age">
              4-7
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="age" value="3" v-model="age">
              8+
            </label>
          </div>
          <br>

          <button type="button" @click="filterAdopt" class="theme_button inverse margin_0">Search</button>
        
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
        hearts: [],
        hdb: [],
        gender: [],
        age: []
      }
    },
    computed: {
      num_of_pages() {
        return Math.ceil(this.adopt_count / this.adopts_per_page);
      },
      adopt_chunks() {
        return chunk(this.adopts, 3);
      }
    },
    methods: {
      nextPage() {
        if(this.current_page < this.num_of_pages) {
          this.current_page++;
        }
      },
      heartAdopt(adopt_id) {
        let index = this.hearts.indexOf(adopt_id);
        if (index >= 0) {
          this.hearts.splice(index, 1);
          this.$emit('unheart-adopt');
        } else {
          this.hearts.push(adopt_id);
          this.$emit('heart-adopt');
        }
        localStorage.setItem('hearts', JSON.stringify(this.hearts));
      },
      hasHeart(adopt_id) {
        return this.hearts.indexOf(adopt_id) >= 0;
      },
      filterAdopt() {
        let data = {
          hdb: this.hdb,
          gender: this.gender,
          age: this.age,
        };
        axios.post('api/adopt/filter', data)
          .then(response => {
            this.adopts = response.data.adopts;
            this.adopt_count = response.data.adopt_count;
          })
      }
    },
    created: function() {
      axios.get('api/adopt/page/'+this.current_page)
        .then(response => {
          this.adopts = response.data.adopts;
          this.adopt_count = response.data.adopt_count;
        })
        .catch(error => { console.log(error); });
      
      let hearts = localStorage.getItem('hearts');
      if (hearts != null) {
        this.hearts = JSON.parse(hearts);
      }
    }
  }
</script>

<style scoped>
</style>