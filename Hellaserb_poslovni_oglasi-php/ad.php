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
	<script  type="text/javascript" src="ajaxobj.js"></script>
	<script  type="text/javascript" src="gradovi.js"></script>
	<script  type="text/javascript" src="podKategorije.js"></script>
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

<!-- jumbotron-->
	
	<div class="jumbotron">
		<div class="container">
			<div class="row">
				<div class="col-sm-11">
					<a href="index.php"><img src="rs/images/logo.png" class="img-responsive"></a>	
				</div>
				<div class="col-sm-1" id="language_header">
					<a href="rs/oglasi.php"><img width="50" height="50" src="rs/images/sr.png" class="img-responsive"></a>
					
					<a href="ad.php"><img width="50" height="50" src="rs/images/el.png" class="img-responsive"></a>
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
						<a href="rs/oglasi.php"><img width="50" height="50" src="rs/images/sr.png" class="img-responsive"></a>
					</li>
					<li>
						<a href="ad.php"><img width="50" height="50" src="rs/images/el.png" class="img-responsive"></a>
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

		<!-- Pretraga-->

		<div class="row">
		<h3 style="padding-top:20px;">Αναζήτηση</h3>
		<hr/>
		<form action="ad.php" method="post">
		<div class="col-sm-4">
			<div class="col-sm-12" >
			<label>Κατηγορία:</label><br/>
				<select class="btn btn-default dropdown-toggle" style="text-align:left; width:222px;" id="kategorije" name="kategorije" onchange="vratiPodKategorije(this.value)" data-rule="required" data-msg="Molimo Vas izaberite kategoriju">
                			<option value="%">Όλα...</option>
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
			</div>
			<div class="col-sm-12 field" style="margin-top:10px;">
			<label>Υποκατηγορία:</label><br/>
                	<select class="btn btn-default dropdown-toggle" style="text-align:left; width:222px;" id="podKategorije" name="podKategorije" data-rule="required" data-msg="Molimo Vas izaberite podkategoriju">
                		<option value="%">Όλα...</option>
                	</select>
            </div>
        </div>

        <div class="col-sm-3">
        	<div class="col-sm-12 field">
        	<label>Χώρα:</label><br/>
                	<select class="btn btn-default dropdown-toggle" style="text-align:left; width:167px;" id="drzava" name="drzava" onchange="vratiGradove(this.value)" data-rule="required" data-msg="Molimo Vas izaberite državu">
                			<option value="%">Όλα...</option>
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
              </div>
              <div class="col-sm-12 field" style="margin-top:10px;">
              <label>Πόλη:</label><br/>
                	<select class="btn btn-default dropdown-toggle" style="text-align:left; width:167px;" id="grad" name="grad" data-rule="required" data-msg="Molimo Vas izaberite grad">
                		<option value="%">Όλα...</option>
                	</select>
                </div>
        </div>
        <div class="col-sm-5">
        	<div class="col-lg-12 field">
        	<label>Τύπος Αγγελίας:</label><br/>
                		<select class="btn btn-default dropdown-toggle" style="text-align:left; width:222px;" id="tip_oglasa" name="tip_oglasa" data-rule="required" data-msg="Molimo Vas izaberite tip oglasa">
                			<option value="%">Όλα...</option>
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
                </div>
                <div class="col-sm-12" style="padding-top:35px">
                	<button  class="btn btn-theme " style="border:2px solid white; color:white; background-color:#3333CC" type="submit" id="pretraga" name="pretraga">Αναζήτηση</button>
                </div>
        </div>
        </form>

		</div><!-- End Row-->


		<!-- Pretraga po kljucnoj reci-->
		<div class="row">
			<form method="post" action="ad.php" id="contactform">
				<div class="col-sm-6" style="padding-top:35px; padding-left:30px;">
					<input type="text" id="kljucna_rec"  name="kljucna_rec" placeholder="Εισάγετε Λέξη - κλειδί..." />
				</div>	
				<div class="col-sm-4" style="padding-top:38px;">
				<button  class="btn btn-theme " style="border:2px solid white; color:white; background-color:#3333CC" type="submit" id="pretraga" name="pretraga2">Αναζήτηση</button>
				</div>
			</form>
		</div><!-- End row-->
		<!-- End Pretraga po kljucnoj reci-->

		<!-- Oglasi iz pretrage po kljucnoj reci-->

			<?php
				include('konekcija.php');

				if(isset($_REQUEST['pretraga2']))
				{

					$kljucna_rec = $_POST['kljucna_rec'];

					if($kljucna_rec == ''){
						echo '<div style="padding:20px;"><strong style="color:red;">Παρακαλώ εισάγετε  λέξη-κλειδί.</strong></div>';
					}else{

				$query2 = "SELECT * FROM oglasi o
				INNER JOIN oglasi_gre ogre ON o.id_oglas=ogre.id_oglas
				INNER JOIN slike s ON o.id_oglas=s.id_oglas
				INNER JOIN gradovi g ON o.id_grad=g.id_grad
				INNER JOIN drzave d ON o.id_drzava=d.id_drzava
				INNER JOIN kategorije k ON o.id_kategorija=k.id_kategorija
				INNER JOIN podkategorije p ON o.id_podKategorija=p.id_podKategorija
				INNER JOIN tip_oglasa t ON o.id_tip_oglasa=t.id_tip_oglasa
				WHERE (ogre.naziv_firme_gre like '%".$kljucna_rec."%'
				or ogre.text_oglasa_gre like '%".$kljucna_rec."%'
				or t.naziv_tipa_oglasa_gre like '%".$kljucna_rec."%') and o.status = 1 ";

				$result2=mysql_query($query2, $konekcija);
		
				if(mysql_num_rows($result2) > 0){
					while($row2=mysql_fetch_array($result2)){

					echo '<div class="col-sm-12 oglas_oglasi1" style="margin-top: 20px; padding-bottom:10px; padding-top:10px; border-bottom: 1px solid #ccc;`">';		

						$a=$row2['putanja'];
						$images=array();
						$images=explode(';', $a);

						$date = date_create($row2['datum']);

						echo '<div style="float:left;">';
						if($row2['putanja']==''){
							echo '<div style="border:1px solid #3BA4C7; width:199px; height:150px;"><a href="ad2.php?id='.$row2['id_oglas'].'"><img style="margin:0 auto; height:148px; width:auto; max-width:200px;" src="images/no_images.jpg" class="img-responsive img" /></a></div>';
							}else{
						echo '<div style="border:1px solid #3BA4C7; width:199px; height:150px;"><a href="ad2.php?id='.$row2['id_oglas'].'"><img style="margin:0 auto; height:148px; width:auto; max-width:200px;" src="rs/images/'.$images[0].'" class="img-responsive img" /></a></div>';
						}
						
						echo ' | '.$row2['naziv_grada_gre'].' | ';
						echo date_format($date, 'd. M Y');
						echo '</div>';
						echo '<span style="margin-left:10px; font-size:22px;"><a href="ad2.php?id='.$row2['id_oglas'].'">'.$row2['naziv_firme_gre'].'</a></span>';
						echo '<p style="padding-left:210px; margin-top: 20px; font-size:13px;">'.substr(($row2['text_oglasa_gre']), 0, 350).'...</p>';

						echo '</div>';
					}
				}else
				{
					echo '<div style="padding:20px;"><strong style="color:red;">Αυτή τη στιγμή δεν έχουμε αποτελέσματα με τα συγκεκριμένα κριτήρια.</strong></div>';					
				}
				
				
				}

			}
				
			?>

		<!-- End Oglasi iz pretrage po kljucnoj reci-->

		<!-- Oglasi iz pretrage-->
		<div class="row" style="padding:20px;">
		<?php

		include('konekcija.php');

			if(isset($_REQUEST['pretraga']))
			{
				$kategorije=$_POST['kategorije'];
				$podKategorije=$_POST['podKategorije'];
				$drzava=$_POST['drzava'];
				$grad=$_POST['grad'];
				$tip_oglasa=$_POST['tip_oglasa'];

				$query="SELECT * FROM oglasi o
				INNER JOIN oglasi_gre ogre ON o.id_oglas=ogre.id_oglas
				INNER JOIN slike s ON o.id_oglas=s.id_oglas
				INNER JOIN gradovi g ON o.id_grad=g.id_grad
				INNER JOIN drzave d ON o.id_drzava=d.id_drzava
				INNER JOIN kategorije k ON o.id_kategorija=k.id_kategorija
				INNER JOIN podkategorije p ON o.id_podKategorija=p.id_podKategorija
				INNER JOIN tip_oglasa t ON o.id_tip_oglasa=t.id_tip_oglasa
				WHERE o.id_kategorija LIKE'".$kategorije."' AND o.id_podKategorija LIKE'".$podKategorije."' AND o.id_grad LIKE'".$grad."' AND o.id_drzava LIKE'".$drzava."' AND o.id_tip_oglasa LIKE'".$tip_oglasa."' AND o.status=1";
					$result=mysql_query($query, $konekcija);
					if(mysql_num_rows($result) > 0){
					while($row=mysql_fetch_array($result)){

					echo '<div class="col-sm-12 oglas_oglasi1" style="margin-top: 20px; padding-bottom:10px; padding-top:10px; border-bottom: 1px solid #ccc;`">';		

						$a=$row['putanja'];
						$images=array();
						$images=explode(';', $a);

						$date = date_create($row['datum']);

						echo '<div style="float:left;">';
						if($row['putanja']==''){
							echo '<div style="border:1px solid #3BA4C7; width:199px; height:150px;"><a href="ad2.php?id='.$row['id_oglas'].'"><img style="margin:0 auto; height:148px; width:auto; max-width:200px;" src="rs/images/no_images.jpg" class="img-responsive img" /></a></div>';
							}else{
						echo '<div style="border:1px solid #3BA4C7; width:199px; height:150px;"><a href="ad2.php?id='.$row['id_oglas'].'"><img style="margin:0 auto; height:148px; width:auto; max-width:200px;" src="rs/images/'.$images[0].'" class="img-responsive img" /></a></div>';
						}
						
						echo ' | '.$row['naziv_grada_gre'].' | ';
						echo date_format($date, 'd. M Y');
						echo '</div>';
						echo '<span style="margin-left:10px; font-size:22px;"><a href="ad2.php?id='.$row['id_oglas'].'">'.$row['naziv_firme_gre'].'</a></span>';
						echo '<p style="padding-left:210px; margin-top: 20px; font-size:13px;">'.substr(($row['text_oglasa_gre']), 0, 350).'...</p>';

						echo '</div>';
					}
				}
				else
				{
					echo '<div style="padding:20px;"><strong style="color:red;">Αυτή τη στιγμή δεν έχουμε αποτελέσματα με τα συγκεκριμένα κριτήρια.</strong></div>';
				}
			}
		?>
		</div>
		<!-- End Oglasi iz pretrage-->

		<!-- End Pretraga-->

		<!-- Oglasi-->

			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true" style="margin-top:50px;">
			  
			          
			       <?php
			          	include('konekcija.php');

			          	$sql="SELECT * FROM kategorije";
			          	$rezultat=mysql_query($sql, $konekcija);
			          	while($red=mysql_fetch_array($rezultat)){
			          		echo '<div class="panel panel-default" style="margin-top:13px;">
			    			<div class="panel-heading" role="tab" id="'.$red['naziv_kategorije_gre'].'">
			      			<h4 class="panel-title">
			        		<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#'.$red['id_kategorija'].'" aria-expanded="false" aria-controls="'.$red['id_kategorija'].'">';
			        		
			        		$broj=0;
			        	$oglasi="SELECT * FROM oglasi WHERE id_kategorija='".$red['id_kategorija']."' AND status=1";
			        	$rez_oglasi=mysql_query($oglasi, $konekcija);
			        	while($ogl=mysql_fetch_array($rez_oglasi)){
			        		$broj++;
			        	}

			        		echo $red['naziv_kategorije_gre'].' ('.$broj.')';
			        		
			        		echo ' </a>
			      				   </h4>
								    </div>
								    <div id="'.$red['id_kategorija'].'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="'.$red['naziv_kategorije_gre'].'">
								      <div class="panel-body"><ul class="oglasi_kategorije">';
								        
								      $sql2="SELECT * FROM podkategorije WHERE id_kategorija=".$red['id_kategorija'];
								      $rezultat2=mysql_query($sql2, $konekcija);
								      while ($red2=mysql_fetch_array($rezultat2)){
								      	echo '<li><a href="ad1.php?id='.$red2['id_podKategorija'].'">'.$red2['naziv_podKategorije_gre'].'</a></li>';
								      }

							echo '</ul></div>
								    </div>
								 	 </div>';
			          	}
			          ?>
			</div><!-- End Panel-group-->

			<!-- End Oglasi-->

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