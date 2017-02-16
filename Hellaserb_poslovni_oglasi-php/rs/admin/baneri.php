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
				$prikazi_listu = true;

				if ($akcija !== false)
				{
					switch ($akcija)
					{
						case 'dodaj': // Dodaje novi baner

						$naziv_oglasa=$_POST['naziv_oglasa'];
						$korisnik=$_POST['korisnik'];
						$link=$_POST['link'];
						$putanja = basename($_FILES['putanja']['name']);
			
						$direktorijum = '../images/';
						$puna_putanja = $direktorijum . $putanja;
						move_uploaded_file($_FILES['putanja']['tmp_name'], $puna_putanja);

						if (!empty($naziv_oglasa))
						{
							mysql_query("INSERT INTO baneri(naziv_oglasa, korisnik, link, putanja, aktivnost) VALUES ('{$naziv_oglasa}', '{$korisnik}', '{$link}', '{$putanja}', '0') ");
						}

						header('Location: baneri.php');
						break;

						case 'obrisi': // Brise baner
						
						$id = $_GET['id'];

						mysql_query("DELETE FROM baneri WHERE id_baner=$id");

						header('Location: baneri.php');
						break;

						case 'izmeni': // Prikazuje formu za menjanje
						$prikazi_formu = true;
						$prikazi_listu = false;

						// Dohvati korisnika
						$id  = $_GET['id'];

						$rezultat=mysql_query("SELECT * FROM baneri WHERE id_baner=$id");
						$trenutna_ponuda = mysql_fetch_assoc($rezultat);
						break;

						case 'azuriraj': // Azurira postojeceg korisnika

						$id = $_GET['id'];
						$aktivan_neaktivan=$_POST['aktivnost'];

						$sql=mysql_query("UPDATE baneri SET aktivnost='{$aktivan_neaktivan}' WHERE id_baner={$id} ");

						header('Location: baneri.php');
						break;

						default:
								die('Nepoznata akcija.');
							break;	
					}
				}
			?>

			<?php if (@$prikazi_formu) { ?>
				<h3>Izmeni korisnika</h3>

				<form id="contactform" action="baneri.php?akcija=azuriraj&id=<?php echo $id; ?>" method="post">
					<label>Naziv oglasa:</label><br/>
					<input type="text" value="<?php echo $trenutna_ponuda['naziv_oglasa']; ?>" disabled />
					<label>Korisnik:</label><br/>
					<input type="text" value="<?php echo $trenutna_ponuda['korisnik']; ?>" disabled />
					<label>Link:</label><br/>
					<input type="text" value="<?php echo $trenutna_ponuda['link']; ?>" disabled />
					<label>Status:</label><br/>
					<select name="aktivnost">
						<option value="<?php echo $trenutna_ponuda['aktivnost']; ?>"><?php if($trenutna_ponuda['aktivnost']==0){echo 'Neaktivan';}else{echo 'Aktivan';} ?></option>
						<option value="<?php if($trenutna_ponuda['aktivnost']==0){echo '1';}else{echo '0';} ?>"><?php if($trenutna_ponuda['aktivnost']==0){echo 'Aktivan';}else{echo 'Neaktivan';} ?></option>
					</select>
					<input class="btn btn-lg" type="submit" value="Izmeni" />
					<a href="baneri.php">Odustani</a>
				</form>
			<?php } ?>

			<?php if ($prikazi_listu) {
				$result = mysql_query("SELECT * FROM baneri order by naziv_oglasa");
			?>

				<h3>Dodaj novi baner</h3>
				<form id="contactform" action="baneri.php?akcija=dodaj" method="post" enctype="multipart/form-data">
					<input type="text" name="naziv_oglasa" placeholder="Naziv oglasa..." />
					<input type="text" name="korisnik" placeholder="Korisnik..." />
					<input type="text" name="link" placeholder="Link..." />
					<input type="file" name="putanja" />
					<input style="margin-top:10px;" class="btn" type="submit" value="Dodaj" />
				</form>
				<hr>

				<h1>Baneri</h1>

				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Naziv oglasa</th>
							<th>Korisnik</th>
							<th>Link</th>
							<th>Status</th>
							<th>Baner</th>
							<th>Akcija</th>
						</tr>
					</thead>
					<tbody>
					<?php while ($row = mysql_fetch_assoc($result)) { ?>
						<tr>
							<td><?php echo $row['naziv_oglasa']; ?></td>
							<td><?php echo $row['korisnik']; ?></td>
							<td><?php echo $row['link']; ?></td>
							<td><?php if($row['aktivnost'] == 0){echo 'Neaktivan';}else{echo 'Aktivan';} ?></td>
							<td><img style="width:20px; height=100px;" src="../images/<?php echo $row['putanja']; ?>" /></td>
							<td>
								<a href="baneri.php?akcija=obrisi&id=<?php echo $row['id_baner']; ?>">Obrisi</a><br/>
								<a href="baneri.php?akcija=izmeni&id=<?php echo $row['id_baner']; ?>">Izmeni</a>
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