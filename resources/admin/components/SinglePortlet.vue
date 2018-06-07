<template>
  <div class="row">
    <div class="col-lg-12">
      <div class="m-portlet">
        <div class="m-portlet__head">
          <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
              <h3 class="m-portlet__head-text">
                {{ title }}
              </h3>
            </div>
          </div>
          <div v-if="create_link" class="m-portlet__head-tools">
            <router-link :to="create_link">
              <button class="btn btn-primary">Add</button>
            </router-link>
          </div>
        </div>
        <div class="m-portlet__body">
          <slot></slot>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    name: "single-portlet",
    props: ["title", "create_link"]
  }
</script>
