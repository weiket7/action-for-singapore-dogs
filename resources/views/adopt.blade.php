@extends('template', [
  'title'=>'ASD - Dogs for Adoption',
  "meta_desc"=>"Action for Singapore Dogs has ".$adopt_count." hdb approved and non hdb approved dogs for adoption. You can give the dogs a second chance by adopting today."
])

@section('content')
  <div id="app" class="container content">
    <div class="row">
      
      <div class="col-sm-7 col-md-8 col-lg-8">
        
        <div v-if="!isFilter" class="row columns_padding_0">
          <div class="col-sm-2 text-center text-sm-left">
            <a href="#" @click="previousPage()" class="theme_button inverse margin_0">Prev page</a>
          </div>
          <div class="col-sm-8 text-center grid-header">
            Current Page: @{{ current_page }} / @{{ num_of_pages }}
            <br>
            Showing @{{ adopts.length }} out of @{{ adopt_count }} dogs for adoption
          </div>
          <div class="col-sm-2 text-center text-sm-right">
            <a href="#" @click="nextPage()" class="theme_button inverse margin_0">Next page</a>
          </div>
        </div>
        
        <div v-else class="text-center">
          Showing @{{ adopts.length }} out of @{{ adopt_count }} dogs for adoption
        </div>
        
        <div v-for="chunk in adopt_chunks" class="row">
          <div class="col-md-4" v-for="adopt in chunk" >
            <adopt-item :adopt="adopt" :key="adopt.adopt_id"
                        :highlight="hasHeart(adopt.adopt_id)"
                        v-on:heart-adopt="heartAdopt"></adopt-item>
          </div>
        </div>
        
        <div v-if="!isFilter" class="row columns_padding_0">
          <div class="col-sm-2 text-center text-sm-left">
            <a href="#" @click="previousPage()" class="theme_button inverse margin_0">Prev page</a>
          </div>
          <div class="col-sm-8 text-center grid-header">
            Current Page: @{{ current_page }} / @{{ num_of_pages }}
            <br>
            Showing @{{ adopts.length }} out of @{{ adopt_count }} dogs for adoption
          </div>
          <div class="col-sm-2 text-center text-sm-right">
            <a href="#" @click="nextPage()" class="theme_button inverse margin_0">Next page</a>
          </div>
        </div>
      </div>
      
      <!-- sidebar -->
      <aside class="col-sm-5 col-md-4 col-lg-4">
        <h2>Search</h2>
        
        <div class="widget widget_categories2">
          <h3 class="widget-title">Dog Name</h3>
          <input type="text" v-model="filter.name" class="form-control">
          
          <h3 class="widget-title mt-30">HDB Approved</h3>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="hdb" v-model="filter.hdb" value="1">
              Yes
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="hdb" v-model="filter.hdb" value="0">
              No
            </label>
          </div>
          
          <h3 class="widget-title mt-30">Gender</h3>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="gender" v-model="filter.gender" value="M">
              Male
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="gender" v-model="filter.gender" value="F">
              Female
            </label>
          </div>
          
          <h3 class="widget-title mt-30">Age</h3>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="age" value="1" v-model="filter.age">
              0-3
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="age" value="2" v-model="filter.age">
              4-7
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="age" value="3" v-model="filter.age">
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
@endsection

@section('script')
  <script>
    var vm = new Vue({
      el: "#app",
      data: {
        adopts: {!! json_encode($adopts) !!},
        adopt_count: {{ ($adopt_count) }},
        adopts_per_page: {{ ($adopts_per_page) }},
        current_page: 1,
        hearts: [],
        filter: {
          name: "",
          hdb: [],
          gender: [],
          age: []
        },
        isFilter: false,
      },
      computed: {
        num_of_pages() {
          return Math.ceil(this.adopt_count / this.adopts_per_page);
        },
        adopt_chunks() {
          return _.chunk(this.adopts, 3);
        }
      },
      methods: {
        nextPage() {
          if(this.current_page < this.num_of_pages) {
            this.current_page++;
          }
          this.getAdopts();
        },
        previousPage() {
          if(this.current_page > 1) {
            this.current_page--;
          }
          this.getAdopts();
        },
        heartAdopt(adopt_id) {
          window.addOrRemoveHearts(this.hearts, adopt_id);
        },
        hasHeart(adopt_id) {
          if (window.objectIsEmpty(this.hearts)) {
            return false;
          }
          return this.hearts.indexOf(adopt_id) >= 0;
        },
        filterAdopt() {
          this.isFilter = true;
          axios.post('api/adopt/filter', this.filter)
            .then(response => {
              this.adopts = response.data.adopts;
              this.adopt_count = response.data.adopt_count;
            })
        },
        getAdopts() {
          axios.get('api/adopt/page/'+this.current_page)
            .then(response => {
              this.adopts = response.data.adopts;
              this.adopt_count = response.data.adopt_count;
              this.adopts_per_page = response.data.adopts_per_page;
            })
            .catch(error => { console.log(error); });
        }
      },
      created: function() {
        this.hearts = window.getHearts();
      }
    });
  </script>
@endsection