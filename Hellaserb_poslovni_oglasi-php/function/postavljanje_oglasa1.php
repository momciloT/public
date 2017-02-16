<?php

@session_start();

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


    $nacOgl=mysql_query("SELECT nacin_oglasavanja_gre FROM nacin_oglasavanja WHERE id_nacin_oglasavanja=".$nacinoglasavanja);
   $nacOglasavanja=mysql_fetch_assoc($nacOgl);
       $nacOglFinal=$nacOglasavanja['nacin_oglasavanja_gre'];
    

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
                    <strong>Δήλωση περί διαφήμισης (άρθρο 11. )του Νόμου περί διαφήμισης</strong>
               </span>
                                <p style="font-size:12px;">Η Δήλωση χρειάζεται να συμπληρωθεί, ώστε να διαφημίζονται μόνο νόμιμα καταχωρημένες εταιρείες και επιχειρήσεις. Όλα τα παρακάτω  στοιχεία αποτελούν προσωπικά δεδομένα ενώ καλύπτονται από δέσμευση μη δημοσιοποίησης και προστατεύονται από τις διατάξεις περί Προστασίας Προσωπικών Δεδομένων.</p>

                <p style="font-size:12px;">Worth Biomin d.o.o Koste Novakovića br.15 11127 Beograd, Srbija</p>
                <p style="font-size:12px;">Επωνυμία και την   έδρα  του νομικού προσώπου, που δημοσιεύει ή μεταδίδει την αγγελία / διαφήμιση:</p>

                <span style="font-size:16px"><strong>I Στοιχεία  δημιουργού   αγγελίας</strong></span>
                <p style="font-size:12px;">Ο αγγελιοδότης είναι επίσης  δημιουργός της αγγελίας του.</p>

                <span style="font-size:16px"><strong>II Στοιχεία αγγελιοδότη</span></strong></span>
                <div class="col-lg-12 field">
                    <span style="font-size:12px;">Επωνυμία της εταιρείας: </span>' . $nazivfirmedeklaracija . '
                </div>
                <div class="col-lg-12 field">
                    <span style="font-size:12px;">Διεύθυνση: </span>' . $adresadeklaracija . '
                </div>
                <div class="col-lg-12 field">
                    <span style="font-size:12px;">Αριθμός καταχώρησης επιχειρησής ( Γ.Ε.ΜΗ. , Μ.Α.Ε.): </span>' . $brregideklaracija . '
                </div>
                <div class="col-lg-12 field">
                    <span style="font-size:12px;">Σύντομη περιγραφή της Κύριας Δραστηριότητας: </span>' . $opisdeklaracija . '
                </div>
                <div class="col-lg-12 field">
                    <span style="font-size:12px;">Κωδικό Αριθμό Δραστηριότητας (ΚΑΔ): </span>' . $maticnideklaracija . '
                </div>
                <div class="col-lg-12 field">
                    <span style="font-size:12px;">ΑΦΜ (O.E. ; E.E. ; E.Π.E  ; A.E.): </span>' . $pib . '
                </div>
                <div class="col-lg-12 field">
                    <span style="font-size:12px;">Νόμιμος Εκπρόσωπος (Διαχειριστής): </span>' . $imeprezimeodglica . '
                </div>
                <div class="col-lg-12 field">
                    <span style="font-size:12px;">Διεύθυνση Νομικού Εκπροσώπου: </span>' . $adresaodg . '
                </div>
                <div class="col-lg-12 field">
                    <span style="font-size:12px;">ΑΦΜ: </span>' . $jmbg . '
                </div>
                <div class="col-lg-12 field">
                    <span style="font-size:12px;">Αριθμός ΔΤ και τόπος έκδοσης: </span>' . $brlic . '
                </div>
                <div class="col-lg-12 field">
                    <span style="font-size:12px;">Τηλέφωνο επικοινωνίας: </span>' . $kontakt . '
                </div>
                <span>&nbsp;</span>

                <span style="font-size:16px"><strong>III Στοιχεία αγγελίας</strong></span>

                <div class="col-lg-12 field">
                   <span><img src="../rs/images/check.jpg" width="20" heigth="20"/><span style="margin-left:10px; font-size:12px;">Ως γνήσιο κείμενο της αγγελίας θα δεχτούμε το κείμενο και δεδομένα που έχουν καταχωρηθεί στην κατάλληλη μορφή στην ιστοσελίδα.</span>

                </div>

                <div class="col-lg-12 field">
                    <span><img src="../rs/images/check.jpg" width="20" heigth="20"/><span style="margin-left:10px; font-size:12px;">Αποδέχομαι τους όρους χρήσης</span>
                    <div class="validation"></div>
                </div>

                <div class="col-lg-12 field">
                   <span><img src="../rs/images/check.jpg" width="20" heigth="20"/><span style="margin-left:10px; font-size:12px;">Εγγυώμαι  για την ακρίβεια των εισαγμένων στοιχείων και το περιεχόμενο της αγγελίας.</span>

                </div>
                </div>

                <p></p>
                <div class="col-lg-12 field">
                    <span style="font-size:12px;">Η διάρκεια της δήλωσης: ' . $trajanjedeklaracije . '</span>
                </div>

                <div class="col-lg-12 field" style="margin-top:10px;">
                    <span style="font-size:12px;">Τρόπος της διαφήμισης: ' . $nacOglFinal . '</span>
                </div>
                <div class="col-lg-12 field" style="margin-top:10px;">
                    <span style="font-size:12px;"><strong>Ο - Η Δηλ: ' . $imeprezimeodglica . '</strong></span>
                </div>

            </form>
            <!-- End Deo za deklaraciju--><!-- </form>-->
        </div>




