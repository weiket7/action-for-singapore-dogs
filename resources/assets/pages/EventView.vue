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
                <template v-if="is_adoption_drive">
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
                </template>

                <p class="topmargin_30">
                  <div class="fb-share-button"
                       :data-href="url"
                       data-layout="button_count" data-size="large"
                       data-mobile-iframe="true">
                    <a target="_blank" :href="url"
                       class="fb-xfbml-parse-ignore">Share</a>
                  </div>


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
  import chunk from 'lodash.chunk';
  import AdoptItem from "../components/AdoptItem";

  export default {
    name: "event-view",
    data() {
      return {
        event: {},
        adopts: {},
      }
    },
    computed: {
      url() {
        return window.location.href;
      },
      is_adoption_drive() {
        return this.event.type === 'A';
      }
    },
    created: function() {
      axios.get('api/event/get/'+this.$route.params.slug)
        .then(response => {
          this.event = response.data.event;
          this.adopts = chunk(response.data.adopts, 4);
        })
        .catch(error => { console.log(error); });

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.1&appId=673207399709727&autoLogAppEvents=1";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    },
    components: {AdoptItem},
  }
</script>

<style scoped>

</style>