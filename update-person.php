<?php
require 'database-connectie-jeremy.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['ID'];
    $updatedNaam = $_POST['Naam'];
    $updatedKlas = $_POST['Klas'];
    $updatedMinTelaat = $_POST['Minuten_te_laat'];
    $updatedReden = $_POST['reden'];

    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE meldingen SET Naam = :naam, Klas = :klas, Minuten_te_laat = :minTelaat, reden = :reden WHERE ID = :ID";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':naam', $updatedNaam);
        $stmt->bindParam(':klas', $updatedKlas);
        $stmt->bindParam(':minTelaat', $updatedMinTelaat);
        $stmt->bindParam(':reden', $updatedReden);
        $stmt->bindParam(':ID', $id);
        $stmt->execute();

        header("Location: CRUD-jeremy.php");
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

$conn = null;
?>
