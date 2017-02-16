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

			<h1>Dobrodošli administrator.</h1>

			<h3>Pristup ovom delu sajta ima samo ovlašćeno lice.</h3>
		
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