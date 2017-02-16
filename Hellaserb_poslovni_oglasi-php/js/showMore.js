$(document).ready(function(){
  $('#toggleButton').click(function(){
    $('#disclaimer').toggle();
    
    if($('#disclaimer').is(':visible')) {
      $(this).val('Πίσω');
    } else {
      $(this).val('Διαβάστε περισσότερα...');
    }
  });
});
