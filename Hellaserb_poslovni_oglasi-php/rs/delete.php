<?php
$obrisi = $_POST['brisi'];
unlink("images/" . $obrisi);
echo $_POST['id'];
?>