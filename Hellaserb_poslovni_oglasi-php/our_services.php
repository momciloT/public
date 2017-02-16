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
						        	Σε συνεννόηση μαζί σας:
						      </div>
						      <div class="modal-body">
						        	<form method="post" action="function/z_kockica.php" class="validateform" name="send-contact" id="contactform">

						        	<div class="row">
						        		<div class="col-lg-12 field">	
						        		<h5 style="font-size:16px;">Επωνυμία της εταιρείας</h5>
						        		<input type="text" id="tbNazivFirme" class="polja_kockica"  name="tbNazivFirme" placeholder="* Επωνυμία της εταιρείας..." data-rule="maxlen:4" data-msg="Υποχρεωτικό πεδίο" />
						        		<div class="validation">
                            </div>
						        		</div>

						        		<div class="col-lg-12 field">
						        		<h5 style="font-size:16px;">Η διεύθυνση e-mail σας</h5>
						        		<input type="text" id="tbMail" class="polja_kockica"  name="tbMail"  placeholder="* Η διεύθυνση e-mail σας..." data-rule="email" data-msg="Υποχρεωτικό πεδίο" />
						        		<div class="validation">
                            </div>
						        		</div>

						        		<div class="col-lg-12 field">
						        		<h5 style="font-size:16px;">Θέμα Μηνύματος</h5>
						        		<input type="text" id="tbNaslovPor" class="polja_kockica"  name="tbNaslovPor" placeholder="* Θέμα Μηνύματος..." data-rule="maxlen:4" data-msg="Υποχρεωτικό πεδίο" />
						        		<div class="validation">
                            </div>
						        		</div>

						        		<div class="col-lg-12 field">
						        		<h5 style="font-size:16px;">Το μήνυμά σας</h5>
						        		<textarea id="tbPoruka" name="Poruka" placeholder="* Πως επιθυμείτε να παρουσιάσουμε την εταιρεία και τα προϊόντα σας ή να σας προγραμματήσουμε συναντήσεις..." class="polja_kockica" style="height:120px;" data-rule="required" data-msg="Υποχρεωτικό πεδίο" ></textarea>
						        		<div class="validation">
                            </div>
						        		<p>
						        		<button style="border:2px solid white;"  class="btn btn-theme " type="submit">Αποστολή</button>
						        		</p>

						        		</div>
						        		</div>

						        		<div id="sendmessage">
                    Το μήνυμα σας στάλθηκε με επιτυχία, θα σας απαντήσουμε σύντομα. Σας ευχαριστήσουμε για τη χρήση της πύλης μας.
                    </div>
						        	</form>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal">Έξοδος</button>
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
					<a href="index.php"><img src="rs/images/logo.png" class="img-responsive"></a>	
				</div>
				<div class="col-sm-1" id="language_header">
					<a href="rs/nase_usluge.php"><img width="50" height="50" src="rs/images/sr.png" class="img-responsive"></a>
					
					<a href="our_services.php"><img width="50" height="50" src="rs/images/el.png" class="img-responsive"></a>
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
						<a href="rs/nase_usluge.php"><img width="50" height="50" src="rs/images/sr.png" class="img-responsive"></a>
					</li>
					<li>
						<a href="our_services.php"><img width="50" height="50" src="rs/images/el.png" class="img-responsive"></a>
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

		<img src="rs/images/services.jpg" class="img-responsive" style="margin-top:-20px;">

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

			<div class="list-of-posts">
				<div class="post">
					<h1 align="center">Γνώση της αγοράς</h1>

					<p>Για να διαλέξετε τη σωστή προσέγγιση και τη κατάλληλη επαγγελματική πολιτική για τη παρουσίαση της επιχείρησης  σας στη νέα αγορά,είναι πολύ σημαντικό να διαθέτετε σωστές και έγκυρες  επαγγελματικές πληροφορίες. </p>

					<p>Για το σκοπό αυτό, σχετικά με την Σερβική αγορά σας προσφέρουμε <a href="info.php">πληροφορίες</a> για:
						<ul>
							<li>τη ζήτηση που υπάρχει, σε προϊόντα όπως είναι τα δικά σας</li>
							<li>τις λιανικές και χονδρικές τιμές των προϊόντων</li>
							<li>τον αριθμό εταιρειών που εμπορεύονται ή παράγουν  εμπορεύματα όπως είναι τα δικά σας</li>
							<li>το φόρο ΦΠΑ  του προϊόντος</li>
							<li>τους τελωνειακούς δασμούς, για το συγκεκριμένο προϊόν</li>
						</ul>
					</p>
				</div><!-- End of post-->

				<div class="post">
					<h1 align="center">Νομικοί, φορολογικοί και τελωνειακοί όροι</h1>

					<p>Σας παρέχουμε τις βασικές <a href="info.php"> πληροφορίες ,</a> σχετικά με την αγορά της Σερβίας.</p>

					<p><strong>για τους νομικούς όρους</strong>, σε περίπτωση που αποφασίσετε:</p>

					<ul>
						<li> να ιδρύσετε  εταιρεία ή υποκατάστημα,</li>
						<li>να κάνετε επενδύσεις,</li>
						<li>να αγοράσετε, πουλήσετε  ή μισθώσετε ακίνητα,</li>
						<li>να λάβετε άδεια παραμονής ή εργασίας.</li>
					</ul>

					<strong>για τους φορολογικούς όρους</strong>, σε περίπτωση έναρξης επαγγελματικής δραστηριότητας ή αγοράς ακινήτου όπως :

					<ul>
						<li>ο ΦΠΑ,</li>
						<li>ο φόρος επί των κερδών,</li>
						<li>ο φόρος εισοδήματος,</li>
						<li>οι εισφορές  για την ασφάλιση των εργαζομένων,</li>
						<li>ο φόρος  ακίνητης περιουσίας,</li>
						<li>η φορολογία, άμεση ή έμμεση.</li>
					</ul>

					<strong>για τους τελωνειακούς όρους</strong> όπως :
					<ul>
						<li>τους τελωνειακούς δασμούς, για το συγκεκριμένο προϊόν,</li>
						<li>το ποια προϊόντα απαλλάσσονται από τελωνειακούς δασμούς,</li>
						<li>το εάν  για  το συγκεκριμένο προϊόν, απαιτείται  χημική ανάλυση ή  πιστοποίηση και πιο είναι το ανάλογο κόστος,</li>
						<li>ποια έγγραφα χρειάζονται κατά την εισαγωγή / εξαγωγή του προϊόντος,</li>
						<li>τις πληροφορίες που ζητήσατε  οι οποίες αφορούν αποκλειστικά τις δραστηριότητες και τα προϊόντα σας.</li>
					</ul>
				</div><!-- End of post-->

				<div class="post">
					<h1 align="center">Παρουσίαση</h1>

                    <p>Προκειμένου να προσαρμοστεί η παρουσίαση της επιχείρησής σας στις ανάγκες και στην επαγγελματική  νοοτροπία της συγκεκριμένης αγοράς, να μειωθούν τα έξοδα και να εξοικονομηθεί πολύτιμος χρόνος κάνουμε δυνατή την παρουσίαση της εταιρείας και του προϊόντος σας:</p>

					<ul>
						<li>μέσω διαφήμισης, στη διαδικτυακή πύλη μας,</li>
						<li>σε συνεννόηση μαζί σας, ενημερώνοντας τους εκθέτες στις  κλαδικές εκθέσεις  του  Βελιγραδίου  και  Νόβι Σαντ, ώστε να έρχονται σε επαφή μαζί σας, </li>
						<li>με την δική μας επικοινωνία, με επαφές από την υπάρχουσα  βάση δεδομένων μας (Σερβία, Κύπρο, Ρωσική Ομοσπονδία, Βοσνία-Ερζεγοβίνη και το Μαυροβούνιο)τους προτρέπουμε  να έρθουν σε επαφή μαζί σας, ενώ  θα λαμβάνετε και  την  σχετική ενημέρωση .</li>
					</ul>

					<p>Χρησιμοποιώντας  τη  βάση δεδομένων μας και τις υπηρεσίες που σας προσφέρουμε έχετε άμεση επαφή  χωρίς μεσάζοντα με υποψήφιους  <strong> μελλοντικούς συνεργάτες</strong>.</p>

					<p>Τις  προτάσεις για το πώς θα θέλατε να  σας παρουσιάσουμε την εταιρεία και τα προϊόντα σας, <strong><a href="" data-toggle="modal" data-target="#myModa2">μπορείτε να στείλετε εδώ</a></strong>.</p>
				</div><!-- End of post-->

				<div class="post">
					<h1 align="center">Εκθεσιακές δραστηριότητες</h1>

					<p>Εκτός από την ενημέρωση για την ημερομηνία πραγματοποίησης των κλαδικών Έκθέσεων στο Βελιγράδι και το Νόβι Σαντ, σε συνεννόηση μαζί σας, η υπηρεσία την οποία σας προσφέρουμε βασίζεται στο εξής:</p>

						<ul>
						<li>να σας ενημερώνουμε για:</li>

						<ul>
							<li>την τιμή μίσθωσης εκθεσιακού χώρου με τα συνοδευτικά έξοδα,</li>
							<li>τα απαραίτητα έγγραφα και τη διαδικασία προσωρινής εισαγωγής εκθεμάτων ,</li>
							<li>τον αριθμό εκθετών,</li>
						</ul>
						</ul>

						<ul>
						<li>να σας προγραμματίσουμε  συναντήσεις με τους εκθέτες, στο χώρο της έκθεσης,</li>
						<li>να παρουσιάζουμε την εταιρεία και τα προϊόντα σας στους εκθέτες, στη έκθεση Βελιγραδίου και το Νόβι Σαντ,</li>
						<li>να σας διαβιβάζουμε αναφορά της πραγματοποιημένης παρουσίασης και τις επαφές τις οποίες πραγματοποιήσαμε.</li>
						</ul>

						<p>Τις  προτάσεις για το πώς θα θέλατε να  σας παρουσιάσουμε την εταιρεία και τα προϊόντα σας, <strong><a href="" data-toggle="modal" data-target="#myModa2">μπορείτε να στείλετε εδώ</a></strong>.</p>
					
				</div><!-- End of post-->

				<div class="post">
					<h1 align="center">Προετοιμασία συναντήσεων</h1>

					<p>Ανάλογα με τα ενδιαφέροντά σας που αφορούν εταιρείες από τη Σερβία μπορούμε αφού προηγηθεί συνεννόηση μαζί σας, χάρη στη δική μας βάση δεδομένων, και στις υπηρεσίες  που προσφέρουμε, να ετοιμάσουμε:</p>

					<ul>
						<li>Περισσότερες συναντήσεις, στο συντομότερο δυνατό χρονικό διάστημα,</li>
						<li>Συναντήσεις με τους εκθέτες στις κλαδικές εκθέσεις  του Βελιγραδίου  και  Νόβι  Σαντ, για τους οποίους ενδιαφέρεστε.</li>
						<li>Συναντήσεις με άλλους φορείς, όπως:</li>	
						– Εκτελωνιστές,<br/>
						– Διεθνείς μεταφορές,<br/>
						– Λογιστές και άλλους.
					</ul>

					<p>Τις  προτάσεις για το πώς θα θέλατε να  προετοιμάσουμε  συναντήσεις με  νομικά πρόσωπα για τα οποία ενδιαφέρεστε , <strong><a href="" data-toggle="modal" data-target="#myModa2">μπορείτε να στείλετε εδώ</a></strong>.</p>

					<div class="dugmici">
		                <a href="index.php"> <button type="button" class="btn btn btn-sm" style="border-radius: 20px 0px 0px 20px; color:white; background-color: #3BA4C7; background-image: -moz-linear-gradient(top, #3BA4C7 0%, #1982A5 100%);">Προηγούμενη
		                </button></a>
		                <span class="dugmici_razmak"></span>
		                <a href="info.php"> <button type="button" class="btn btn btn-sm" style="border-radius: 0px 20px 20px 0px; color:white; background-color: #3BA4C7; background-image: -moz-linear-gradient(top, #3BA4C7 0%, #1982A5 100%);">
                                Επόμενη
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

		</div><!-- End Container-->
		

		<!-- Footer-->
		
			<footer class="footer" style="margin-top: 300px;"> 
			<hr>
				<div class="container text-center">


                    <p>HellaSerb 2015. | <a href="declaration.php">Δήλωση</a> | <a href="terms_of_use.php">Όροι χρήσης</a> | <a href="privacy_policy.php">Προστασία Προσωπικών Δεδομένων</a></p>


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