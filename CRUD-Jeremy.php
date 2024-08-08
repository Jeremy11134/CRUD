<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            padding: 8px;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: blue;
            padding: 20px;
        }

        .table-container {
            padding: 60px;
        }

        .btn-container {
            display: flex;
            justify-content: center;
        }

        .btn {
            display: inline-block;
            padding: 8px 16px;
            margin-right: 8px;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            text-decoration: none;
        }

        .btn-update {
            background-color: #27ae60;
        }

        .btn-telaat {
            background-color: pink;
        }

        .btn:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>

        <?php
        require 'database-connectie-jeremy.php';
        $sql = "SELECT Naam, Klas, Minuten_te_laat, reden, ID FROM meldingen";
        $statement = $conn->query($sql);
        ?>

        <div class="table-container">
        <table>
            <tr>
                <th>Naam</th>
                <th>Klas</th>
                <th>Minuten te laat</th>
                <th>Reden</th>
                <th>Aanpassingen</th>
            </tr>

            <?php foreach ($statement as $results) { ?>
                <tr>
                    <td><?php echo $results['Naam']; ?></td>
                    <td><?php echo $results['Klas']; ?></td>
                    <td><?php echo $results['Minuten_te_laat']; ?></td>
                    <td><?php echo $results['reden']; ?></td>
                    <td>
                        <div class="btn-container">
                            <a class="btn btn-update" href="update.php?ID=<?php echo $results['ID']; ?>">Update</a>
                            <a class="btn" href="verwijderen.php?ID=<?php echo $results['ID']; ?>">Verwijderen</a>
                        </div>
                    </td>
                </tr>
                
            <?php } ?>
        </table>
    </div>

    <?php
        require 'database-connectie-jeremy.php';
        $sql = "SELECT Naam, Klas, Minuten_te_laat, reden, ID FROM meldingen";
        $statement = $conn->query($sql);
        

        // Calculate statistics
        $totalEntries = $statement->rowCount();

        $maxMinutesLate = 0;
        $totalMinutesLate = 0;

        foreach ($statement as $results) {
            $minutesLate = $results['Minuten_te_laat'];
            $maxMinutesLate = max($maxMinutesLate, $minutesLate);
            $totalMinutesLate += $minutesLate;
        }

        $averageMinutesLate = $totalMinutesLate / max(1, $totalEntries);
    ?>

    <div class="table-container">
        <p>Hoogste aantal minuten te laat: <?php echo $maxMinutesLate; ?></p>
        <p>Gemiddeld minuten te laat: <?php echo $averageMinutesLate; ?></p>
        <p>Totaal minuten te laat: <?php echo $totalMinutesLate; ?></p>
    </div>

    <form action="add-person.php" method="post">
        <input class="btn-telaat" type="submit" name="add_late" value="Weer eentje te laat">
    </form>

</body>
</html>
