<?php
header("content-type: text/html; charset=utf-8");


$pl = array("Peter"=>"5", "Ben"=>"55", "Joe"=>"45", "adam"=>"25", "Jonas"=>"35");
arsort($pl);

echo "<ol>";
foreach($pl as $x => $x_value){
    echo "" . $x . " points= " . $x_value;
    echo "<br>";
}