<?php
require 'database-connectie-jeremy.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $class = $_POST['class'];
    $minutes_late = $_POST['minutes_late'];
    $reason = $_POST['reason'];

    $sql = "INSERT INTO meldingen (Naam, Klas, Minuten_te_laat, reden) VALUES (:name, :class, :minutes_late, :reason)";

    $statement = $conn->prepare($sql);
    $statement->bindParam(':name', $name);
    $statement->bindParam(':class', $class);
    $statement->bindParam(':minutes_late', $minutes_late);
    $statement->bindParam(':reason', $reason);

    if ($statement->execute()) {
        echo "Persoon toegevoegd.";
    } else {
        echo "Er is iets misgegaan bij het toevoegen.";
    }
}

header("Location: CRUD-jeremy.php");

$conn = null;
?>


