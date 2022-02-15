<?php
header("content-type: text/html; charset=utf-8");

define("cars", [
"Ford",
"BMW",
"Toyota",
"Volvo",
"Auidi",
"Alfa romeo"
]);

echo cars[rand(0,5)], " is a good car.";



