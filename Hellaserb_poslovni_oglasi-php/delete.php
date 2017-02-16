<?php
$obrisi = $_POST['brisi'];
unlink("rs/images/" . $obrisi);
echo $_POST['id'];
?>