<?php
require 'database-connectie-jeremy.php';

try {
    if (isset($_GET['ID'])) {
        $id = $_GET['ID'];
        $stmt = $conn->prepare("DELETE FROM meldingen WHERE ID = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            echo "Student successfully deleted.";
        } else {
            echo "No student found with the provided ID.";
        }
    } else {
        echo "Invalid request. Please provide a valid student ID.";
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
header("Location: CRUD-jeremy.php");
$conn = null;
?>
