<script src="js/jquery-1.11.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
<script type="text/javascript"  src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script type="text/javascript"  src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script type="text/javascript"  src="http://multidatespickr.sourceforge.net/jquery-ui.multidatespicker.js"></script>
<script type="text/javascript">
 $(function () {

$("#datePick1").multiDatesPicker({minDate: 0, maxDate: "+12M",dateFormat: "dd/mm/yy"});
});

</script>

<?php if(!($_SESSION['uloga']=="1")) {@header("location:index.php");}
else{
include('konekcija.php');
$drugo=null;
/*----- Pocetak korisnik---*/
if(isset($_POST['dodajKor'])){
$drugo="donesiiKor";
echo'<form action="index.php?admin" name="panelkorisnik" method="post"><table>
<tr>
<td>Ime i prezime:</td><td><input type="text" name="ime"></td>
</tr>
<tr>
<td>Email:</td><td><input type="text" name="mail"></td>
</tr>
<tr>
<td>Password:</td><td><input type="password" name="pass"></td>
</tr>
<tr>
<td>Uloga:</td><td><input type="text" name="uloga"></td>
</tr>
<tr>
<td><input type="submit" name="unesiKor" value="Unesi korisnika"/></td>
</tr>
</table>
</form>';
}
if(isset($_POST['unesiKor'])){
$drugo="unesiKor";
$ime=$_POST['ime'];
$pass=md5($_POST['pass']);
$mail=$_POST['mail'];
$uloga=$_POST['uloga'];
$upis_rez="INSERT INTO korisnik VALUES('','$uloga','$ime','$mail','$pass')";
	$upis=mysql_query($upis_rez,$konekcija)or die("Nije uspeo upisivanje korisnika".mysql_error());
	if($upis){
	echo'Uspesno ste dodali korisnika</br>';
	}
}
if(isset($_POST['oiKor'])){
$drugo="unesiKor";
$upitoik="SELECT * FROM korisnik";
$rezoik=mysql_query($upitoik,$konekcija)or die("Nije uspeo upit".mysql_error());
echo'<form action="index.php?admin" name="panelkorisnikprikaz" method="post">
<table><tr><td>Id korisnika</td><td>&nbsp&nbsp&nbsp</td><td>Ime korisnika</td><td>&nbsp&nbsp&nbsp</td><td>E-mail korisnika</td></tr>';
while($nizoik=mysql_fetch_array($rezoik)){
echo'<tr><td>'.$nizoik['ID'].'</td><td>&nbsp&nbsp&nbsp</td><td>'.$nizoik['Ime'].'</td><td>&nbsp&nbsp&nbsp</td><td>'.$nizoik['Mail'].'</td><td><button type="submit" name="izmeniKor" value="'.$nizoik['ID'].'">IZMENI</button><button type="submit" name="obrisiKor" value="'.$nizoik['ID'].'">OBRISI</button></td>';
}
echo'</table></form>';
}
if(isset($_POST['obrisiKor'])){
$drugo="unesiKor";
$idko=$_POST['obrisiKor'];
$upitb="DELETE FROM korisnik WHERE ID=".$idko;
$rezultat=mysql_query($upitb,$konekcija)or die("Nije uspeo upit".mysql_error());
if($rezultat){echo'Korisnik je obrisan!</br><a href="index.php?admin">Nazad na Admin Panel</a>';}
}
if(isset($_POST['izmeniKor'])){
$drugo="unesiKor";
$idko=$_POST['izmeniKor'];
$upitiz="SELECT * FROM korisnik WHERE ID=".$idko;
$rezik=mysql_query($upitiz,$konekcija)or die("Nije uspeo upit".mysql_error());
$nizik=mysql_fetch_array($rezik);

echo'<form action="index.php?admin" name="panelkorisnik" method="post"><table>
<tr>
<td>Ime i prezime:</td><td><input type="text" name="ime" value="'.$nizik['Ime'].'"/></td>
</tr>
<tr>
<td>Lozinka:</td><td><input type="password" name="pass" value="'.$nizik['Lozinka'].'"/></td>
</tr>
<tr>
<td>Email:</td><td><input type="text" name="mail" value="'.$nizik['Mail'].'"/></td>
</tr>
<tr>
<td>Uloga:</td><td><input type="text" name="uloga" value="'.$nizik['ID_uloga'].'"/></td>
</tr>
<tr>
<td><button type="submit" name="izmeniKori" value="'.$idko.'">IZMENI</button></td>
</tr>
</table>
</form>';


}
if(isset($_POST['izmeniKori'])){
$drugo="unesiKor";
$idko=$_POST['izmeniKori'];

$ime=$_POST['ime'];
$pass=$_POST['pass'];

$mail=$_POST['mail'];
$uloga=$_POST['uloga'];

$upitisk="UPDATE korisnik SET ID_uloga='".$uloga."',Ime='".$ime."',Mail='".$mail."',Lozinka='".$pass."' WHERE ID='".$idko."'";
$rezultati=mysql_query($upitisk,$konekcija)or die("Izmena nije uspela".mysql_error());if($rezultati){echo'Uspešno ste izmenili kontakt!</br><a href="index.php?adminp">Nazad na Admin Panel</a>';}}

/*----- Kraj korisnik---*/

/*----- Pocetak soba---*/
if(isset($_POST['dodajSob'])){
$drugo="donesiiKor";
echo'<form action="index.php?admin" name="panelkorisnik" method="post"><table>
<tr>
<td>Broj:</td><td><input type="text" name="broj"></td>
</tr>
<tr>
<td>Tip:</td><td><select name="tip">';
$upit="SELECT * FROM tip";
$rezultat=mysql_query($upit,$konekcija)or die("Nije uspeo upisivanje korisnika".mysql_error());
echo'<option value="0">Izaberi</option>';
while($niz=mysql_fetch_array($rezultat))
{
echo'<option value="'.$niz['ID'].'">'.$niz['Naziv'].'</option>';
}
echo'</select>
</td>
</tr>
<tr>
<td>Opis:</td><td><input type="text" name="opis"></td>
</tr>
<tr>
<td>Sprat:</td><td><select name="sprat">';
$upit="SELECT * FROM sprat";
$rezultat=mysql_query($upit,$konekcija)or die("Nije uspeo upisivanje korisnika".mysql_error());
echo'<option value="0">Izaberi</option>';
while($niz=mysql_fetch_array($rezultat))
{
echo'<option value="'.$niz['ID'].'">'.$niz['Naziv'].'</option>';
}
echo'</select>

</td>
</tr>
<tr>
<td>Pogled:</td><td><select name="pogled">';
$upit="SELECT * FROM pogled";
$rezultat=mysql_query($upit,$konekcija)or die("Nije uspeo upisivanje korisnika".mysql_error());
echo'<option value="0">Izaberi</option>';
while($niz=mysql_fetch_array($rezultat))
{
echo'<option value="'.$niz['ID'].'">'.$niz['Naziv'].'</option>';
}
echo'</select>
</td>
</tr>
<tr>
<td><input type="submit" class="button" name="unesiSob" value="Unesi"/></td>
</tr>
</table>
</form>';
}
if(isset($_POST['unesiSob'])){
$drugo="unesiKor";
$tip=$_POST['tip'];
$opis=$_POST['opis'];
$pogled=$_POST['pogled'];
$sprat=$_POST['sprat'];
$broj=$_POST['broj'];
$upis_rez="INSERT INTO soba VALUES('','$tip','$opis','$sprat','$pogled','$broj')";
	$upis=mysql_query($upis_rez,$konekcija)or die("Nije uspeo upisivanje korisnika".mysql_error());
	if($upis){
	echo'Uspesno ste dodali sobu</br><a href="index.php?adminp">Nazad na Admin Panel</a>';
	}
}
if(isset($_POST['oiSob'])){
$drugo="unesiKor";
$upitoik="SELECT * FROM soba";
$rezoik=mysql_query($upitoik,$konekcija)or die("Nije uspeo upit".mysql_error());
echo'<form action="index.php?admin" name="panelkorisnikprikaz" method="post">
<table><tr><td>Broj sobe</td></tr>';
while($nizoik=mysql_fetch_array($rezoik)){
echo'<tr><td>'.$nizoik['Broj'].'</td><td><button type="submit" name="izmeniSob" value="'.$nizoik['ID'].'">IZMENI</button><button type="submit" name="obrisiSob" value="'.$nizoik['ID'].'">OBRISI</button></td>';
}
echo'</table></form>';
}
if(isset($_POST['obrisiSob'])){
$drugo="unesiKor";
$idko=$_POST['obrisiSob'];
$upitb="DELETE FROM soba WHERE ID=".$idko;
$rezultat=mysql_query($upitb,$konekcija)or die("Nije uspeo upit".mysql_error());
if($rezultat){echo'Soba je obrisana!<a href="index.php?admin"><p>Nazad na Admin Panel</p></a>';}
}
if(isset($_POST['izmeniSob'])){
$drugo="unesiKor";
$idko=$_POST['izmeniSob'];
$upitiz="SELECT * FROM soba WHERE ID=".$idko;
$rezik=mysql_query($upitiz,$konekcija)or die("Nije uspeo upit".mysql_error());
$nizik=mysql_fetch_array($rezik);

echo'<form action="index.php?admin" name="panelkorisnik" method="post"><table>
<tr>
<td>Tip:</td><td><select name="tip">';$upit="SELECT * FROM tip WHERE ID=".$nizik['ID_tip'];
$rezultat=mysql_query($upit,$konekcija)or die("Nije uspeo upit".mysql_error());
while($niz=mysql_fetch_array($rezultat)){ echo'<option value="'.$niz['ID'].'">'.$niz['Naziv'].'</option>';	}
$upit="SELECT * FROM tip WHERE ID!=".$nizik['ID_tip'];
$rezultat=mysql_query($upit,$konekcija)or die("Nije uspeo upit".mysql_error());
while($niz=mysql_fetch_array($rezultat)){ echo'<option value="'.$niz['ID'].'">'.$niz['Naziv'].'</option>';	}
 echo'</select></td>
</tr>
<tr>
<td>Sprat:</td><td><select name="sprat">';$upit="SELECT * FROM sprat WHERE ID=".$nizik['ID_sprat'];
$rezultat=mysql_query($upit,$konekcija)or die("Nije uspeo upit".mysql_error());
while($niz=mysql_fetch_array($rezultat)){ echo'<option value="'.$niz['ID'].'">'.$niz['Naziv'].'</option>';	}
$upit="SELECT * FROM sprat WHERE ID!=".$nizik['ID_sprat'];
$rezultat=mysql_query($upit,$konekcija)or die("Nije uspeo upit".mysql_error());
while($niz=mysql_fetch_array($rezultat)){ echo'<option value="'.$niz['ID'].'">'.$niz['Naziv'].'</option>';	}
 echo'</select></td>
</tr>
<tr>
<td>Pogled:</td><td><select name="pogled">';$upit="SELECT * FROM pogled WHERE ID=".$nizik['ID_pogled'];
$rezultat=mysql_query($upit,$konekcija)or die("Nije uspeo upit".mysql_error());
while($niz=mysql_fetch_array($rezultat)){ echo'<option value="'.$niz['ID'].'">'.$niz['Naziv'].'</option>';	}
$upit="SELECT * FROM pogled WHERE ID!=".$nizik['ID_pogled'];
$rezultat=mysql_query($upit,$konekcija)or die("Nije uspeo upit".mysql_error());
while($niz=mysql_fetch_array($rezultat)){ echo'<option value="'.$niz['ID'].'">'.$niz['Naziv'].'</option>';	}
 echo'</select></td>
</tr>
<tr>
<td>Opis:</td><td><input type="text" name="opis" value="'.$nizik['Opis'].'"/></td>
</tr>
<tr>
<td>Broj:</td><td><input type="text" name="broj" value="'.$nizik['Broj'].'"/></td>
</tr>
<tr>
<td><button type="submit" name="izmeniSobu" value="'.$idko.'">IZMENI</button></td>
</tr>
</table>
</form>';


}
if(isset($_POST['izmeniSobu'])){
$drugo="unesiKor";
$idko=$_POST['izmeniSobu'];

$tip=$_POST['tip'];
$pogled=$_POST['pogled'];
$sprat=$_POST['sprat'];
$opis=$_POST['opis'];
$broj=$_POST['broj'];

$upitisk="UPDATE soba SET ID_tip='".$tip."',Opis='".$opis."',ID_sprat='".$sprat."',ID_pogled='".$pogled."',Broj='".$broj."' WHERE ID='".$idko."'";
$rezultati=mysql_query($upitisk,$konekcija)or die("Izmena nije uspela".mysql_error());if($rezultati){echo'Uspešno ste izmenili kontakt!</br><a href="index.php?adminp">Nazad na Admin Panel</a>';}}
/*----- Kraj soba---*/

/*----- Pocetak rezervacija---*/
if(isset($_POST['dodajRez'])){
$drugo="dodajRez";
echo'<form action="index.php?admin" name="panelkorisnik" method="post"><table>
<tr>
<td>Soba:</td><td><select name="soba">';
$upit="SELECT * FROM soba";
$rezultat=mysql_query($upit,$konekcija)or die("Nije uspeo upisivanje korisnika".mysql_error());
echo'<option value="0">Izaberi</option>';
while($niz=mysql_fetch_array($rezultat))
{
echo'<option value="'.$niz['ID'].'">'.$niz['Broj'].'</option>';
}
echo'</select>
</td>
</tr>
<tr>
<td>Datumi:</td><td><input id="datePick1" name="datePick1" type="text"/></td>
</tr>
<tr>
<td><input type="submit" class="button" name="unesiRez" value="Unesi"/></td>
</tr>
</table>
</form>';
}
if(isset($_POST['unesiRez'])){
$drugo="unesiRez";
$soba=$_POST['soba'];
$datumi=$_POST['datePick1'];
$korisnikMail=$_SESSION['korisnik'];
$upis_rez="INSERT INTO rezervacija VALUES('','$soba','$datumi','$korisnikMail')";
	$upis=mysql_query($upis_rez,$konekcija)or die("Nije uspeo upisivanje korisnika".mysql_error());
	if($upis){
	echo'<h3>Uspesno ste dodali rezervaciju</h3></br><a href="index.php?admin" class="button">Nazad na Admin Panel</a>';
	}
}
if(isset($_POST['oiRez'])){
$drugo="unesiRez";
$upitoik="SELECT * FROM rezervacija";
$rezoik=mysql_query($upitoik,$konekcija)or die("Nije uspeo upit".mysql_error());
echo'<form action="index.php?admin" name="panelkorisnikprikaz" method="post">
<table><tr><td>Broj rezervacije</td><td>&nbsp&nbsp&nbsp</td><td>Korisnik</td></tr>';
while($nizoik=mysql_fetch_array($rezoik)){
echo'<tr><td>'.$nizoik['ID'].'</td><td>&nbsp&nbsp&nbsp</td><td>'.$nizoik['ID_korisnik'].'</td><td><button type="submit" class="button" name="izmeniRez" value="'.$nizoik['ID'].'">IZMENI</button><button type="submit" name="obrisiRez" class="button" value="'.$nizoik['ID'].'">OBRISI</button></td>';
}
echo'</table></form>';
}
if(isset($_POST['obrisiRez'])){
$drugo="unesiKor";
$idko=$_POST['obrisiRez'];
$upitb="DELETE FROM rezervacija WHERE ID=".$idko;
$rezultat=mysql_query($upitb,$konekcija)or die("Nije uspeo upit".mysql_error());
if($rezultat){echo'<h3>Rezervacija je obrisana!</h3><a href="index.php?admin" class="button">Nazad na Admin Panel</a>';}
}
if(isset($_POST['izmeniRez'])){
$drugo="unesiKor";
$idko=$_POST['izmeniRez'];
$upitiz="SELECT * FROM rezervacija WHERE ID=".$idko;
$rezik=mysql_query($upitiz,$konekcija)or die("Nije uspeo upit".mysql_error());
$nizik=mysql_fetch_array($rezik);
echo'<form action="index.php?admin" name="panelkorisnik" method="post"><table>
<tr>
<td>Datumi:</td><td><input type="text"  name="broj" value="'.$nizik['Datum'].'"/></td>
</tr>
<tr>
<td><button type="submit" class="button" name="izmeniRezu" value="'.$idko.'">IZMENI</button></td>
</tr>
</table>
</form>';

}
if(isset($_POST['izmeniRezu'])){
$drugo="unesiKor";
$idko=$_POST['izmeniRezu'];
$datum=$_POST['broj'];
$upitisk="UPDATE rezervacija SET Datum='".$datum."'WHERE ID='".$idko."'";
$rezultati=mysql_query($upitisk,$konekcija)or die("Izmena nije uspela".mysql_error());
if($rezultati){echo'<h3>Uspešno ste izmenili rezervaciju!</h3></br><a class="button" href="index.php?admin">Nazad na Admin Panel</a>';}}

/*----- Kraj rezervacija---*/

/*----- Pocetak galerija---*/




/*----- Kraj galerija---*/




else
{if($drugo==""){
?>
<div class="heading_bg">
<h2>ADMIN PANEL</h2>
</div>
<form action="index.php?admin" name="panel" method="post">


<table>
<tr>
<td><input type="submit"  class="button" style="font-size: 18px" name="dodajKor" value="Dodaj korisnika"/></td>
<td><input type="submit"  class="button" style="font-size: 18px" name="oiKor" value="Izmeni/Obriši korisnika"/></td>
</tr>
<tr>
<td><input type="submit" class="button" style="font-size: 18px" name="dodajSob" value="Dodaj sobu"/></td>
<td><input type="submit" class="button" style="font-size: 18px" name="oiSob" value="Izmeni/Obriši sobu"/></td>
</tr>
<tr>
<td><input type="submit"  class="button" style="font-size: 18px" name="dodajRez" value="Dodaj rezervaciju"/></td>
<td><input type="submit"  class="button" style="font-size: 18px" name="oiRez" value="Izmeni/Obriši rezervaciju"/></td>
</tr>
</table>
</form>

<?php
}
}
}





?>