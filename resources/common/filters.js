import Vue from "vue"
import moment from "moment"

Vue.filter("formatDate", function (value) {
  if (value === "" || value == null || value == undefined) {
    return "";
  }
  return moment(value).format("DD/MM/YYYY");
});

Vue.filter("showGender", function (value) {
  return value == 'M' ? 'Male' : 'Female';
});


Vue.filter("formatDateTime", function (value) {
  if (value === "") {
    return "";
  }
  return moment(value).format("DD/MM/YYYY hh:mm:ss A");
});

