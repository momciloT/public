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
	<link href="css/pagination.css" rel="stylesheet" type="text/css" />
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
	<script src="js/validate_kockica.js"></script>
</head>

<body data-spy="scroll" data-target="#my-navbar">


<!-- Button trigger modal -->
                    	
						<div class="validation"></div>
						<!-- Modal -->
						<div class="modal fade" id="myModa2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content" style="background-color:#FFFF99;">
						      <div class="modal-header">
						        	U dogovoru sa vama:
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
						        		<textarea id="tbPoruka" name="Poruka" placeholder="* Na koji način želite da predstavimo Vašu firmu i proizvode ili da Vam pripremimo sastanke..." class="polja_kockica" style="height:120px;" data-rule="required" data-msg="Molimo Vas unesite tekst poruke" ></textarea>
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


<!-- jumbotron-->

	
	<div class="jumbotron">
		<div class="container">
			<div class="row">
				<div class="col-sm-11">
					<a href="index.php"><img src="images/logo.png" class="img-responsive"></a>	
				</div>
				<div class="col-sm-1" id="language_header">
					<a href="nase_usluge.php"><img width="50" height="50" src="images/sr.png" class="img-responsive"></a>
					
					<a href="../our_services.php"><img width="50" height="50" src="images/el.png" class="img-responsive"></a>
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
						<a href="nase_usluge.php"><img width="50" height="50" src="images/sr.png" class="img-responsive"></a>
					</li>
					<li>
						<a href="../our_services.php"><img width="50" height="50" src="images/el.png" class="img-responsive"></a>
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

		<img src="images/services.jpg" class="img-responsive" style="margin-top:-20px;">

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

			<div class="list-of-posts">
				<div class="post">
					<h1 align="center">Poznavanje tržišta</h1>

					<p>Da bi ste izabrali pravilan pristup i odgovarajuću poslovnu politiku, za nastup na novom tržištu, veoma je važno raspolagati adekvatnim poslovnim informacijama.</p>

					<p>

						U tom smislu, vezano za Grčko tržište, Vam pružamo <a href="info.php">informacije</a> o:
						<ul>
							<li>trenutnoj potražnji  za proizvodima kao sto su Vaši;</li>
							<li>njihovim maloprodajnim i veleprodajnim cenama;</li>
							<li>broju firmi koje trguju ili  proizvode, robu kao sto je Vaša;</li>
							<li>porezu na dodatu vrednost dotičnog proizvoda;</li>
							<li>visini carinske stope za dati proizvod.</li>
						</ul>
					</p>
				</div><!-- End of post-->

				<div class="post">
					<h1 align="center">Pravni, poreski i carinski uslovi poslovanja</h1>

					<p>Pružamo Vam osnovne <a href="info.php">informacije</a> vezano za Grčko tržište.</p>

					<p>O <strong>pravnim uslovima</strong>, u slučaju da ste se opredelili za:</p>

					<ul>
						<li>otvaranje firme ili predstavništva;</li>
						<li>investiranje;</li>
						<li>kupovinu, prodaju ili iznajmljivanje nekretnina;</li>
						<li>dobijanje radne ili boravišne vize.</li>
					</ul>

					O <strong>poreskim uslovima</strong>, u slućaju započinjanja poslovne aktivnosti ili kupovine nekretnine, a odnose se na:

					<ul>
						<li>porez na dodatu vrednost;</li>
						<li>porez na dobit za pravna lica;</li>
						<li>porez na dohodak građana;</li>
						<li>doprinose za obavezno osiguranje zaposlenih;</li>
						<li>porez na imovinu;</li>
						<li>oporezivanje, dierktno i indirektno;</li>
					</ul>

					O <strong>carinskim</strong> uslovima poslovanja, vezano za:
					<ul>
						<li>visinu carinske stope za dati prozvod;</li>
						<li>proizvode koji su oslobođeni carine;</li>
						<li>uslov da li je potrebno vršiti analizu datog proizvoda ili pribaviti atest, i koliki su prateći troškovi;</li>
						<li>dokumentaciju koja  je potrebna prilikom uvoza / izvoza;</li>
						<li>informacije po Vašem upitu, koje se odnose na Vašu delatnost i proizvode kojim se bavite.</li>
					</ul>
				</div><!-- End of post-->

				<div class="post">
					<h1 align="center">Prezentacija</h1>

					<p>Predstavljanje vaše firme i proizvoda,  je  potrebno  prilagoditi potrebama i poslovnom mentalitetu dotičnog tržišta.</p> 

					<p>Tom prilikom je smanjenje troškova i ušteda dragocenog vremena, omogućeno:</p>

					<ul>
						<li>oglašavanjem na našem portalu;</li>
						<li>našim angažovanjem, a u dogovoru sa Vama, informisanjem izlagača na sajmovima u Atini i Solunu, kako bi stupili u kontakt sa Vama;</li>
						<li>kontaktiranjem  od naše strane, sa  pravnim licima iz postojeće baze podataka ( Grčke, Kipra, Ruske Federacije, Bosne i Hercegovine i Crne Gore), istovremeno vas obaveštavajući o ostvarenim kontaktima.</li>
					</ul>

					<p>Aktiviranjem postojeće baze podataka kao i korišćenjem naših usluga, omogućen vam je direktan kontakt bez posrednika, sa budućim eventualnim poslovnim partnerom.</p>

					<p>Predlog o načinu na koji biste želeli da predstavimo Vašu firmu i proizvode , <strong><a href="" data-toggle="modal" data-target="#myModa2">možete poslati ovde</a></strong>.</p>
				</div><!-- End of post-->

				<div class="post">
					<h1 align="center">Sajamske aktivnosti</h1>

					<p>Pored informisanja o datumu održavanja odgovarajućeg sajma, u Atini i Solunu, u dogovoru sa Vama, naša usluga koju možete koristiti zasniva se na sledećem:</p>

					<ul>
					<li>da Vas informišemo o:</li>

						<ul>					
							<li>ceni zakupa sajamskog prostora sa pratećim troškovima;</li>
							<li>potrebnoj dokumetaciji i postupku prilikom uvoza eksponata;</li>
							<li>broju izlagača;</li>
						</ul>
					</ul>

					<ul>
						<li>da Vam pripremimo, sastanke sa izlagačima na sajmu;</li>
						<li>da Vašu firmu i proizvode, predstavimo izlagačima na sajmu u Atini ili Solunu;</li>
						<li>da Vas informišemo o kontaktima, koje smo tom prilikom, ostvarili.</li>
					</ul>	

					<p>Predlog o načinu na koji biste želeli da predstavimo Vašu firmu i proizvode , <strong><a href="" data-toggle="modal" data-target="#myModa2">možete poslati ovde</a></strong>.</p>
					
				</div><!-- End of post-->

				<div class="post">
					<h1 align="center">Priprema sastanaka</h1>

					<p>U zavisnosti od Vaših potreba, a vezano za firme iz Grčke, možemo uz prethodan  dogovor sa Vama, a na osnovu naše postojeće baze podataka i usluga koje vam pružamo, da vam pripremimo:</p>

					<ul>
					<li>više sastanaka, u  što je moguće kraćem vremenskom periodu;</li>
					<li>sastanke sa izlagačima na sajmu, u Atini ili Solunu, za koje ste zainteresovani;</li>
					<li>sastanke sa drugim pravnim licima, kao što su:</li>
					</ul>
					
					<ul>
						– špediteri,<br/>
						– međunarodni transport,<br/>
						– knjigovođe i dr.
					</ul>

					<p>Predlog o načinu na koji biste želeli da Vam pripremimo sastanak,  sa pravnim licima za koje ste zainteresovani, <strong><a href="" data-toggle="modal" data-target="#myModa2">možete poslati ovde</a></strong>. </p>

					<div class="dugmici">
		                <a href="index.php"> <button type="button" class="btn btn btn-sm" style="border-radius: 20px 0px 0px 20px; color:white; background-color: #3BA4C7; background-image: -moz-linear-gradient(top, #3BA4C7 0%, #1982A5 100%);">
		                   Nazad
		                </button></a>
		                <span class="dugmici_razmak"></span>
		                <a href="info.php"> <button type="button" class="btn btn btn-sm" style="border-radius: 0px 20px 20px 0px; color:white; background-color: #3BA4C7; background-image: -moz-linear-gradient(top, #3BA4C7 0%, #1982A5 100%);">
		                        Napred
		                    </button></a>
		            </div>

				</div><!-- End of post-->
			</div><!-- End List of posts-->

			<div class="pagination"></div>

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

		</div><!-- End Container-->
		

		<!-- Footer-->
		
			<footer class="footer" style="margin-top: 300px;"> 
			<hr>
				<div class="container text-center">
				

					<p>HellaSerb 2015. | <a href="deklaracija.php">Deklaracija</a> | <a href="uslovi_koriscenja.php">Uslovi korišćenja</a> | <a href="politika_privatnosti.php">Politika privatnosti</a></p>


				</div><!-- End container-->
				
			</footer>

			<!-- Back to top-->

			<a href="#" class="back-to-top" style="display: inline;">
				<i class="fa fa-arrow-circle-up"></i>
			</a>


	
	
<script src="js/jquery.js"></script>
<script src="js/paginate.js"></script>
<script src="js/custom.js"></script>
<script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>	
</body>
</html>