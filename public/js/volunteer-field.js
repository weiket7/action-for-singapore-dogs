Vue.component('volunteer-field', {
  template: `
  <div class="form-group">
    <label class="col-sm-3 control-label">{{ name }} <span class="required" v-if="required">*</span></label>
    <div class="col-sm-9">
      <slot></slot>
      <span class="help-block error" v-if="error">
        {{ error }}
      </span>
    </div>
  </div>
  `,
  name: "volunteer-field",
  props: ["name", "error", "required"]
})