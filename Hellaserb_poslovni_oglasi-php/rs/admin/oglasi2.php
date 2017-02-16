<?php

@ob_start();
	session_start();
	include('../konekcija.php');

?>
<!DOCTYPE html>
<html lang="eng">

<head>
	<meta charset="utf-8">
	<title>HellaSerb</title>
	<meta name="description" content="HellaSerb">
	<link href="../css/style.css" rel="stylesheet" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<link rel="stylesheet" id="font-awesome-css" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" type="text/css" media="screen">
	<script src="../js/enter.js"></script>
	<script  type="text/javascript" src="../ajaxobj.js"></script>
	<script  type="text/javascript" src="../gradovi.js"></script>
	<script  type="text/javascript" src="../podKategorije.js"></script>
	<!-- slider dodato-->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<!-- bxSlider Javascript file -->
	<script src="/js/jquery.bxslider.min.js"></script>
	<!-- bxSlider CSS file -->
	<link href="/lib/jquery.bxslider.css" rel="stylesheet" />
	
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
<?php
	if(@$_SESSION['uloga']!='administrator') { ?>
		<h1>Pristup ovoj stranici ima samo administrator!</h1>
		<?php die(); ?>
	<?php } ?>

	<style type="text/css">
	.img{
		width: 150px;
		border: 2px solid #eee;
	}

	.col-sm-12{
		border-bottom:1px solid #ccc;
		margin-top: 10px;
		min-height: 50px;
	}

	.col-sm-12 li{
		list-style-type: none;
		display: inline;
		padding: 20px;
	}

	.col-sm-6{
		border:1px solid #ccc;
		padding: 5px;
	}

	label{
		border-bottom: 1px solid #ccc;
	}

	img{
		margin-bottom: 20px;
	}
