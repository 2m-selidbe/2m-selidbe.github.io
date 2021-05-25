<?php
 $path = '../../admin/lists/txt/narudbe.txt';
 if (
    isset($_POST['placanje'])
    {

    $fh = fopen($path,"a+");

    $string = PHP_EOL.
    ' Nacin placanja: '.$_POST['placanje'];


    fwrite($fh,$string); // Write file
    fclose($fh); // Close file
 }
 header("Location:../../index.html");
?>