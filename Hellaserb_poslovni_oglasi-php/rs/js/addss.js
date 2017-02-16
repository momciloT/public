$(function(){ // document ready
 
  var stickyTop = $('#adds').offset().top; // returns number 
 
  $(window).scroll(function(){ // scroll event  
 
    var windowTop = $(window).scrollTop(); // returns number
 
    if (stickyTop < windowTop) {
      $('#adds').css({ position: 'fixed', top: 0 });
    }
    else {
      $('#adds').css('position','static');
    }
 
  });
 

 
  var stickyTop = $('#adds2').offset().top; // returns number 
 
  $(window).scroll(function(){ // scroll event  
 
    var windowTop = $(window).scrollTop(); // returns number
 
    if (stickyTop < windowTop) {
      $('#adds2').css({ position: 'fixed', top: 0 });
    }
    else {
      $('#adds2').css('position','static');
    }
 
  });
 
});