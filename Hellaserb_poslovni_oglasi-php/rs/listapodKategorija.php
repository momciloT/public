<?php
	include('konekcija.php');
	
	$rec=$_GET['rec'];
	$sql="SELECT * FROM podkategorije WHERE id_kategorija=$rec";
	$rezultat=mysql_query($sql, $konekcija);
	$podkategorije=array();
	while($red=mysql_fetch_array($rezultat))
	{
		$i=$red['id_podKategorija'];
		$podkategorije[$i]=$red['naziv_podKategorije_srb'];
	}
	mysql_close($konekcija);
	echo json_encode($podkategorije);
?>