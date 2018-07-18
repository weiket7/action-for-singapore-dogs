<template>
  <div id="app" class="container content">
    <div class="row">

      <div class="col-sm-7 col-md-8 col-lg-8">

        <div v-for="event in events">
          <div class="side-item">
            <router-link :to="'/events/' + event.slug" v-if="event.image">
              <div class="item-media entry-thumbnail">
                <img :src="'assets/images/events/'+event.image" alt="">
              </div>
            </router-link>

            <h4 class="entry-title">
              <router-link :to="'/events/' + event.slug">{{ event.name }}</router-link>
            </h4>

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
            </p>
            <!--<p>Stet clita kasd gubergren, no sea takimata sanctus sed diam voluptua.</p>-->
            <p>
              <router-link  class="theme_button inverse bottommargin_0" :to="'/events/' + event.slug">Learn More</router-link>
            </p>
          </div>

          <hr class="divider_20">
        </div>

      </div>
      <!--eof .col-sm-8 (main content)-->

      <!-- sidebar -->
      <div class="col-sm-5 col-md-4 col-lg-4">

        <div class="widget">

          <h3 class="widget-title">Showing</h3>
          <div class="checkbox">
            <label>
              <input type="checkbox" v-model="showing" name="showing" value="upcoming">
              Upcoming
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" v-model="showing" name="showing" value="past">
              Past
            </label>
          </div>
        </div>

        <div class="widget mt-30">
          <h3 class="widget-title">Type</h3>
          <div class="checkbox">
            <label>
              <input type="checkbox" v-model="type" name="type" value="A">
              Adoption Drives
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" v-model="type" name="type" value="B">
              Basic Obedience Classes
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" v-model="type" name="type" value="S">
              Social Events
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" v-model="type" name="type" value="O">
              Others
            </label>
          </div>
        </div>
        <br>

        <button type="button" @click="filterEvent" class="theme_button inverse margin_0">Search</button>
      </div>
      <!-- eof aside sidebar -->

    </div>
  </div>
</template>

<script>
  import axios from 'axios'
  import "../../common/filters"

  export default {
    name: "events",
    data() {
      return {
        events: {},
        showing: [],
        type: [],
      }
    },
    methods: {
      filterEvent() {
        let data = {
          showing: this.showing,
          type: this.type,
        };
        axios.post('api/event/filter', data)
          .then(response => {
            this.events = response.data.events;
          })
      }
    },
    created: function() {
      axios.get('api/event/latest')
        .then(response => {
          this.events = response.data.events;
        })
        .catch(error => { console.log(error); })
    }
  }
</script>
