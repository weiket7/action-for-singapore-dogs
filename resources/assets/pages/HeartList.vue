<template>
  <div class="container mt-30">
    <div class="row">
      <div class="col-md-12 text-center">
        <h2 class="section_header bold">
          <span>LIKES</span></h2>
      </div>
    </div>
    
    <div class="row" v-if="adopt_count === 1">
      <div class="col-md-3 col-center">
        <adopt-item :adopt="adopts[0]" :key="adopts[0].adopt_id" :highlight="hasHeart(adopts[0].adopt_id)" v-on:heart-adopt="heartAdopt"></adopt-item>
      </div>
    </div>
    <div class="row" v-if="adopt_count === 2">
      <div class="col-md-3"></div>
        <div class="col-md-3" v-for="adopt in adopts">
        <adopt-item :adopt="adopt" :key="adopt.adopt_id" :highlight="hasHeart(adopt.adopt_id)" v-on:heart-adopt="heartAdopt"></adopt-item>
      </div>
      <div class="col-md-3"></div>
    </div>
    <div class="row row-col-3" v-if="adopt_count === 3">
      <div class="col-md-3 center-col-3" v-for="adopt in adopts">
        <adopt-item :adopt="adopt" :key="adopt.adopt_id" :highlight="hasHeart(adopt.adopt_id)" v-on:heart-adopt="heartAdopt"></adopt-item>
      </div>
    </div>
    <div class="row" v-if="adopt_count >= 4" v-for="chunk in adopts">
      <div class="col-md-3" v-for="adopt in chunk">
        <adopt-item :adopt="adopt" :key="adopt.adopt_id"
                    :highlight="hasHeart(adopt.adopt_id)" v-on:heart-adopt="heartAdopt"></adopt-item>
      </div>
    </div>
    
    
    <hr>
    
    <div class="row" v-show="!interested">
      <div class="col-md-12 text-center">
        <button type="button" class="" @click="interested = true">I'm interested in adopting</button>
      </div>
    </div>
    
    <adoption-form v-show="interested">
    
    </adoption-form>
  </div>
</template>

<script>
  import axios from 'axios'
  import AdoptItem from '../components/AdoptItem'
  import AdoptionForm from './AdoptionForm'
  import chunk from 'lodash.chunk';
  
  export default {
    name: "HeartList",
    data() {
      return {
        adopts: {},
        adopt_count: 0,
        interested: false,
        hearts: []
      }
    },
    methods: {
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
      }
    },
    created() {
      let hearts = localStorage.getItem('hearts');
      if (hearts != null) {
        this.hearts = JSON.parse(hearts);
      }
      
      axios.get("api/adopt/list/"+this.hearts).then(
        response => {
          let adopts = response.data;
          this.adopt_count = adopts.length;
          if (this.adopt_count >= 4) {
            adopts = chunk(response.data, 4);
          }
          this.adopts = adopts;
        }).catch(error => { console.log(error); });
  
    },
    components: {
      AdoptItem,
      AdoptionForm
    }
  }
</script>

<style scoped>
  .col-center {
    float: none;
    margin: 0 auto;
  }
  
  /*https://stackoverflow.com/questions/30846378/bootstrap-center-3-col-md-3-divs*/
  .row-col-3 {
    text-align: center;
  }
  .center-col-3 {
    float: none;
    display: inline-block;
  }
</style>