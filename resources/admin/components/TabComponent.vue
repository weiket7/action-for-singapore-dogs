<template>
  <div class="tab-pane" :class="{active : active}" :id="'m_tabs_'+name" role="tabpanel">
    <slot></slot>
  </div>
</template>

<script>
  export default {
    name: "tab",
    props: {
      name: {type: String, required: true},
      active: {type: Boolean, default: false}
    }
  }
</script>