/**
 * Function with jquery to scroll trough the table 
 */
var start = document.getElementById('start');
start.focus();
start.style.backgroundColor = 'orange';
start.style.color = 'white';

function dotheneedful(sibling) {
  if (sibling != null) {
    start.focus();
    start.style.backgroundColor = '';
    start.style.color = '';
    sibling.focus();
    sibling.style.backgroundColor = 'orange';
    sibling.style.color = 'white';
    start = sibling;
  }
}

document.onkeydown = checkKey;
/**
 * Function with jquery to scroll trough the table 
 */
function checkKey(e) {
  e = e || window.event;
  if (e.keyCode == '38') {
    // up arrow
    var idx = start.cellIndex;
    var nextrow = start.parentElement.previousElementSibling;
    if (nextrow != null) {
      var sibling = nextrow.cells[idx];
      dotheneedful(sibling);
    }
  } else if (e.keyCode == '40') {
    // down arrow
    var idx = start.cellIndex;
    var nextrow = start.parentElement.nextElementSibling;
    if (nextrow != null) {
      var sibling = nextrow.cells[idx];
      dotheneedful(sibling);
    }
  } else if (e.keyCode == '37') {
    // left arrow
    var sibling = start.previousElementSibling;
    dotheneedful(sibling);
  } else if (e.keyCode == '39') {
    // right arrow
    var sibling = start.nextElementSibling;
    dotheneedful(sibling);
  }
}
$(document).ready(function() {
  $('[data-toggle="tooltip"]').tooltip();
  $("#search").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#spelers tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
  });
});

$(document).ready(function() {
  document.getElementById('email-list').onchange = function() {
    var i = 1;
    var myDiv = document.getElementById(i);
    while (myDiv) {
        myDiv.style.display = 'none';
        myDiv = document.getElementById(++i);
    }
    document.getElementById(this.value).style.display = 'block';
}
});