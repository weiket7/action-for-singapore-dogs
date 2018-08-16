Vue.component('adopt-item', {
  template: `
    <div class="adopt-grid-border">
      <div class="adopt-grid-image">
        <a :href="'adopt/'+adopt.slug">
          <img :src="baseUrl+'/assets/images/adopts/'+adopt.image" alt="">
        </a>
      </div>
      <h3 class="adopt-grid-name">
        <a :href="'adopt/'+adopt.slug">{{ adopt.name }}</a>
      </h3>
      <p class="adopt-grid-content">
        <i v-if="adopt.gender == 'M'" class="fas fa-mars"></i>
        <i v-else class="fas fa-venus"></i>
        <span v-if="adopt.gender == 'M'">Male</span>
        <span v-else>Female</span>
        <br>

        <i class="fas fa-birthday-cake"></i> {{ adopt.age }}
        <br>

        <i class="fas fa-home"></i>
        <span v-if="adopt.hdb">HDB Approved</span>
        <span v-else>Not HDB Approved</span><br>
      </p>
      <div class="row">
        <div class="col-xs-8">
          <a :href="'adopt/'+adopt.slug" class="theme_button inverse margin_0">Learn More</a>
        </div>
        <div class="col-xs-4 text-right">
          <i @click="heartAdopt" :class="{'highlight': highlight}" class="fas fa-heart fa-2x adopt-heart"></i>
        </div>
      </div>
    </div>
  `,
  props: ['adopt', 'highlight'],
  methods: {
    heartAdopt() {
      this.has_heart = !this.has_heart;
      window.heartAdopt(this.adopt.adopt_id);
      this.$emit('heart-adopt', this.adopt.adopt_id);
    }
  },
  computed: {
    baseUrl() {
      return window.base_url;
    }
  }
});