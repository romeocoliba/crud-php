<!-- delete.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title>Delete Page</title>
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
        $idToDelete = mysqli_real_escape_string($conexiune, $_GET["id"]);

        $sql = "DELETE FROM `elevi` WHERE `Id` = $idToDelete";
        if (mysqli_query($conexiune, $sql)) {
            echo "<p>Record deleted successfully!</p>";
        } else {
            echo "<p>Error deleting record: " . mysqli_error($conexiune) . "</p>";
        }
    }

    mysqli_close($conexiune);
    ?>

    <a href="insert.php">Go Back</a>

</div>

</body>
</html>
