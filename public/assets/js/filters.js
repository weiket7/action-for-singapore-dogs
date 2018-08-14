
Vue.filter("formatDate", function (value) {
  if (value === "" || value == null || value == undefined) {
    return "";
  }
  let formatted = (value.match(/^(([0-9])|([0-2][0-9])) (Jan|Feb|Mar|Apr|May|Jun|Jul|Aug|Sep|Oct|Nov|Dec) \d{4}$/)) != null;
  if (formatted) {
    return value;
  }
  return moment(value).format("DD MMM YYYY");
});

Vue.filter("formatDateTime", function (value) {
  if (value === "") {
    return "";
  }
  return moment(value).format("DD MMM YYYY hh:mm:ss A");
});

Vue.filter("formatNumber", function (value) {
  return accounting.format(value, 2);
});


Vue.filter("showGender", function (value) {
  return value == 'M' ? 'Male' : 'Female';
});
