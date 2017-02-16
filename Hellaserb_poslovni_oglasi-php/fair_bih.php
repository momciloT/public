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
					<a href="index.php"><img src="rs/images/logo.png" class="img-responsive"></a>	
				</div>
				<div class="col-sm-1" id="language_header">
					<a href="rs/sajam_bih.php"><img width="50" height="50" src="rs/images/sr.png" class="img-responsive"></a>
					
					<a href="fair_bih.php"><img width="50" height="50" src="rs/images/el.png" class="img-responsive"></a>
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
						<a href="rs/sajam_bih.php"><img width="50" height="50" src="rs/images/sr.png" class="img-responsive"></a>
					</li>
					<li>
						<a href="fair_bih.php"><img width="50" height="50" src="rs/images/el.png" class="img-responsive"></a>
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
					<li><a href="index.php">ΑΡΧΙΚΗ</a></li>
					<li><a href="about_us.php">ΣΧΕΤΙΚΑ </a></li>
					<li><a href="our_services.php">ΥΠΗΡΕΣΙΕΣ</a></li>
					<li><a href="info.php">ΠΛΗΡΟΦΟΡΙΕΣ</a></li>
					<li><a href="ad.php">ΑΓΓΕΛΙΕΣ</a></li>
					<li><a href="place_your_ad.php">ΚΑΤΑΧΩΡΗΣΗ ΑΓΓΕΛΙΑΣ</a></li>
					<li><a href="contact.php">ΕΠΙΚΟΙΝΩΝΙΑ</a></li>
					<li><?php if(isset($_SESSION['email'])){echo "<a href='function/log.php' >".$_SESSION['nik']." / Αποσύνδεση</a>";}else{echo "<a href='#'>ΣΥΝΔΕΣΗ</a>";} ?></li>
					<li><?php if(isset($_SESSION['email'])){if($_SESSION['uloga']=='administrator'){echo '<a href="rs/admin/index.php">admin</a>';}} ?></li>
			</ul>
			<div id="validation-logfail" class="navbar-nav" style="margin-left: 10%;">
				<?php if(isset($_SESSION['fail'])){?><h4 style="color: red; ">Δώσατε λάθος e-mail ή κωδικό σας. Παρακαλούμε προσπαθήστε ξανά!</h4><?php } ?>
			</div>
			<div id="log_navbar" class="navbar-nav">
				<?php if(!isset($_SESSION['email'])){?>

					<form id="logform"  method="post" enctype="multipart/form-data" name="log-forma" action="">


						<input type="text" name="email-log" placeholder="Το e-mail σας" class="margin-left" id="emaill-log" data-rule="maxlen:4" data-msg="Η διεύθυνση e-mail σας " />
						<input type="password" name="pass-log" style="margin: 0px 7px;" placeholder="Κωδικός" class="margin-left" id="passw-log" data-rule="maxlen:4" data-msg="Λάθος κωδικού πρόσβασης, δοκιμάστε ξανά." />
						<input class="btn" type="submit" id="bt1" name="bt1" value="Σύνδεση"/>
						<h5 align="center" style="margin-right:220px;"><a style="color:red;" href="password_change.php">Ξεχάσατε τον κωδικό σας?</a></h5>
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
						echo '<div class="active"><a target="_blank" href="'.$row['link'].'"><img style="margin:0 auto; padding:20px;" src="rs/images/'.$row['putanja'].'" /></a></div>';
						$brojac++;
					}else{
						echo '<div><a target="_blank" href="'.$row['link'].'"><img style="margin:0 auto; padding:20px;" src="rs/images/'.$row['putanja'].'" /></a></div>';
						}
					}

					
					?>						
			</div>
			<!-- End baneri left-->	
		</div>

		<div class="col-sm-8" style="padding-top:40px;">	

				<h1 align="center">Εκθέσεις Βοσνίας και Ερζεγοβίνης</h1>

				<h4 style="padding:20px; text-decoration:underline;">2016</h4>

				<div class="row" style="padding-top:10px;">
					<div class="col-sm-3" style="font-size:16px;">
						<strong style="padding-left:20px;">15.03. - 19.03.</strong>
					</div>
					<div class="col-sm-3" style="font-size:16px;">
						BANJA LUKA
					</div>
					<div class="col-sm-6" style="font-size:16px;">
						<a target="#" href="http://www.banjalukafair.com/sajmovi.html">Έκθεση Κατασκευής</a>
					</div>
				</div><!-- End Row-->

				<div class="row" style="padding-top:10px;">
					<div class="col-sm-3" style="font-size:16px;">
						<strong style="padding-left:20px;">08.06. - 12.06.</strong>
					</div>
					<div class="col-sm-3" style="font-size:16px;">
						BANJA LUKA
					</div>
					<div class="col-sm-6" style="font-size:16px;">
						<a target="#" href="http://www.banjalukafair.com/sajmovi.html">20η Διεθνής Έκθεση Επίπλων</a>
					</div>
				</div><!-- End Row-->

				<div class="row" style="padding-top:10px;">
					<div class="col-sm-3" style="font-size:16px;">
						<strong style="padding-left:20px;">06.09. -  09.09.</strong>
					</div>
					<div class="col-sm-3" style="font-size:16px;">
						BANJA LUKA
					</div>
					<div class="col-sm-6" style="font-size:16px;">
						<a target="#" href="http://www.banjalukafair.com/">20η Διεθνής Έκθεση Γεωργίας και Βιομηχανίας Τροφίμων 
