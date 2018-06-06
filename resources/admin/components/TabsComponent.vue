<template>
  <div>
    <ul class="nav nav-tabs" role="tablist">
      <li class="nav-item" v-for="(tab, index) in tabs">
        <!-- class= active-->
        <a class="nav-link" data-toggle="tab" :class="{ active : (index == 0), show : (index == 0)}" :href="'#m_tabs_'+tab">
          {{ tab }}
        </a>
      </li>
    </ul>
    <div class="tab-content">
      <slot>
      
      </slot>
    </div>
    
  </div>
</template>

<script>
  export default {
    name: "tabs",
    props: ["tabs"]
  }
</script>

<style scoped>

</style>