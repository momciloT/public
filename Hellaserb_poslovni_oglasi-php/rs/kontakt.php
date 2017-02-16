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
<html lang="eng" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">

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
    <script src="js/validate.js"></script>
    <script src="js/enter.js"></script>
    <script src="js/adds.js"></script>
    <!-- slider dodato-->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <!-- bxSlider Javascript file -->
    <script src="/js/jquery.bxslider.min.js"></script>
    <!-- bxSlider CSS file -->
    <link href="/lib/jquery.bxslider.css" rel="stylesheet" />
</head>

<body data-spy="scroll" data-target="#my-navbar">
<!-- jumbotron-->

<div class="jumbotron">
    <div class="container">
        <div class="row">
            <div class="col-sm-11">
                <a href="index.php"><img src="images/logo.png" class="img-responsive"></a>
            </div>
            <div class="col-sm-1" id="language_header">
                <a href="kontakt.php"><img width="50" height="50" src="images/sr.png" class="img-responsive"></a>

                <a href="../contact.php"><img width="50" height="50" src="images/el.png" class="img-responsive"></a>
            </div>
        </div><!-- End row-->
    </div><!-- End container-->
</div><!-- End jumbotron-->

<nav class="navbar navbar-inverse navbar-static-top" id="my-navbar">
    

        <div class="container">
            <div class="navbar-header">
                <ul id="language_menu">
                    <li>
                        <a href="kontakt.php"><img width="50" height="50" src="images/sr.png" class="img-responsive"></a>
                    </li>
                    <li>
                        <a href="../contact.php"><img width="50" height="50" src="images/el.png" class="img-responsive"></a>
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


    <section style="margin-top:-20px;">
        <img src="images/contact.jpg" class="img-responsive" />
    </section>

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
		
            <div class="col-sm-8" style="padding-top: 1%;">
                <div class="row">
                <div class="col-lg-6"><h3><strong>Kontakt podaci</strong></h3>
               <div id="contact-icon-cover"><span id="contact-icon-cover"> <span class="glyphicon glyphicon-home" aria-hidden="true">  </span><span class="contact-lt">  -  „Worth Biomin” D.O.O. Koste Novakovića 15, 11127 Beograd</span></span></div>
                    <div id="contact-icon-cover"><span id="contact-icon-cover"><span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span><span class="contact-lt">  -  +381 11 4074 - 584</span></span></div>
                    <div id="contact-icon-cover"><span id="contact-icon-cover"><span class="glyphicon glyphicon-print" aria-hidden="true"></span><span class="contact-lt">  -  +381 11 4074 - 584</span></span></div>
                    <div id="contact-icon-cover"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span><span class="contact-lt">  -   <a href="mailto:info@hellaserb.rs">info@hellaserb.rs</a></span></div>
                    
                    </div>

                    

                <div class="col-lg-12" style="margin-top:20px;">
                <div id="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2831.1207864819344!2d20.5088947!3d44.798727!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a7a791650876d%3A0x550775502918c381!2z0JvRg9C60LjRmNCw0L3QsCDQnNGD0YjQuNGG0LrQvtCzLCDQkdC10L7Qs9GA0LDQtCAxMTAwMA!5e0!3m2!1ssr!2srs!4v1429918370729" width="100%" height="280" frameborder="0" style="border:0"></iframe>
                </div>
                </div>
                </div>
                <form id="contactform" action="function/contact.php" method="post" class="validateform" name="send-contact">
                    <div id="sendmessage">
                    Vaša poruka je uspešno poslata, odgovorićemo ubrzo. Zahvaljujemo se što koristite naš portal.
                    </div>
                    <h3><strong>Kontakt forma</strong></h3>

                    <div class="row">
                        <div class="col-lg-4 field">
                            <input type="text" id="nameform"  name="name" placeholder="* Naziv firme" data-rule="maxlen:4" data-msg="Molimo Vas unesite minumum 4 karaktera" />
                            <div class="validation">
                            </div>
                        </div>
                        <div class="col-lg-4 field">
                            <input type="text" name="email" placeholder="* Vaš email" data-rule="email" data-msg="Molimo unesite validan email" />
                            <div class="validation">
                            </div>
                        </div>
                        <div class="col-lg-4 field">
                            <input type="text" name="subject" placeholder="Naslov poruke" data-rule="maxlen:4" data-msg="Molimo Vas unesite minumum 4 karaktera" />
                            <div class="validation">
                            </div>
                        </div>
                        <div class="col-lg-12 margintop10 field">
                            <textarea rows="12" name="message" class="input-block-level" placeholder="* Unesite tekst Vaše poruke... " data-rule="required" data-msg="Molimo Vas unesite tekst poruke"></textarea>
                            <div class="validation">
                            </div>
                            <p>
                                <button style="border:2px solid white;" class="btn btn-theme " type="submit">Pošaljite poruku</button>

                            </p>
                        </div>
                    </div>
                </form>
            </div>
			
			<div class="col-sm-2">
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
			
        </div>
    </div>





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


    <script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
</body>
</html>