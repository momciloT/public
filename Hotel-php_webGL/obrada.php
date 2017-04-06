<?php
include('konekcija.php');
$i;
if((isset($_GET["tip"]))&&(isset($_GET["pogled"]))&&(isset($_GET["sprat"]))){
$tip=$_GET["tip"];

$pogled=$_GET["pogled"];
$sprat=$_GET["sprat"];
if($tip!=0 || $pogled!=0||$sprat!=0)
{
if($tip!=0&&$pogled!=0&&$sprat!=0){
$upit="SELECT * FROM soba WHERE ID_tip=".$tip." AND ID_sprat=".$sprat." AND ID_pogled=".$pogled;
$rezultat=mysql_query($upit,$konekcija)or die('Upit nije izvrsen!!'.mysql_error());
$rezultat1=mysql_query($upit,$konekcija)or die('Upit nije izvrsen!!'.mysql_error());
$niz1=mysql_fetch_array($rezultat);
if($niz1==null)
{
echo"<h2>Nazalost nemamo sobu kakvu trazite</h2>";
}
else{
echo"<table class='tabela'><tr><td><b>Broj sobe</b></td><td><b>Opis</b></td><td></td></tr>";
while($niz2=mysql_fetch_array($rezultat1)){
echo'<tr><td>'.$niz2['Broj'].'</td><td>'.$niz2['Opis'].'</td><td><a href="index.php?soba&tip='.$niz2['ID_tip'].'&id='.$niz2["ID"].'"><button class="button">Pogledaj slobodne termine</button></a></td></tr>';
}
echo"</table>";}
}else{
if($tip!=0&&$pogled!=0){
$upit="SELECT * FROM soba WHERE ID_tip=".$tip." AND ID_pogled=".$pogled;
$rezultat=mysql_query($upit,$konekcija)or die('Upit nije izvrsen!!'.mysql_error());
$rezultat=mysql_query($upit,$konekcija)or die('Upit nije izvrsen!!'.mysql_error());
$rezultat1=mysql_query($upit,$konekcija)or die('Upit nije izvrsen!!'.mysql_error());
$niz1=mysql_fetch_array($rezultat);
if($niz1==null)
{
echo"<h2>Nazalost nemamo sobu kakvu trazite</h2>";
}
else{
echo"<table class='tabela'><tr><td><b>Broj sobe</b></td><td><b>Opis</b></td><td></td></tr>";
while($niz2=mysql_fetch_array($rezultat1)){
echo'<tr><td>'.$niz2['Broj'].'</td><td>'.$niz2['Opis'].'</td><td><a href="index.php?soba&tip='.$niz2['ID_tip'].'&id='.$niz2["ID"].'"><button class="button">Pogledaj slobodne termine</button></a></td></tr>';
}
echo"</table>";}

}
else{
if($tip!=0&&$sprat!=0){
$upit="SELECT * FROM soba WHERE ID_tip=".$tip." AND ID_sprat=".$sprat;
$rezultat=mysql_query($upit,$konekcija)or die('Upit nije izvrsen!!'.mysql_error());
$rezultat1=mysql_query($upit,$konekcija)or die('Upit nije izvrsen!!'.mysql_error());
$niz1=mysql_fetch_array($rezultat);
if($niz1==null)
{
echo"<h2>Nazalost nemamo sobu kakvu trazite</h2>";
}
else{
echo"<table class='tabela'><tr><td><b>Broj sobe</b></td><td><b>Opis</b></td><td></td></tr>";
while($niz2=mysql_fetch_array($rezultat1)){
echo'<tr><td>'.$niz2['Broj'].'</td><td>'.$niz2['Opis'].'</td><td><a href="index.php?soba&tip='.$niz2['ID_tip'].'&id='.$niz2["ID"].'"><button class="button">Pogledaj slobodne termine</button></a></td></tr>';
}
echo"</table>";}

}
else{
if($tip!=0){
$upit="SELECT * FROM soba WHERE ID_tip=".$tip;
$rezultat=mysql_query($upit,$konekcija)or die('Upit nije izvrsen!!'.mysql_error());
$rezultat1=mysql_query($upit,$konekcija)or die('Upit nije izvrsen!!'.mysql_error());
$niz1=mysql_fetch_array($rezultat);
if($niz1==null)
{
echo"<h2>Nazalost nemamo sobu kakvu trazite</h2>";
}
else{
echo"<table class='tabela'><tr><td><b>Broj sobe</b></td><td><b>Opis</b></td><td></td></tr>";
while($niz2=mysql_fetch_array($rezultat1)){
echo'<tr><td>'.$niz2['Broj'].'</td><td>'.$niz2['Opis'].'</td><td><a href="index.php?soba&tip='.$niz2['ID_tip'].'&id='.$niz2["ID"].'"><button class="button">Pogledaj slobodne termine</button></a></td></tr>';
}
echo"</table>";}

}
else{
if($pogled!=0&&$sprat!=0){
$upit="SELECT * FROM soba WHERE ID_pogled=".$pogled." AND ID_sprat=".$sprat;
$rezultat=mysql_query($upit,$konekcija)or die('Upit nije izvrsen!!'.mysql_error());
$rezultat1=mysql_query($upit,$konekcija)or die('Upit nije izvrsen!!'.mysql_error());
$niz1=mysql_fetch_array($rezultat);
if($niz1==null)
{
echo"<h2>Nazalost nemamo sobu kakvu trazite</h2>";
}
else{
echo"<table class='tabela'><tr><td><b>Broj sobe</b></td><td><b>Opis</b></td><td></td></tr>";
while($niz2=mysql_fetch_array($rezultat1)){
echo'<tr><td>'.$niz2['Broj'].'</td><td>'.$niz2['Opis'].'</td><td><a href="index.php?soba&tip='.$niz2['ID_tip'].'&id='.$niz2["ID"].'"><button class="button">Pogledaj slobodne termine</button></a></td></tr>';
}
echo"</table>";}

}
else{
if($pogled!=0){
$upit="SELECT * FROM soba WHERE ID_pogled=".$pogled;
$rezultat=mysql_query($upit,$konekcija)or die('Upit nije izvrsen!!'.mysql_error());
$rezultat1=mysql_query($upit,$konekcija)or die('Upit nije izvrsen!!'.mysql_error());
$niz1=mysql_fetch_array($rezultat);
if($niz1==null)
{
echo"<h2>Nazalost nemamo sobu kakvu trazite</h2>";
}
else{
echo"<table class='tabela'><tr><td><b>Broj sobe</b></td><td><b>Opis</b></td><td></td></tr>";
while($niz2=mysql_fetch_array($rezultat1)){
echo'<tr><td>'.$niz2['Broj'].'</td><td>'.$niz2['Opis'].'</td><td><a href="index.php?soba&tip='.$niz2['ID_tip'].'&id='.$niz2["ID"].'"><button class="button">Pogledaj slobodne termine</button></a></td></tr>';
}
echo"</table>";}

}
else{
if($sprat!=0){
$upit="SELECT * FROM soba WHERE ID_sprat=".$sprat;
$rezultat=mysql_query($upit,$konekcija)or die('Upit nije izvrsen!!'.mysql_error());
$rezultat1=mysql_query($upit,$konekcija)or die('Upit nije izvrsen!!'.mysql_error());
$niz1=mysql_fetch_array($rezultat);
if($niz1==null)
{
echo"<h2>Nazalost nemamo sobu kakvu trazite</h2>";
}
else{
echo"<table class='tabela'><tr><td><b>Broj sobe</b></td><td><b>Opis</b></td><td></td></tr>";
while($niz2=mysql_fetch_array($rezultat1)){
echo'<tr><td>'.$niz2['Broj'].'</td><td>'.$niz2['Opis'].'</td><td><a href="index.php?soba&tip='.$niz2['ID_tip'].'&id='.$niz2["ID"].'"><button class="button">Pogledaj slobodne termine</button></a></td></tr>';
}
echo"</table>";}

}
else
{
echo"NAZALOST NEMAMO ODABRANI TIP SOBE";
}

}

}


}
}
}
}
}}
if(isset($_GET["odg"])){
$odgovor=$_GET["odg"];
$upit="UPDATE anketa SET Br=Br+1 WHERE Odgovor='".$odgovor."'";
$rezultat=mysql_query($upit,$konekcija)or die('Upit nije izvrsen!!'.mysql_error());
$up="SELECT Br FROM anketa";
$UK=0;
$br;
$re=mysql_query($up,$konekcija)or die('Upit nije izvrsen!!'.mysql_error());
while($niz=mysql_fetch_array($re))
{
$br[]=$niz['Br'];
$UK=$UK+$niz['Br'];
}
$x=$br[0]*100/$UK;
$y=100-$x;

echo' <div style="text-align: center; background: url("img/heading_bg.png") repeat;">
 <span><h2 style="text-align: center;"> <span style="background-color:#FFF;">Rezultat ankete</span></h2></span></div>
 <table style="width: 100%;"><tr><td style="background-color: #00D377; width: '.$x.'%; text-align: center;"><h3 style="font-family: Arial;">Odličan - '.$br[0].'</h3></td><td style="background-color: gray; width: '.$y.'%; text-align: center;"><h3 style="font-family: Arial;">Prosečan - '.$br[1].'</h3></td></tr></table>
';
 

}


?>