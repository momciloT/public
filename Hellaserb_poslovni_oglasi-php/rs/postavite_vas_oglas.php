<?php
@session_start();
if (isset($_SESSION['fail'])){

	unset($_SESSION['fail']);
}
if(isset($_POST['bt1'])) {
	$email = trim($_POST['email-log']);
	$w = $_POST['pass-log'];
	$a = md5($w);

	include('konekcija.php');

	$upit = "SELECT * FROM korisnici WHERE email='$email' and password='$a'";
	$rez = mysql_query($upit, $konekcija) or die(mysql_error());

	if($niz = mysql_fetch_array($rez)) {
		$_SESSION['email'] = $niz['email'];
		$nik=array();
		$nik=explode("@",$_SESSION['email']);
		$_SESSION['nik']=$nik[0];
		$_SESSION['uloga'] = $niz['uloga'];
		$_SESSION['id_korisnik'] = $niz['id_korisnik'];
		$_SESSION['status'] = $niz['zakljucan_otkljucan'];
		unset($_SESSION['fail']);
	}
	else{
		$_SESSION['fail']="f";
	}

}


?>
<!DOCTYPE html>
<html lang="eng">

<head>
	<meta charset="utf-8">
	<title>HellaSerb</title>
	<meta name="description" content="HellaSerb">
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<link rel="stylesheet" id="font-awesome-css" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" type="text/css" media="screen">
	<script src="js/back_to_top.js"></script>
	<script src="js/showMore.js"></script>
	<script src="js/enter.js"></script>
	<script src="js/adds.js"></script>
	<script src="js/validate_oglas.js"></script>
	<script  type="text/javascript" src="ajaxobj.js"></script>
	<script  type="text/javascript" src="gradovi.js"></script>
	<script  type="text/javascript" src="podKategorije.js"></script>
	<!-- slider dodato-->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<!-- bxSlider Javascript file -->

	<script type="text/javascript" src="js/upload_slike.js"></script>

	<script type="text/javascript">
	
    function funk(){
        var x=document.getElementById('tbImePrezimeOdgLica').value;
        document.getElementById('izjava').innerHTML = '<span style="font-size:16px;"><strong>' + x + '</strong></span>';
  }

</script>
	
	<script type="text/javascript">
	  jQuery(document).ready(function($){
	   $(window).resize(function(){
	    if($(window).width()>800){
	     $('#log_navbar').hide();
	    }
	   });
	  });
  	 </script>
</head>

<body data-spy="scroll" data-target="#my-navbar">

<style>
	#selectedFiles img {
		max-width: 125px;
		max-height: 125px;
		margin-bottom:10px;
		border-radius: 15px;
		border: 1px solid gray;
	}

	
</style>

<?php
	include('konekcija.php');

?>

