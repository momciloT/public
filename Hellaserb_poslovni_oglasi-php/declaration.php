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
</head>

<body data-spy="scroll" data-target="#my-navbar">
<!-- jumbotron-->
	
	<div class="jumbotron">
		<div class="container">
			<div class="row">
				<div class="col-sm-11">
					<a href="index.php"><img src="rs/images/logo.png" class="img-responsive"></a>	
				</div>
				<div class="col-sm-1" id="language_header">
					<a href="rs/deklaracija.php"><img width="50" height="50" src="rs/images/sr.png" class="img-responsive"></a>
					
					<a href="declaration.php"><img width="50" height="50" src="rs/images/el.png" class="img-responsive"></a>
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
						<a href="rs/deklaracija.php"><img width="50" height="50" src="rs/images/sr.png" class="img-responsive"></a>
					</li>
					<li>
						<a href="declaration.php"><img width="50" height="50" src="rs/images/el.png" class="img-responsive"></a>
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

		<div class="container" style="margin-top:20px;">

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

		<div class="col-sm-8" style="margin-top:20px;">	

			<h3 align="center">Δήλωση περί διαφήμισης</h3>

			<p>Αλλοδαπά νομικά και φυσικά πρόσωπα έχουν τα ίδια δικαιώματα και υποχρεώσεις στη διαφήμιση όπως και τα εγχώρια πρόσωπα, ήτοι διαφημίζονται σύμφωνα με τον ισχύον Νόμο περί διαφήμισης της Δημοκρατίας της Σερβίας.</p>
			<p>Το έγγραφο που περιέχει στοιχεία για το δημιουργό ή αγγελιοδότη του διαφημιστικού μηνύματος (πελάτης) αποτελεί τη δήλωση περί διαφήμισης, και είναι υποχρεωτική για όλα τα νομικά πρόσωπα – εταιρείες ή επιχειρήσεις σύµφωνα με το Νόμο περί διαφημίσεων (άρθρο 11.). Ο αγγελιοδότης είναι  ο δημιουργός του διαφημιστικού μηνύματος.</p>
			<p>Ο αγγελιοδότης ευθύνεται να διαβιβάσει τη δήλωση με τα ακριβή στοιχεία στον εκδότη  που δημοσιεύει και μεταδίδει διαφημιστικά μηνύματα, Με το παρόν έγγραφο εγγυάστε για την ακρίβεια των εισαγμένων στοιχείων και το περιεχόμενο της αγγελίας. Ο αγγελιοδότης   κατά την εγγραφή του  εισαγάγει τα στοιχεία τα οποία θα αποτελούν τη δήλωση περί διαφήμισης.</p>
			<p><strong>Αυτά τα στοιχεία αποτελούν προσωπικά δεδομένα οπότε καλύπτονται από δέσμευση μη δημοσιοποίησης και προστατεύονται από τις διατάξεις περί Προστασίας Προσωπικών Δεδομένων.</strong></p>
			<p><strong>Η δήλωση χρειάζεται να συμπληρωθεί σύμφωνα με το άρθρο 11 του Νόμου περί διαφήμισης της Δημοκρατίας της Σερβίας, ώστε να διαφημίζονται μόνο νόμιμα καταχωρημένες εταιρείες και επιχειρήσεις.</strong></p>
			<p>Τα εισαγμένα στοιχεία ισχύουν 12 μήνες από την ημέρα εισαγωγής, ή μέχρι την αλλαγή στοιχείων περί του διαφημιζόμενου.</p>
			<p>Εφόσον γίνουν αλλαγές στοιχείων, ο διαφημιζόμενος υποχρεούται να στείλει νέα δήλωση με τις αντίστοιχες αλλαγές. Σε περίπτωση μη διαβίβασης της δήλωσης, οι αγγελίες δεν θα δημοσιευτούν. Θα δημοσιεύσουμε τις μη δημοσιευμένες αγγελίες κατόπιν παραλαβής της δήλωσης.</p>
			<p>Για τη κάθε αγγελία, το νομικό πρόσωπο υποχρεούται να συμπληρώσει τη δήλωση με όλα τα υποχρεωτικά στοιχεία που σχετίζονται με τη δήλωση, να το υπογράψει να  επικυρώσει με σφραγίδα και σαρωμένο να το αποστείλει στην ηλεκτρονική διεύθυνση <a href="mailto:info@hellaserb.com">info@hellaserb.com</a> ή σε φαξ <strong>+381 11 4074 584</strong>.</p>
			<p>Τη δήλωση στο pdf μπορείτε να παραλάβετε <a target="#" href="deklaracija_hellaserb.pdf">εδώ</a>.</p>
			<p><strong>Ποινικός Κώδικας της Δημοκρατίας της Σερβίας – Απάτη με υπολογιστή (άρθρο. 301)</strong></p>
			<p>Άτομο το οποίο εισάγει ανακριβές στοιχείο, παραλείπει την εισαγωγή ακριβούς στοιχείου ή με άλλο τρόπο κρύβει ή παρουσιάζει αναληθή στοιχεία επηρεάζοντας το αποτέλεσμα ηλεκτρονικής επεξεργασίας στοιχείων και μεταφοράς στοιχείων με σκοπό να προσκομίσει για τον ίδιο ή για άλλους παράνομο περιουσιακό όφελος  προκαλώντας περιουσιακή ζημιά, θα τιμωρείται με χρηματική  ποινή ή φυλάκιση έως 3 χρόνια.</p>
		

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