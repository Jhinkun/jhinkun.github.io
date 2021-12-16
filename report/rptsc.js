function confDel(anchor) {
  var conf = confirm("Are you sure to delete this report???");

  if (conf == true) {
    windows.location = anchor.attr("href");
  }
}

function show() {
  var check = document.getElementsByClassName("checkClass");
  var del = document.getElementsByName("delsel");
  if (check.checked == true) {
    del.style.display = "block";
  } else {
    del.style.display = "none";
  }
}