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
					<a href="rs/sajam_rus.php"><img width="50" height="50" src="rs/images/sr.png" class="img-responsive"></a>
					
					<a href="fair_rus.php"><img width="50" height="50" src="rs/images/el.png" class="img-responsive"></a>
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
						<a href="rs/sajam_rus.php"><img width="50" height="50" src="rs/images/sr.png" class="img-responsive"></a>
					</li>
					<li>
						<a href="fair_rus.php"><img width="50" height="50" src="rs/images/el.png" class="img-responsive"></a>
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

		<div class="col-sm-8">	
		

		<h1 align="center">Εκθέσεις Ρωσίας</h1>	
			
			<h3 style="padding:20px;">Εκθέσεις Μόσχα</h3>

			<h4 style="padding-left:20px; text-decoration:underline;">2016</h4>

			<div class="row" style="padding-top:10px;">
					<div class="col-sm-4" style="font-size:16px;">
						<strong style="padding-left:20px;">26.01. - 29.01.</strong>
					</div>
					<div class="col-sm-8" style="font-size:16px;">
						<a target="#" href="http://www.interplastica.de/">19η Διεθνής 'Εκθεση Πλαστικών και Προιοντων Καουτσούκ</a>
					</div>
			</div><!-- End Row-->

			<div class="row" style="padding-top:10px;">
					<div class="col-sm-4" style="font-size:16px;">
						<strong style="padding-left:20px;">26.01. - 29.01.</strong>
					</div>
					<div class="col-sm-8" style="font-size:16px;">
						<a target="#" href="http://upakovka.messe-duesseldorf.de/">24η Έκθεση Συσκευασιών, Μηχανημάτων συσκευασίας και εκτύπωσης</a>
					</div>
			</div><!-- End Row-->

			<div class="row" style="padding-top:10px;">
					<div class="col-sm-4" style="font-size:16px;">
						<strong style="padding-left:20px;">08.02. - 12.02.</strong>
					</div>
					<div class="col-sm-8" style="font-size:16px;">
						<a target="#" href="http://www.prod-expo.ru/en/">23η Διεθνής Έκθεση Τροφίμων, Ποτών και πρώτων υλών παραγωγής τροφίμων</a>
					</div>
			</div><!-- End Row-->

			<div class="row" style="padding-top:10px;">
					<div class="col-sm-4" style="font-size:16px;">
						<strong style="padding-left:20px;">23.02. - 26.02.</strong>
					</div>
					<div class="col-sm-8" style="font-size:16px;">
						<a target="#" href="http://www.cjf-expo.ru/en/">16η Διεθνής  Έκθεση παιδικής και εφηβικής μόδας. Ρούχα εγκυμοσύνης</a>
					</div>
			</div><!-- End Row-->

			<div class="row" style="padding-top:10px;">
					<div class="col-sm-4" style="font-size:16px;">
						<strong style="padding-left:20px;">24.02. - 26.02.</strong>
					</div>
					<div class="col-sm-8" style="font-size:16px;">
						<a target="#" href="http://techtextil-russia.ru.messefrankfurt.com/moscow/en/for-visitors/welcome.html">8η Διεθνής έκθεση τεχνικών υφασμάτων και προστατευτική ενδυμασία</a>
					</div>
			</div><!-- End Row-->

			<div class="row" style="padding-top:10px;">
					<div class="col-sm-4" style="font-size:16px;">
						<strong style="padding-left:20px;">01.11. - 03.11.</strong>
					</div>
					<div class="col-sm-8" style="font-size:16px;">
						<a target="#" href="http://www.cryogen-expo.com/">15η. Έκθεση Cryogenic Εξοπλισμού, Τεχνολογίας και Βιομηχανικών αερίων</a>
					</div>
			</div><!-- End Row-->

			<div class="row" style="padding-top:10px;">
					<div class="col-sm-4" style="font-size:16px;">
						<strong style="padding-left:20px;">14.03. - 17.03.</strong>
					</div>
					<div class="col-sm-8" style="font-size:16px;">
						<a target="#" href="http://www.photonics-expo.ru/en/">11η Διεθνής Έκθεση Οπτικών, λέιζερ και Οπτικοηλεκτρονική τεχνολογία</a>
					</div>
			</div><!-- End Row-->

			<div class="row" style="padding-top:10px;">
					<div class="col-sm-4" style="font-size:16px;">
						<strong style="padding-left:20px;">14.03. - 17.03.</strong>
					</div>
					<div class="col-sm-8" style="font-size:16px;">
						<a target="#" href="http://www.securika-moscow.ru/en-GB/">22η Διεθνής Έκθεση ασφάλειας και πυροπροστασίας, εξοπλισμού και υλικών</a>
					</div>
			</div><!-- End Row-->

			<div class="row" style="padding-top:10px;">
					<div class="col-sm-4" style="font-size:16px;">
						<strong style="padding-left:20px;">22.03. - 25.03.</strong>
					</div>
					<div class="col-sm-8" style="font-size:16px;">
						<a target="#" href="http://www.obuv-expo.ru/en/">44η Διεθνής έκθεση υποδημάτων και δερμάτινων ειδών</a>
					</div>
			</div><!-- End Row-->
			<div class="row" style="padding-top:10px;">
					<div class="col-sm-4" style="font-size:16px;">
						<strong style="padding-left:20px;">23.03. - 25.03.</strong>
					</div>
					<div class="col-sm-8" style="font-size:16px;">
						<a target="#" href="http://www.vendingexpo.ru/eng/">Διεθνής  Έκθεση  VENDING Εξοπλισμού</a>
					</div>
			</div><!-- End Row-->

			<div class="row" style="padding-top:10px;">
					<div class="col-sm-4" style="font-size:16px;">
						<strong style="padding-left:20px;">23.03. - 26.03.</strong>
					</div>
					<div class="col-sm-8" style="font-size:16px;">
						<a target="#" href="http://www.mitt.ru/en-GB/">23η Διεθνής έκθεση Τουρισμού</a>
					</div>
			</div><!-- End Row-->

			<div class="row" style="padding-top:10px;">
					<div class="col-sm-4" style="font-size:16px;">
						<strong style="padding-left:20px;">11.05. - 14.05.</strong>
					</div>
					<div class="col-sm-8" style="font-size:16px;">
						<a target="#" href="http://en.fidexpo.ru/">7η Διεθνής Έκθεση Επίπλου</a>
					</div>
			</div><!-- End Row-->

			<div class="row" style="padding-top:10px;">
					<div class="col-sm-4" style="font-size:16px;">
						<strong style="padding-left:20px;">23.05. - 27.05.</strong>
					</div>
					<div class="col-sm-8" style="font-size:16px;">
						<a target="#" href="http://www.metobr-expo.ru/en/">17η Διεθνής Έκθεση Εργαλείων & Οργάνων  στην κατεργασία  Μετάλλου</a>
					</div>
			</div><!-- End Row-->

			<div class="row" style="padding-top:10px;">
					<div class="col-sm-4" style="font-size:16px;">
						<strong style="padding-left:20px;">19.09. - 22.09.</strong>
					</div>
					<div class="col-sm-8" style="font-size:16px;">
						<a target="#" href="http://www.chemistry-expo.ru/en/">19η Διεθνής Έκθεση Χημικής Βιομηχανίας και Επιστημών </a>
					</div>
			</div><!-- End Row-->
			<div class="row" style="padding-top:10px;">
					<div class="col-sm-4" style="font-size:16px;">
						<strong style="padding-left:20px;">19.09 .- 22.09.</strong>
					</div>
					<div class="col-sm-8" style="font-size:16px;">
						<a target="#" href="http://www.chemistry-expo.ru/en/plastics/">16η Διεθνής Έκθεση Πρώτων Υλών, Εξοπλισμού και Τεχνολογιών παραγωγής πλαστικών</a>
					</div>
			</div><!-- End Row-->

			<div class="row" style="padding-top:10px;">
					<div class="col-sm-4" style="font-size:16px;">
						<strong style="padding-left:20px;">19.09. - 21.09.</strong>
					</div>
					<div class="col-sm-8" style="font-size:16px;">
						<a target="#" href="http://www.pta-expo.ru/en/moscow/date.htm">16η Έκθεση εξοπλισμού και τεχνολογιών για συστήματα αυτοματοποίησης διαδικασιών και ελέγχου</a>
					</div>
			</div><!-- End Row-->

			<div class="row" style="padding-top:10px;">
					<div class="col-sm-4" style="font-size:16px;">
						<strong style="padding-left:20px;">10.10. - 14.10.</strong>
					</div>
					<div class="col-sm-8" style="font-size:16px;">
						<a target="#" href="http://www.agroprodmash-expo.ru/en/">21η Διεθνής Έκθεση Μηχανημάτων, Εξοπλισμού και συστατικών για Βιομηχανίες τροφίμων</a>
					</div>
			</div><!-- End Row-->

			<div class="row" style="padding-top:10px;">
					<div class="col-sm-4" style="font-size:16px;">
						<strong style="padding-left:20px;">24.10. - 27.10.</strong>
					</div>
					<div class="col-sm-8" style="font-size:16px;">
						<a target="#" href="http://www.technoforum-expo.ru/en/">Διεθνής εξειδικευμένη Έκθεση Εξοπλισμού και Τεχνολογίας  στην παραγωγή δομικών  υλικώνα </a>
					</div>
			</div><!-- End Row-->


			<div class="row" style="padding-top:10px;">
					<div class="col-sm-4" style="font-size:16px;">
						<strong style="padding-left:20px;">24.10. - 27.10.</strong>
					</div>
					<div class="col-sm-8" style="font-size:16px;">
						<a target="#" href="http://www.lesdrevmash-expo.ru/en/">16η Διεθνής έκθεση μηχανημάτων, εξοπλισμού και τεχνολογίας κατεργασίας ξύλου</a>
					</div>
			</div><!-- End Row-->

			<div class="row" style="padding-top:10px;">
					<div class="col-sm-4" style="font-size:16px;">
						<strong style="padding-left:20px;">08.11. - 11.11.</strong>
					</div>
					<div class="col-sm-8" style="font-size:16px;">
						<a target="#" href="https://www.mitexpo.com/">Διεθνής Έκθεση Εργαλείων, Εξοπλισμών και Τεχνολογίας</a>
					</div>
			</div><!-- End Row-->

			<div class="row" style="padding-top:10px;">
					<div class="col-sm-4" style="font-size:16px;">
						<strong style="padding-left:20px;">21.11. - 25.11.</strong>
					</div>
					<div class="col-sm-8" style="font-size:16px;">
						<a target="#" href="http://www.meb-expo.ru/en/">28η Διεθνής έκθεση Επίπλων</a>
					</div>
			</div><!-- End Row-->

			<div class="row" style="padding-top:10px;">
					<div class="col-sm-4" style="font-size:16px;">
						<strong style="padding-left:20px;">05.12. - 08.12.</strong>
					</div>
					<div class="col-sm-8" style="font-size:16px;">
						<a target="#" href="https://www.aptekaexpo.com/">23η Διεθνής έκθεση Φαρμακείου και συναφή προϊόντων</a>
					</div>
			</div><!-- End Row-->

			<div class="row" style="padding-top:10px;">
					<div class="col-sm-4" style="font-size:16px;">
						<strong style="padding-left:20px;">05.12. - 09.12.</strong>
					</div>
					<div class="col-sm-8" style="font-size:16px;">
						<a target="#" href="http://www.zdravo-expo.ru/en/">26η Διεθνής Έκθεση Υγείας και Φαρμακευτικών προϊόντων</a>
					</div>
			</div><!-- End Row-->

				


			<h3 style="padding:20px;">Εκθέσεις Σανκτ-Πετερμπούργκ</h3>

			<h4 style="padding-left:20px; text-decoration:underline;">2016</h4>

			<div class="row" style="padding-top:10px;">
					<div class="col-sm-4" style="font-size:16px;">
						<strong style="padding-left:20px;">19.03. - 20.03.</strong>
					</div>
					<div class="col-sm-8" style="font-size:16px;">
						<a target="#" href="http://exposfera.spb.ru/building_a_house/">Έκθεση Δομικών Υλικών και σχεδιασμού</a>
					</div>
			</div><!-- End Row-->

				<div class="row" style="padding-top:10px;">
					<div class="col-sm-4" style="font-size:16px;">
						<strong style="padding-left:20px;">01.04. - 03.04.</strong>
					</div>
					<div class="col-sm-8" style="font-size:16px;">
						<a target="#" href="http://www.y-expo.ru/en/foreign/">Real Estate  και στο εξωτερικό, τραπεζικές και νομικές υπηρεσίες </a>
					</div>
			</div><!-- End Row-->

			<div class="row" style="padding-top:10px;">
					<div class="col-sm-4" style="font-size:16px;">
						<strong style="padding-left:20px;">17.05. - 20.05.</strong>
					</div>
					<div class="col-sm-8" style="font-size:16px;">
						<a target="#" href="http://welding.lenexpo.ru/en/">Διεθνής Έκθεση τεχνολογιών για συγκόλληση και κοπή </a>
					</div>
			</div><!-- End Row-->

				<div class="row" style="padding-top:10px;">
					<div class="col-sm-4" style="font-size:16px;">
						<strong style="padding-left:20px;">12.10. - 14.10.</strong>
					</div>
					<div class="col-sm-8" style="font-size:16px;">
						<a target="#" href="http://www.mediz-spb.ru/en">Έκθεση Ιατρικής και Ιατροτεχνολογικού Εξοπλισμού </a>
					</div>
			</div><!-- End Row-->

			<div class="row" style="padding-top:10px;">
					<div class="col-sm-4" style="font-size:16px;">
						<strong style="padding-left:20px;">12.10. - 14.10.</strong>
					</div>
					<div class="col-sm-8" style="font-size:16px;">
						<a target="#" href="http://www.aestheticmed.ru/?lang=en-GB">Διεθνής Έκθεση προϊόντων και υπηρεσιών στην αισθητική και αισθητική ιατρική </a>
					</div>
			</div><!-- End Row-->

				<div class="row" style="padding-top:10px;">
					<div class="col-sm-4" style="font-size:16px;">
						<strong style="padding-left:20px;">12.10. - 14.10.</strong>
					</div>
					<div class="col-sm-8" style="font-size:16px;">
						<a target="#" href="http://www.pharmaexpo.ru/?lang=en-GB">Διεθνής Έκθεση φαρμάκων, τροφίμων και των συμπληρωμάτων διατροφής</a>
					</div>
			</div><!-- End Row-->

			<div class="row" style="padding-top:10px;">
					<div class="col-sm-4" style="font-size:16px;">
						<strong style="padding-left:20px;">13.10. - 15.10.</strong>
					</div>
					<div class="col-sm-8" style="font-size:16px;">
						<a target="#" href="http://travelexhibition.ru/en/calendar/inwetex2015.html">Έκθεση Τουρισμού και ταξιδιωτικών πρακτόρων, ασφάλιση στον τομέα του τουρισμού </a>
					</div>
			</div><!-- End Row-->

				<div class="row" style="padding-top:10px;">
					<div class="col-sm-4" style="font-size:16px;">
						<strong style="padding-left:20px;">14.10. - 16.10.</strong>
					</div>
					<div class="col-sm-8" style="font-size:16px;">
						<a target="#" href="http://trends.lenexpo.ru/en/">Έκθεση Διαφήμισης,  Πληροφοριών  και Design</a>
					</div>
			</div><!-- End Row-->

			<div class="row" style="padding-top:10px;">
					<div class="col-sm-4" style="font-size:16px;">
						<strong style="padding-left:20px;">25.10. - 27.10.</strong>
					</div>
					<div class="col-sm-8" style="font-size:16px;">
						<a target="#" href="http://www.dentalexpo-spb.ru/?lang=en-GB">9η Διεθνής Έκθεση εξοπλισμού, οργάνων και υλικών για την οδοντιατρική </a>
					</div>
			</div><!-- End Row-->

				<div class="row" style="padding-top:10px;">
					<div class="col-sm-4" style="font-size:16px;">
						<strong style="padding-left:20px;">08.11. - 10.11.</strong>
					</div>
					<div class="col-sm-8" style="font-size:16px;">
						<a target="#" href="http://securika-spb.ru/ru-RU/">25η Έκθεση ασφάλειας και πυροπροστασίας, εξοπλισμού και υλικών</a>
					</div>
			</div><!-- End Row-->	
		
		

		<div class="dugmici">
		                <a href="fair_kip.php"> <button type="button" class="btn btn btn-sm" style="border-radius: 20px 0px 0px 20px; color:white; background-color: #3BA4C7; background-image: -moz-linear-gradient(top, #3BA4C7 0%, #1982A5 100%);">
		                   Προηγούμενη
		                </button></a>
		                <span class="dugmici_razmak"></span>
		                <a href="fair_bih.php"> <button type="button" class="btn btn btn-sm" style="border-radius: 0px 20px 20px 0px; color:white; background-color: #3BA4C7; background-image: -moz-linear-gradient(top, #3BA4C7 0%, #1982A5 100%);">
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