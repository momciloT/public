<link href="css/lightbox.css" rel="stylesheet" />
<script src="js/jquery-1.11.0.min.js"></script>
	<script src="js/lightbox.min.js"></script>
<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
<script type="text/javascript"  src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script type="text/javascript"  src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script type="text/javascript"  src="http://multidatespickr.sourceforge.net/jquery-ui.multidatespicker.js"></script>
<script type="text/javascript">
 $(function () {
    var m="<?php
include('konekcija.php');
if(isset($_GET['tip'])){
$id=$_GET['id'];
$upit='SELECT * FROM rezervacija WHERE ID_soba='.$id;
$rezultat=mysql_query($upit,$konekcija)or die('Nije uspeo upisivanje korisnika'.mysql_error());
$string="";

while($niz=mysql_fetch_array($rezultat)){$string.=$niz['Datum'].",";}
$string=substr($string, 0, -1);
echo $string;}?>";
if(m!=""){
var st=m.split(",");
$("#datePick").multiDatesPicker({minDate: 0, maxDate: "+12M",dateFormat: "dd/mm/yy",addDisabledDates: st});
}
else
{
$("#datePick").multiDatesPicker({minDate: 0, maxDate: "+12M",dateFormat: "dd/mm/yy"});
}
});

</script>
<script>
function ponisti()
{ 
$("#datePick").multiDatesPicker('resetDates','picked');
$("#datePick").val('');
}

</script>
<?php
include('konekcija.php');
if(isset($_GET['id'])){
$tip=$_GET['tip'];
$id=$_GET['id'];
$upit=mysql_query('SELECT * FROM tip WHERE ID='.$tip);
if (!$upit) {
    echo 'Nazalost nemamo takav tip sobe.';
	exit;

}else{
$upit1='SELECT Broj FROM soba WHERE ID='.$id;
$rrr=mysql_query($upit1,$konekcija)or die("Nije uspeo upisivanje korisnika".mysql_error());

$opis1=mysql_fetch_row($rrr);
$opis=mysql_fetch_row($upit);
 echo  '<div class="heading_bg">
 <h2>'.$opis[1].'<sub> broj sobe - <b>'.$opis1[0].'</b></sub></h2>
</div><table id="text" style="width: 100%;"><tr><td style="width: 30%; height: 280px;">
<form action="index.php?soba" name="panelrezervacija" method="post"><input id="datePick" name="datePick" type="text"/><input style="display:none" name="id" value="'.$id.'" />
<input type="submit" class="button" name="Unesi" value="Rezerviši"/><input  type="button" class="button" value="Poništi" onClick="ponisti();"/></form></td><td style="width: 60%; height: 280px;">
'.$opis[2].'</td></tr></table>';


$upit2=mysql_query('SELECT * FROM slike WHERE ID_sprat='.$tip);
echo"<table style='border-collapse: separate; border-spacing: 4px;'><tr>";
$i=0;
while($niz=mysql_fetch_array($upit2)){
if($i==4){echo'</tr><tr>';$i=0;}$i++;
echo'<td><a href="'.$niz['Putanja'].'" data-lightbox="roadtrip" ><img style="width: 250px;" src="'.$niz['Putanja'].'" alt="Planinarski Dom"/></a></td>';
}
echo'</tr></table>';

}



}
else{if(($_GET['soba'])!=null)
{
$upit=mysql_query('SELECT Opis,Naziv FROM tip WHERE ID='.$_GET['soba']);
if (!$upit) {
    echo 'Nazalost nemamo takav tip sobe.';
exit;
}
else{
$opis=mysql_fetch_row($upit);

echo"<div class='heading_bg'> <h2>".$opis[1]."</h2> </div></br>".$opis[0];

echo'</br></br><a href="index.php?rezervacija"><button class="button">REZERVIŠI</button></a>';


echo"<div class='heading_bg'> <h2>Slike</h2> </div></br>";
$upit2=mysql_query('SELECT * FROM slike WHERE ID_sprat='.$_GET['soba']);
echo"<table style='border-collapse: separate; border-spacing: 4px;'><tr>";
$i=0;
while($niz=mysql_fetch_array($upit2)){
if($i==4){echo'</tr><tr>';}$i++;
echo'<td><a href="'.$niz['Putanja'].'" data-lightbox="roadtrip"><img width="230px" src="'.$niz['Putanja'].'" alt=""></a></td><td></td>';

}
echo'<td><a href="lux.html"><img width="180px" src="images/3d.jpg" alt="Pogledaj sobu u 3D-u"/></button></a></td></tr></table>';

}
}



}


if(isset($_POST['Unesi'])){
$id1=$_POST['id'];
$date=$_POST['datePick'];
$korisnikdip=$_SESSION['korisnik'];
if($date=="")
{
echo'<h3>Motrate izabrati datum</h3><a href="javascript:history.go(-1)"><button class="button">Vrati se nazad</button></a>';

}
else{
$upis_rez="INSERT INTO rezervacija VALUES('','$id1','$date','$korisnikdip')";
	$upis=mysql_query($upis_rez,$konekcija)or die("Nije uspeo upisivanje korisnika".mysql_error());
	if($upis){
	echo'<h3>Uspešno ste rezervisali</h3><a href="javascript:history.go(-1)"><button class="button">Vrati se</button></a>';
exit;
	}
	}
	}
?>
