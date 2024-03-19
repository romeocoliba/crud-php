
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title>Document</title>
    <style>
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }

    .container {
        max-width: 1440px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }


    th, td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #f5f5f5;
    }

    a {
        text-decoration: none;
        color: #3498db;
    }

    a:hover {
        color: #2980b9;
    }

    table tr th{
        width: 150px !important;
    }
    .link a{
        display: flex;
        align-items:center;
    }
</style>


</head>
<body>

<div class="container">

    <div class="flex">
        <div class="link">
            <a href="add.php"><span class="material-symbols-outlined">add_circle</span>Create</a>
        </div>
    </div>

    <?php
    include("conexiune.php");

    $sql = mysqli_query($conexiune, "SELECT * FROM `elevi`");
    echo "<table>";
    echo "<tr><th>Id</th><th>Nume</th><th>Prenume</th><th>Adresa</th><th>Email</th><th>Data nasterii</th><th>Sex</th><th>Media bac</th><th class='wii'>Actiuni</th></tr>";
    while ($row = mysqli_fetch_row($sql)) {
        echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[7]</td><td><a href='delete.php?id=$row[0]'><span class='material-symbols-outlined'>delete</span></a><a href='edit.php?id=$row[0]'><span class='material-symbols-outlined'>edit_square</span></a><a href='details.php?id=$row[0]'><span class='material-symbols-outlined'>info</span></a></td></tr>";
    }
    echo "</table>";

    mysqli_close($conexiune);
    ?>

</div>

</body>
</html>
