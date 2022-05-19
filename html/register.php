<?php
require("../include/settings.php");

 // define variables and set to empty values
 $nameErr = $lastnameErr = $emailErr = $genderErr = $passwordErr = $dateofbirthErr ="";
 $name = $lastname = $email = $gender = $password = $dateofbirth ="";
  
 //$t = date("l jS \of F Y h:i:s A") . "<br>";
 $errors = 0;
  
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["name"])) {
     $nameErr = "Name is required";
     $errors++;
   } else {
     $name = test_input($_POST["name"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
       $nameErr = "Only letters and white space allowed";
       $errors++;
     }
    }
   if (empty($_POST["lastname"])) {
     $lastnameErr = "lastname is required";
     $errors++;
   } else {
     $lastname = test_input($_POST["lastname"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z-' ]*$/",$lastname)) {
         $lastnameErr = "Only letters and white space allowed";
         $errors++;
     }
   }
  
   if (empty($_POST["email"])) {
     $emailErr = "Email is required";
     $errors++;
   } else {
     $email = test_input($_POST["email"]);
     // check if e-mail address is well-formed
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $emailErr = "Invalid email format";
       $errors++;
     }
   }
    
   if (empty($_POST["password"])) {
     $passwordErr = "Password is required";
     $errors++;
   } else {
     $password = test_input($_POST["password"]);
     // check if password have between 8-12 characters and one of them shouled be a number or character and you also need a big letter.)
     if (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/',$password)) {
       $passwordErr = "Invalid Password";
       $errors++;
     }
   }
  
   if (empty($_POST["gender"])) {
     $genderErr = "Gender is required";
     $errors++;
   } else {
     $gender = test_input($_POST["gender"]);
   }
  
   if (empty($_POST["dateofbirth"])) {
     $dateofbirthErr = "date of birth is required";
     $errors++;
   } else {
     $dateofbirth = test_input($_POST["dateofbirth"]);
     if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$dateofbirth)) {
       $dateofbirthErr = "Only letters and white space allowed";
       $errors++;
     }
   }

    echo "Errors: $errors" ;
    if($errors<1){
    
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "INSERT INTO users (name, lastname, email, password, gender, dateofbirth)
      VALUES ('$name', '$lastname', '$email' , '$password', '$gender', '$dateofbirth')";
      $conn->exec($sql);
      echo "Acount created successfully";
    } catch(PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }
  }
}
 function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
 }

 include("../template/head.php");

 ?>
 <div class="content">
 <h1>Register account</h1>
 <p><span class="error">* required field</span></p>
 <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
   Name: <input type="text" name="name" value="<?php echo $name;?>">
   <span class="error">* <?php echo $nameErr;?></span>
   <br><br>
   Lastname: <input type="text" name="lastname" value="<?php echo $lastname;?>">
   <span class="error">* <?php echo $lastnameErr;?></span>
   <br><br>
   E-mail: <input type="text" name="email" value="<?php echo $email;?>">
   <span class="error">* <?php echo $emailErr;?></span>
   <br><br>
   Password: <input type="password" name="password" value="<?php echo $password;?>">
   <span class="error">* <?php echo $passwordErr;?></span>
   <br><br>
   Gender:
   <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="2">Female
   <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="1">Male
   <input type="radio" name="gender" <?php if (isset($gender) && $gender=="unspecified") echo "checked";?> value="3">Unspecified  
   <span class="error">* <?php echo $genderErr;?></span>
   <br><br>
   Date Of Birth: <input type="date" id="dateofbirth" name="dateofbirth" value="<?php echo $dateofbirth;?>">
   <span class="error">* <?php echo $dateofbirthErr;?></span>
   <br><br>
   <input type="submit" name="submit" value="Submit">  
 </form>

 <?php include("../template/foot.php"); ?>
 