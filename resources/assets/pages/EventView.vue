<template>
  <div class="container content">
      <div class="row">
        <div class="col-sm-12">
          <article class="vertical-item">
            <div class="item-media" v-if="event.image">
              <img :src="'assets/images/events/'+event.image" alt="" />
            </div>
            
            <div class="item-content">
              <header class="entry-header" v-if="!event.adoption_drive">

                <h1 class="entry-title black bottommargin_10">
                  {{ event.name }}
                </h1>
              </header>

              <div class="entry-content">
                <template v-if="event.adoption_drive">
                  <p class="event-detail">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                    {{ event.location }}
                    <br>
                    <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                    {{ event.date | formatDate }}
                    <br><br>
                    
                    {{ event.desc }}
                  </p>
                  
                  <div v-for="chunk in adopts" class="row">
                    <div class="col-md-3" v-for="adopt in chunk" >
                      <adopt-item :adopt="adopt" :key="adopt.adopt_id"></adopt-item>
                    </div>
                  </div>
                </template>
                
                <template v-else>
                  <p class="event-detail">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                    {{ event.location }}
                    <br>
                    <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                    {{ event.date | formatDate }}
                    <br>
                    <i class="fa fa-clock" aria-hidden="true"></i> {{ event.time }}
                    <span v-if="event.duration">
                      <br><i class="fas fa-ruler-horizontal" aria-hidden="true"></i> {{ event.duration }}
                    </span>
                    <span v-if="event.cost">
                      <br><i class="fa fa-dollar-sign" aria-hidden="true"></i> {{ event.cost }}
                    </span>
                    <br><br>
                    
                    {{ event.desc }}
                  </p>
  
                  <p class="topmargin_30">
                    <span class="rightpadding_20 fontsize_18 grey">Share:</span>
                    <span class="small-icons">
										<a href="#" class="social-icon color-icon bg-icon rounded-icon soc-facebook"></a>
										<a href="#" class="social-icon color-icon bg-icon rounded-icon soc-twitter"></a>
										<a href="#" class="social-icon color-icon bg-icon rounded-icon soc-linkedin"></a>
									</span>
                  </p>
                </template>
              </div>
            </div>
          </article>
        </div>
      </div>
    </div>
</template>

<script>
  import axios from 'axios'
  import chunk from 'lodash.chunk';
  import AdoptItem from "../components/AdoptItem";

  export default {
    name: "event-view",
    data() {
      return {
        slug: '{{ $slug }}',
        event: {},
        adopts: {},
      }
    },
    created: function() {
      axios.get('api/event/get/'+this.$route.params.slug)
        .then(response => {
          this.event = response.data.event;
          this.adopts = chunk(response.data.adopts, 4);
        })
        .catch(error => { console.log(error); })
    },
    components: {AdoptItem},
  }
</script>

<style scoped>

</style>