</a>
					</div>
				</div><!-- End Row-->

				<div class="row" style="padding-top:10px;">
					<div class="col-sm-3" style="font-size:16px;">
						<strong style="padding-left:20px;">10.11.  - 13.11.</strong>
					</div>
					<div class="col-sm-3" style="font-size:16px;">
						BANJA LUKA
					</div>
					<div class="col-sm-6" style="font-size:16px;">
						<a target="#" href="http://www.banjalukafair.com/">20η Διεθνής Έκθεση κυνηγιού - ψαρέματος, οικολογίας και αθλητισμού</a>
					</div>
				</div><!-- End Row-->

				<div class="row" style="padding-top:10px;">
					<div class="col-sm-3" style="font-size:16px;">
						<strong style="padding-left:20px;">10.11.  - 13.11.</strong>
					</div>
					<div class="col-sm-3" style="font-size:16px;">
						BANJA LUKA
					</div>
					<div class="col-sm-6" style="font-size:16px;">
						<a target="#" href="http://www.banjalukafair.com/">20η Διεθνής Έκθεση Τουρισμού και Φιλοξενίας </a>
					</div>
				</div><!-- End Row-->

				<div class="row" style="padding-top:10px;">
					<div class="col-sm-3" style="font-size:16px;">
						<strong style="padding-left:20px;">03.03. -  06.03.</strong>
					</div>
					<div class="col-sm-3" style="font-size:16px;">
						BRČKO
					</div>
					<div class="col-sm-6" style="font-size:16px;">
						<a target="#" href="http://www.brcko-pkomora.com/sajmovi_fbih.html">3η Έκθεση Γεωργίας, </a>
					</div>
				</div><!-- End Row-->

				<div class="row" style="padding-top:10px;">
					<div class="col-sm-3" style="font-size:16px;">
						<strong style="padding-left:20px;">10.11. - 13.11.</strong>
					</div>
					<div class="col-sm-3" style="font-size:16px;">
						BRČKO
					</div>
					<div class="col-sm-6" style="font-size:16px;">
						<a target="#" href="http://www.brcko-pkomora.com/sajmovi_fbih.html">15η Διεθνή Trade Fair </a>
					</div>
				</div><!-- End Row-->

				<div class="row" style="padding-top:10px;">
					<div class="col-sm-3" style="font-size:16px;">
						<strong style="padding-left:20px;">16.03. - 20.03.</strong>
					</div>
					<div class="col-sm-3" style="font-size:16px;">
						SARAJEVO
					</div>
					<div class="col-sm-6" style="font-size:16px;">
						<a target="#" href="http://www.skenderija.ba/index.php/sarajevskisajam/interioexterio">34η Διεθνής Έκθεση Επίπλων και Δασών</a>
					</div>
				</div><!-- End Row-->

				<div class="row" style="padding-top:10px;">
					<div class="col-sm-3" style="font-size:16px;">
						<strong style="padding-left:20px;">01.06. - 05.06.</strong>
					</div>
					<div class="col-sm-3" style="font-size:16px;">
						SARAJEVO
					</div>
					<div class="col-sm-6" style="font-size:16px;">
						<a target="#" href="http://www.tea-fest.ba/">Διεθνές Φεστιβάλ τσάι και βότανα</a>
					</div>
				</div><!-- End Row-->

				<div class="row" style="padding-top:10px;">
					<div class="col-sm-3" style="font-size:16px;">
						<strong style="padding-left:20px;">07.09. - 11.09.</strong>
					</div>
					<div class="col-sm-3" style="font-size:16px;">
						SARAJEVO
					</div>
					<div class="col-sm-6" style="font-size:16px;">
						<a target="#" href="http://www.bee.tea-fest.ba/">Διεθνής Έκθεση Μελισσοκομία-εξοπλισμός
