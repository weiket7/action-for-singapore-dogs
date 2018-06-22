export default {
  data() {
    return {
      loaded: false
    }
  },
  created() {
    //console.log(this.$data)
  },
  methods: {
    onError(error) {
      console.log(JSON.stringify(error));
      if (error.response.status == 500) {
        toastr.error("A system error occurred");
        return;
      }
      toastr.error("There were some errors, please check the form");
      this.errors.record(error.response.data.errors);
    },
    appendObjectToFormData(obj, form_data) {
      for (let key in obj) {
        if (obj.hasOwnProperty(key)) {
          form_data.append(key, obj[key]);
        }
      }
    },
  }
}
