<?php 
@session_start();
if(!isset($_SESSION['korisnik']))
{
@header("Location:index.php");

}

?>
<!DOCTYPE HTML>
<?php include('funk.php'); ?>
<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
<script type="text/javascript"  src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script type="text/javascript"  src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script type="text/javascript"  src="http://multidatespickr.sourceforge.net/jquery-ui.multidatespicker.js"></script>


<form method="POST" action="" name="res">
  <div class="heading_bg">
    <h2>Rezervacija</h2>
</div>
<p>Izaberi tip sobe:<select name="tip" id="selectOpt1" name="tip" onchange="obradi();"><option value="0">Izaberi</option><?php sobe(); ?></select></p>
<p>Izaberi pogled:<select name="pogled" id="selectOpt2" onchange="obradi();" ><option value="0">Izaberi</option><?php sobepogled(); ?></select></p>
<p>Izaberi sprat:<select name="sprat" id="selectOpt3" onchange="obradi();"><option value="0">Izaberi</option><?php sobesprat(); ?></select></p>


</form>
<div id="ispis"></div>
<div id="sss"></div>
<script type="text/javascript">

var xmlHttp=null;
function GetXmlHttpObject()
{

	var xmlHttp=null;
	try{
xmlHttp=new XMLHttpRequest();

	}
	catch(e){
		try{
			xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
				alert("2");
		}
		catch(e){
			xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
	}
	return xmlHttp;
}

 function rezultat(){
 if(xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){
			document.getElementById("ispis").innerHTML=xmlHttp.responseText;
	}
 }
 function obradi(){
 xmlHttp=GetXmlHttpObject();
 if(xmlHttp!=null){
 var url="obrada.php";
 
 var tip=document.getElementById('selectOpt1').value;
  var pogled=document.getElementById('selectOpt2').value;
  var sprat=document.getElementById('selectOpt3').value;
	url=url+"?tip="+tip+"&pogled="+pogled+"&sprat="+sprat;
	
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
	xmlHttp.onreadystatechange=rezultat;
	
 }
 }

   
</script>

