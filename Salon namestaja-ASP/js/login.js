function rezultat(){
document.getElementById("1").style.visibility='hidden';

document.getElementById("2").style.visibility='visible';

}

$(document).ready(function(){
$('#login').hide();
  $("div.overlay:nth-child(2) > ul:nth-child(1) > li:nth-child(3) > a:nth-child(1)").click(function(){
    $("#login").slideToggle("slow");
  });
});
