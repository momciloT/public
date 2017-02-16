<?php 
		@session_start();
	
		if(isset($_POST['Udji']))
		{
				include('konekcija.php');
          $korisnik=trim($_POST['ime']);
          $lozinka=$_POST['lozinka'];
		  $lozinka=md5($lozinka);
       
          
          $upit = "SELECT * FROM korisnik  WHERE Mail='$korisnik' and Lozinka='$lozinka'";  
   
          $rez = mysql_query($upit, $konekcija)or die(mysql_error());
          
          $niz = mysql_fetch_array($rez);
          $_SESSION['korisnik'] = $niz['Ime'];
          $_SESSION['uloga'] = $niz['ID_uloga'];
          $_SESSION['idkorisnik'] = $niz['ID'];
          
        
        }
		
		if(isset($_POST['logout']))
        {
         session_destroy();
         @header("location:index.php");
         

        }	
			
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<head>
<title>Hotel Planinarski dom</title>
<meta charset="utf-8">
<!-- Google Fonts -->
<link href='http://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
<!-- CSS Files -->
<link rel="stylesheet" type="text/css" media="screen" href="style.css">
<link rel="stylesheet" type="text/css" media="screen" href="menu/css/simple_menu.css">
<!-- Contact Form -->
<link href="css/style_contact.css" media="screen" rel="stylesheet" type="text/css">
<!-- JS Files -->
<script src="js/jquery.tools.min.js"></script>

<script src="mmm.js"></script> 

<script>
$(function () {
    $("#prod_nav ul").tabs("#panes > div", {
        effect: 'fade',
        fadeOutSpeed: 400
    });
});
</script>
<script>
$(document).ready(function () {
    $(".pane-list li").click(function () {
        window.location = $(this).find("a").attr("href");
        return false;
    });

});
</script>
<script>
function registracija()
{ 
window.open('index.php?registracija', '_self');
};
function admin()
{ 
window.open('index.php?admin', '_self');
};

</script>
</head>
<body>
<div class="header">
  <div id="site_title"><a href="index.php"><img src="img/logo1.png" alt=""></a></div>
  <!-- Main Menu -->
  <ol id="menu">
    <li class="active_menu_item"><a href="index.php">Početna</a>
     <?php
	 if(isset($_SESSION['korisnik']))
	 {
    echo'<li><a href="index.php?rezervacija">Rezervacija</a>';
	}
	
	?>
      <!-- sub menu -->
    
    </li>
    <!-- END sub menu -->

	
    <li><a href="#">Hotel</a>
       <ol>
        <li><a href="#">Sobe</a>
		
		  <ol>
        <li><a href="index.php?soba=1">Jednokrevetne</a></li>
        <li><a href="index.php?soba=2">Dvokrevetne</a></li>
		  <li><a href="index.php?soba=4">Lux</a></li>
      </ol></li>
       <li><a href="index.php?galerija">Galerija</a></li>
      </ol>
	 </li>
    <li><a href="index.php?kontakt">Kontakt</a></li>
	
	<li><a href="#" id="ulazbtn">Ulaz</a></li>
	<li>
	<form id="green" method="POST" action="index.php" >
	 <?php if(!isset($_SESSION['uloga'])) {?>
	E-Mail:<input  style="margin: 8px 0px 0px 0px" type="text" id="ime" name="ime"/>
	</br>LOZINKA:<input  style="margin: 5px 0px" type="password" id="lozinka" name="lozinka"/>

	</br><input type="submit" style="margin: 0px 5px" class="button" id="Udji" name="Udji" value="Udji"/><input id="nazad" class="button" type="button" value="Odustani"/></br>
	<h4 onclick="registracija()" style="margin: 3px 0px 0px 0px;cursor: pointer;">Registruj se</h4>
	<?php } else {
			
					echo "<table><tr><td align='center'><h4 style='color: white;'>Ulogovani ste kao:</br> ".$_SESSION['korisnik']."</td></tr><tr><td style='padding-top: 10px;'><input type='submit' class='button' name='logout' Value='Odjavi'/></td><td><input id='nazad' class='button' type='button' value='Zatvori'/></td></tr>";
				
			
					 if($_SESSION['uloga']=='1'){echo"<tr><td colspan='2' style='padding-top: 10px;padding-left: 54px;'><input type='button' class='button' onclick='admin()'  Value='ADMIN PANEL'/></td></tr>";}
			echo'</table>';
			}?>
	</form>
	</li>
  </ol>
</div>
<!-- END header -->
<div id="container">

<?php
if(isset($_GET["registracija"]))
{
include("registracija.php");
}

else{
if(isset($_GET["rezervacija"]))
{
include("rezervacija.php");
}
else{
if(isset($_GET["soba"]))
{
include("soba.php");
}
else{
if(isset($_GET["galerija"]))
{
include("galerija.php");
}
else{
if(isset($_GET["kontakt"]))
{
include("kontakt.php");
}
else{
if(isset($_GET["admin"]))
{
include("admin.php");
}
else{
if(isset($_GET["oautoru"]))
{
include("autor.php");
}
else{
include("pocetna.php");
 }
 }
 }
 }
 }
 }
 }
  ?>
</div>
<!-- END container -->
<div id="footer">
  <!-- First Column -->
  <div class="one-fourth">
   <h3>Linkovi</h3>
    <ul class="footer_links">
     <li><a href="index.php">Početna</a></li>
    <li><a href="index.php?rezervacija">Rezervacija</a></li>
       <li><a href="index.php?kontakt">Kontakt</a></li>
        <li><a href="index.php?galerija">Galerija</a></li>
		 <li><a href="doku.pdf">Dokumentacija</a></li>
    </ul>
  </div>
  <!-- Second Column -->
 
  <!-- Third Column -->
  <div class="one-fourth">
    <h3>Information</h3>
   All right received by:
    <div id="social_icons"> <a href="index.php?oautoru">Momčilo Todorović</a><br>
   </div>
  </div>
  <!-- Fourth Column -->
  <div class="one-fourth last">
    <h3>Socialize</h3>
    <img src="img/icon_fb.png" alt=""><img src="img/icon_twitter.png" alt=""><img src="img/icon_in.png" alt=""> </div>
  <div style="clear:both"></div>
</div>
<!-- END footer -->
</body>
</html>