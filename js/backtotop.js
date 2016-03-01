$(document).ready(function(){
  $(window).scroll(function() {
    if ($(document).scrollTop() > 250) {
      $("#fixed-back").fadeIn();
    } else {
      $("#fixed-back").fadeOut();
    }
  });
});
