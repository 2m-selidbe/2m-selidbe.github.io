<?php
 $path = '../../admin/lists/txt/narudbe.txt';
 if (
    isset($_POST['ime']) && 
    isset($_POST['mail']) && 
    isset($_POST['predmet']) && 
    isset($_POST['opis'])) {

    $fh = fopen($path,"a+");

    $string = PHP_EOL.
    '#############################'.PHP_EOL.
    'Ime:'.$_POST['ime'].PHP_EOL.
    ' E-Mail: '.$_POST['mail'].PHP_EOL.
    ' Telefon: '.$_POST['tel'].PHP_EOL.
    ' Predmet: '.$_POST['predmet'].PHP_EOL.
    ' Opis: '.$_POST['opis'];


    fwrite($fh,$string); // Write file
    fclose($fh); // Close file
 }
 header("Location:../../order_done.html");
?>