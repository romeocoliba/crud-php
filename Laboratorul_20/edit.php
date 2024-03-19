<!-- edit.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title>Edit Record</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #3498db;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-top: 10px;
            color: #333;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #3498db;
            color: #fff;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            text-decoration: none;
            color: #fff;
            background-color: #3498db;
            border-radius: 5px;
        }

        a:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>

<div class="container">

    <?php
    include("conexiune.php");

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
        $idToEdit = mysqli_real_escape_string($conexiune, $_GET["id"]);

        $sql = "SELECT * FROM `elevi` WHERE `id` = $idToEdit";
        $result = mysqli_query($conexiune, $sql);

        if ($row = mysqli_fetch_assoc($result)) {
            echo "<h2>Edit Record #{$row['id']}</h2>";

            echo "<form action='update.php' method='post'>";
            echo "<input type='hidden' name='id' value='{$row['id']}'>";

            echo "<label for='nume'>Nume:</label>";
            echo "<input type='text' name='nume' value='{$row['nume']}' required>";

            echo "<label for='prenume'>Prenume:</label>";
            echo "<input type='text' name='prenume' value='{$row['prenume']}' required>";

            echo "<label for='adresa'>Adresa:</label>";
            echo "<input type='text' name='adresa' value='{$row['adresa']}'>";

            echo "<label for='email'>Email:</label>";
            echo "<input type='email' name='email' value='{$row['email']}'>";

            echo "<label for='data_nasterii'>Data Nasterii:</label>";
            echo "<input type='date' name='data_nasterii' value='{$row['data_nasterii']}'>";

            echo "<label for='sex'>Sex:</label>";
            echo "<select name='sex'>";
            echo "<option value='M' " . (($row['sex'] === 'M') ? 'selected' : '') . ">Masculin</option>";
            echo "<option value='F' " . (($row['sex'] === 'F') ? 'selected' : '') . ">Feminin</option>";
            echo "</select>";

            echo "<label for='media_bac'>Media Bac:</label>";
            echo "<input type='text' name='media_bac' value='{$row['media_bac']}'>";


            echo "<input type='submit' name='submit' value='Update Record'>";
            echo "</form>";

            echo "<a href='insert.php'>Go back</a>";
        } else {
            echo "<p>Record not found!</p>";
        }
    }

    mysqli_close($conexiune);
    ?>

</div>

</body>
</html>