</style>
<!-- jumbotron-->
	<div class="jumbotron">
		<div class="container">
			<div class="row">
				<div class="col-sm-11">
					<a href="index.php"><img src="../images/logo.png" class="img-responsive"></a>	
				</div>	
			</div><!-- End row-->	
		</div><!-- End container-->
	</div><!-- End jumbotron-->

		<!-- Navbar -->
	<nav class="navbar navbar-inverse navbar-static-top" id="my-navbar">
	

		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

			</div><!-- Navbar header-->
			<div class="collapse navbar-collapse" id="navbar-collapse" >
				
				<ul class="nav navbar-nav">
					<li style="list-style:none; display:inline;"><a href="../index.php">Početna</a></li>
					<li style="list-style:none; display:inline;"><a href="oglasi1.php">Oglasi</a></li>
					<li style="list-style:none; display:inline;"><a href="kategorije.php">Kategorije</a></li>
					<li style="list-style:none; display:inline;"><a href="podKategorije.php">Podkatgorije</a></li>
					<li style="list-style:none; display:inline;"><a href="drzave.php">Države</a></li>
					<li style="list-style:none; display:inline;"><a href="gradovi.php">Gradovi</a></li>
					<li style="list-style:none; display:inline;"><a href="baneri.php">Baneri</a></li>
					<li style="list-style:none; display:inline;"><a href="korisnici.php">Korisnici</a></li>
					<li><?php if(isset($_SESSION['email'])){echo "<a href='../function/log.php' >".$_SESSION['nik']." (ODJAVA)</a>";}?></li>
				</ul>
			
			</div>
		</div><!-- End Container-->
	</nav><!-- End navbar-->


		<!-- Content-->

		<div class="container">
		
		<div class="row">
			
				<?php
				@$id_oglas=$_REQUEST['id_oglas'];

					$akcija = isset($_GET['akcija']) ? $_GET['akcija'] : false;
					$prikazi_formu = false;
					$prikazi_listu = true;
					$trenutna_ponuda = array();

					if($akcija !== false)
					{
						switch($akcija)
						{
							case 'izmeni': //Prikazuje formu za menjanje starog oglasa
							$prikazi_formu = true;
							$prikazi_listu = false;

							//Dohvati trenutni oglas
							$id  = $_GET['id'];
							$rezultat=mysql_query("SELECT * FROM oglasi o 
								INNER JOIN deklaracija d ON o.id_oglas=d.id_oglas
								INNER JOIN slike s ON o.id_oglas=s.id_oglas
								INNER JOIN kategorije k ON o.id_kategorija=k.id_kategorija
								INNER JOIN podkategorije p ON o.id_podKategorija=p.id_podKategorija
								INNER JOIN drzave dr ON o.id_drzava=dr.id_drzava
								INNER JOIN gradovi g ON o.id_grad=g.id_grad
								INNER JOIN tip_oglasa t ON o.id_tip_oglasa=t.id_tip_oglasa
								INNER JOIN oglasi_srb osrb ON o.id_oglas=osrb.id_oglas
								INNER JOIN oglasi_gre ogre ON o.id_oglas=ogre.id_oglas
								INNER JOIN korisnici kor ON o.id_korisnik=kor.id_korisnik WHERE o.id_oglas=$id");
							$trenutna_ponuda = mysql_fetch_assoc($rezultat);
							break;

							case 'azuriraj': // Azurira vec postojeci oglas
							$id = $_GET['id'];
							
							$naziv_oglasa_srb=$_POST['naziv_oglasa_srb'];
							$text_oglasa_srb=$_POST['text_oglasa_srb'];
							$ime_prezime_srb=$_POST['ime_prezime_srb'];
							$adresa_srb=$_POST['adresa_srb'];

							$naziv_oglasa_gre=$_POST['naziv_oglasa_gre'];
							$text_oglasa_gre=$_POST['text_oglasa_gre'];
							$ime_prezime_gre=$_POST['ime_prezime_gre'];
							$adresa_gre=$_POST['adresa_gre'];
							
							$telefon=$_POST['telefon'];
							$status=$_POST['status'];

							$mapa=$_POST['mapa'];

							$sql1=mysql_query("UPDATE oglasi_srb SET naziv_firme_srb='{$naziv_oglasa_srb}', text_oglasa_srb='{$text_oglasa_srb}', ime_prezime_srb='{$ime_prezime_srb}', adresa_srb='{$adresa_srb}' WHERE id_oglas=$id ");

							$sql2=mysql_query("UPDATE oglasi_gre SET naziv_firme_gre='{$naziv_oglasa_gre}', text_oglasa_gre='{$text_oglasa_gre}', ime_prezime_gre='{$ime_prezime_gre}', adresa_gre='{$adresa_gre}' WHERE id_oglas=$id ");

							$sql3=mysql_query("UPDATE oglasi SET telefon='{$telefon}', status='{$status}', mapa='{$mapa}' WHERE id_oglas=$id ");

							header('Location: oglasi2.php?id_oglas='.$id);
							break;

							case 'obrisi': // Brise oglas zajedno sa deklaracijom
							$id = $_GET['id'];

							mysql_query("DELETE FROM oglasi WHERE id_oglas=$id");

							mysql_query("DELETE FROM oglasi_srb WHERE id_oglas=$id");

							mysql_query("DELETE FROM oglasi_gre WHERE id_oglas=$id");

							mysql_query("DELETE FROM slike WHERE id_oglas=$id");

							mysql_query("DELETE FROM deklaracija WHERE id_oglas=$id");

							header('Location: oglasi1.php');
							break;

							default:
								die('Nepoznata akcija.');
							break;

						}
					}

				?>

				<?php if ($prikazi_formu) { ?>
					
					<h1 align="center">Prevedi oglas</h1>

					<form id="contactform" action="oglasi2.php?akcija=azuriraj&id=<?php echo $id; ?>" method="post">

					<p align="center"><span style="font-size:18px;">Status: </span>
					<select name="status">
					<option value="<?php echo $trenutna_ponuda['status']; ?>"><?php if($trenutna_ponuda['status']==0){echo 'Neodobren';}else{echo 'Odobren';} ?>
					</option>
					<option value="<?php if($trenutna_ponuda['status']==0){echo '1';}else{echo '0';} ?>"><?php if($trenutna_ponuda['status']==0){echo 'Odobren';}else{echo 'Neodobren';} ?>
					</option>
					</select>
					</p>
					<div class="row">
						<!-- Oglas Srbija izmena-->
						<div class="col-sm-6">	
						<h3>Oglas Srbija</h3>

							<div class="col-sm-12">
								<label>Naziv oglasa:</label><br/>
								<input type="text" name="naziv_oglasa_srb" value="<?php echo $trenutna_ponuda['naziv_firme_srb']; ?>" />
							</div>
							<div class="col-sm-12">
								<label>Tekst oglasa:</label><br/>
								<textarea rows="4" name="text_oglasa_srb" class="input-block-level" ><?php echo $trenutna_ponuda['text_oglasa_srb']; ?></textarea>
							</div>
							<div class="col-sm-12">
								<label>Kategorija oglasa:</label><br/>
								<?php echo $trenutna_ponuda['naziv_kategorije_srb']; ?>
							</div>
							<div class="col-sm-12">
								<label>Pod kategorija oglasa:</label><br/>
								<?php echo $trenutna_ponuda['naziv_podKategorije_srb']; ?>
							</div>
							<div class="col-sm-12">
								<label>Tip oglasa:</label><br/>
								<?php echo $trenutna_ponuda['naziv_tipa_oglasa_srb']; ?>
							</div>
							<div class="col-sm-12">
								<label>Ime i prezime:</label><br/>
								<input type="text" name="ime_prezime_srb" value="<?php echo $trenutna_ponuda['ime_prezime_srb']; ?>" />
							</div>
							<div class="col-sm-12">
								<label>Email:</label><br/>
								<?php echo $trenutna_ponuda['email_ogl']; ?>
							</div>
							<div class="col-sm-12">
								<label>Web sajt:</label><br/>
								<?php echo $trenutna_ponuda['websajt']; ?>
							</div>
							<div class="col-sm-12">
								<label>Adresa:</label><br/>
								<input type="text" name="adresa_srb" value="<?php echo $trenutna_ponuda['adresa_srb']; ?>" />
							</div>
							<div class="col-sm-12">
								<label>Država:</label><br/>
								<?php echo $trenutna_ponuda['naziv_drzave_srb']; ?>
							</div>
							<div class="col-sm-12">
								<label>Grad:</label><br/>
								<?php echo $trenutna_ponuda['naziv_grada_srb']; ?>
							</div>
						</div>
						<!--End Oglas Srbija izmena-->

						<!-- Oglas Grcka izmena-->
						<div class="col-sm-6">	
						<h3>Oglas Grcka</h3>

							<div class="col-sm-12">
								<label>Naziv oglasa:</label><br/>
								<input type="text" name="naziv_oglasa_gre" value="<?php echo $trenutna_ponuda['naziv_firme_gre']; ?>" />
							</div>
							<div class="col-sm-12">
								<label>Tekst oglasa:</label><br/>
								<textarea rows="4" name="text_oglasa_gre" class="input-block-level" ><?php echo $trenutna_ponuda['text_oglasa_gre']; ?></textarea>
							</div>
							<div class="col-sm-12">
								<label>Kategorija oglasa:</label><br/>
								<?php echo $trenutna_ponuda['naziv_kategorije_gre']; ?>
							</div>
							<div class="col-sm-12">
								<label>Pod kategorija oglasa:</label><br/>
								<?php echo $trenutna_ponuda['naziv_podKategorije_gre']; ?>
							</div>
							<div class="col-sm-12">
								<label>Tip oglasa:</label><br/>
								<?php echo $trenutna_ponuda['naziv_tipa_oglasa_gre']; ?>
							</div>
							<div class="col-sm-12">
								<label>Ime i prezime:</label><br/>
								<input type="text" name="ime_prezime_gre" value="<?php echo $trenutna_ponuda['ime_prezime_gre']; ?>" />
							</div>
							<div class="col-sm-12">
								<label>Email:</label><br/>
								<?php echo $trenutna_ponuda['email_ogl']; ?>
							</div>
							<div class="col-sm-12">
								<label>Web sajt:</label><br/>
								<?php echo $trenutna_ponuda['websajt']; ?>
							</div>
							<div class="col-sm-12">
								<label>Adresa:</label><br/>
								<input type="text" name="adresa_gre" value="<?php echo $trenutna_ponuda['adresa_gre']; ?>" />
							</div>
							<div class="col-sm-12">
								<label>Država:</label><br/>
								<?php echo $trenutna_ponuda['naziv_drzave_gre']; ?>
							</div>
							<div class="col-sm-12">
								<label>Grad:</label><br/>
								<?php echo $trenutna_ponuda['naziv_grada_gre']; ?>
							</div>
						</div>
						<!--End Oglas Grcka izmena-->
						
						<div class="col-sm-12" style="border:1px solid #ccc;">
							<label>Telefon:</label><br/>
							<input type="text" name="telefon" value="<?php echo $trenutna_ponuda['telefon']; ?>" />
						</div>

						<div class="col-sm-12" style="border:1px solid #ccc;">
								<label>Mapa:</label><br/>
								<textarea rows="4" name="mapa" class="input-block-level" ><?php echo $trenutna_ponuda['mapa']; ?></textarea>
						</div>

						</div><!-- End Row-->

						<div class="col-sm-12" style="text-align:center;">
							<input class="btn btn-lg" type="submit" value="Sačuvaj" />
							<a href="oglasi2.php?id_oglas=<?php echo $id; ?>">Odustani</a>
						</div>
					</form>

				<?php } ?>

				<?php if($prikazi_listu) {
					$result = mysql_query("SELECT * FROM oglasi o 
						INNER JOIN deklaracija d ON o.id_oglas=d.id_oglas
						INNER JOIN slike s ON o.id_oglas=s.id_oglas
						INNER JOIN kategorije k ON o.id_kategorija=k.id_kategorija
						INNER JOIN podkategorije p ON o.id_podKategorija=p.id_podKategorija
						INNER JOIN drzave dr ON o.id_drzava=dr.id_drzava
						INNER JOIN gradovi g ON o.id_grad=g.id_grad
						INNER JOIN tip_oglasa t ON o.id_tip_oglasa=t.id_tip_oglasa
						INNER JOIN oglasi_srb osrb ON o.id_oglas=osrb.id_oglas
						INNER JOIN oglasi_gre ogre ON o.id_oglas=ogre.id_oglas
						INNER JOIN korisnici kor ON o.id_korisnik=kor.id_korisnik 
						INNER JOIN nacin_oglasavanja no ON d.id_nacin_oglasavanja=no.id_nacin_oglasavanja
						WHERE o.id_oglas=$id_oglas");
				?>

				

					<?php while($red=mysql_fetch_array($result)) { ?>

					<p align="center"><span style="font-size:18px;">Korisnk: </span><?php echo $red['email']; ?></p>
					<p align="center"><span style="font-size:18px;">Status: </span><?php if($red['status']==0){echo 'Neodobren';}else{echo 'Odobren';} ?></p>

					<div class="row">

					<!-- Srpski Oglas-->
					<div class="col-sm-6">

					<h2>Oglas Srbija</h2>

					<?php
						$a=$red['putanja'];
						$images=array();
						$images=explode(';', $a);
						$max = sizeof($images);
					?>	

				<hr>
				
					<div class="col-sm-12">
						<label>Naziv oglasa:</label><br/>
						<?php echo $red['naziv_firme_srb']; ?>
					</div>
					<div class="col-sm-12">
						<label>Tekst oglasa:</label><br/>
						<?php echo $red['text_oglasa_srb']; ?>
					</div>
					<div class="col-sm-12">
					<label>Kategorija oglasa:</label><br/>
						<?php echo $red['naziv_kategorije_srb']; ?>
					</div>
					<div class="col-sm-12">
						<label>Pod kategorija oglasa:</label><br/>
						<?php echo $red['naziv_podKategorije_srb']; ?>
					</div>
					<div class="col-sm-12">
						<label>Tip oglasa:</label><br/>
						<?php echo $red['naziv_tipa_oglasa_srb']; ?>
					</div>
					<div class="col-sm-12">
						<label>Fotografije:</label><br/>
					<?php
						for($i=0; $i<$max-1; $i++){
						$slike=$images[$i];
						if($red['putanja']==''){
						echo '<img src="../images/no_images.jpg" class="img-responsive" style="width:auto; height:150px;">';
						}else{
						echo '<img src="../images/'.$slike.'" class="img-responsive" style="width:auto; height:150px;">';
							}
						}
					?>	
					</div>
					<div class="col-sm-12">
						<label>Ime i prezime:</label><br/>
						<?php echo $red['ime_prezime_srb']; ?>
					</div>
					<div class="col-sm-12">
						<label>Email:</label><br/>
						<?php echo $red['email_ogl']; ?>
					</div>
					<div class="col-sm-12">
						<label>Web site:</label><br/>
						<?php echo $red['websajt']; ?>
					</div>
					<div class="col-sm-12">
						<label>Adresa:</label><br/>
						<?php echo $red['adresa_srb']; ?>
					</div>
					<div class="col-sm-12">
						<label>Država:</label><br/>
						<?php echo $red['naziv_drzave_srb']; ?>
					</div>
					<div class="col-sm-12">
						<label>Grad:</label><br/>
						<?php echo $red['naziv_grada_srb']; ?>
					</div>
				</div>
				<!-- End Srpski oglas-->

				<!-- Grcki oglas-->
				<div class="col-sm-6">

					<h2>Oglas Grčka</h2>
					
					<?php
						$a=$red['putanja'];
						$images=array();
						$images=explode(';', $a);
						$max = sizeof($images);
					?>	

				<hr>
				
					<div class="col-sm-12">
						<label>Naziv oglasa:</label><br/>
						<?php echo $red['naziv_firme_gre']; ?>
					</div>
					<div class="col-sm-12">
						<label>Tekst oglasa:</label><br/>
						<?php echo $red['text_oglasa_gre']; ?>
					</div>
					<div class="col-sm-12">
					<label>Kategorija oglasa:</label><br/>
						<?php echo $red['naziv_kategorije_gre']; ?>
					</div>
					<div class="col-sm-12">
						<label>Pod kategorija oglasa:</label><br/>
						<?php echo $red['naziv_podKategorije_gre']; ?>
					</div>
					<div class="col-sm-12">
						<label>Tip oglasa:</label><br/>
						<?php echo $red['naziv_tipa_oglasa_gre']; ?>
					</div>
					<div class="col-sm-12">
						<label>Fotografije:</label><br/>
					<?php
						for($i=0; $i<$max-1; $i++){
						$slike=$images[$i];
						if($red['putanja']==''){
						echo '<img src="../images/no_images.jpg" class="img-responsive" style="width:auto; height:150px;">';
						}else{
						echo '<img src="../images/'.$slike.'" class="img-responsive" style="width:auto; height:150px;">';
							}
						}
					?>	
					</div>
					<div class="col-sm-12">
						<label>Ime i prezime:</label><br/>
						<?php echo $red['ime_prezime_gre']; ?>
					</div>
					<div class="col-sm-12">
						<label>Email:</label><br/>
						<?php echo $red['email_ogl']; ?>
					</div>
					<div class="col-sm-12">
						<label>Web site:</label><br/>
						<?php echo $red['websajt']; ?>
					</div>
					<div class="col-sm-12">
						<label>Adresa:</label><br/>
						<?php echo $red['adresa_gre']; ?>
					</div>
					<div class="col-sm-12">
						<label>Država:</label><br/>
						<?php echo $red['naziv_drzave_gre']; ?>
					</div>
					<div class="col-sm-12">
						<label>Grad:</label><br/>
						<?php echo $red['naziv_grada_gre']; ?>
					</div>
				</div>

				<div class="col-sm-12" style="border:1px solid #ccc;">
					<label>Telefon:</label><br/>
					<?php echo $red['telefon']; ?>
				</div>

				<div class="col-sm-12" style="border:1px solid #ccc;">
					<label>Mapa:</label><br/>
					<?php echo $red['mapa']; ?>
				</div>

				<div class="col-sm-12" style="text-align:center; border:none;">
				<ul>
					<li><a href="oglasi2.php?akcija=izmeni&id=<?php echo $red['id_oglas']; ?>">Prevedi oglas</a></li>
					<li><a href="oglasi1.php">Nazad na oglase</a></li>
					<li><a style="color:red;" href="oglasi2.php?akcija=obrisi&id=<?php echo $red['id_oglas']; ?>">Obriši oglas</a></li>
				</ul>	
				</div>

				<!-- End Grcki oglas-->
				</div><!-- End Row-->

				<!-- Deklaracija-->

				<h1 align="center">Deklaracija</h1>
				<div class="col-sm-12" style="border:1px solid #ccc;">
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
						        <p>Tokom registracije pravnog lica,podaci koje unosite činiće Deklaraciju, i obavezna je za sva pravna lica,na osnovu Zakona o 
						        oglašavanju(član11.)</p>
						        <p>Prilikom postavljanja oglasa, neophodno je da oglašivač, tačno popuni sve obavezne podatke.
						        Ovi podaci biće tretirani kao poverljivi u skladu sa Zakonom o zaštiti podataka o ličnosti i neće biti javno dostupni
						        sve dok se ne promene podaci o oglašivaču. Deklaracija je važeća.Ukoliko dodje do promene podataka, oglašivač je obavezan da
						        pošalje novu deklaraciju sa unetim važećim podacima</p>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal">Izadji</button>
						      </div>
						    </div>
						  </div>
						</div><!-- End Modal-->
                	<p style="font-size:16px;">Uneti podaci biće tretirani kao poverljivi u skladu sa Zakonom o zaštiti podataka o ličnosti i <strong>neće biti javno dostupni</strong>.</p>
                	<p style="font-size:16px;">Worth Biomin d.o.o Koste Novakovića br.15   11127 Beograd</p>
                	<p style="font-size:16px;">Naziv i sedište lica koje objavljuje ili emituje oglasnu poruku:</p>
                	<hr>

                	<h3><strong>I Podaci o proizvođaču oglasne poruke</strong></h3>
                	<p style="font-size:16px;">Oglašivač je ujedno i kreator oglasne poruke.</p>
					<hr>

                	<h3><strong>II Podaci o oglašivaču</span></strong></h3>
                	<div class="col-lg-12 field">
                		<h5 style="font-size:16px;">Naziv firme</h5>
                		<div class="col-sm-12" style="border:1px solid #ccc; padding:13px;">
                        <?php echo $red['naziv_firme_srb_dek']; ?>
                        </div>
                    </div>
                    <div class="col-lg-12 field">
                    	<h5 style="font-size:16px;">Adresa</h5>
                        <div class="col-sm-12" style="border:1px solid #ccc; padding:13px;">
                        <?php echo $red['adresa_firme_srb_dek']; ?>
                        </div>
                    </div>
                    <div class="col-lg-12 field">
                    	<h5 style="font-size:16px;">Broj pod kojim je firma registrovana</h5>
                        <div class="col-sm-12" style="border:1px solid #ccc; padding:13px;">
                        <?php echo $red['br_reg']; ?>
                        </div>
                    </div>
                    <div class="col-lg-12 field">
                    	<h5 style="font-size:16px;">Opis</h5>
                        <div class="col-sm-12" style="border:1px solid #ccc; padding:13px;">
                        <?php echo $red['opis_srb']; ?>
                        </div>
                    </div>
                    <div class="col-lg-12 field">
                    	<h5 style="font-size:16px;">Matični broj</h5>
                        <div class="col-sm-12" style="border:1px solid #ccc; padding:13px;">
                        <?php echo $red['maticni_br']; ?>
                        </div>
                    </div>
                    <div class="col-lg-12 field">
                    	<h5 style="font-size:16px;">PIB</h5>
                        <div class="col-sm-12" style="border:1px solid #ccc; padding:13px;">
                        <?php echo $red['pib']; ?>
                        </div>
                    </div>
                    <div class="col-lg-12 field">
                    	<h5 style="font-size:16px;">Ime i prezime</h5>
                        <div class="col-sm-12" style="border:1px solid #ccc; padding:13px;">
                        <?php echo $red['ime_prezime_srb_dek']; ?>
                        </div>
                    </div>
                    <div class="col-lg-12 field">
                    	<h5 style="font-size:16px;">Adresa</h5>
                        <div class="col-sm-12" style="border:1px solid #ccc; padding:13px;">
                        <?php echo $red['adresa_srb_dek']; ?>
                        </div>
                    </div>
                    <div class="col-lg-12 field">
                    	<h5 style="font-size:16px;">JMBG</h5>
                        <div class="col-sm-12" style="border:1px solid #ccc; padding:13px;">
                        <?php echo $red['jmbg']; ?>
                        </div>
                    </div>
                    <div class="col-lg-12 field">
                    	<h5 style="font-size:16px;">Broj lične karte i mesto izdavanja</h5>
                        <div class="col-sm-12" style="border:1px solid #ccc; padding:13px;">
                        <?php echo $red['br_licne_karte']; ?>
                        </div>
                    </div>
                    <div class="col-lg-12 field">
                    	<h5 style="font-size:16px;">Kontakt telefon</h5>
                        <div class="col-sm-12" style="border:1px solid #ccc; padding:13px;">
                        <?php echo $red['tel']; ?>
                        </div>
                    </div>
                    <span>&nbsp;</span>
                    
                    <h3><strong>III Podaci o oglasnoj poruci</strong></h3>
                    <div class="col-lg-12 field">
                    	<input type="checkbox" id="chbIzvorniText" name="chbIzvorniText" checked disabled /><span style="margin-left:10px; font-size:16px;">Kao izvorni tekst biće prihvaćen tekst i podaci uneti u odgovarajućoj formi na sajtu.</span>
                    </div>
                    <span>&nbsp;</span>
                    <div class="col-lg-12 field">
                    	<span style="font-size:16px;">Trajanje deklaracije:</span>
						<strong><?php echo $red['trajanje_deklaracije']; ?><span> meseci</span></strong>
                    </div>
                    <div class="col-lg-12 field" style="margin-top:10px;">
                    	<span style="font-size:16px;">Način oglašavanja:</span>
                    	<strong><?php echo $red['nacin_oglasavanja_srb']; ?></strong>
                    </div>
                    <div class="col-lg-12 field" style="margin-top:20px;">
                    	<input type="checkbox" id="chbUsloviKor" name="chbUsloviKor" checked disabled /><span style="margin-left:10px; font-size:16px;"><a href="#">Prihvatam uslove korišćenja</a> </span>
                    </div>
                    <div class="col-lg-12 field" style="margin-top:10px;">
                    	<input type="checkbox" id="chbGarancija" name="chbGarancija" checked disabled><span style="margin-left:10px; font-size:16px;">Garantujem za tačnost unetih podataka i sadržinu oglasne poruke.</span>
                    	<!-- Button trigger modal -->
                    	<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModa2">
						  Upozorenje
						</button>
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
						        <button type="button" class="btn btn-default" data-dismiss="modal">Izadji</button>
						      </div>
						    </div>
						  </div>
						</div><!-- End Modal-->
                    </div>
                    <div class="col-lg-12 field" style="margin-top:10px;">
                    <p style="float:left;"><span style="font-size:16px;">Izjavu dao/dala:&nbsp;<strong><?php echo $red['ime_prezime_srb_dek']; ?></strong></span></p><!-- Ovde ide sadrzaj polja "ime i prezime odgovornog lica"-->
                    </div>
                    <div class="col-lg-12 field">
                    <a style="font-size:16px;" target="#" href="../<?php echo $red['deklaracija_putanja']; ?>">Deklaracija za štampanje</a>
                    </div>
				</div>	

				<!-- End Deklaracija-->

				<?php } ?>
				<?php } ?>
			
		</div><!-- End row-->		

		</div><!-- End container-->
		

		<!-- Footer-->
		
			<footer class="footer"> 
			<hr>
				<div class="container text-center">
				

					<p>HellaSerb Copuright 2015. Kopiranje sadržaja, slika, oglasa sa našeg portala bez naše dozvole je zabranjeno.</p>


				</div><!-- End container-->
				
			</footer>


<script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>	
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>	
</body>
</html>