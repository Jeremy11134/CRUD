<?php
require('database-connectie-jeremy.php');

$query1 = "SELECT Naam, Klas, Minuten_te_laat, reden, ID FROM meldingen WHERE ID=" . $_GET['ID'];

$studenten = $conn->query($query1)->fetchAll();

?>

<?php 
foreach ($studenten as $student)
echo "<form method='post' action='update-person.php?ID=" . $_GET['ID'] . "'>";
echo  "<label for='naam'>naam:</label>";
echo  "<input type='text' ID='Naam' name='Naam' value=" . $student['Naam'] . "><br>";
echo  "<label for='Klas'>klas:</label>";
echo  "<input type='text' ID='Klas' name='Klas' value=" . $student['Klas'] . "><br>";
echo  "<label for='reden'>reden:</label>";
echo  "<input type='text' ID='reden' name='reden' value=" . $student['reden'] . "><br>";
echo  "<label for='reden'>minuten te laat:</label>";
echo  "<input type='number' min='0' ID='Minuten_te_laat' name='Minuten_te_laat' value=" . $student['Minuten_te_laat'] . "><br>";
echo  "<input type='submit' value='Update' class='btn btn-primary'>";
echo  "<input type='hidden' ID='ID 'name='ID' value=" . $_GET['ID'];
echo "</form>";

?>
<?php if (isset($sql_executed_successfully)) { ?>
  <div class="alert alert-success"><?php echo "Het is gelukt !"; ?></div>
<?php } ?>

<?php 

?>

<?php if (isset($error_message)) { ?>
  <div class="alert alert-danger"><?php echo $error_message; ?></div>
<?php } ?>