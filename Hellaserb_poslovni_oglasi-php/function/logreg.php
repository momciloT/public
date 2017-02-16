<?php
@session_start();
if (isset($_SESSION['fail'])){
    unset($_SESSION['fail']);
}
$email = trim($_POST['email']);

$regex = "/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/";
if ( preg_match( $regex, $email ) ) {

    $w = $_POST['pass'];
    $a = md5($w);

    include('../konekcija.php');
    $upit1 = "SELECT email FROM korisnici WHERE email='$email'";
    $rez1 = mysql_query($upit1, $konekcija) or die(mysql_error());
    $podatak = mysql_fetch_row($rez1);
    if ($podatak == '') {
        $hash = md5(rand(0, 1000));

        $upit2 = "INSERT INTO korisnici (email,password,uloga,aktivan,zakljucan_otkljucan) VALUES ('$email','$a','0','$hash','0')";
        $rez2 = mysql_query($upit2, $konekcija) or die(mysql_error());
        if ($rez2) {
            $subject = 'Στοιχεία Λογαριασμού ';
            $message = '
Αξιότιμη Κυρία / Κύριε,

Η εγγραφή σας ολοκληρώθηκε με επιτυχια.

Για να ενεργοποιήσετε  το λογαριασμό σας ακολουθήστε τον παρακάτω σύνδεσμο:
<a href="http://www.hellaserb.com/verify.php?email=' . $email . '&hash=' . $hash . '">AKTIVACIJA</a>

Μετά την ενεργοποίηση  μπορείτε να συνδεθείτε χρησιμοποιώντας το ακόλουθο.

------------------------
Email: ' . $email . '
Κωδικός: ' . $w . '
------------------------

Σας ευχαριστούμε που χρησιμοποιείτε την διαδικτυακή πύλη HellaSerb.

';
            $headers = 'From:info@hellaserb.com' . "\r\n";
            mail($email, $subject, $message, $headers);
            $_SESSION['email'] = $email;
            $nik = array();
            $nik = explode("@", $_SESSION['email']);
            $_SESSION['nik'] = $nik[0];
            $_SESSION['uloga'] = '0';
            unset($_SESSION['fail']);
            echo 'uspeh';
        }
    } else {

        echo "<h4 style='color:red;'>Χρήστης με αυτή τη διεύθυνση ηλεκτρονικού ταχυδρομείου υπάρχει ήδη!</h4>";

    }
}
else{
    echo "<h4 style='color:red;'>Μη έγκυρη διεύθυνση e-mail!</h4>";
}



?>