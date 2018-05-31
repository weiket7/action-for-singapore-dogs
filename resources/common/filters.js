import Vue from "vue"
import moment from "moment"

Vue.filter("formatDate", function (value) {
  return moment(value).format("DD/MM/YYYY");
});

Vue.filter("formatDateTime", function (value) {
  return moment(value).format("DD/MM/YYYY hh:mm:ss A");
});

