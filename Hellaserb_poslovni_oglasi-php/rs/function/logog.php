<?php
@session_start();
if (isset($_SESSION['fail'])){
    unset($_SESSION['fail']);
}



    $email = trim($_POST['email']);
    $w = $_POST['pass'];
    $a = md5($w);

    include('../konekcija.php');
    $upit = "SELECT * FROM korisnici WHERE email='$email' and password='$a'";
    $rez = mysql_query($upit, $konekcija) or die(mysql_error());

    if ($niz = mysql_fetch_array($rez)) {
       
        $_SESSION['email'] = $niz['email'];
        $nik = array();
        $nik = explode("@", $_SESSION['email']);
        $_SESSION['nik'] = $nik[0];
        $_SESSION['uloga'] = $niz['uloga'];
        $_SESSION['id_korisnik']=$niz['id_korisnik'];
        unset($_SESSION['fail']);
        echo 'uspeh';
    } else {
        $_SESSION['fail'] = "jojapaor";

        echo '<h4 style="color:red;">Novi ste korisnik?</h4>';

        echo '<h4 style="color:red;">Netačan email ili lozinka!</h4>';

        echo '<a href="promena_lozinke.php"><h4 style="color:red;">Zaboravili ste Vašu lozinku?</h4></a>';
    }






?>