<?php
require("../include/settings.php");

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO users (name, lastname, email, password, gender, dateofbirth)
  VALUES ('John', 'Doe', 'john@example.com' , '123', 'male', '2000-02-20')";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo "Acount created successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>
