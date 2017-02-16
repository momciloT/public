<?php

@session_start();

/*if (isset($_SESSION['fail'])){

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
        $_SESSION['fail']="f";
    }

}*/

if(isset($_POST['nazivfirme'])) {
    $nazivFirme_oglasa = $_POST['nazivfirme'];
    $tbtext=$_POST['tbtext'];
    $kategorija=$_POST['kategorija'];
    $podkategorija=$_POST['podkategorija'];
    $tipoglasa=$_POST['tipoglasa'];
    $imeprezime=$_POST['imeprezime'];
    $mail=$_POST['mail'];
    $adresa=$_POST['adresa'];
    $telefon=$_POST['telefon'];
    $drzava=$_POST['drzava'];
    $grad=$_POST['grad'];
    $nazivfirmedeklaracija=$_POST['nazivfirmedeklaracija'];
    $adresadeklaracija=$_POST['adresadeklaracija'];
    $brregideklaracija=$_POST['brregideklaracija'];
    $opisdeklaracija=$_POST['opisdeklaracija'];
    $maticnideklaracija=$_POST['maticnideklaracija'];
    $pib=$_POST['pib'];
    $imeprezimeodglica=$_POST['imeprezimeodglica'];
    $adresaodg=$_POST['adresaodg'];
    $jmbg=$_POST['jmbg'];
    $brlic=$_POST['brlic'];
    $kontakt=$_POST['kontakt'];
    $trajanjedeklaracije=$_POST['trajanjedeklaracije'];
    $nacinoglasavanja=$_POST['nacinoglasavanja'];
    $website=$_POST['website'];
    $slike=$_POST['slike'];
    include_once('../konekcija.php');

   $result=mysql_query("SELECT id_korisnik FROM korisnici WHERE email='".$_SESSION['email']."' ");
    $row = mysql_fetch_assoc($result);
    $korisnik=$row['id_korisnik'];


    $nacOgl=mysql_query("SELECT nacin_oglasavanja_srb FROM nacin_oglasavanja WHERE id_nacin_oglasavanja=".$nacinoglasavanja);
   $nacOglasavanja=mysql_fetch_assoc($nacOgl);
       $nacOglFinal=$nacOglasavanja['nacin_oglasavanja_srb'];
    

     $promenljiva = '
<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <link href="css/style.css" rel="stylesheet" type="text/css" />

<style>
  body { font-family: DejaVu Sans, sans-serif; }
</style>

</head>

<body data-spy="scroll" data-target="#my-navbar">

<div class="container">
    <div class="row">

        <div class="col-sm-8">

            <form id="contactform" method="post" action="" enctype="multipart/form-data" class="validateoglas">
                <span style="font-size:16px">
                    <strong>DEKLARACIJA (član 11.) Zakona o oglašavanju</strong>
               </span>
                                <p style="font-size:12px;">Tokom registracije pravnog lica,podaci koje unosite činiće Deklaraciju, i obavezna je za sva pravna lica,na osnovu Zakona o
                                    oglašavanju(član11.). Uneti podaci biće tretirani kao poverljivi u skladu sa Zakonom o zaštiti podataka o ličnosti i <strong>neće biti javno dostupni</strong>.</p>

                <p style="font-size:12px;">Worth Biomin d.o.o Koste Novakovića br.15   11127 Beograd</p>
                <p style="font-size:12px;">Naziv i sedište lica koje objavljuje ili emituje oglasnu poruku:</p>

                <span style="font-size:16px"><strong>I Podaci o proizvođaču oglasne poruke</strong></span>
                <p style="font-size:12px;">Oglašivač je ujedno i kreator oglasne poruke.</p>

                <span style="font-size:16px"><strong>II Podaci o oglašivaču</span></strong></span>
                <div class="col-lg-12 field">
                    <span style="font-size:12px;">Naziv firme: </span>' . $nazivfirmedeklaracija . '
                </div>
                <div class="col-lg-12 field">
                    <span style="font-size:12px;">Adresa firme: </span>' . $adresadeklaracija . '
                </div>
                <div class="col-lg-12 field">
                    <span style="font-size:12px;">Broj pod kojim je firma registrovana: </span>' . $brregideklaracija . '
                </div>
                <div class="col-lg-12 field">
                    <span style="font-size:12px;">Opis: </span>' . $opisdeklaracija . '
                </div>
                <div class="col-lg-12 field">
                    <span style="font-size:12px;">Matični broj: </span>' . $maticnideklaracija . '
                </div>
                <div class="col-lg-12 field">
                    <span style="font-size:12px;">PIB: </span>' . $pib . '
                </div>
                <div class="col-lg-12 field">
                    <span style="font-size:12px;">Ime i prezime: </span>' . $imeprezimeodglica . '
                </div>
                <div class="col-lg-12 field">
                    <span style="font-size:12px;">Adresa stanovanja odgovornog lica: </span>' . $adresaodg . '
                </div>
                <div class="col-lg-12 field">
                    <span style="font-size:12px;">JMBG odgovornog lica: </span>' . $jmbg . '
                </div>
                <div class="col-lg-12 field">
                    <span style="font-size:12px;">Broj lične karte i mesto izdavanja: </span>' . $brlic . '
                </div>
                <div class="col-lg-12 field">
                    <span style="font-size:12px;">Kontakt telefon: </span>' . $kontakt . '
                </div>
                <span>&nbsp;</span>

                <span style="font-size:16px"><strong>III Podaci o oglasnoj poruci</strong></span>

                <div class="col-lg-12 field">
                   <span><img src="../images/check.jpg" width="20" heigth="20"/><span style="margin-left:10px; font-size:12px;">Kao izvorni tekst biće prihvaćen tekst i podaci uneti u odgovarajućoj formi na sajtu.</span>

                </div>

                <div class="col-lg-12 field">
                    <span><img src="../images/check.jpg" width="20" heigth="20"/><span style="margin-left:10px; font-size:12px;">Prihvatam uslove  </span>
                    <div class="validation"></div>
                </div>

                <div class="col-lg-12 field">
                   <span><img src="../images/check.jpg" width="20" heigth="20"/><span style="margin-left:10px; font-size:12px;">Garantujem za tačnost unetih podataka i sadržinu oglasne poruke.</span>

                </div>
                </div>

                <p></p>
                <div class="col-lg-12 field">
                    <span style="font-size:12px;">Trajanje deklaracije: ' . $trajanjedeklaracije . '</span>
                </div>

                <div class="col-lg-12 field" style="margin-top:10px;">
                    <span style="font-size:12px;">Način oglašavanja: ' . $nacOglFinal . '</span>
                </div>
                <div class="col-lg-12 field" style="margin-top:10px;">
                    <span style="font-size:12px;"><strong>Izjavio / Izjavila: ' . $imeprezimeodglica . '</strong></span>
                </div>

            </form>
            <!-- End Deo za deklaraciju--><!-- </form>-->
        </div>




</div>

</div><!-- End container-->

<!-- Footer-->
<footer class="footer">
    <div class="container text-center">


        <p>Datum: ' . date("d.m.Y") . '<p>

        <p><p>Mesto: </p>

        <p>Potpis: </p>

        <p>M.P. </p>


    </div><!-- End container-->

</footer>



</body>
</html>
';

       $nazivp = "deklaracije/hellaserb" . uniqid().".pdf";
        require_once("../dompdf/dompdf_config.inc.php");
        spl_autoload_register('DOMPDF_autoload');
        $dompdf = new DOMPDF();
        $dompdf->load_html($promenljiva);
        $dompdf->render();
        $output = $dompdf->output();
        $file_to_save = "../".$nazivp;
        file_put_contents($file_to_save, $output);

        $_SESSION['nazivp']=$nazivp;
    

    $maz=mysql_query("INSERT INTO oglasi(id_korisnik, naziv_firme,id_kategorija,id_podKategorija,id_tip_oglasa,text_oglasa,ime_prezime,email_ogl,websajt, telefon, adresa,id_drzava,id_grad, deklaracija_putanja, status) VALUES('{$korisnik}', '{$nazivFirme_oglasa}','{$kategorija}','{$podkategorija}','{$tipoglasa}','{$tbtext}','{$imeprezime}','{$mail}','{$website}', '{$telefon}','{$adresa}','{$drzava}','{$grad}', '{$nazivp}', '0')");
    
    $id_oglas=mysql_insert_id();

    $maz2=mysql_query("INSERT INTO oglasi_srb(id_oglas, naziv_firme_srb, text_oglasa_srb, ime_prezime_srb, adresa_srb) VALUES({$id_oglas}, '{$nazivFirme_oglasa}', '{$tbtext}', '{$imeprezime}', '{$adresa}')");

    $maz3=mysql_query("INSERT INTO oglasi_gre(id_oglas) VALUES({$id_oglas})");

    $maz4=mysql_query("INSERT INTO deklaracija(id_oglas, naziv_firme_srb_dek, adresa_firme_srb_dek, br_reg, opis_srb, maticni_br, pib, ime_prezime_srb_dek, adresa_srb_dek, jmbg, br_licne_karte, tel, trajanje_deklaracije, id_nacin_oglasavanja) VALUES({$id_oglas}, '{$nazivfirmedeklaracija}', '{$adresadeklaracija}', '{$brregideklaracija}', '{$opisdeklaracija}', '{$maticnideklaracija}', '{$pib}', '{$imeprezimeodglica}', '{$adresaodg}', '{$jmbg}', '{$brlic}', '{$kontakt}', '{$trajanjedeklaracije}', '{$nacinoglasavanja}')");

    $maz5=mysql_query("INSERT INTO slike(id_oglas, putanja) VALUES({$id_oglas}, '{$slike}')");

    if($maz){
        $mai=$_SESSION['email'];
         $subject='HellaSerb oglas';
        $message='
Poštovani,

Vaš oglas je uspešno poslat, i objaviće se nakon prevoda na grčki jezik, od strane administratora.
Ukoliko ste odabrali plaćeni oglas ili reklamu ( internet baner), stičete mogućnost da:
-koristite naše usluge;
-pristupate poslovnim informacijma, postavljenim, na portal;
-na osnovu Vašeg upita primate informacije sa tržišta Grčke, koje su Vam potrebne, a u sferi su Vaše delatnosti, 
za sve vreme trajanja Vašeg oglašavanja, počev od momenta evidentiranja Vaše uplate. 
Uplatu je potrebno izvršiti u roku  7 dana, od dana objavljivanja plaćenog oglasa. U suprotnom oglas će biti stopiran i ukinut Vaš korisnički nalog.
Za informacije o vrsti i ceni oglasnih i reklamnih paketa, kao i o uslugama koje Vam pružamo, možete nas kontaktirati na info@hellaserb.rs
Vašu popunjenu Deklaraciju možete odštampati klikom na link: http://hellaserb.com/rs/'.$_SESSION["nazivp"].'

Zahvaljujemo se što koristite naš portal.
';
        $headers = 'From:info@hellaserb.rs' . "\r\n";
        mail($mai, $subject, $message, $headers);
        echo"uspeh";
    }
    else{
        echo"greska";
    }
}