</a>
					</div>
				</div><!-- End Row-->

				<div class="row" style="padding-top:10px;">
					<div class="col-sm-3" style="font-size:16px;">
						<strong style="padding-left:20px;">15.12. - 18.12.</strong>
					</div>
					<div class="col-sm-3" style="font-size:16px;">
						SARAJEVO
					</div>
					<div class="col-sm-6" style="font-size:16px;">
						<a target="#" href="http://www.skenderija.ba/"> Έκθεση Εμπορίου, Γεωργίας και βιοτεχνίας</a>
					</div>
				</div><!-- End Row-->

				<div class="row" style="padding-top:10px;">
					<div class="col-sm-3" style="font-size:16px;">
						<strong style="padding-left:20px;">12.04. - 16.04.</strong>
					</div>
					<div class="col-sm-3" style="font-size:16px;">
						MOSTAR
					</div>
					<div class="col-sm-6" style="font-size:16px;">
						<a target="#" href="http://www.mostar-fair.com/">19η Διεθνή   Έκθεση Εμπορίου </a>
					</div>
				</div><!-- End Row-->

				<div class="row" style="padding-top:10px;">
					<div class="col-sm-3" style="font-size:16px;">
						<strong style="padding-left:20px;">12.05. - 14.05.</strong>
					</div>
					<div class="col-sm-3" style="font-size:16px;">
						LUKAVAC
					</div>
					<div class="col-sm-6" style="font-size:16px;">
						<a target="#" href="http://www.lukavacki-sajam.com.ba">Έκθεση Τουρισμού</a>
					</div>
				</div><!-- End Row-->

				<div class="row" style="padding-top:10px;">
					<div class="col-sm-3" style="font-size:16px;">
						<strong style="padding-left:20px;">19.05. - 22.05.</strong>
					</div>
					<div class="col-sm-3" style="font-size:16px;">
						TEŠANJ
					</div>
					<div class="col-sm-6" style="font-size:16px;">
						<a target="#" href="http://www.biznistesanj.ba">Trade Fair</a>
					</div>
				</div><!-- End Row-->

				<div class="row" style="padding-top:10px;">
					<div class="col-sm-3" style="font-size:16px;">
						<strong style="padding-left:20px;">07.06. - 09.06</strong>
					</div>
					<div class="col-sm-3" style="font-size:16px;">
						TUZLA
					</div>
					<div class="col-sm-6" style="font-size:16px;">
						<a target="#" href="http://www.tuzlanskisajam.ba/bh/energa">6η Διεθνή Έκθεση Ενέργειας</a>
					</div>
				</div><!-- End Row-->

				<div class="row" style="padding-top:10px;">
					<div class="col-sm-3" style="font-size:16px;">
						<strong style="padding-left:20px;">24.08. - 28.08.</strong>
					</div>
					<div class="col-sm-3" style="font-size:16px;">
						GRADAČAC
					</div>
					<div class="col-sm-6" style="font-size:16px;">
						<a target="#" href="http://gradacackisajam.com.ba/">43η Διεθνής Έκθεση Γεωργίας και Βιομηχανίας Τροφίμων </a>
					</div>
				</div><!-- End Row-->

				<div class="row" style="padding-top:10px;">
					<div class="col-sm-3" style="font-size:16px;">
						<strong style="padding-left:20px;">08.09. - 11.09.</strong>
					</div>
					<div class="col-sm-3" style="font-size:16px;">
						BIHAĆ
					</div>
					<div class="col-sm-6" style="font-size:16px;">
						<a target="#" href="http://ekobis.info/program-sajma/">14η Διεθνής Έκθεση Οικολογίας</a>
					</div>
				</div><!-- End Row-->

				<div class="row" style="padding-top:10px;">
					<div class="col-sm-3" style="font-size:16px;">
						<strong style="padding-left:20px;">15.09. - 16.09.</strong>
					</div>
					<div class="col-sm-3" style="font-size:16px;">
						ČELINAC
					</div>
					<div class="col-sm-6" style="font-size:16px;">
						<a target="#" href="http://www.racelinac.com/">5η Γενική Εμπορική Έκθεση </a>
					</div>
				</div><!-- End Row-->

				<div class="row" style="padding-top:10px;">
					<div class="col-sm-3" style="font-size:16px;">
						<strong style="padding-left:20px;">19.09. - 20.09.</strong>
					</div>
					<div class="col-sm-3" style="font-size:16px;">
						PROZOR - RAMA
					</div>
					<div class="col-sm-6" style="font-size:16px;">
						<a target="#" href="http://www.prozor-rama.org/press-centar/obavijesti/dani-sljive-prozor-rama-2015-najava-desetog-sajma/147">Έκθεση Γεωργίας, Τροφίμων και Τουρισμού </a>
					</div>
				</div><!-- End Row-->

				<div class="row" style="padding-top:10px;">
					<div class="col-sm-3" style="font-size:16px;">
						<strong style="padding-left:20px;">22.09. - 24.09.</strong>
					</div>
					<div class="col-sm-3" style="font-size:16px;">
						BIJELJINA
					</div>
					<div class="col-sm-6" style="font-size:16px;">
						<a target="#" href="http://www.adgradbn.com/index.php?idgrupa=9&idpodgrupa=1&sablon=1">15η Διεθνής Αγροτική Έκθεση</a>
					</div>
				</div><!-- End Row-->

				<div class="row" style="padding-top:10px;">
					<div class="col-sm-3" style="font-size:16px;">
						<strong style="padding-left:20px;">04.10. - 08.10.</strong>
					</div>
					<div class="col-sm-3" style="font-size:16px;">
						ZENICA
					</div>
					<div class="col-sm-6" style="font-size:16px;">
						<a target="#" href="http://zeps.com/site/ba/sajmovi/zeps-generalni-sajam">13η Διεθνής Έκθεση Μετάλλων 
