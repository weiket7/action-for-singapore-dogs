import Vue from "vue"
import moment from "moment"

Vue.filter("formatDate", function (value) {
  if (value === "" || value == null || value == undefined) {
    return "";
  }
  let formatted = (value.match(/^\d{2} (Jan|Feb|Mar|Apr|May|Jun|Jul|Aug|Sep|Oct|Nov|Dec) \d{4}$/)) != null;
  if (formatted) {
    return value;
  }
  return moment(value).format("DD MMM YYYY");
});

Vue.filter("showGender", function (value) {
  return value == 'M' ? 'Male' : 'Female';
});

Vue.filter("formatDateTime", function (value) {
  if (value === "") {
    return "";
  }
  return moment(value).format("DD MMM YYYY hh:mm:ss A");
});

