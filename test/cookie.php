<?php

setcookie("user","Testuser", 60*5, "/");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="voewport" content="width=device-width, initial-scale=1.0">
    <title>Doocument</title>
</head>

<body>
 
<?php
    if(!isset($_COOKIE["wsp1-user"])){
        echo "<p>Kakan är inte satt.</p>";
    }else{
        echo "<p>Kakan har värdet " . $_COOKIE["wsp1-user"];
    }
?>

</body>
</html>


