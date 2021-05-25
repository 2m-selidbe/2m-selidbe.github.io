<?php
 $path = 'list.txt';
 if (isset($_POST['ime']) && isset($_POST['prezime']) && isset($_POST['opis']) && isset($_POST['mail']) && isset($_POST['mob'])) {
    $fh = fopen($path,"a+");
    $string = 'Ime:'.$_POST['ime'].' Prezime: '.$_POST['prezime'].' Opis '.$_POST['opis'].' Mail '.$_POST['mail'].' - '.$_POST['mob'];
    fwrite($fh,$string); // Write file
    fclose($fh); // Close file
 }
?>