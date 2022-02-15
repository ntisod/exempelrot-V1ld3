<?php
header ("content-type: text/html; charset=utf-8");
$t = date("H");

if ($t < "9" ){
    echo "Good morgon!";
}
else{
    if ($t < "12" ){echo "good förmiddag!";}
}
else{
if ($t < "19" ){echo "Good eftermiddag!";}
}
   else {echo "Good kväll!";}