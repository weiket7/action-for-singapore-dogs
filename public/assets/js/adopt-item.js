Vue.component('adopt-item', {
  template: `
  <div class="adopt-grid-border">
      <div class="adopt-grid-image">
        <router-link :to="'/adopt/'+adopt.slug">
          <img :src="'assets/images/adopts/'+adopt.image" alt="">
        </router-link>
      </div>
      <h3 class="adopt-grid-name">
        <router-link :to="'/adopt/'+adopt.slug">{{ adopt.name }}</router-link>
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
          <router-link :to="'adopt/'+adopt.slug" class="theme_button inverse margin_0">Learn More</router-link>
        </div>
        <div class="col-xs-4 text-right">
          <i @click="heartAdopt" :class="{'highlight': highlight}" class="fas fa-heart fa-2x adopt-heart"></i>
        </div>
      </div>
    </div>
  `,
  name: "adopt-item",
  props: ['adopt', 'highlight'],
  methods: {
    heartAdopt() {
      this.$emit('heart-adopt', this.adopt.adopt_id);
    },
  }
})