<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
        $hostname="localhost";
        $username="root";
        $password="";
        $database="teodor";
        $conexiune=mysqli_connect($hostname, $username, $password) or die ("Nu mă pot conecta la baza de date");
        mysqli_select_db($conexiune, $database) or die ("Nu găsesc baza de date");
    ?>

</body>
</html>