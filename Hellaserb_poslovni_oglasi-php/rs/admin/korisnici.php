<?php
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
		margin-top: 5px;
		padding-bottom: 10px;
		padding-top:10px;
		border-bottom: 1px solid #ccc;
	}

	.col-sm-12 p{
		margin-top: 20px;
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
				$akcija = isset($_GET['akcija']) ? $_GET['akcija'] : false;
				$prikazi_formu = false;
				$prikazi_listu = true;
				$trenutna_ponuda = array();

				if ($akcija !== false)
				{
					switch ($akcija)
					{
						case 'izmeni': // Prikazuje formu za menjanje
						$prikazi_formu = true;
						$prikazi_listu = false;

						// Dohvati korisnika
						$id  = $_GET['id'];

						$rezultat=mysql_query("SELECT * FROM korisnici WHERE id_korisnik=$id");
						$trenutna_ponuda = mysql_fetch_assoc($rezultat);
						break;

						case 'azuriraj': // Azurira postojeceg korisnika

						$id = $_GET['id'];
						$zakljucan_otkljucan=$_POST['zakljucan_otkljucan'];
						$email=$_POST['emaill'];

						$sql=mysql_query("UPDATE korisnici SET zakljucan_otkljucan='{$zakljucan_otkljucan}' WHERE id_korisnik={$id} ");

						$headers = 'From:info@hellaserb.rs' . "\r\n";
						$subject="Promena Vašeg korisničkog statusa / Κατηγορία Χρηστών";
						if($zakljucan_otkljucan=='0'){
							$message="
Poštovani,

Period trajanja Vešeg plaćenog oglasa je isteklo. Samim tim od ovog momenta, Vaš korisnički status je Standard i onemogućeno Vam je pristupanje postavljenim informacijama na portal, slanje upita za informacije koje su Vam potrebne kao i korišćenje naših usluga.
Ukoliko želite da obnovite korisnički status Premium, potrebno je da, prilikom postavljanja oglasa, odaberete plaćeni oglas ili reklamu ( internet baner).
Za informacije o vrsti i ceni oglasnih i reklamnih paketa, kao i o uslugama koje Vam pružamo, možete nas kontaktirati na info@hellaserb.rs
Vaš oglas možete postaviti klikom na: 
http://hellaserb.com/rs/postavite_vas_oglas.php

Zahvaljujemo se što koristite naš portal.

-----------------------------------------

Αξιότιμη Κυρία / Κύριε,

Μετά τη λήξη της αγγελίας,  ο λογαριασμός σας Premium απενεργοποιείται. 

Από αυτή τη στιγμή, δεν έχετε τη δυνατότητα, να ζητάτε τις πληροφορίες τις οποίες  χρειάζεστε, σχετικά με τη αγορά της Σερβίας  και να χρησιμοποιείτε τις υπηρεσίες μας.

Για να ενεργοποιήσετε εκ νέου το λογαριασμό σας  Premium χρειάζεται, να επιλέξετε μισθωμένη  αγγελία ή διαφήμηση (baner).
Για πληροφορίες σχετικά με τις τιμές των μισθωμένων αγγελιών και των διαφημιστικών πακέτων καθώς και για τις υπηρεσίες που σας προσφέρουμε, επικοινωνήστε μαζί μας στο info@hellaserb.com
Την αγγελία σας μπορείτε να καταχωρήσετε εδώ: 
http://hellaserb.com/place_your_ad.php

Σας ευχαριστούμε που χρησιμοποιείτε την διαδικτυακή πύλη Hellaserb.
							";
						}else{
							$message="
Poštovani,

Vaš status korisnika je Premium. 
Od ovog momenta, možete pristupati informacijama postavljenim na portal, slati upite za informacije koje su Vam potrebne, vezano za grčko tržište, a odnose se na proizvode kao što su vaši i delatnost koju obavljate, kao i da koristite naše usluge.
Korisnički status  Premium, aktivirajte klikom  na: 
http://hellaserb.com/rs/korisnicki_nalog.php

Zahvaljujemo se što koristite naš portal.

-----------------------------------------

Αξιότιμη Κυρία / Κύριε,

Ο λογαριασμός σας είναι στην κατηγορία  Premium. 

Από αυτή τη στιγμή, έχετε τη δυνατότητα, να ζητάτε τις πληροφορίες τις οποίες  χρειάζεστε σχετικά με τη αγορά της Σερβίας,  που αφορούν αποκλειστικά τις δραστηριότητες σας  και να χρησιμοποιείτε τις υπηρεσίες μας.
Κάνετε σύνδεση στο:
http://hellaserb.com/user_account.php

Σας ευχαριστούμε που χρησιμοποιείτε την διαδικτυακή πύλη Hellaserb.
							";
						}
						mail($email, $subject, $message, $headers);

						header('Location: korisnici.php');
						break;

						default:
								die('Nepoznata akcija.');
							break;	
					}
				}
			?>

			<?php if ($prikazi_formu) { ?>
				<h3>Izmeni korisnika</h3>

				<form id="contactform" action="korisnici.php?akcija=azuriraj&id=<?php echo $id; ?>" method="post">
					<label>Email:</label><br/>
					<input type="text" name="emaill" value="<?php echo $trenutna_ponuda['email']; ?>" hidden />
					<input type="text" name="email" value="<?php echo $trenutna_ponuda['email']; ?>" disabled />
					<label>Uloga:</label><br/>
					<input type="text" name="uloga" value="<?php if($trenutna_ponuda['uloga']=='administrator'){echo 'Administrator';}else if($trenutna_ponuda['uloga']==0){echo 'Korisnik';} ?>" disabled />
					<label>Status:</label><br/>
					<input type="text" name="aktivan" value="<?php if($trenutna_ponuda['aktivan']==1){echo 'Aktivan';}else{echo 'Neaktivan';} ?>" disabled />
					<label>Zaključan/Otključan:</label><br/>
					<select name="zakljucan_otkljucan">
						<option value="<?php echo $trenutna_ponuda['zakljucan_otkljucan']; ?>"><?php if($trenutna_ponuda['zakljucan_otkljucan']==0){echo 'Zaključan';}else{echo 'Otključan';} ?></option>
						<option value="<?php if($trenutna_ponuda['zakljucan_otkljucan']==0){echo '1';}else{echo '0';} ?>"><?php if($trenutna_ponuda['zakljucan_otkljucan']==0){echo 'Otključan';}else{echo 'Zaključan';} ?></option>
					</select>
					<input class="btn btn-lg" type="submit" value="Izmeni" />
					<a href="korisnici.php">Odustani</a>
				</form>
			<?php } ?>

			<?php if ($prikazi_listu) {
				$result = mysql_query("SELECT * FROM korisnici");
			?>

				<h1>Korisnici</h1>

				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Email</th>
							<th>Uloga</th>
							<th>Status</th>
							<th>Zaključan/Otkljucan</th>
							<th>Akcija</th>
						</tr>
					</thead>
					<tbody>
					<?php while ($row = mysql_fetch_assoc($result)) { ?>
						<tr>
							<td><?php echo $row['email']; ?></td>
							<td><?php if($row['uloga']=='administrator'){echo 'Administrator';}else if($row['uloga']==0){echo 'Korisnik';} ?></td>
							<td><?php if($row['aktivan']==1){echo 'Aktivan';}else{echo 'Neaktivan';} ?></td>
							<td><?php if($row['zakljucan_otkljucan']==0){echo 'Zaključan';}else if($row['zakljucan_otkljucan']==1){echo 'Otključan';} ?></td>
							<td>
								<a href="korisnici.php?akcija=izmeni&id=<?php echo $row['id_korisnik']; ?>">Izmeni</a>
							</td>
						</tr>
					<?php } ?>	
					</tbody>
				</table>

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