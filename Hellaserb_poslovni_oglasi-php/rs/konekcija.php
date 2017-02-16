<?php
	$host="localhost";
	$korisnik="root";
	$pasvord="";
	$naziv_baze="hellaserb";
	$konekcija=mysql_connect($host,$korisnik,$pasvord) or die("Konekcija sa serverom nije uspela!".mysql_error());
	mysql_set_charset('utf8',$konekcija);
	$baza=mysql_select_db($naziv_baze, $konekcija) or die("Konekcija sa bazom nije uspela!".mysql_error());
	$folder_slike="images/";
?>