<?php
setlocale(LC_TIME, "sv_SE"); 
$date = strftime('%A %B %d %Y', mktime(20,0,0,5,31,98)). " klockan är " . strftime('%X');
echo "Idag är det ", $date;
//%A %e %B 
