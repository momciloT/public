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
	<script src="js/validate_kockica.js"></script>
	<link rel="stylesheet" type="text/css" href="engine1/style.css" />
	<script type="text/javascript" src="engine1/jquery.js"></script>
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



<!-- Button trigger modal -->
                    	
						<div class="validation"></div>
						<!-- Modal -->
						<div class="modal fade" id="myModa2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content" style="background-color:#66CCFF;">
						      <div class="modal-header">
						        	Upit za informaciju:
						      </div>
						      <div class="modal-body">
						        	<form method="post" action="function/z_kockica.php" class="validateform" name="send-contact" id="contactform">

						        	<div class="row">
						        		<div class="col-lg-12 field">	
						        		<h5 style="font-size:16px;">Naziv firme</h5>
						        		<input type="text" id="tbNazivFirme" class="polja_kockica"  name="tbNazivFirme" placeholder="* Naziv firme..." data-rule="maxlen:4" data-msg="Molimo Vas unesite naziv firme" />
						        		<div class="validation">
                            </div>
						        		</div>

						        		<div class="col-lg-12 field">
						        		<h5 style="font-size:16px;">Vaš email</h5>
						        		<input type="text" id="tbMail" class="polja_kockica"  name="tbMail"  placeholder="* Vaš email..." data-rule="email" data-msg="Molimo Vas unesite email" />
						        		<div class="validation">
                            </div>
						        		</div>

						        		<div class="col-lg-12 field">
						        		<h5 style="font-size:16px;">Naslov poruke</h5>
						        		<input type="text" id="tbNaslovPor" class="polja_kockica"  name="tbNaslovPor" placeholder="* Naslov poruke..." data-rule="maxlen:4" data-msg="Molimo Vas unesite naslov poruke" />
						        		<div class="validation">
                            </div>
						        		</div>

						        		<div class="col-lg-12 field">
						        		<h5 style="font-size:16px;">Poruka</h5>
						        		<textarea id="tbPoruka" name="Poruka" placeholder="* Potrebna mi je sledeća informacija..." class="polja_kockica" style="height:120px;" data-rule="required" data-msg="Molimo Vas unesite tekst poruke" ></textarea>
						        		<div class="validation">
                            </div>
						        		<p>
						        		<button style="border:2px solid white;"  class="btn btn-theme " type="submit">Pošaljite poruku</button>
						        		</p>

						        		</div>
						        		</div>

						        		<div id="sendmessage">
                    Vaša poruka je uspešno poslata, odgovorićemo ubrzo. Zahvaljujemo se što koristite naš portal.
                    </div>
						        	</form>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal">Izadjite</button>
						      </div>
						    </div>
						  </div>

						</div>

		<!-- End Button trigger modal -->

<style type="text/css">
	.ws-title{
		visibility: hidden;
	}

	.ws_playpause{
		visibility: hidden;
	}
