<!-- add.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title>Add Record</title>
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

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {

        $nume = mysqli_real_escape_string($conexiune, $_POST["nume"]);
        $prenume = mysqli_real_escape_string($conexiune, $_POST["prenume"]);
        $adres = mysqli_real_escape_string($conexiune, $_POST["adres"]);
        $email = mysqli_real_escape_string($conexiune, $_POST["email"]);
        $data_nasterii = mysqli_real_escape_string($conexiune, $_POST["data_nasterii"]);
        $sex = mysqli_real_escape_string($conexiune, $_POST["sex"]);
        $media_bac = mysqli_real_escape_string($conexiune, $_POST["media_bac"]);

        $sql = "INSERT INTO `elevi` (`Nume`, `Prenume`, `Adresa`, `Email`, `Data_Nasterii`, `Sex`, `Media_Bac`) VALUES ('$nume', '$prenume', '$adres', '$email', '$data_nasterii', '$sex', '$media_bac')";

        if (mysqli_query($conexiune, $sql)) {
            echo "<h2>Record added successfully!</h2>";
        } else {
            echo "<p>Error adding record: " . mysqli_error($conexiune) . "</p>";
        }
    }   

    mysqli_close($conexiune);
    ?>

    <form action="add.php" method="post">
        <label for="nume">Nume:</label>
        <input type="text" name="nume" required>

        <label for="prenume">Prenume:</label>
        <input type="text" name="prenume" required>

        <label for="adres">Adresa:</label>
        <input type="text" name="adres" required>

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="data_nasterii">Data Nasterii:</label>
        <input type="date" name="data_nasterii" required>

        <label for="sex">Sex:</label>
        <input type="text" name="sex" required>

        <label for="media_bac">Media Bac:</label>
        <input type="text" name="media_bac" required>

        <input type="submit" name="submit" value="Add Record">
    </form>

    <a href="insert.php">Go back</a>

</div>

</body>
</html>
