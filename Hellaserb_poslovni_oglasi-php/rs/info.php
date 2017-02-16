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
<style type="text/css">
    li{
    display: none;
}
li.year{
    display: block;
}
</style>

<!-- jumbotron-->

<div class="jumbotron">
    <div class="container">
        <div class="row">
            <div class="col-sm-11">
                <a href="index.php"><img src="images/logo.png" class="img-responsive"></a>
            </div>
            <div class="col-sm-1" id="language_header">
                <a href="info.php"><img width="50" height="50" src="images/sr.png" class="img-responsive"></a>

                <a href="../info.php"><img width="50" height="50" src="images/el.png" class="img-responsive"></a>
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
                        <a href="info.php"><img width="50" height="50" src="images/sr.png" class="img-responsive"></a>
                    </li>
                    <li>
                        <a href="../info.php"><img width="50" height="50" src="images/el.png" class="img-responsive"></a>
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
        <img src="images/info.jpg" class="img-responsive" />
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
                    <div class="col-sm-12" style="padding-top:30px;">
                    <p>
                        Odabirom <a href="korisnicki_nalog.php"><strong>plaćenog</strong></a> poslovnog internet oglasa ili internet banera (reklame), pruža Vam se mogućnost da:
                    </p>

                    <p>
                        - pristupate  poslovnim informacijama, postavljenim na portal,<br/>
                        - na Vaš upit, dobijate informacije koje su Vam potrebne, vezano za tržište Grčke, a u okviru Vaše delatnosti,<br/>
                        - pristupate korisnim linkovima Grčke, Kipra, Ruske Federacije, Bosne i Hercegovine i Crne Gore.
                    </p>

                    <p>
                        Ove informacije su (isključivo obaveštavajućeg karaktera), i  odnose se na tržište Grčke, pri čemu je obuhvaćeno: 
                    </p>

                    <ul> 
            <li class="year"><a> POZNAVANJE TRŽIŠTA</a>
                <ul>
                    <li>potražnja za proizvodima kao sto su Vaši;</li>
                    <li>maloprodajna i veleprodajna cena dotičnog poizvoda;</li>
                    <li>broju firmi koje trguju robom kao sto je Vaša, ili je proizvode,</li>   
                    <li>porezu na dodatu vrednost dotičnog proizvoda</li>
                    <li><a href="opsirnije2.php">Pošaljite upit</a></li>
                </ul>
            </li>
            <li class="year"><a> PRAVNI USLOVI POSLOVANJA</a>
                <ul>
                    <li><a>Otvaranja firme</a>
                        <ul>
                            <li>procedura i troškovi  prilikom otvaranja firme;</li> 
                            <li>procedura i troškovi prilikom zatvaranja firme;</li>
                            <li><?php if(isset($_SESSION['email'])){ if(@$_SESSION['status']==1){echo '<a href="opsirnije.php">Opširnije…</a>';}else{echo '<a href="korisnicki_nalog.php">Opširnije…</a>';}}else{echo '<a href="korisnicki_nalog.php">Opširnije…</a>';} ?></li>
                        </ul>
                    </li>   
                    <li><a>Vrste preduzeća</a>
                        <ul>
                            <li>društvo sa ograničenom odgovornošću;</li>
                            <li>akcionarsko društvo;</li>
                            <li>komanditno društvo;</li>
                            <li>ortačko društvo.</li>
                            <li><?php if(isset($_SESSION['email'])){ if(@$_SESSION['status']==1){echo '<a href="opsirnije.php">Opširnije…</a>';}else{echo '<a href="korisnicki_nalog.php">Opširnije…</a>';}}else{echo '<a href="korisnicki_nalog.php">Opširnije…</a>';} ?></li>
                        </ul>
                    </li>
                    <li><a>Zasnivanje radnog odnosa</a>
                        <ul>
                            <li>opšte odredbe;</li>
                            <li>ugovor o radu;</li>
                            <li>zarade i naknade;</li>
                            <li>porezi i doprinosi.</li>
                            <li><?php if(isset($_SESSION['email'])){ if(@$_SESSION['status']==1){echo '<a href="opsirnije.php">Opširnije…</a>';}else{echo '<a href="korisnicki_nalog.php">Opširnije…</a>';}}else{echo '<a href="korisnicki_nalog.php">Opširnije…</a>';} ?></li>
                        </ul>
                    </li>   
                    <li><a>Strane investicije u  Grčkoj</a>
                        <ul>
                            <li>opšti prikaz;</li>
                            <li>zakon o stranim ulaganjima;</li>
                            <li>olakšice i podsticaji.</li>
                            <li><a href="opsirnije.php">Pošaljite upit</a></li>
                        </ul>
                    </li>
                    <li><a>Promet nekretninama</a>
                        <ul>
                            <li>Kupovina;</li>
                            <li>Prodaja;</li>
                            <li>Izdavanje.</li>
                            <li><?php if(isset($_SESSION['email'])){ if(@$_SESSION['status']==1){echo '<a href="opsirnije.php">Opširnije…</a>';}else{echo '<a href="korisnicki_nalog.php">Opširnije…</a>';}}else{echo '<a href="korisnicki_nalog.php">Opširnije…</a>';} ?></li>
                        </ul>
                    </li>
                    <li><a>Dobijanje radne / boravišne vize</a>
                        <ul>
                            <li>ostvarivanje prava na radnu / boravišnu vizu.</li>
                            <li><?php if(isset($_SESSION['email'])){ if(@$_SESSION['status']==1){echo '<a href="opsirnije.php">Opširnije…</a>';}else{echo '<a href="korisnicki_nalog.php">Opširnije…</a>';}}else{echo '<a href="korisnicki_nalog.php">Opširnije…</a>';} ?></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="year"><a> PORESKI USLOVI POSLOVANJA</a>
                <ul>
                    <li>porez na dodatu vrednost;</li>   
                    <li>porez na dobit pravnih lica;</li>
                    <li>porez na dohodak građana;</li>
                    <li>doprinosi za obavezno osiguranje zaposlenih;</li>
                    <li>porezi na imovinu;</li>
                    <li>oporezivanje direktno i indirektno.</li>
                    <li><?php if(isset($_SESSION['email'])){ if(@$_SESSION['status']==1){echo '<a href="opsirnije.php">Opširnije…</a>';}else{echo '<a href="korisnicki_nalog.php">Opširnije…</a>';}}else{echo '<a href="korisnicki_nalog.php">Opširnije…</a>';} ?></li>
                </ul>
            </li>
            <li class="year"><a> CARINSKI USLOVI POSLOVANJA</a>
                <ul>
                    <li>carinske stope za dati prozvod pri uvozu/izvozu;</li>  
                    <li>proizvodi koji su oslobođeni carine;</li>
                    <li>da li je potrebno izvršiti analizu datog proizvoda ili pribaviti atest, i koliki su prateći troškovi;</li>
                    <li>prateća dokumentacija koja je potrebna prilikom uvoza/izvoza;</li>
                    <li>u okviru Vaše delatnosti;</li>
                    <li>za proizvode kojima  se bavite.</li>
                    <li><a href="opsirnije2.php">Pošaljite upit</a></li>
                </ul>
            </li>
            <li class="year"><a> INFORMACIJE PO VAŠEM UPITU</a>
                <ul>
                    <li> u okviru Vaše delatnosti i</li>
                    <li>za proizvode kojima se bavite</li>
                    <li><a href="opsirnije2.php">Pošaljite upit</a></li>
                </ul>
            </li>
            <li class="year"><a> PROGRAM ODRŽAVANJA SAJMOVA</a>
                <ul>
                    <li><a href="sajam_gre.php">GRČKA</a></li>
                    <li><a href="sajam_kip.php">KIPAR</a></li>
                    <li><a href="sajam_rus.php">RUSKA FEDERACIJA</a></li>
                    <li><a href="sajam_bih.php">BOSNA I HERCEGOVINA</a></li>
                    <li><a href="sajam_mng.php">CRNA GORA</a></li>
                </ul>
            </li>
            <li class="year"><a> KORISNI LINKOVI</a>
                <ul>
                    <li><a href="linkovi_grc.php">GRČKA</a></li>
                    <li><a href="linkovi_kip.php">KIPAR</a></li>
                    <li><a href="linkovi_rus.php">RUSKA FEDERACIJA</a></li>
                    <li><a href="linkovi_bih.php">BOSNA I HERCEGOVINA</a></li>
                    <li><a href="linkovi_cng.php">CRNA GORA</a></li>
                </ul>
            </li>
        </ul>

                    <p>
                        Za informacije o vrsti i ceni oglasnih i reklamnih paketa, kao i o uslugama koje Vam pružamo, možete nas kontaktirati na <a href="mailto:info@hellaserb.rs">info@hellaserb.rs</a>.
                    </p>
                    </div>
                </div>
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
			
        </div><!-- End Row-->
    </div><!-- End Container-->

<script type="text/javascript">
    $('li').click(function(e){
    if( $(this).find('>ul').hasClass('active') ){
        $(this).children('ul').removeClass('active').children('li').slideUp();
        e.stopPropagation();
    }
    else{
        $(this).children('ul').addClass('active').children('li').slideDown();
        e.stopPropagation();
    }
});
</script>

    <footer class="footer" style="margin-top: 300px;">
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