</style>
<!-- jumbotron-->
	<div class="jumbotron">
		<div class="container">
			<div class="row">
				<div class="col-sm-11">
					<a href="index.php"><img src="images/logo.png" class="img-responsive"></a>	
				</div>
				<div class="col-sm-1" id="language_header">
					<a href="index.php"><img width="50" height="50" src="images/sr.png" class="img-responsive"></a>
					
					<a href="../index.php"><img width="50" height="50" src="images/el.png" class="img-responsive"></a>
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
						<a href="index.php"><img width="50" height="50" src="images/sr.png" class="img-responsive"></a>
					</li>
					<li>
						<a href="../index.php"><img width="50" height="50" src="images/el.png" class="img-responsive"></a>
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
					<li><?php if(isset($_SESSION['email'])){if($_SESSION['uloga']=='administrator'){echo '<a href="admin/index.php">admin</a>';}} ?></li>
			</ul>
			<div id="validation-logfail" class="navbar-nav" style="margin-left: 15%;">
				<?php if(isset($_SESSION['fail'])){?><h4 style="color: red; ">Pogrešan email ili lozinka! Molimo pokušajte ponovo!</h4><?php } ?>
			</div>
			<div id="log_navbar" class="navbar-nav">
				<?php if(!isset($_SESSION['email'])){?>

					<form id="logform"  method="post" enctype="multipart/form-data" name="log-forma" action="">


						<input type="text" name="email-log" placeholder="Vaš email" class="margin-left" id="emaill-log" data-rule="maxlen:4" data-msg="Molimo Vaš email" />
						<input type="password" name="pass-log" style="margin: 0px 7px;" placeholder="Vaša lozinka" class="margin-left" id="passw-log" data-rule="maxlen:4" data-msg="Pogresna lozinka pokusajte ponovo." />
						<input class="btn" type="submit" id="bt1" name="bt1" value="Ulogujte se"/>
						<h5 align="center" style="margin-right:220px;"><a style="color:red;" href="promena_lozinke.php">Zaboravili ste Vašu lozinku?</a></h5>
					</form>
				<?php }?>
			</div>

			</div>
		</div><!-- End Container-->
	</nav><!-- End navbar-->

        <!-- Gallery-->        

	<div id="wowslider-container1" style="margin-top:-20px;">
	<div class="ws_images"><ul>
                <li><img src="data1/images/image011.png" alt="html slideshow" title="image01" id="wows1_2"/></li>
		<li><img src="data1/images/image02.jpg" alt="image02" title="image02" id="wows1_3"/></li>
		<li><img src="data1/images/image03.jpg" alt="image03" title="image03" id="wows1_0"/></li>
		<li><img src="data1/images/image04.jpg" alt="image04" title="image04" id="wows1_1"/></li>
	</ul></div>
	<div class="ws_bullets"><div>
                <a href="#" title="image01"><span><img src="data1/tooltips/image01.jpg" alt="image01"/>3</span></a>
		<a href="#" title="image02"><span><img src="data1/tooltips/image02.jpg" alt="image02"/>4</span></a>
		<a href="#" title="image03"><span><img src="data1/tooltips/image03.jpg" alt="image03"/>1</span></a>
		<a href="#" title="image04"><span><img src="data1/tooltips/image04.jpg" alt="image04"/>2</span></a>
	</div></div>
	</div>	
	<script type="text/javascript" src="engine1/wowslider.js"></script>
	<script type="text/javascript" src="engine1/script.js"></script>

        <!-- End Gallery-->

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
		

		<h1 align="center">Korišćenje portala</h1>

		<p>Portal je prvenstveno namenjen oglašavanju i reklamiranju pravnih lica iz Srbije i Grčke, kao i za pružanje korisnih poslovnih informacija sa grčkog tržišta. </p>

		<p>Takođe, korišćenjem naše postojeće baze podataka, možete se predstaviti i pravnim licima na tržištu Kipra, Ruske Federacije, Bosne i Hercegovine i Crne Gore.</p>

		<p><strong>Pruža Vam se mogućnost da besplatno postavite Vaš oglas.</strong></p>

		<p>Svi oglasi pravnih lica iz Srbije i Grčke, su dostupni na oba jezika. Korisne informacije koje se odnose na grčko tržište biće vam dostavljene na srpskom jeziku.</p>

		<p id="disclaimer">

			Izborom <a href="korisnicki_nalog.php"><strong>plaćenog</strong></a> oglasa ili internet reklame (baner), uz naše angažovanje, pruža vam se mogućnost da:<br/>
			- pravna lica iz naše postojeće baze podataka, upoznamo sa vašom firmom i proizvodima; <br/>
			- predstavimo Vašu firmu izlagačima, na sajmovima u Atini i Solunu;<br/>
			- koristite <a href="nase_usluge.php">naše usluge</a>.<br/>
			- imate pristup <a href="info.php">poslovnim informacijama</a> sa tržišta Grčke;<br/>
			- na <a href="" data-toggle="modal" data-target="#myModa2"><strong>Vaš zahtev</strong></a> primate  informacije koje su Vam potrebne,vezano za tržište Grčke;<br/><br/>

			Za informacije o vrsti i ceni oglasnih i reklamnih paketa, kao i o uslugama koje Vam pružamo, možete nas kontaktirati na <a href="mailto:info@hellaserb.rs">info@hellaserb.rs</a>. 
			
      	</p>
      		<input type="button" id="toggleButton" value="Opširnije..." />

		<div class="row">
			<div class="col-sm-6">
				<h1 align="center">Naše usluge</h1>

				<img src="images/image02.jpg" class="img-responsive" style="margin:0 auto;"><br/>

				Korišćenjem naših usluga, pruža Vam se mogućnost da: 
				<p>
				<ul>
				<li>Predstavite vašu firmu i proizvode, izlagačima na sajmovima u Atini i Solunu;</li>
				<li>Koristite našu postojeću bazu podataka;</li>
				<li>Vam pripremimo sastanke sa partnerima iz Grčke, za koje postoji interesovanje;</li>
				<li>Vam, na Vaš zahtev šaljemo, informacije koje su Vam potrebne, vezano za tržište Grčke.</li>
					<span class="opsirnije"><a href="nase_usluge.php">Opširnije...</a></span>
				</ul>
				</p>
			</div>
			<div class="col-sm-6">
				<h1 align="center">Poslovne informacije</h1>

				<img src="images/image03.jpg" class="img-responsive" style="margin:0 auto;"><br/>

				Na Vaš zahtev, vam pružamo korisne informacije sa tržišta Grčke, vezano za:
				<ul>
					<li>ponudu i potražnju, proizvoda iz sfere Vaše delatnosti;</li>
					<li>pravne,  poreske i carinske uslove poslovanja;</li>
					<li>vrste preduzeća i proceduru  osnivanja;</li>
					<li>promet nekretnina;</li>
					<li>ostvarivanje prava na radnu i boravišnu vizu;</li>
					<span class="opsirnije"><a href="info.php">Opširnije...</a></span>
				</ul>
			</div>
			</div><!-- End row-->
			</div>

			<div class="col-sm-2" class="margin-top:20px; margin:0 auto;">

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

			</div><!-- End row-->	


		

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