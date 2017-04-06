<?php
$host='localhost';
$korisnik='Admin';
$lozinka='000';

$konekcija=mysql_connect($host,$korisnik,$lozinka)or die('Konekcija nije uspela.'.mysql_error());
$baza=mysql_select_db('hotel',$konekcija)or die('baza nije selektovana'.mysql_error());
mysql_query("SET NAMES utf8");
?>
