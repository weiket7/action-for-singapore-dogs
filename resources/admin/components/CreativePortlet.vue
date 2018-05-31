<template>
  <div class="m-portlet m-portlet--creative m-portlet--first m-portlet--bordered-semi">
    <div class="m-portlet__head">
      <div class="m-portlet__head-caption">
        <div class="m-portlet__head-title">
          <h2 class="m-portlet__head-label m-portlet__head-label--danger">
            <span>
              {{ title }}
            </span>
          </h2>
        </div>
      </div>
    </div>
    <div class="m-portlet__body">
      <slot></slot>
    </div>
  </div>
</template>

<script>
  export default {
    name: "creative-portlet",
    props: ["title"]
  }
</script>

<style scoped>
  .m-portlet.m-portlet--bordered-semi .m-portlet__head {
    height: 0;
  }
</style>