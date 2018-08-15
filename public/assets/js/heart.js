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
  let index = hearts.indexOf(adopt_id);
  if (index >= 0) {
    hearts.splice(index, 1);
  } else {
    hearts.push(adopt_id);
  }
  setHearts(hearts);
  updateHeartHeader();
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
  $("#link-i-want-to-adopt").attr("href", "i-want-to-adopt?hearts=" + hearts.join(","))
}

function objectIsEmpty(object) {
  return Object.keys(object).length === 0
}