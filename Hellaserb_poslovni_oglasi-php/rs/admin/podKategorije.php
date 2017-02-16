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
						case 'dodaj': // Dodaje novu kategoriju

						$id_kategorija=$_POST['kategorije'];
						$naziv_podKategorije_srb=$_POST['naziv_podKategorije_srb'];
						$naziv_podKategorije_gre=$_POST['naziv_podKategorije_gre'];


						if (!empty($naziv_podKategorije_srb) and !empty($naziv_podKategorije_gre))
						{
							$sql1="INSERT INTO podkategorije(id_kategorija, naziv_podKategorije_srb, naziv_podKategorije_gre) VALUES('{$id_kategorija}', '{$naziv_podKategorije_srb}', '{$naziv_podKategorije_gre}')";
							$result1=mysql_query($sql1, $konekcija);
							if($resul1){echo 'greska';}else{echo 'uspeh';}
						}

						header('Location: podKategorije.php');
						break;

						case 'obrisi': // Brise kategoriju
						
						$id = $_GET['id'];

						$sql2="DELETE FROM podkategorije WHERE id_podKategorija=$id";
						$result2=mysql_query($sql2, $konekcija);

						header('Location: podKategorije.php');
						break;

						default:
								die('Nepoznata akcija.');
							break;	
					}
				}
			?>

			<?php if ($prikazi_listu) {
				$sql="SELECT * FROM podkategorije p INNER JOIN kategorije k ON p.id_kategorija=k.id_kategorija";
				$result=mysql_query($sql, $konekcija);
			?>

				<h3>Dodaj novu podkategoriju</h3>
				<form id="contactform" action="podKategorije.php?akcija=dodaj" method="post">
					<select class="btn btn-default dropdown-toggle" style="text-align:left;" name="kategorije">
                			<option value="0">*Izaberite kategoriju...</option>
                			<?php
								include('konekcija.php');
								$sql="SELECT * FROM kategorije";
								$rezultat=mysql_query($sql, $konekcija);
								while($red=mysql_fetch_array($rezultat))
								{
									echo "<option value='".$red['id_kategorija']."'>".$red['naziv_kategorije_srb']." / ".$red['naziv_kategorije_gre']."</option>";
								}
								mysql_close($konekcija);
							?>
                		</select>
					<input style="margin-top:10px;" type="text" name="naziv_podKategorije_srb" placeholder="Naziv podkategorije srb..." />
					<input type="text" name="naziv_podKategorije_gre" placeholder="Naziv podkategorije gre..." />
					<input class="btn" type="submit" value="Dodaj" />
				</form>
				<hr>

				<h1>Podkategorije</h1>

				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Naziv podkategorije srb</th>
							<th>Naziv podkategorije gre</th>
							<th>Naziv kategorije srb</th>
							<th>Naziv kategorije gre</th>
							<th>Akcija</th>
						</tr>
					</thead>
					<tbody>
					<?php while ($row = mysql_fetch_assoc($result)) { ?>
						<tr>
							<td><?php echo $row['naziv_podKategorije_srb']; ?></td>
							<td><?php echo $row['naziv_podKategorije_gre']; ?></td>
							<td><?php echo $row['naziv_kategorije_srb']; ?></td>
							<td><?php echo $row['naziv_kategorije_gre']; ?></td>
							<td>
								<a href="podKategorije.php?akcija=obrisi&id=<?php echo $row['id_podKategorija']; ?>">Obriši</a>
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