<?php
header ("content-type: text/html; charset=utf-8");
$t = date("H");
//$t = 19; //test code
if ($t <= "8" ){
    echo "Good morgon!";
}
elseif ($t < "12" ){
    echo "good förmiddag!";
}
elseif ($t < "19"  ){
    echo "Good eftermiddag!";
}
else {
    echo "Good kväll!";
  }