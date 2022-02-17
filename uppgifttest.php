<?php
header("content-type: text/html; charset=utf-8");
function add_five(&$value) {
  $value += 1067532;
}

$num = 2975;
add_five($num);
echo $num;


