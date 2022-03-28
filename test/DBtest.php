<?php
require("../include/settings.php");
$dbname = "test";
try {
  $conn = new PDO("mysql:host=$servername;dbname=wsptestex", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";

$conn = null;

} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>