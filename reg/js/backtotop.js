$(document).ready(function(){
  $(window).scroll(function() {
    if ($(document).scrollTop() > 250) {
      $("#fixed-back").slideDown();
    } else {
      $("#fixed-back").fadeOut();
    }
  });
});
