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
        unset($_SESSION['fail']);
    }
    else{
        $_SESSION['fail']="jojapaor";
    }

}



?>
<!DOCTYPE html>
<html lang="eng">

<head>
    <meta charset="utf-8">
    <title>HellaSerb</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="HellaSerb">
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <link rel="stylesheet" id="font-awesome-css" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" type="text/css" media="screen">
    <script src="js/back_to_top.js"></script>
    <script src="js/showMore.js"></script>
    <script src="js/enter.js"></script>

    <!-- slider dodato-->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>



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
                <a href="index.php"><img src="images/logo.png" class="img-responsive"></a>
            </div>
            <div class="col-sm-1" id="language_header">
                <a href="#"><img width="50" height="50" src="images/sr.png" class="img-responsive"></a>

                <a href="#"><img width="50" height="50" src="images/el.png" class="img-responsive"></a>
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
                    <a href="#"><img width="50" height="50" src="images/sr.png" class="img-responsive"></a>
                </li>
                <li>
                    <a href="#"><img width="50" height="50" src="images/el.png" class="img-responsive"></a>
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
            </ul>

        </div>
    </div><!-- End Container-->
</nav><!-- End navbar-->
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


        <div class="col-sm-8" style="padding-top:50px;">
        <?php

        if(isset($_GET['email'])){
        $mail=$_GET['email'];
            $hash=$_GET['hash'];
            include('konekcija.php');
        $upit_provera_aktivacija = "SELECT email FROM korisnici WHERE email='$mail' AND aktivan='$hash'";
        $rez_aktivacija = mysql_query($upit_provera_aktivacija, $konekcija) or die(mysql_error());
        if (!$provera_aktivacija = mysql_fetch_row($rez_aktivacija)) {
            echo '<h4>Ovaj korisnik je već aktivan!</h4>';
        } else {
            $upit_slanje_aktivacija = "UPDATE korisnici SET aktivan=1 WHERE aktivan='$hash'";
            $rez_zahtev = mysql_query($upit_slanje_aktivacija, $konekcija);
            echo '<h4>Uspešno ste aktivirali Vaš nalog!</h4><p>Hvala na poverenju!</p><p><a href="index.php">Povratak na početnu stranu</a>.</p>';

        }
        }else{
            header("Location: index.php");
        }

?>
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

    </div>

</div>



<footer class="footer" style="margin-top: 500px;">
    <hr>
    <div class="container text-center">


        <p>HellaSerb 2015. | <a href="deklaracija.php">Deklaracija</a> | <a href="uslovi_koriscenja.php">Uslovi korišćenja</a> | <a href="politika_privatnosti.php">Politika privatnosti</a></p>


    </div><!-- End container-->

</footer>

<!-- Back to top-->

<a href="#" class="back-to-top" style="display: inline;">
    <i class="fa fa-arrow-circle-up"></i>
</a>

<script src="js/validate_oglas.js"></script>
<script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
</body>
</html>