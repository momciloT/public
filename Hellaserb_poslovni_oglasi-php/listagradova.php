<?php
	include('konekcija.php');
	
	$rec=$_GET['rec'];
	$sql="SELECT id_grad, naziv_grada_gre FROM gradovi WHERE id_drzava=$rec order by naziv_grada_gre";
	$rezultat=mysql_query($sql, $konekcija);
	$gradovi=array();
	while($red=mysql_fetch_array($rezultat))
	{
		$i=$red['id_grad'];
		$gradovi[$i]=$red['naziv_grada_gre'];
	}
	mysql_close($konekcija);
	echo json_encode($gradovi);
?>