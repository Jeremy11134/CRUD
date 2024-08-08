<?php
require 'database-connectie-jeremy.php';

try {
    if (isset($_GET['ID'])) {
        $id = $_GET['ID'];
        $selectStmt = $conn->prepare("SELECT Naam FROM meldingen WHERE ID = :id");
        $selectStmt->bindParam(':id', $id);
        $selectStmt->execute();
        $student = $selectStmt->fetch(PDO::FETCH_ASSOC);

        if ($student) {
            $studentName = $student["Naam"];
            echo "<script>
                    var confirmDelete = confirm('Weet je zeker je wilt deze student genaamd $studentName?');
                    if (confirmDelete) {
                        window.location.href = 'verwijderen-confirm.php?ID=$id';
                    } else {
                        window.location.href = 'CRUD-jeremy.php';
                    }
                </script>";
        } else {
            echo "Geen student gevonden met de juiste ID.";
        }
    } else {
        echo "Invalid request. Vraag om een juiste ID.";
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>