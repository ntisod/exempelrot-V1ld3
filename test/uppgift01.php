
<?php
header("content-type: text/html; charset=utf-8");
if(empty($_GET ['namn'])){
    echo '<h1>Välkommen!</h1>';
}
else{
    $namn=filter_input(INPUT_GET, 'namn');
    echo "<h1>Välkommen {$namn} !</h1>";
    echo "<p>Namnet $namn inehåller" , strlen($namn) , "tecken.<p>";
    echo strrev($namn);
}