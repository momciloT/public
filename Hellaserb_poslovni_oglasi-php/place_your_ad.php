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
	include('function/postavljanje_oglasa1.php');
?>

<!-- jumbotron-->
	
	<div class="jumbotron">
		<div class="container">
			<div class="row">
				<div class="col-sm-11">
					<a href="index.php"><img src="rs/images/logo.png" class="img-responsive"></a>	
				</div>
				<div class="col-sm-1" id="language_header">
					<a href="rs/postavite_vas_oglas.php"><img width="50" height="50" src="rs/images/sr.png" class="img-responsive"></a>
					
					<a href="place_your_ad.php"><img width="50" height="50" src="rs/images/el.png" class="img-responsive"></a>
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
						<a href="rs/postavite_vas_oglas.php"><img width="50" height="50" src="rs/images/sr.png" class="img-responsive"></a>
					</li>
					<li>
						<a href="place_your_ad.php"><img width="50" height="50" src="rs/images/el.png" class="img-responsive"></a>
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
            	<!-- Deo za oglas-->

                <h3><strong>Περιεχόμενο αγγελίας</strong></h3>

                <form id="contactform" method="post" action="" enctype="multipart/form-data" class="validateoglas">
                	<div class="col-lg-12 field">
                        <input type="text" id="tbNazivFirme"  name="tbNazivFirme" placeholder="* Επωνυμία της εταιρείας..." data-rule="maxlen:4" data-msg="Υποχρεωτικό πεδίο" />
						<div class="validation">
						</div>
                    </div>
                    <div class="col-lg-12 field">
                    	<textarea rows="4" id="tbTekst" name="tbTekst" class="input-block-level" placeholder="* Κείμενο αγγελίας... " data-rule="required" data-msg="Υποχρεωτικό πεδίο"></textarea>
						<div class="validation">
						</div>
                    </div>
                    <span>&nbsp;</span>

                <h3><strong>Κατηγορίες αγγελιών</strong></h3>  
                	<div class="col-lg-12 field">
                		<select class="btn btn-default dropdown-toggle" style="text-align:left;" id="kategorije" name="kategorije" onchange="vratiPodKategorije(this.value)" data-rule="required" data-msg="Υποχρεωτικό πεδίο">
                			<option value="0">*Επιλέξτε κατηγορία...</option>
                			<?php
								include('konekcija.php');
								$sql="SELECT * FROM kategorije";
								$rezultat=mysql_query($sql, $konekcija);
								while($red=mysql_fetch_array($rezultat))
								{
									echo "<option value='".$red['id_kategorija']."'>".$red['naziv_kategorije_gre']."</option>";
								}
								mysql_close($konekcija);
							?>
                		</select>
                		<div class="validation"></div>
                	</div>
                	<div class="col-lg-12 field" style="margin-top:10px;">
                	<select class="btn btn-default dropdown-toggle" style="text-align:left; width:266px;" id="podKategorije" name="podKategorije" data-rule="required" data-msg="Υποχρεωτικό πεδίο">
                			<option value="0">*Επιλέξτε  υποκατηγορία...</option>
                		</select>
                		<div class="validation"></div>
                	</div>
                	<div class="col-lg-12 field" style="margin-top:10px;">
                		<select class="btn btn-default dropdown-toggle" style="text-align:left; width:266px;" id="tip_oglasa" name="tip_oglasa" data-rule="required" data-msg="Υποχρεωτικό πεδίο">
                			<option value="0">*Επιλέξτε τύπο αγγελίας...</option>
                			<?php
								include('konekcija.php');
								$sql="SELECT * FROM tip_oglasa";
								$rezultat=mysql_query($sql, $konekcija);
								while($red=mysql_fetch_array($rezultat))
								{
									echo "<option value='".$red['id_tip_oglasa']."'>".$red['naziv_tipa_oglasa_gre']."</option>";
								}
								mysql_close($konekcija);
							?>
                		</select>
                		<div class="validation"></div>
                	</div>
                	<div class="col-lg-12 field">
			    	<h4>Μπορείτε να καταχωρήσετε έως 5 φωτογραφίες</h4>
			    		<div style="position:relative;">
        				<a class='btn btn-primary' href='javascript:;'>
            			Καταχώρηση φωτογραφιών...
            			<input type="file" style='cursor: pointer !important;position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;'
                               id="files" name="file[]" size="40" accept="image/*"/>
						</a>
       					<div id="selectedFiles" style="margin-top:10px;"></div>
						</div>
						<input type="text" id="slikeniz" name="slikeniz" hidden />
                	</div>
                	<span>&nbsp;</span>
                	<h3><strong>Στοιχεία Επικοινωνίας</strong></h3>
                	<div class="col-lg-12 field">
                		<input type="text" id="tbImePrezime"  name="tbImePrezime" placeholder="* Υπεύθυνος επικοινωνίας..." style="height:25px;" data-rule="maxlen:4" data-msg="Υποχρεωτικό πεδίο" />
						<div class="validation">
						</div>
                	</div>
                	<div class="col-lg-12 field">
                		<input type="text" id="tbMail"  name="tbMail" placeholder="Το e-mail σας... (προαιρετικό)" />
                	</div>
                	<div class="col-lg-12 field">
                		<input type="text" id="tbWebsite"  name="tbWebsite" placeholder="Η ιστοσελίδα... (προαιρετικό)" />
                	</div>
                	<div class="col-lg-12 field">
                        <input type="text" id="tbTelefon"  name="tbTelefon" placeholder="* Τηλέφωνο επικοινωνίας... (εισάγετε νούμερα χωρίς κενά)" />
						<div class="validation"></div>
                    </div>
                	<span>&nbsp;</span>

                	<h3><strong>Τοποθεσία</strong></h3>
                	<div class="col-lg-12 field">
                		<input type="text" id="tbAdresa"  name="tbAdresa" placeholder="* Εισάγετε Τόπος, Οδός και αριθμος..." data-rule="maxlen:4" data-msg="Υποχρεωτικό πεδίο" />
						<div class="validation"></div>
                	</div>
                	<div class="col-lg-12 field">
                	<select class="btn btn-default dropdown-toggle" style="text-align:left; width:167px;" id="drzava" name="drzava" onchange="vratiGradove(this.value)" data-rule="required" data-msg="Υποχρεωτικό πεδίο">
                			<option value="0">*Επιλέξτε χώρα...</option>
                			<?php
								include('konekcija.php');
								$sql="SELECT * FROM drzave order by naziv_drzave_gre";
								$rezultat=mysql_query($sql, $konekcija);
								while($red=mysql_fetch_array($rezultat))
								{
									echo "<option value='".$red['id_drzava']."'>".$red['naziv_drzave_gre']."</option>";
								}
								mysql_close($konekcija);
							?>
                		</select>
                		<div class="validation"></div>
                	</div>
                	<div class="col-lg-12 field" style="margin-top:10px;">
                	<select class="btn btn-default dropdown-toggle" style="text-align:left; width:167px;" id="grad" name="grad" data-rule="required" data-msg="Υποχρεωτικό πεδίο">
                		<option value="0">*Επιλέξτε πόλη...</option>
                	</select>
                	<div class="validation"></div>
                	</div>
                	<span>&nbsp;</span>

            <!-- End Deo za oglas-->


            <!-- Deo za deklaraciju-->

                	<p style="font-size:16px;">Σε περίπτωση που θέλετε να στείλετε συμπληρωμένη δήλωση με φαξ, μπορείτε να λάβετε την PDF εκδοχή της <a target="#" href="deklaracija_hellaserb.pdf"><strong>εδώ</strong></a>.</p>

                	<h3>
                	<strong>Δήλωση περί διαφήμισης (άρθρο 11. )</strong> του Νόμου περί διαφήμισης της Δημοκρατίας της Σερβίας.
                	<!-- Button trigger modal -->
                    	<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
						  Δήλωση περί διαφήμισης 
						</button>
					</h3>
                	
						<!-- Modal -->
						<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						        <h4 class="modal-title" id="myModalLabel">Δήλωση περί διαφήμισης</h4>
						      </div>
						      <div class="modal-body">
						        <p>Αλλοδαπά νομικά και φυσικά πρόσωπα έχουν τα ίδια δικαιώματα και υποχρεώσεις στη διαφήμιση όπως και τα εγχώρια πρόσωπα, ήτοι διαφημίζονται σύμφωνα με τον ισχύον Νόμο περί διαφήμισης της Δημοκρατίας της Σερβίας.</p>
						        <p>Το έγγραφο που περιέχει στοιχεία για το δημιουργό ή αγγελιοδότη του διαφημιστικού μηνύματος (πελάτης) αποτελεί τη δήλωση περί διαφήμισης, και είναι υποχρεωτική για όλα τα νομικά πρόσωπα – εταιρείες ή επιχειρήσεις σύµφωνα με το Νόμο περί διαφημίσεων (άρθρο 11.) Ο αγγελιοδότης είναι  ο δημιουργός του διαφημιστικού μηνύματος.</p>
						        <p>Ο αγγελιοδότης ευθύνεται να διαβιβάσει τη δήλωση με τα ακριβή στοιχεία στον εκδότη  που δημοσιεύει και μεταδίδει διαφημιστικά μηνύματα, Με το παρόν έγγραφο εγγυάστε για την ακρίβεια των εισαγμένων στοιχείων και το περιεχόμενο της αγγελίας. Ο αγγελιοδότης   κατά την εγγραφή του  εισαγάγει τα στοιχεία τα οποία θα αποτελούν τη δήλωση περί διαφήμισης.</p>
						        <p><strong>Αυτά τα στοιχεία αποτελούν προσωπικά δεδομένα οπότε καλύπτονται από δέσμευση μη δημοσιοποίησης και προστατεύονται από τις διατάξεις περί Προστασίας Προσωπικών Δεδομένων.</strong></p>
						        <p><strong>Η δήλωση χρειάζεται να συμπληρωθεί σύμφωνα με το άρθρο 11 του Νόμου περί διαφήμισης της Δημοκρατίας της Σερβίας, ώστε να διαφημίζονται μόνο νόμιμα καταχωρημένες εταιρείες και επιχειρήσεις.</strong></p>
						        <p>Τα εισαγμένα στοιχεία ισχύουν 12 μήνες από την ημέρα εισαγωγής, ή μέχρι την αλλαγή στοιχείων περί του διαφημιζόμενου.</p>
						        <p>Εφόσον γίνουν αλλαγές στοιχείων, ο διαφημιζόμενος υποχρεούται να στείλει νέα δήλωση με τις αντίστοιχες αλλαγές. Σε περίπτωση μη διαβίβασης της δήλωσης, οι αγγελίες δεν θα δημοσιευτούν. Θα δημοσιεύσουμε τις μη δημοσιευμένες αγγελίες κατόπιν παραλαβής της δήλωσης.</p>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal">Έξοδος</button>
						      </div>
						    </div>
						  </div>
						</div><!-- End Modal-->
                	<p style="font-size:16px;"><strong>Η Δήλωση χρειάζεται να συμπληρωθεί, ώστε να διαφημίζονται μόνο νόμιμα καταχωρημένες εταιρείες και επιχειρήσεις.</strong></strong>.</p>
                	<p style="font-size:16px;"><strong>Όλα τα παρακάτω  στοιχεία αποτελούν προσωπικά δεδομένα ενώ καλύπτονται από δέσμευση μη δημοσιοποίησης και προστατεύονται από τις διατάξεις περί Προστασίας Προσωπικών Δεδομένων.</strong></p>
                	<p style="font-size:16px;">Worth Biomin d.o.o Koste Novakovića br.15   11127 Beograd, Srbija</p>
                	<p style="font-size:16px;">Επωνυμία και την   έδρα  του νομικού προσώπου, που δημοσιεύει ή μεταδίδει την αγγελία / διαφήμιση:</p>
                	<hr>

                	<h3><strong>I Στοιχεία  δημιουργού αγγελίας</strong></h3>
                	<p style="font-size:16px;">Ο αγγελιοδότης είναι επίσης  δημιουργός της αγγελίας του.</p>
					<hr>

                	<h3><strong>II Στοιχεία αγγελιοδότη</span></strong></h3>
                	<div class="col-lg-12 field">
                		<h5 style="font-size:16px;">Επωνυμία της εταιρείας</h5>
                        <input type="text" id="tbNazivFirmeDek"  name="tbNazivFirmeDek" placeholder="* Επωνυμία της εταιρείας..." data-rule="maxlen:4" data-msg="Υποχρεωτικό πεδίο" />
						<div class="validation"></div>
                    </div>
                    <div class="col-lg-12 field">
                    	<h5 style="font-size:16px;">Διεύθυνση</h5>
                        <input type="text" id="tbAdresaDek"  name="tbAdresaDek" placeholder="* Πόλη, οδός και αριθμός..." data-rule="maxlen:4" data-msg="Υποχρεωτικό πεδίο" />
						<div class="validation"></div>
                    </div>
                    <div class="col-lg-12 field">
                    	<h5 style="font-size:16px;">Αριθμός καταχώρησης   επιχειρησής ( Γ.Ε.ΜΗ. , Μ.Α.Ε.)</h5>
                        <input type="text" id="tbBrReg"  name="tbBrReg" placeholder="* (δεν δημοσιεύεται)..." data-rule="maxlen:4" data-msg="Υποχρεωτικό πεδίο" />
						<div class="validation"></div>
                    </div>
                    <div class="col-lg-12 field">
                    	<h5 style="font-size:16px;">Σύντομη περιγραφή της Κύριας Δραστηριότητας</h5>
                        <input type="text" id="tbOpis"  name="tbOpis" placeholder="* (δεν δημοσιεύεται)..." data-rule="required" data-msg="Υποχρεωτικό πεδίο"/>
						<div class="validation"></div>
                    </div>
                    <div class="col-lg-12 field">
                    	<h5 style="font-size:16px;">Κωδικό Αριθμό Δραστηριότητας (ΚΑΔ)</h5>
                        <input type="text" id="tbMaticniBr"  name="tbMaticniBr" placeholder="* (δεν δημοσιεύεται)..." />
						<div class="validation"></div>
                    </div>
                    <div class="col-lg-12 field">
                    	<h5 style="font-size:16px;">ΑΦΜ (O.E. ; E.E. ; E.Π.E  ; A.E.)</h5>
                        <input type="text" id="tbPib"  name="tbPib" placeholder="* (δεν δημοσιεύεται)..." />
						<div class="validation"></div>
                    </div>
                    <div class="col-lg-12 field">
                    	<h5 style="font-size:16px;">Νόμιμος Εκπρόσωπος (Διαχειριστής)</h5>
                        <input onkeyup="funk();" type="text" id="tbImePrezimeOdgLica"  name="tbImePrezimeOdgLica" placeholder="* (δεν δημοσιεύεται)..." data-rule="required" data-msg="Υποχρεωτικό πεδίο" />
                    	<div class="validation"></div>
                    </div>
                    <div class="col-lg-12 field">
                    	<h5 style="font-size:16px;">Διεύθυνση Νομικού Εκπροσώπου (του Διαχειριστή)</h5>
                        <input type="text" id="tbAdresaStOdgLica"  name="tbAdresaStOdgLica" placeholder="* (δεν δημοσιεύεται)..." data-rule="maxlen:4" data-msg="Υποχρεωτικό πεδίο" />
						<div class="validation"></div>
                    </div>
                    <div class="col-lg-12 field">
                    	<h5 style="font-size:16px;">ΑΦΜ</h5>
                        <input type="text" id="tbJmbg"  name="tbJmbg" placeholder="* (δεν δημοσιεύεται)..." />
						<div class="validation"></div>
                    </div>
                    <div class="col-lg-12 field">
                    	<h5 style="font-size:16px;">Αριθμός ΔΤ και τόπος έκδοσης</h5>
                        <input type="text" id="tbBrLicneKarte"  name="tbBrLicneKarte" placeholder="* (δεν δημοσιεύεται)..." data-rule="required" data-msg="Υποχρεωτικό πεδίο" />
						<div class="validation"></div>
                    </div>
                    <div class="col-lg-12 field">
                    	<h5 style="font-size:16px;">Τηλέφωνο επικοινωνίας</h5>
                        <input type="text" id="tbKontakt"  name="tbKontakt" placeholder="* (εισάγετε νούμερα χωρίς κενά) (δεν δημοσιεύεται)..." />
						<div class="validation"></div>
                    </div>
                    <span>&nbsp;</span>
                    
                    <h3><strong>III Στοιχεία αγγελίας</strong></h3>
                    <div class="col-lg-12 field">
                    	<input type="checkbox" id="chbIzvorniText" name="chbIzvorniText" /><span style="margin-left:10px; font-size:16px;">Ως γνήσιο κείμενο της αγγελίας θα δεχτούμε το κείμενο και δεδομένα που έχουν καταχωρηθεί στην κατάλληλη μορφή στην ιστοσελίδα.</span><span style="color:red;">*</span>
					<div class="validation"></div>
                    </div>
                    <span>&nbsp;</span>
                    <div class="col-lg-12 field">
                    	<span style="font-size:16px;">Η διάρκεια της δήλωσης:</span><span style="color:red;">*</span>
						<input type="radio" id="sss"  name="radioTrajanje" value="6 μήνες" style="margin-left:10px;"/><span style="margin-left:10px; font-size:16px;">6 μήνες</span>
						<input type="radio"  name="radioTrajanje" value="12 μήνες" style="margin-left:10px;"/><span style="margin-left:10px; font-size:16px;">12 μήνες</span>
						<div class="validation"></div>
                    </div>
                    <div class="col-lg-12 field" style="margin-top:10px;">
                    	<p  id="ncog"><span style="font-size:16px;">Τρόπος της διαφήμισης:</span><span style="color:red;">*</span></p>
                    	<?php
							include('konekcija.php');
							$sql="SELECT * FROM nacin_oglasavanja";
							$rezultat=mysql_query($sql, $konekcija);
							while($red=mysql_fetch_array($rezultat))
							{
								if($red['id_nacin_oglasavanja'] == 1){
								echo "<input type='radio' name='radioNacinOgl' value='".$red['id_nacin_oglasavanja']."'><strong><span style='margin-left:10px; font-size:16px;'>".$red['nacin_oglasavanja_gre']."</span></strong><br/>";
							}else
							{
								echo "<input type='radio' name='radioNacinOgl' value='".$red['id_nacin_oglasavanja']."'><span style='margin-left:10px; font-size:16px;'>".$red['nacin_oglasavanja_gre']."</span><br/>";
							}
							}
							mysql_close($konekcija);
						?>
						<div class="validation"></div>
                    </div>
                    <div class="col-lg-12 field" style="margin-top:20px;">
                    	<input type="checkbox" id="chbUsloviKor" name="chbUsloviKor" /><span style="margin-left:10px; font-size:16px;"><a target="#" href="terms_of_use.php">Αποδέχομαι τους όρους χρήσης</a> </span><span style="color:red;">*</span>
						<div class="validation"></div>
                    </div>
                    <div class="col-lg-12 field" style="margin-top:10px;">
                    	<input type="checkbox" id="chbGarancija" name="chbGarancija"><span style="margin-left:10px; font-size:16px;">Εγγυώμαι  για την ακρίβεια των εισαγμένων στοιχείων και το περιεχόμενο της αγγελίας.</span><span style="color:red;">*</span><!-- Kada se klikne na ovaj teks izlazi prozor sa upozorenjem-->
                    	<!-- Button trigger modal -->
                    	<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModa2">
						  Ενημέρωση
						</button>
						<div class="validation"></div>
						<!-- Modal -->
						<div class="modal fade" id="myModa2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						        <h4 class="modal-title" id="myModalLabel">Ποινικός Κώδικας της Δημοκρατίας της Σερβίας – Απάτη με υπολογιστή (άρθρο. 301)</h4>
						      </div>
						      <div class="modal-body">
						        Άτομο το οποίο εισάγει ανακριβές στοιχείο, παραλείπει  την εισαγωγή ακριβούς στοιχείου ή με άλλο τρόπο κρύβει ή παρουσιάζει αναληθή στοιχεία επηρεάζοντας το αποτέλεσμα ηλεκτρονικής επεξεργασίας στοιχείων και μεταφοράς στοιχείων με σκοπό να προσκομίσει  για τον ίδιο ή για άλλους παράνομο περιουσιακό όφελος προκαλώντας περιουσιακή ζημιά, θα τιμωρείται με χρηματική ποινή ή φυλάκιση έως 3 χρόνια.
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal">Έξοδος</button>
						      </div>
						    </div>
						  </div>
						</div><!-- End Modal-->
                    </div>
                    <div class="col-lg-12 field" style="margin-top:10px;">
                    <p style="float:left;"><span style="font-size:16px;">Ο - Η Δηλ:&nbsp;</span></p><div id='izjava'></div><!-- Ovde ide sadrzaj polja "ime i prezime odgovornog lica"-->
                    </div>

                    <!-- End Deo za deklaraciju-->

                    <!--Deo za registraciju-->

                    <div id="logoglas" class="col-lg-12 field" style="margin-top:10px;">
						<?php if(isset($_SESSION['email'])){echo'<p><span style="font-size:16px;"><strong>Έχετε συνδεθεί ως: '.$_SESSION['nik'].'</strong></span></p><button style="border:2px solid white;" class="btn btn-theme " type="button" name="postavi_standard" id="postavi">Καταχωρήστε</button>';}else{ ?>


						<ul class="nav nav-tabs"> <li class="active"><a data-toggle="tab" href="#sectionA">Χρήστης</a></li> <li><a data-toggle="tab" style="background-color:#0066CC; color:#ffffff;" href="#sectionB">Νέος χρήστης</a></li> </ul>
					<div  class="tab-content">
						<div id="sectionA" class="tab-pane fade in active">
							<input type="text" style="margin-top:10px;" id="tbMail_stari_korisnik" name="tbMail_stari_korisnik" placeholder="Το e-mail σας...">
							<input type="password"  id="tbLozinka" name="tbLozinka" placeholder="Κωδικός πρόσβασης...">
							<button style="border:2px solid white;" class="btn btn-theme " type="button" id="posalji" name="uloguj_me">Σύνδεση</button><br/><br/> </div>

						<div id="sectionB" class="tab-pane fade">
							<input type="text" style="margin-top:10px;" id="tbMail_novi_korisnik" name="tbMail_novi_korisnik" placeholder="Το e-mail σας...">
							<input type="password" id="tbLozinka_novi" name="tbLozinka_novi" placeholder="Κωδικός πρόσβασης...">
							<button style="border:2px solid white;" class="btn btn-theme " type="button" id="posalji2" name="registruj_me">Εγγραφή</button><br/><br/>
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

        	</div>

		
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