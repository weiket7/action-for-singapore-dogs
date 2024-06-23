function getHearts() {
  let hearts = localStorage.getItem('hearts');
  if (hearts != null) {
    return JSON.parse(hearts);
  } else {
    return [];
  }
}

function setHearts(hearts) {
  localStorage.setItem('hearts', JSON.stringify(hearts));
}

function heartAdopt(adopt_id) {
  let hearts = getHearts();
  addOrRemoveHearts(hearts, adopt_id);
  setHearts(hearts);
  updateHeartHeader();
}

function addOrRemoveHearts(hearts, adopt_id) {
  let index = hearts.indexOf(adopt_id);
  if (index >= 0) {
    hearts.splice(index, 1);
  } else {
    hearts.push(adopt_id);
  }
}

function updateHeartHeader() {
  let hearts = getHearts();
  let heart_count = objectIsEmpty(hearts) ? 0 : hearts.length;
  $("#heart_count").text(heart_count);
  if (hearts.length > 0) {
    $("#heart_icon").addClass("highlight");
  } else {
    $("#heart_icon").removeClass("highlight");
  }
  $("#link-i-want-to-adopt").attr("href", window.base_url+"/i-want-to-adopt?hearts=" + hearts.join(",")); //update header heart
  $("#link-i-want-to-adopt2").attr("href", window.base_url+"/i-want-to-adopt?hearts=" + hearts.join(",")); //update adopt-view heart
}

function objectIsEmpty(object) {
  return Object.keys(object).length === 0
}