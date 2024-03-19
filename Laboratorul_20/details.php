<!-- details.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title>Details Page</title>
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

        p {
            margin: 10px 0;
            color: #333;
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
        $idToShow = mysqli_real_escape_string($conexiune, $_GET["id"]);

        $sql = "SELECT * FROM `elevi` WHERE `id` = $idToShow";
        $result = mysqli_query($conexiune, $sql);

        if ($row = mysqli_fetch_assoc($result)) {
            echo "<h2>Details for Record #{$row['id']}</h2>";
            echo "<p>Nume: {$row['nume']}</p>";
            echo "<p>Prenume: {$row['prenume']}</p>";
            echo "<p>Adresa: {$row['adresa']}</p>";
            echo "<p>Email: {$row['email']}</p>";
            echo "<p>Data Nasterii: {$row['data_nasterii']}</p>";
            echo "<p>Sex: {$row['sex']}</p>";
            echo "<p>Media bac: {$row['media_bac']}</p>";
        } else {
            echo "<p>Record not found!</p>";
        }
    }

    mysqli_close($conexiune);
    ?>

    <a href="insert.php">Go back</a>

</div>

</body>
</html>
