<?php

$Naam = $_POST['Naam'];
$Klas = $_POST['Klas'];
$Minuten_te_laat = $_POST['Minuten_te_laat'];
$reden = $_POST['reden'];

$servername = "localhost";
$database = "te laat meldingen";
$username = "root";
$password = "";

$sql = "INSERT INTO meldingen (Naam, Klas, , Minuten_te_laat, reden)
        Values ('$Naam', '$Klas', '$Minuten_te_laat', '$reden')";


$conn->exec($sql);
$conn = null;

?>