<!-- jumbotron-->
	
	<div class="jumbotron">
		<div class="container">
			<div class="row">
				<div class="col-sm-11">
					<a href="index.php"><img src="images/logo.png" class="img-responsive"></a>	
				</div>
				<div class="col-sm-1" id="language_header">
					<a href="postavite_vas_oglas.php"><img width="50" height="50" src="images/sr.png" class="img-responsive"></a>
					
					<a href="../place_your_ad.php"><img width="50" height="50" src="images/el.png" class="img-responsive"></a>
				</div>	
			</div><!-- End row-->	
		</div><!-- End container-->
	</div><!-- End jumbotron-->

		<!-- Navbar -->
	<nav class="navbar navbar-inverse navbar-static-top" id="my-navbar">
	

		<div class="container">
			<div class="navbar-header">
				<ul id="language_menu">
					<li>
						<a href="postavite_vas_oglas.php"><img width="50" height="50" src="images/sr.png" class="img-responsive"></a>
					</li>
					<li>
						<a href="../place_your_ad.php"><img width="50" height="50" src="images/el.png" class="img-responsive"></a>
					</li>
				</ul>
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

			</div><!-- Navbar header-->
			<div class="collapse navbar-collapse" id="navbar-collapse" >
				
				

				
				<ul class="nav navbar-nav">
					<li><a href="index.php">POČETNA</a></li>
					<li><a href="o_nama.php">O NAMA</a></li>
					<li><a href="nase_usluge.php">NAŠE USLUGE</a></li>
					<li><a href="info.php">INFO</a></li>
					<li><a href="oglasi.php">OGLASI</a></li>					
					<li><a href="postavite_vas_oglas.php">POSTAVITE VAŠ OGLAS</a></li>
					<li><a href="kontakt.php">KONTAKT</a></li>
					<li><?php if(isset($_SESSION['email'])){echo "<a href='function/log.php' >".$_SESSION['nik']." / ODJAVA</a>";}else{echo "<a href='#'>PRIJAVA</a>";} ?></li>
			</ul>
			<div id="validation-logfail" class="navbar-nav" style="margin-left: 15%;">
				<?php if(isset($_SESSION['fail'])){?><h4 style="color: red; ">Pogrešan email ili lozinka! Molimo pokušajte ponovo</h4><?php } ?>
			</div>
			<div id="log_navbar" class="navbar-nav">
				<?php if(!isset($_SESSION['email'])){?>

					<form id="logform"  method="post" enctype="multipart/form-data" name="log-forma" action="">


						<input type="text" name="email-log" placeholder="Vaš email" class="margin-left" id="emaill-log" data-rule="maxlen:4" data-msg="Molimo vas email" />
						<input type="password" name="pass-log" style="margin: 0px 7px;" placeholder="Vaša lozinka" class="margin-left" id="passw-log" data-rule="maxlen:4" data-msg="Pogresna lozinka pokusajte ponovo" />
						<input class="btn" type="submit" id="bt1" name="bt1" value="Ulogujte se"/>
						<h5 align="center" style="margin-right:220px;"><a style="color:red;" href="promena_lozinke.php">Zaboravili ste Vašu lozinku?</a></h5>
					</form>
				<?php }?>
			</div>

			</div>
		</div><!-- End Container-->
	</nav><!-- End navbar-->

		<!-- Content-->

		<div class="container">
		
			<div class="row">

            <div class="col-sm-2">
                <!-- Baneri left-->

			<style type="text/css">
				#cycler2{position:relative;}
				#cycler2 div{position:absolute;z-index:1}
				#cycler2 div.active{z-index:3}
			</style>


			

			<script type="text/javascript">
				function cycleImages2(){
					      var $active = $('#cycler2 .active');
					      var $next = ($active.next().length > 0) ? $active.next() : $('#cycler2 div:first');
					      $next.css('z-index',2);//move the next image up the pile
					      $active.fadeOut(1500,function(){//fade out the top image
						  $active.css('z-index',1).show().removeClass('active');//reset the z-index and unhide the image
					          $next.css('z-index',3).addClass('active');//make the next image the top one
					      });
					    }

					$(document).ready(function(){
					// run every 7s
					setInterval('cycleImages2()', 6000);
					})
			</script>

		
			<div id="cycler2">
			<?php
						include('konekcija.php');

						$query = mysql_query('SELECT * FROM baneri WHERE aktivnost = 1');
						$brojac = 0;
						while($row = mysql_fetch_array($query)){
						if($brojac == 0){
						echo '<div class="active"><a target="_blank" href="'.$row['link'].'"><img style="margin:0 auto; padding:20px;" src="images/'.$row['putanja'].'" /></a></div>';
						$brojac++;
					}else{
						echo '<div><a target="_blank" href="'.$row['link'].'"><img style="margin:0 auto; padding:20px;" src="images/'.$row['putanja'].'" /></a></div>';
						}
					}

					
					?>						
			</div>
			<!-- End baneri left-->
            </div>

            <div class="col-sm-8">
            	<!-- Deo za oglas-->

                <h3><strong>Podaci o oglasu</strong></h3>

                <form id="contactform" method="post" action="" enctype="multipart/form-data" class="validateoglas">
                	<div class="col-lg-12 field">
                        <input type="text" id="tbNazivFirme"  name="tbNazivFirme" placeholder="* Naziv firme..." data-rule="maxlen:4" data-msg="Molimo Vas unesite naziv firme" />
						<div class="validation">
						</div>
                    </div>
                    <div class="col-lg-12 field">
                    	<textarea rows="4" id="tbTekst" name="tbTekst" class="input-block-level" placeholder="* Tekst Vašeg oglasa... " data-rule="required" data-msg="Molimo Vas popunite tekst oglasa"></textarea>
						<div class="validation">
						</div>
                    </div>
                    <span>&nbsp;</span>

                <h3><strong>Kategorija oglasa</strong></h3>  
                	<div class="col-lg-12 field">
                		<select class="btn btn-default dropdown-toggle" style="text-align:left; width:222px;" id="kategorije" name="kategorije" onchange="vratiPodKategorije(this.value)" data-rule="required" data-msg="Molimo Vas izaberite kategoriju">
                			<option value="0">*Izaberite kategoriju...</option>
                			<?php
								include('konekcija.php');
								$sql="SELECT * FROM kategorije";
								$rezultat=mysql_query($sql, $konekcija);
								while($red=mysql_fetch_array($rezultat))
								{
									echo "<option value='".$red['id_kategorija']."'>".$red['naziv_kategorije_srb']."</option>";
								}
								mysql_close($konekcija);
							?>
                		</select>
                		<div class="validation"></div>
                	</div>
                	<div class="col-lg-12 field" style="margin-top:10px;">
                	<select class="btn btn-default dropdown-toggle" style="text-align:left; width:222px;" id="podKategorije" name="podKategorije" data-rule="required" data-msg="Molimo Vas izaberite podkategoriju">
                			<option value="0">*Izaberite pod kategoriju...</option>
                		</select>
                		<div class="validation"></div>
                	</div>
                	<div class="col-lg-12 field" style="margin-top:10px;">
                		<select class="btn btn-default dropdown-toggle" style="text-align:left; width:222px;" id="tip_oglasa" name="tip_oglasa" data-rule="required" data-msg="Molimo Vas izaberite tip oglasa">
                			<option value="0">*Izaberite tip oglasa...</option>
                			<?php
								include('konekcija.php');
								$sql="SELECT * FROM tip_oglasa";
								$rezultat=mysql_query($sql, $konekcija);
								while($red=mysql_fetch_array($rezultat))
								{
									echo "<option value='".$red['id_tip_oglasa']."'>".$red['naziv_tipa_oglasa_srb']."</option>";
								}
								mysql_close($konekcija);
							?>
                		</select>
                		<div class="validation"></div>
                	</div>
                	<div class="col-lg-12 field">
			    	<h4>Unos fotografija(uz oglas možete poslati do 5 fotografija)</h4>
			    		<div style="position:relative;">
        				<a class='btn btn-primary' href='javascript:;'>
            			Izaberite fotografije...
            			<input type="file" style='cursor: pointer !important;position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;'
                               id="files" name="file[]" size="40" accept="image/*"/>
						</a>
       					<div id="selectedFiles" style="margin-top:10px;"></div>
						</div>
						<input type="text" id="slikeniz" name="slikeniz" hidden />
                	</div>
                	<span>&nbsp;</span>
                	<h3><strong>Kontakt informacije</strong></h3>
                	<div class="col-lg-12 field">
                		<input type="text" id="tbImePrezime"  name="tbImePrezime" placeholder="* Ime i prezime..." style="height:25px;" data-rule="maxlen:4" data-msg="Molimo Vas unesite ime i prezime" />
						<div class="validation">
						</div>
                	</div>
                	<div class="col-lg-12 field">
                		<input type="text" id="tbMail"  name="tbMail" placeholder="E-mail adresa..." />
                	</div>
                	<div class="col-lg-12 field">
                		<input type="text" id="tbWebsite"  name="tbWebsite" placeholder="Website..." />
                	</div>
                	<div class="col-lg-12 field">
                        <input type="text" id="tbTelefon"  name="tbTelefon" placeholder="* Kontakt telefon(upišite broj bez razmaka između)..." />
						<div class="validation"></div>
                    </div>
                	<span>&nbsp;</span>

                	<h3><strong>Lokacija</strong></h3>
                	<div class="col-lg-12 field">
                		<input type="text" id="tbAdresa"  name="tbAdresa" placeholder="* Unesite Mesto, ulicu i broj..." data-rule="maxlen:4" data-msg="Molimo Vas unesite adresu firme" />
						<div class="validation"></div>
                	</div>
                	<div class="col-lg-12 field">
                	<select class="btn btn-default dropdown-toggle" style="text-align:left;" id="drzava" name="drzava" onchange="vratiGradove(this.value)" data-rule="required" data-msg="Molimo Vas izaberite državu">
                			<option value="0">*Izaberite državu...</option>
                			<?php
								include('konekcija.php');
								$sql="SELECT * FROM drzave order by naziv_drzave_srb";
								$rezultat=mysql_query($sql, $konekcija);
								while($red=mysql_fetch_array($rezultat))
								{
									echo "<option value='".$red['id_drzava']."'>".$red['naziv_drzave_srb']."</option>";
								}
								mysql_close($konekcija);
							?>
                		</select>
                		<div class="validation"></div>
                	</div>
                	<div class="col-lg-12 field" style="margin-top:10px;">
                	<select class="btn btn-default dropdown-toggle" style="text-align:left; width:167px;" id="grad" name="grad" data-rule="required" data-msg="Molimo Vas izaberite grad">
                		<option value="0">*Izaberite grad...</option>
                	</select>
                	<div class="validation"></div>
                	</div>
                	<span>&nbsp;</span>

            <!-- End Deo za oglas-->


            <!-- Deo za deklaraciju-->

                	<p style="font-size:16px;">U slučaju da želite popunjenu i overenu Deklaraciju poslati na fax, možete je u PDF-u preuzeti <a target="#" href="deklaracija_hellaserb.pdf"><strong>ovde</strong></a>.</p>

                	<h3>
                	<strong>DEKLARACIJA (član 11.) Zakona o oglašavanju</strong>
                	<!-- Button trigger modal -->
                    	<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
						  Deklaracija o oglašavanju
						</button>
					</h3>
                	
						<!-- Modal -->
						<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						        <h4 class="modal-title" id="myModalLabel">Deklaracija o oglašavanju</h4>
						      </div>
						      <div class="modal-body">
						        <p>Inostrana i domaća pravna i fizička lica, imaju ista prava i obaveze prilikom oglašavanja, a u skladu sa Zakonom o oglašavanju Republike Srbije.</p>
						        <p>Dokument koji sadrži, podatke o proizvođaču oglasne poruke i o oglašivaču predstavlja Deklaraciju o oglašavanju, i neophodna je za  sva pravna lica  – preduzeća ili preduzetnike, po Zakonu o oglašavanju (član11).</p>
						        <p>Oglašivač je u obavezi, da u Deklaraciju tačno unese tražene podatke, i dostavi je licu koje objavljuje oglasne poruke, te na taj način oglašivač garantuje za tačnost unetih podataka i za sadržaj oglasne poruke.</p>
						        <p>Registracijom, kao korisnik portala, podatke koje ste tom prilikom uneli činiće Deklaraciju o oglašavanju.</p>
						        <p><strong>Ovi podaci biće tretirani  kao poverljivi u skladu sa Zakonom o zaštiti podataka o ličnosti, i neće biti javno dostupni.</strong></p>
						        <p>Period trajanja Deklaracije je do promene podataka o oglašivaču.</p>
						        <p>Ukoliko se promene podaci o oglašivaču, isti je obavezan da  pošalje novu Deklaraciju sa unetim važećim promenama.</p>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal">Izađite</button>
						      </div>
						    </div>
						  </div>
						</div><!-- End Modal-->
                	<p style="font-size:16px;">Uneti podaci biće tretirani kao poverljivi u skladu sa Zakonom o zaštiti podataka o ličnosti i <strong>neće biti javno dostupni</strong>.</p>
                	<p style="font-size:16px;">Worth Biomin d.o.o Koste Novakovića br.15   11127 Beograd</p>
                	<p style="font-size:16px;">Naziv i sedište lica koje objavljuje ili emituje oglasnu poruku:</p>
                	<hr>

                	<h3><strong>I Podaci o proizvođaču oglasne poruke</strong></h3>
                	<p style="font-size:16px;">Oglašivač je ujedno i proizvođač oglasne poruke.</p>
					<hr>

                	<h3><strong>II Podaci o oglašivaču</span></strong></h3>
                	<div class="col-lg-12 field">
                		<h5 style="font-size:16px;">Naziv firme</h5>
                        <input type="text" id="tbNazivFirmeDek"  name="tbNazivFirmeDek" placeholder="* Naziv firme..." data-rule="maxlen:4" data-msg="Molimo Vas unesite naziv firme " />
						<div class="validation"></div>
                    </div>
                    <div class="col-lg-12 field">
                    	<h5 style="font-size:16px;">Adresa</h5>
                        <input type="text" id="tbAdresaDek"  name="tbAdresaDek" placeholder="* Unesite ulicu, broj i mesto..." data-rule="maxlen:4" data-msg="Molimo Vas unesite adresu firme" />
						<div class="validation"></div>
                    </div>
                    <div class="col-lg-12 field">
                    	<h5 style="font-size:16px;">Broj pod kojim je firma registrovana</h5>
                        <input type="text" id="tbBrReg"  name="tbBrReg" placeholder="* Broj pod kojim je firma registrovana..." data-rule="maxlen:4" data-msg="Molimo Vas unesite matični broj firme" />
						<div class="validation"></div>
                    </div>
                    <div class="col-lg-12 field">
                    	<h5 style="font-size:16px;">Opis</h5>
                        <input type="text" id="tbOpis"  name="tbOpis" placeholder="* Opis pretežne delatnosti, prijavljene odgovarajućem registru..." data-rule="required" data-msg="Molimo Vas unesite opis delatnosti firme"/>
						<div class="validation"></div>
                    </div>
                    <div class="col-lg-12 field">
                    	<h5 style="font-size:16px;">Matični broj</h5>
                        <input type="text" id="tbMaticniBr"  name="tbMaticniBr" placeholder="* Matični broj..." />
						<div class="validation"></div>
                    </div>
                    <div class="col-lg-12 field">
                    	<h5 style="font-size:16px;">PIB</h5>
                        <input type="text" id="tbPib"  name="tbPib" placeholder="* PIB..." />
						<div class="validation"></div>
                    </div>
                    <div class="col-lg-12 field">
                    	<h5 style="font-size:16px;">Ime i prezime</h5>
                        <input onkeyup="funk();" type="text" id="tbImePrezimeOdgLica"  name="tbImePrezimeOdgLica" placeholder="* Ime i prezime odgovornog lica..." data-rule="required" data-msg="Molimo Vas unesite ime i prezime odgovornog lica" />
                    	<div class="validation"></div>
                    </div>
                    <div class="col-lg-12 field">
                    	<h5 style="font-size:16px;">Adresa</h5>
                        <input type="text" id="tbAdresaStOdgLica"  name="tbAdresaStOdgLica" placeholder="* Adresa odgovornog lica..." data-rule="maxlen:4" data-msg="Molimo Vas unesite adresu odgovornog lica" />
						<div class="validation"></div>
                    </div>
                    <div class="col-lg-12 field">
                    	<h5 style="font-size:16px;">JMBG</h5>
                        <input type="text" id="tbJmbg"  name="tbJmbg" placeholder="* JMBG..." />
						<div class="validation"></div>
                    </div>
                    <div class="col-lg-12 field">
                    	<h5 style="font-size:16px;">Broj lične karte i mesto izdavanja</h5>
                        <input type="text" id="tbBrLicneKarte"  name="tbBrLicneKarte" placeholder="* Broj lične karte i mesto izdavanja..." data-rule="required" data-msg="Unesite broj lične karte i mesto izdavanja" />
						<div class="validation"></div>
                    </div>
                    <div class="col-lg-12 field">
                    	<h5 style="font-size:16px;">Kontakt telefon</h5>
                        <input type="text" id="tbKontakt"  name="tbKontakt" placeholder="* Kontakt telefon(upišite broj bez razmaka između)..." />
						<div class="validation"></div>
                    </div>
                    <span>&nbsp;</span>
                    
                    <h3><strong>III Podaci o oglasnoj poruci</strong></h3>
                    <div class="col-lg-12 field">
                    	<input type="checkbox" id="chbIzvorniText" name="chbIzvorniText" /><span style="margin-left:10px; font-size:16px;">Kao izvorni tekst biće prihvaćen tekst i podaci uneti u odgovarajućoj formi na sajtu.</span><span style="color:red;">*</span>
					<div class="validation"></div>
                    </div>
                    <span>&nbsp;</span>
                    <div class="col-lg-12 field">
                    	<span style="font-size:16px;">Trajanje deklaracije:</span><span style="color:red;">*</span>
						<input type="radio" id="sss"  name="radioTrajanje" value="6 meseci" style="margin-left:10px;"/><span style="margin-left:10px; font-size:16px;">6 meseci</span>
						<input type="radio"  name="radioTrajanje" value="12 meseci" style="margin-left:10px;"/><span style="margin-left:10px; font-size:16px;">12 meseci</span>
						<div class="validation"></div>
                    </div>
                    <div class="col-lg-12 field" style="margin-top:10px;">
                    	<p  id="ncog"><span style="font-size:16px;">Način oglašavanja:</span><span style="color:red;">*</span></p>
                    	<?php
							include('konekcija.php');
							$sql="SELECT * FROM nacin_oglasavanja";
							$rezultat=mysql_query($sql, $konekcija);
							while($red=mysql_fetch_array($rezultat))
							{
								if($red['id_nacin_oglasavanja'] == 1){
								echo "<input type='radio' name='radioNacinOgl' value='".$red['id_nacin_oglasavanja']."'><strong><span style='margin-left:10px; font-size:16px;'>".$red['nacin_oglasavanja_srb']."</span></strong><br/>";
							}else
							{
								echo "<input type='radio' name='radioNacinOgl' value='".$red['id_nacin_oglasavanja']."'><span style='margin-left:10px; font-size:16px;'>".$red['nacin_oglasavanja_srb']."</span><br/>";
							}
							}
							mysql_close($konekcija);
						?>
						<div class="validation"></div>
                    </div>
                    <div class="col-lg-12 field" style="margin-top:20px;">
                    	<input type="checkbox" id="chbUsloviKor" name="chbUsloviKor" /><span style="margin-left:10px; font-size:16px;"><a target="#" href="uslovi_koriscenja.php">Prihvatam uslove korišćenja</a> </span><span style="color:red;">*</span>
						<div class="validation"></div>
                    </div>
                    <div class="col-lg-12 field" style="margin-top:10px;">
                    	<input type="checkbox" id="chbGarancija" name="chbGarancija"><span style="margin-left:10px; font-size:16px;">Garantujem za tačnost unetih podataka i sadržinu oglasne poruke.</span><span style="color:red;">*</span><!-- Kada se klikne na ovaj teks izlazi prozor sa upozorenjem-->
                    	<!-- Button trigger modal -->
                    	<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModa2">
						  Upozorenje
						</button>
						<div class="validation"></div>
						<!-- Modal -->
						<div class="modal fade" id="myModa2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						        <h4 class="modal-title" id="myModalLabel">Krivični zakon Republike Srbije - Računarska prevara (čl. 301)</h4>
						      </div>
						      <div class="modal-body">
						        Ko unese netačan podatak, propusti unošenje tačnog podatka ili na drugi način prikrije ili lažno prikaže podatak
						         i time utiče na rezultat elektronske obrade i prenosa podataka u nameri da sebi ili drugom pribavi protivpravnu
						          imovinsku korist  i time drugom prouzrokuje imovinsku štetu kazniće se novčanom kaznom ili zatvorom do 3 godine.
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal">Izađite</button>
						      </div>
						    </div>
						  </div>
						</div><!-- End Modal-->
                    </div>
                    <div class="col-lg-12 field" style="margin-top:10px;">
                    <p style="float:left;"><span style="font-size:16px;">Izjavio / Izjavila:&nbsp;</span></p><div id='izjava'></div><!-- Ovde ide sadrzaj polja "ime i prezime odgovornog lica"-->
                    </div>

                    <!-- End Deo za deklaraciju-->

                    <!--Deo za registraciju-->

                    <div id="logoglas" class="col-lg-12 field" style="margin-top:10px;">
						<?php if(isset($_SESSION['email'])){echo'<p><span style="font-size:16px;"><strong>Ulogovani ste kao: '.$_SESSION['nik'].'</strong></span></p><button class="btn btn-theme " style="border:2px solid white;" type="button" name="postavi_standard" id="postavi">Postavi oglas</button>';}else{ ?>


						<ul class="nav nav-tabs"> <li class="active"><a data-toggle="tab" href="#sectionA">Stari korisnik</a></li> <li><a data-toggle="tab" style="background-color:#0066CC; color:#ffffff;" href="#sectionB">Novi korisnik</a></li> </ul>
					<div  class="tab-content">
						<div id="sectionA" class="tab-pane fade in active">
							<input type="text" style="margin-top:10px;" id="tbMail_stari_korisnik" name="tbMail_stari_korisnik" placeholder="Vaš email...">
							<input type="password"  id="tbLozinka" name="tbLozinka" placeholder="Vaša lozinka...">
							<button class="btn btn-theme " style="border:2px solid white;" type="button" id="posalji" name="uloguj_me">Uloguj me</button><br/><br/> </div>

						<div id="sectionB" class="tab-pane fade">
							<input type="text" style="margin-top:10px;" id="tbMail_novi_korisnik" name="tbMail_novi_korisnik" placeholder="Vaš email...">
							<input type="password" id="tbLozinka_novi" name="tbLozinka_novi" placeholder="Vaša lozinka...">
							<button class="btn btn-theme " style="border:2px solid white;" type="button" id="posalji2" name="registruj_me">Registruj me</button><br/><br/>
						</div>
					</div>
						<?php }?>
					</div>
                    <div class="col-lg-12 field" style="margin-top:10px;">

                        <p id="greska"></p>

                        </div>

	        		<!-- End Deo za registraciju-->
					
                </form>

            
            </div>

            <div class="col-sm-2" style="margin-top:20px; margin:0 auto;">
            	<!-- Baneri right-->

			<style type="text/css">
				#cycler{position:relative;}
				#cycler div{position:absolute;z-index:1}
				#cycler div.active{z-index:3}
			</style>


			<script type="text/javascript">
				function cycleImages(){
					      var $active = $('#cycler .active');
					      var $next = ($active.next().length > 0) ? $active.next() : $('#cycler div:first');
					      $next.css('z-index',2);//move the next image up the pile
					      $active.fadeOut(1500,function(){//fade out the top image
						  $active.css('z-index',1).show().removeClass('active');//reset the z-index and unhide the image
					          $next.css('z-index',3).addClass('active');//make the next image the top one
					      });
					    }

					$(document).ready(function(){
					// run every 7s
					setInterval('cycleImages()', 7000);
					})
			</script>

		
			<div id="cycler">
			<?php
						include('konekcija.php');

						$query = mysql_query('SELECT * FROM baneri WHERE aktivnost = 1');
						$brojac = 0;
						while($row = mysql_fetch_array($query)){
						if($brojac == 0){
						echo '<div class="active"><a target="_blank" href="'.$row['link'].'"><img style="margin:0 auto; padding:20px;" src="images/'.$row['putanja'].'" /></a></div>';
						$brojac++;
					}else{
						echo '<div><a target="_blank" href="'.$row['link'].'"><img style="margin:0 auto; padding:20px;" src="images/'.$row['putanja'].'" /></a></div>';
						}
					}

					
					?>	
	
			</div>
			<!-- End baneri right-->
            </div>

        	</div>

		
		</div><!-- End container-->


		<!-- Footer-->
		
			<footer class="footer"> 
			<hr>
				<div class="container text-center">
				

					<p>HellaSerb 2015. | <a href="deklaracija.php">Deklaracija</a> | <a href="uslovi_koriscenja.php">Uslovi korišćenja</a> | <a href="politika_privatnosti.php">Politika privatnosti</a></p>


				</div><!-- End container-->
				
			</footer>

			<!-- Back to top-->

			<a href="#" class="back-to-top" style="display: inline;">
				<i class="fa fa-arrow-circle-up"></i>
			</a>


<script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>	
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>	
</body>
</html>