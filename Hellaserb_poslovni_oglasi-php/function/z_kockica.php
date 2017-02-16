<?php


error_reporting (E_ALL ^ E_NOTICE);

$post = (!empty($_POST)) ? true : false;

if($post)
{

$nazivFirme = stripslashes($_POST['tbNazivFirme']);
$email = trim($_POST['tbMail']);
$naslovPoruke = trim($_POST['tbNaslovPor']);
$message = stripslashes($_POST['Poruka']);


$error = '';



if(!$error)
{
$mail = mail("info@hellaserb.com", $naslovPoruke, $message,
     "From: ".$nazivFirme." <".$email.">\r\n"
    ."Reply-To: ".$email."\r\n"
    ."X-Mailer: PHP/" . phpversion());


if($mail)
{
echo 'OK';

}

}


}
?>