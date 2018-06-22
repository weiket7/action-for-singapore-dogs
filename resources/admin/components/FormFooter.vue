<template>
  <div class="m-portlet__foot m-portlet__foot--fit">
    <div class="m-form__actions">
      <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-10">
          <slot></slot>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    name: "form-footer",
  }
</script>
