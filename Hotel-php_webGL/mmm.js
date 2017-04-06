
$(document).ready(function(){
$('#green').hide();
$('#ulazbtn').click(function() {
    $('#green').show();
	$('#ulazbtn').hide();
});
$('#nazad').click(function() {
$('#ulazbtn').show();
$('#green').hide();
});
});
var regime=/^[A-Z][a-z]{1,}[\s][A-Z][a-z]{1,}$/;
var regmail=/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
function imeprovera(){
var ime=document.getElementById('Ime').value;
if(!regime.test(ime))
{
document.getElementById('grime').innerHTML="Greska";
document.getElementById('grime').style.visibility="initial";
}
else
{
document.getElementById('grime').style.visibility="hidden";
}
};
function mailprovera(){
var mail=document.getElementById('mail').value;
if(!regmail.test(mail))
{
document.getElementById('grmail').innerHTML="Greska";
document.getElementById('grmail').style.visibility="initial";
}
else
{
document.getElementById('grmail').style.visibility="hidden";
}
};

function lozinkaGR(){
var lozinka=document.getElementById('lozinka').value;
var plozinka=document.getElementById('plozinka').value;
if(lozinka!=plozinka)
{
document.getElementById('grlozinka').innerHTML="Lozinke se ne poklapaju";
document.getElementById('grlozinka').style.visibility="initial";}
else
{document.getElementById('grlozinka').style.visibility="hidden";}
};