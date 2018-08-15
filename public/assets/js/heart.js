function getHearts() {
  let hearts = localStorage.getItem('hearts');
  if (hearts != null) {
    return JSON.parse(hearts);
  } else {
    return {};
  }
}

function setHearts(hearts) {
  localStorage.setItem('hearts', JSON.stringify(hearts));
}

function adoptHasHeart(adopt_id) {
  let hearts = getHearts();
  return hearts.indexOf(adopt_id) >= 0;
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
}

function updateHeartHeader() {
  let hearts = getHearts();
  $("#heart_count").text(hearts.length);
  if (hearts.length > 0) {
    $("#heart_icon").addClass("highlight");
  } else {
    $("#heart_icon").removeClass("highlight");
  }
}