$(document).ready(function(){
  $('#toggleButton').click(function(){
    $('#disclaimer').toggle();
    
    if($('#disclaimer').is(':visible')) {
      $(this).val('Prikaži manje');
    } else {
      $(this).val('Opširnije...');
    }
  });
});
