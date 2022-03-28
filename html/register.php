 
 
<style>
 
 .error {color: #FF0000;}
  
 .content {
   max-width: 500px;
   margin: auto;
 }
 </style>
  
 <?php
 // define variables and set to empty values
 $nameErr = $lastnameErr = $emailErr = $genderErr = $passwordErr = $dateofbirthErr ="";
 $name = $lastname = $email = $gender = $password = $dateofbirth ="";
  
 //$t = date("l jS \of F Y h:i:s A") . "<br>";
  
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["name"])) {
     $nameErr = "Name is required";
   } else {
     $name = test_input($_POST["name"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
       $nameErr = "Only letters and white space allowed";
     }
    }
   if (empty($_POST["lastname"])) {
     $lastnameErr = "lastname is required";
   } else {
     $lastname = test_input($_POST["lastname"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z-' ]*$/",$lastname)) {
         $lastnameErr = "Only letters and white space allowed";
     }
   }
  
   if (empty($_POST["email"])) {
     $emailErr = "Email is required";
   } else {
     $email = test_input($_POST["email"]);
     // check if e-mail address is well-formed
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $emailErr = "Invalid email format";
     }
   }
    
   if (empty($_POST["password"])) {
     $passwordErr = "Password is required";
   } else {
     $password = test_input($_POST["password"]);
     // check if password have between 8-12 characters and one of them shouled be a number or character and you also need a big letter.)
     if (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/',$password)) {
       $passwordErr = "Invalid Password";
     }
   }
  
   if (empty($_POST["gender"])) {
     $genderErr = "Gender is required";
   } else {
     $gender = test_input($_POST["gender"]);
   }
  
   if (empty($_POST["dateofbirth"])) {
     $dateofbirthErr = "date of birth is required";
   } else {
     $dateofbirth = test_input($_POST["dateofbirth"]);
     if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$dateofbirth)) {
       $dateofbirthErr = "Only letters and white space allowed";
     }
   }
}
 function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
 }
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
   <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
   <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
   <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
   <span class="error">* <?php echo $genderErr;?></span>
   <br><br>
   Date Of Birth: <input type="date" id="dateofbirth" name="dateofbirth" value="<?php echo $dateofbirth;?>">
   <span class="error">* <?php echo $dateofbirthErr;?></span>
   <br><br>
   <input type="submit" name="submit" value="Submit">  
 </form>
  
 <?php
  
 echo "<h2>Account information:</h2>";
 echo $name;
 echo "<br>";
 echo $lastname;
 echo "<br>";
 echo $email;
 echo "<br>";
 echo $password;
 echo "<br>";
 echo $gender;
 echo "<br>";
 echo $dateofbirth;
 //echo "<br>"
 //echo $t;
  
 