</a>
					</div>
				</div><!-- End Row-->
				

				<div class="dugmici">
		                <a href="fair_rus.php"> <button type="button" class="btn btn btn-sm" style="border-radius: 20px 0px 0px 20px; color:white; background-color: #3BA4C7; background-image: -moz-linear-gradient(top, #3BA4C7 0%, #1982A5 100%);">
		                   Προηγούμενη
		                </button></a>
		                <span class="dugmici_razmak"></span>
		                <a href="fair_mng.php"> <button type="button" class="btn btn btn-sm" style="border-radius: 0px 20px 20px 0px; color:white; background-color: #3BA4C7; background-image: -moz-linear-gradient(top, #3BA4C7 0%, #1982A5 100%);">
		                        Επόμενη
		                    </button></a>
		            </div>

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
						echo '<div class="active"><a target="_blank" href="'.$row['link'].'"><img style="margin:0 auto; padding:20px;" src="rs/images/'.$row['putanja'].'" /></a></div>';
						$brojac++;
					}else{
						echo '<div><a target="_blank" href="'.$row['link'].'"><img style="margin:0 auto; padding:20px;" src="rs/images/'.$row['putanja'].'" /></a></div>';
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
				

					<p>HellaSerb 2015. | <a href="declaration.php">Δήλωση</a> | <a href="terms_of_use.php">Όροι χρήσης</a> | <a href="privacy_policy.php">Προστασία Προσωπικών Δεδομένων</a></p>


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