<?php
if(isset($_POST['soba'])){
$ime=$_POST['tip'];
	$user=$_POST['pogled'];
	$mail=$_POST['sprat'];}
function sobe(){
include('konekcija.php');
$upit="SELECT * FROM tip";
$rezultat=mysql_query($upit,$konekcija)or die('Upit nije izvrsen!!'.mysql_error());
while($niz=mysql_fetch_array($rezultat)){
echo'<option value="'.$niz['ID'].'">'.$niz['Naziv'].'</option>';
										}
		}
		

function sobesprat(){
include('konekcija.php');
$upit="SELECT * FROM sprat";
$rezultat=mysql_query($upit,$konekcija)or die('Upit nije izvrsen!!'.mysql_error());
while($niz=mysql_fetch_array($rezultat)){
echo'<option value="'.$niz['ID'].'">'.$niz['Naziv'].'</option>';
										}
		}
		
		function sobepogled(){
include('konekcija.php');
$upit="SELECT * FROM pogled";
$rezultat=mysql_query($upit,$konekcija)or die('Upit nije izvrsen!!'.mysql_error());
while($niz=mysql_fetch_array($rezultat)){
echo'<option value="'.$niz['ID'].'">'.$niz['Naziv'].'</option>';
										}
		}
		
		
		
?>