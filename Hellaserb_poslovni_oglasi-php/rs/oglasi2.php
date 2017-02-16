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
	<!-- slider dodato-->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<!-- bxSlider Javascript file -->
	<script src="/js/jquery.bxslider.min.js"></script>
	<!-- bxSlider CSS file -->
	<link href="/lib/jquery.bxslider.css" rel="stylesheet" />
<!-- Gallery -->
  <!-- Add jQuery library -->
	<script type="text/javascript" src="lib/jquery-1.10.2.min.js"></script>

	<!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="lib/jquery.mousewheel.pack.js?v=3.1.3"></script>

	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="source/jquery.fancybox.pack.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="source/jquery.fancybox.css?v=2.1.5" media="screen" />
<!-- End Gallery -->

<script type="text/javascript">
		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			$('.fancybox').fancybox();

			/*
			 *  Different effects
			 */
		});
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

  	<script>
	  $(function () {
	    $('#myTab a:first').tab('show')
	  })
	</script>
</head>

<body data-spy="scroll" data-target="#my-navbar">
<style type="text/css">
  #gallery{
    display: inline-block;
    margin-top: 20px;
}

  #gallery img{
  display: block;
  margin: 0 auto;
}
</style>
<!-- jumbotron-->
	<?php
					include('konekcija.php');
					$id=$_REQUEST['id'];

					?>
	<div class="jumbotron">
		<div class="container">
			<div class="row">
				<div class="col-sm-11">
					<a href="index.php"><img src="images/logo.png" class="img-responsive"></a>	
				</div>
				<div class="col-sm-1" id="language_header">
					<a href="oglasi2.php?id=<?php echo $id; ?>"><img width="50" height="50" src="images/sr.png" class="img-responsive"></a>
					
					<a href="../ad2.php?id=<?php echo $id; ?>"><img width="50" height="50" src="images/el.png" class="img-responsive"></a>
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
						<a href="oglasi2.php?id=<?php echo $id; ?>"><img width="50" height="50" src="images/sr.png" class="img-responsive"></a>
					</li>
					<li>
						<a href="../ad2.php?id=<?php echo $id; ?>"><img width="50" height="50" src="images/el.png" class="img-responsive"></a>
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
		<div id="thumbnails">
			<?php
						include('konekcija.php');
						$id=$_REQUEST['id'];

						$sql="SELECT * FROM oglasi o 
						INNER JOIN oglasi_srb osrb ON o.id_oglas=osrb.id_oglas
						INNER JOIN deklaracija d ON o.id_oglas=d.id_oglas
						INNER JOIN slike s ON o.id_oglas=s.id_oglas
						INNER JOIN kategorije k ON o.id_kategorija=k.id_kategorija
						INNER JOIN podkategorije p ON o.id_podKategorija=p.id_podKategorija
						INNER JOIN drzave dr ON o.id_drzava=dr.id_drzava
						INNER JOIN gradovi g ON o.id_grad=g.id_grad
						INNER JOIN tip_oglasa t ON o.id_tip_oglasa=t.id_tip_oglasa WHERE o.id_oglas=$id";
						 $rezultat=mysql_query($sql, $konekcija);
            $e=0;
            while($red=mysql_fetch_array($rezultat)){
            $a=$red['putanja'];
            $images=array();
            $images=explode(';', $a);
            $max = sizeof($images);

						?>

						<h1><?php echo $red['naziv_firme_srb']; ?></h1>

						<?php
						for($i=0; $i<$max-1; $i++){
						$slike=$images[$i];
						if($e>2){echo '<br/>'; $e=0;} $e++;
						?>

						<div id="gallery">
      <div style="width:220px; height:170px; border:1px solid #3BA4C7;">

						<a class="fancybox" href="images/<?php echo $slike; ?>" data-fancybox-group="gallery" ><img src="images/<?php echo $slike; ?>" alt="" style="height:168px; width:auto; max-width:218px;" /></a>

						</div>
        </div>
						
						<?php } ?>

						</div>

						<span style="font-size:16px;"><a style="color:red;" href="oglasi3.php?id=<?php echo $red['id_kategorija'];?>"><?php echo $red['naziv_kategorije_srb']; ?></a></span><br/>
						<span><a style="color:red;" href="oglasi1.php?id=<?php echo $red['id_podKategorija'];?>"><?php echo $red['naziv_podKategorije_srb']; ?></a></span><br/>
						<span><?php echo $red['naziv_tipa_oglasa_srb']; ?></span><br/>

						<h3><strong>Detalji</strong></h3>
						<label style="font-size:16px;"><strong>Adresa:</strong></label> <span style="font-size:16px;"><?php echo $red['adresa_srb']; ?></span><br/>
						<label style="font-size:16px;"><strong>Ime i prezime:</strong></label> <span style="font-size:16px;"><?php echo $red['ime_prezime_srb']; ?></span><br/>
						<label style="font-size:16px;"><strong>Email:</strong></label> <span style="color:red; font-size:16px;"><a href="mailto:<?php echo $red['email_ogl']; ?>"><?php echo $red['email_ogl']; ?></a></span><br/>
						<label style="font-size:16px;"><strong>Website:</strong></label> <span style="font-size:16px;"><?php echo $red['websajt']; ?></span><br/>
						<label style="font-size:16px;"><strong>Telefon:</strong></label> <span style="font-size:16px;"><?php echo $red['telefon']; ?></span>
						
						<p>
						<ul class="nav nav-tabs" role="tablist" id="myTab">
							  	<li role="presentation" class="active"><a href="#text" aria-controls="text" role="tab" data-toggle="tab">Tekst</a></li>
							  	<li role="presentation"><a href="#map" aria-controls="map" role="tab" data-toggle="tab">Pogledaj mapu</a></li>
							  </ul>
						<div class="tab-content">
								<div role="tabpanel" class="tab-pane active" id="text"><?php echo $red['text_oglasa_srb']; ?></div>
								<div role="tabpanel" class="tab-pane" id="map"><?php echo $red['mapa'] ?></div>
							  </div>	
						</p>  
					<?php } mysql_close($konekcija); ?>
						
					

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

			</div><!-- End container-->
		

		<!-- Footer-->
		
			<footer class="footer"> 
			<hr>
				<div class="container text-center">
				

					<p>HellaSerb 2015. | <a href="deklaracija.php">Deklaracija</a> | <a href="uslovi_koriscenja.php">Uslovi korišćenja</a> | <a href="politika_privatnosti.php">Politika privatnosti</a></p>


				</div><!-- End container-->

				
			</footer>

			<!-- Back to top-->

			<a href="#" class="back-to-top" style="display: inline;">
				<i class="fa fa-arrow-circle-up"></i>
			</a>


<!-- <script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>	-->
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>	
</body>
</html>