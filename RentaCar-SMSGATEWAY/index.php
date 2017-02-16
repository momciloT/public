<?php

mb_internal_encoding("UTF-8");
mb_http_output('UTF-8');
$phone=$_REQUEST["phone"];
$smscenter=$_REQUEST["smscenter"];
$text=rawurldecode($_REQUEST["text"]);
$headers=getallheaders();

if(empty($phone)){
    $phone=$headers['phone'];
}
if(empty($smscenter)){
    $phone=$headers['smscenter'];
}
if(empty($text) || strlen($text) == 0 || $text == "")
{
    send("Poslali ste praznu poruku. Za vise informacija posaljite 'info' ili 'help'.");
}
else {
    $msg = strtolower($text);
    $msgtp=explode(' ',trim($msg));
    $msg1=$msgtp[0];
    switch ($msg1) {
        case"info":info();
            break;
        case"help":info();
            break;
        case"stanje":stanje();
            break;
        case"rezervisi":rezervisi($msgtp,$phone);
            break;
        case"otkazi":otkazi($msgtp);
            break;
        case"klasa":klasa($msgtp);
            break;
		case"klase":klase();
            break;
		case"detalji":detalji($msgtp);
            break;
        default: send("Pogresno formirana poruka.  Za vise informacija posaljite 'info' ili 'help'. ");break;

    }
}

function info(){
    send('Spisak funkcija:
    "stanje"(Za raspolozive automobile),
 "rezervisi_xx"(Za rezervaciju konkretnog automobila, gde je xx redni broj automobila),
 ');
}


function stanje(){
    $con=conn();
    $query="SELECT * FROM automobil WHERE dostupnost=1";
    $result=mysql_query($query,$con)or die ("Upit nije uspeo".mysql_error());

    if(mysql_num_rows($result)!==0)
    {
        $sms="";
        while ($red = mysql_fetch_array($result)){
            $sms.="ID-".$red['id_automobila'].", Marka-".$red['marka'].", Naziv-".$red['naziv'].", Boja-".$red['boja']." ";

        }
        $sms.="Za rezervaciju posaljite 'rezervisi X' gde je x ID automobila";

    }
    else
    {
        $sms="Nema dostupnih automobila";
    }


    send($sms);
}

function rezervisi($msg,$ph){
    $con=conn();
    $query="SELECT * FROM automobil WHERE dostupnost=1 AND id_automobila=".$msg[1];
    $result=mysql_query($query,$con)or die ("Upit nije uspeo".mysql_error());
    if($result)
    {
        if(mysql_num_rows($result)!==0)
        {
            $kod=generisiSifru(4);
            $query1="INSERT INTO rezervacija VALUES ($msg[1],'','$kod',$ph)";
            $result1=mysql_query($query1,$con)or die ("Upit nije uspeo".mysql_error());
            if($result1){
                $query2="UPDATE automobil SET dostupnost=0 WHERE id_automobila=".$msg[1];
                $result2=mysql_query($query2,$con)or die ("Upit nije uspeo".mysql_error());

                send("Rezervisali ste automobil ".$msg[1]." i vas kod je ".$kod);
            }


        }
        else
        {
            send("Nepostojeci automobil ili je vec rezervisan. Pogledajte dostupne autmobile porukom 'stanje' ");
        }
    }
    disc($con);

}

function otkazi($msg){
    $con=conn();
    $q1="SELECT id_automobila FROM rezervacija WHERE kod_rezervacije='".$msg[1]."'";
    $result1=mysql_query($q1,$con)or die ("Upit nije uspeo".mysql_error());
    $id=mysql_fetch_array($result1,MYSQLI_NUM);
    if($id[0]) {
        $q2 = "UPDATE automobil SET dostupnost=1 WHERE id_automobila=".$id[0];
        $result2 = mysql_query($q2, $con) or die ("Upit nije uspeo" . mysql_error());
        $q3="DELETE FROM rezervacija WHERE kod_rezervacije='".$msg[1]."'";
        $result3 = mysql_query($q3, $con) or die ("Upit nije uspeo" . mysql_error());
        send("Uspesno ste otkazali rezervaciju");
    }
    else{
        send("Nepostojeca rezervacija proverite kod i pokusajte ponovo. Hvala");
    }
    disc($con);
}


function klasa($msg){
	$ms=strtoupper($msg[1]);
    $con=conn();
    $q1="SELECT * FROM automobil WHERE klasa='".$ms."'";
    $result=mysql_query($q1,$con)or die ("Upit nije uspeo".mysql_error());
    if($result)
    {
        if(mysql_num_rows($result)!==0)
        {
            $sms="";
            while ($red = mysql_fetch_array($result)){

                $sms.="ID-".$red['id_automobila'].", Marka-".$red['marka'].", Naziv-".$red['naziv']."";

            }
            $sms.="Za rezervaciju posaljite 'rezervisi X' gde je X ID automobila";

        }
        send($sms);
    }else{
        send("Pogresno formirana poruka.Za vise informacija posaljite 'info' ili 'help'. ");
    }

    disc($con);

}

function klase(){
	
    $con=conn();
    $q1="SELECT * FROM automobil";
    $result=mysql_query($q1,$con)or die ("Upit nije uspeo".mysql_error());
    if($result)
    {
        if(mysql_num_rows($result)!==0)
        {
            $sms="";
            while ($red = mysql_fetch_array($result)){

                $sms.=$red['klasa']." ";

            }
            $sms2="Raspolozive klase automobila - ".$sms;

        }
        send($sms2);
    }else{
        send("Pogresno formirana poruka.Za vise informacija posaljite 'info' ili 'help'. ");
    }

    disc($con);

}

function detalji($msg){
	
    $con=conn();
    $q1="SELECT * FROM automobil WHERE id_automobila='".$msg[1]."'";
    $result=mysql_query($q1,$con)or die ("Upit nije uspeo".mysql_error());
    if($result)
    {
        if(mysql_num_rows($result)!==0)
        {
            $sms="";
            while ($red = mysql_fetch_array($result)){

                 $sms.="ID-".$red['id_automobila'].",Marka-".$red['marka'].",Naziv-".$red['naziv'].",Boja-".$red['boja'].",Kubikaza-".$red['kubukaza'].",Klasa-".$red['klasa'].",Broj sedista-".$red['broj_sedista'];

            }
           

        }
        send($sms);
    }else{
        send("Pogresno formirana poruka.Za vise informacija posaljite 'info' ili 'help'. ");
    }

    disc($con);

}




function send($tmp){
    $odg=rawurlencode($tmp);
    header("Content-Type: text/html; charset=utf-8");
    header("text: ".$odg);
}

function generisiSifru($length)
{
    $characters ='0123456789abvgdezasfgoqq';
    $charactersLength =   strlen  ($characters);
    $randomString='';
    for( $i=0;$i<$length;$i++)
    {
        $randomString .= $characters[ rand (0 ,$charactersLength - 1 )];
    }
    return  $randomString;
}

function conn(){
    $host='mysql3.000webhost.com';
    $korisnik='a7804391_moma';
    $lozinka='moma.123';
    $konekcija=mysql_connect($host,$korisnik,$lozinka)or die('Konekcija nije uspela.'.mysql_error());
    $baza=mysql_select_db('a7804391_rent',$konekcija)or die('baza nije selektovana'.mysql_error());
    mysql_query("SET NAMES utf8");
    return $konekcija;

}

function disc($conn){
    mysql_close($conn);
}
/*
 $mysql_host = "mysql3.000webhost.com";
$mysql_database = "a7804391_rent";
$mysql_user = "a7804391_moma";
$mysql_password = "moma.ict";
 */
?>