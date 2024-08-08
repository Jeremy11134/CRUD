<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: lightgreen;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        form label {
            display: block;
            margin-bottom: 5px;
        }

        form input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        form input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: Royalblue;
            color: #fff;
            border: none;
            border-radius: 4px;
        }

        form input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>

</head>
<body>
    <form name="addPersonForm" action="save.person.php" method="POST" onsubmit="return validateForm();">
        <label for="name">Naam:</label>
        <input type="text" name="name" required>

        <label for="class">Klas:</label>
        <input type="text" name="class" required>

        <label for="minutes_late">Minuten_te_laat:</label>
        <input type="number" name="minutes_late" required>

        <label for="reason">reden:</label>
        <input type="text" name="reason" required>

        <input type="submit" value="Toevoegen">
    </form>
</body>
</html>