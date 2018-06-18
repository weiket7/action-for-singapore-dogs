<template>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" :href="'#'+id" aria-expanded="false" :aria-controls="id">
          {{ title }} <i class="fas fa-plus"></i>
        </a>
      </h4>
    </div>
    <div :id="id" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <slot></slot>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    name: "panel",
    props: ["id", "title"]
  }
</script>

<style scoped>

</style>