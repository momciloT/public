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
    <script src="js/validate_kockica.js"></script>
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

<!-- Button trigger modal -->
                        
                        <div class="validation"></div>
                        <!-- Modal -->
                        <div class="modal fade" id="myModa2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content" style="background-color:#66CCFF;">
                              <div class="modal-header">
                                    Το  αίτημά σας:
                              </div>
                              <div class="modal-body">
                                    <form method="post" action="function/z_kockica.php" class="validateform" name="send-contact" id="contactform">

                                    <div class="row">
                                        <div class="col-lg-12 field">   
                                        <h5 style="font-size:16px;">Επωνυμία της εταιρείας</h5>
                                        <input type="text" id="tbNazivFirme" class="polja_kockica"  name="tbNazivFirme" placeholder="* Επωνυμία της εταιρείας..." data-rule="maxlen:4" data-msg="Υποχρεωτικό πεδίο" />
                                        <div class="validation">
                            </div>
                                        </div>

                                        <div class="col-lg-12 field">
                                        <h5 style="font-size:16px;">Η διεύθυνση e-mail σας</h5>
                                        <input type="text" id="tbMail" class="polja_kockica"  name="tbMail"  placeholder="* Η διεύθυνση e-mail σας..." data-rule="email" data-msg="Υποχρεωτικό πεδίο" />
                                        <div class="validation">
                            </div>
                                        </div>

                                        <div class="col-lg-12 field">
                                        <h5 style="font-size:16px;">Θέμα Μηνύματος</h5>
                                        <input type="text" id="tbNaslovPor" class="polja_kockica"  name="tbNaslovPor" placeholder="* Θέμα Μηνύματος..." data-rule="maxlen:4" data-msg="Υποχρεωτικό πεδίο" />
                                        <div class="validation">
                            </div>
                                        </div>

                                        <div class="col-lg-12 field">
                                        <h5 style="font-size:16px;">Το μήνυμά σας</h5>
                                        <textarea id="tbPoruka" name="Poruka" placeholder="* Πληροφορία που χρειάζομαι..." class="polja_kockica" style="height:120px;" data-rule="required" data-msg="Υποχρεωτικό πεδίο" ></textarea>
                                        <div class="validation">
                            </div>
                                        <p>
                                        <button style="border:2px solid white;"  class="btn btn-theme " type="submit">Αποστολή</button>
                                        </p>

                                        </div>
                                        </div>

                                        <div id="sendmessage">
                    Το μήνυμα σας στάλθηκε με επιτυχία, θα σας απαντήσουμε σύντομα. Σας ευχαριστήσουμε για τη χρήση της πύλης μας.
                    </div>
                                    </form>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Έξοδος</button>
                              </div>
                            </div>
                          </div>

                        </div>

        <!-- End Button trigger modal -->

<!-- jumbotron-->

<div class="jumbotron">
    <div class="container">
        <div class="row">
            <div class="col-sm-11">
                <a href="index.php"><img src="rs/images/logo.png" class="img-responsive"></a>
            </div>
            <div class="col-sm-1" id="language_header">
                <a href="rs/opsirnije2.php"><img width="50" height="50" src="rs/images/sr.png" class="img-responsive"></a>

                <a href="more2.php"><img width="50" height="50" src="rs/images/el.png" class="img-responsive"></a>
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
                        <a href="rs/opsirnije2.php"><img width="50" height="50" src="rs/images/sr.png" class="img-responsive"></a>
                    </li>
                    <li>
                        <a href="more2.php"><img width="50" height="50" src="rs/images/el.png" class="img-responsive"></a>
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


    <section style="margin-top:-20px;">
        <img src="rs/images/info.jpg" class="img-responsive" />
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
        
            <div class="col-sm-8" style="padding-top: 50px;">
                <div class="row">
                    <p>Αξιότιμοι<br/><br/>

                    παρακαλούμε οι πληροφορίες  που ζητάτε να σχετίζονται αποκλειστικά με τις δραστηριότητες και τα προϊόντα σας.<br/> Θα παραλάβετε το συντομότερο τις ζητούμενες πληροφορίες</p>
                    <a href="" data-toggle="modal" data-target="#myModa2">Το αίτημά σας μπορεί να σταλεί εδώ</a>.<br/><br/>
                    Σας ευχαριστούμε που χρησιμοποιείτε την διαδικτυακή πύλη HellaSerb. 
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

    <footer class="footer" style="margin-top: 450px;">
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