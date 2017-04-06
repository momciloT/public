<form actio<?php
echo'
<form method="post" action="index.php?registracija" name="regsitracija">
	
  <div class="heading_bg">
    <h2>Registracija</h2>
</div>
<table>
	<tr >
	<td><p style="font-size: 1.2em;">Ime i Prezime:</p></td>
	<td style="padding-left: 15px;"> <input type="text" name="ime"/></td>
	</tr>
	<tr>
	<td><p style="font-size: 1.2em;">Email: </p></td>
	<td style="padding-left: 15px;"><input type="text" name="email" id="tbKorisnicko"/></td>
	</tr>
	<tr >
	<td><p style="font-size: 1.2em;">Šifra:</p> </td>
	<td style="padding-left: 15px;"><input type="password" name="s"/></td>
	</tr>
	<tr>
	<td><p style="font-size: 1.2em;">Ponovite šifru: </p></td>
	<td style="padding-left: 15px;"><input type="password" name="ss"/></td>
	</tr>
	<tr>
	<td rowspan="2" align="center"> <input type="submit" name="registruj" value="Registruj"  class="button" style="font-size: 18px"/></td>
	</tr>
	</table></form>';
	if(isset($_POST['registruj'])){
	$ime=$_POST['ime'];
	
	$mail=$_POST['email'];
	$sifra=$_POST['s'];
	$sifrap=$_POST['ss'];
	$regime="/^[A-Z][a-z]{1,}[\s][A-Z][a-z]{1,}$/";
	$regmail="/^[a-z0-9]+(\.[_a-z0-9]+)*@[a-z0-9-]+(\.[a-z0-9]+)*(\.[a-z]{2,3})$/";
	$greska="";
	if(!preg_match($regmail,$mail)){
	$greska="Nije dobar format mail-a!";
	echo'Nije dobar format mail-a!</br>';
	}
	if(!preg_match($regime,$ime)){
	$greska="Niste pravilno upisali ime i prezime";
	echo'Niste pravilno upisali ime i prezime!</br>';
	}
	if(!($sifra==$sifrap)){
	$greska="Sifre se ne poklapaju";
	echo'Sifre se ne poklapaju!</br>';
	}
	if($greska==""){
	include('konekcija.php');
	$upit="SELECT * FROM korisnik";
	$rezultat=mysql_query($upit,$konekcija)or die("upit niije uspeo".mysql_error());
	while($niz=mysql_fetch_array($rezultat)){
	if($niz['Mail']==$mail){
	$greska="postojeci email!";
	echo"Postojeci email!";
	break;
	}

	
	}
	if($greska==""){
	$sifra=md5($sifra);
	$upis_rez="INSERT INTO korisnik VALUES('','2','$ime','$mail','$sifra')";
	$upis=mysql_query($upis_rez,$konekcija)or die("Nije uspeo upisivanje korisnika".mysql_error());
	if($upis){echo "<script type='text/javascript'>alert('Usepesno ste se registrovali');</script>";}
	}
	}
	
	
	
	
	
	}
?>