</div>

</div><!-- End container-->

<!-- Footer-->
<footer class="footer">
    <div class="container text-center">


        <p>Ημερομηνία: ' . date("d.m.Y") . '<p>

        <p><p>Τόπος : </p>

        <p>Υπογραφή: </p>

        <p>Σφραγίδα: </p>


    </div><!-- End container-->

</footer>



</body>
</html>
';

       $nazivp = "deklaracije/hellaserb" . uniqid().".pdf";
        require_once("../rs/dompdf/dompdf_config.inc.php");
        spl_autoload_register('DOMPDF_autoload');
        $dompdf = new DOMPDF();
        $dompdf->load_html($promenljiva);
        $dompdf->render();
        $output = $dompdf->output();
        $file_to_save = "../rs/".$nazivp;
        file_put_contents($file_to_save, $output);

        $_SESSION['nazivp']=$nazivp;
    

    $maz=mysql_query("INSERT INTO oglasi(id_korisnik, naziv_firme,id_kategorija,id_podKategorija,id_tip_oglasa,text_oglasa,ime_prezime,email_ogl,websajt, telefon, adresa,id_drzava,id_grad, deklaracija_putanja, status) VALUES('{$korisnik}', '{$nazivFirme_oglasa}','{$kategorija}','{$podkategorija}','{$tipoglasa}','{$tbtext}','{$imeprezime}','{$mail}','{$website}', '{$telefon}','{$adresa}','{$drzava}','{$grad}', '{$nazivp}', '0')");
    
    $id_oglas=mysql_insert_id();

    $maz2=mysql_query("INSERT INTO oglasi_gre(id_oglas, naziv_firme_gre, text_oglasa_gre, ime_prezime_gre, adresa_gre) VALUES({$id_oglas}, '{$nazivFirme_oglasa}', '{$tbtext}', '{$imeprezime}', '{$adresa}')");

    $maz3=mysql_query("INSERT INTO oglasi_srb(id_oglas) VALUES({$id_oglas})");

    $maz4=mysql_query("INSERT INTO deklaracija(id_oglas, naziv_firme_srb_dek, adresa_firme_srb_dek, br_reg, opis_srb, maticni_br, pib, ime_prezime_srb_dek, adresa_srb_dek, jmbg, br_licne_karte, tel, trajanje_deklaracije, id_nacin_oglasavanja) VALUES({$id_oglas}, '{$nazivfirmedeklaracija}', '{$adresadeklaracija}', '{$brregideklaracija}', '{$opisdeklaracija}', '{$maticnideklaracija}', '{$pib}', '{$imeprezimeodglica}', '{$adresaodg}', '{$jmbg}', '{$brlic}', '{$kontakt}', '{$trajanjedeklaracije}', '{$nacinoglasavanja}')");

    $maz5=mysql_query("INSERT INTO slike(id_oglas, putanja) VALUES({$id_oglas}, '{$slike}')");

    if($maz){
        $mai=$_SESSION['email'];
         $subject='Στοιχεία Λογαριασμού';
        $message='
Αξιότιμη Κυρία / Κύριε,

η αγγελία σας στάλθηκε με επιτυχία, και θα δημοσιευθεί μετά την μετάφραση στη σερβική γλώσσα από τον διαχειριστή.
Αν έχετε επιλέξει μισθωμένη αγγελία, ή διαφήμιση (banner) θα είστε σε θέση να:
-χρησιμοποιείτε τις υπηρεσίες μας,
-να σας παρέχουμε, με το αίτημά σας, περαιτέρω πληροφορίες τις οποίες χρειάζεστε  σχετικά με τη σερβική αγορά,  
και  αφορούν αποκλειστικά τις δραστηριότητες σας.
Θα έχετε τη δυνατότητα αξιοποίησης των προαναφερόμενων υπηρεσιών, καθ όλη τη διάρκεια της διαφήμισης σας, αφού λάβουμε την επιβεβαίωση πληρωμής. Η πληρωμή πρέπει να γίνει εντός 7 ημερών από την στιγμή καταχώρησης της αγγελίας / διαφήμισής σας. Σε περιπτώση μη πληρωμής, η αγγελία/διαφήμισή σας θα διαγράφεται όπως επίσης και ο λογαριασμός σας.
Για πληροφορίες σχετικά με τις τιμές των μισθωμένων αγγελιών και των διαφημιστικών πακέτων καθώς και για τις υπηρεσίες που σας προσφέρουμε, επικοινωνήστε μαζί μας στο info@hellaserb.com
Μπορείτε να εκτυπώσετε  συμπληρωμένη  τη Δήλωση  εδώ http://hellaserb.com/rs/'.$_SESSION["nazivp"].'

Σας ευχαριστούμε που χρησιμοποιείτε την διαδικτυακή πύλη HellaSerb.
';
        $headers = 'From:info@hellaserb.com' . "\r\n";
        mail($mai, $subject, $message, $headers);
        echo"uspeh";
    }
    else{
        echo"greska";
    }
}