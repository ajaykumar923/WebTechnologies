
<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $emailErr = $pwdErr = $cnfpwdErr = $phErr = "";
$name = $email = $password = $cnfpassword = $phonenumber=$matcherr = "";

$link = mysqli_connect("localhost", "root", "", "agriculture");
 

if (isset($_POST['Submit'])) {
  $name=$_POST("name");
  $email = $_POST["email"];
  $password = $_POST["password"];
  $cnfpassword = $_POST["cpassword"];
  $phonenumber =  $_POST["phonenumber"];

  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } 
  else if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } 
  else if (empty($_POST["password"])) {
    $pwdErr = "Password is required";
  }
  }
  else if (empty($_POST["cpassword"])) {
    $cnfpwdErr = "Confirmation of password is required";
  }
  else if (empty($_POST["phonenumber"])) {
    $phErr = "Phone number is required";
  } 
  else if($password!=$cnfpassword){
    $matcherr="Password and confirm password dont match";
  }
  else{
    if($link === false){
      die("ERROR: Could not connect. " . mysqli_connect_error());
  }
  $sql = "INSERT INTO login(name,email,password,reenterpassword,phonenumber) VALUES (?, ?, ?, ?, ?); ";
  $s=mysqli_prepare($link,$sql);
  $stmt=mysqli_stmt_bind_param($s, 'ssssi', $name, $email, $password, $cnfpassword, $phonenumber);
   // Attempt to execute the prepared statement
mysqli_stmt_execute($stmt);
 mysqli_close($link);  

?>
<html>
<body>

<h2>Agriculture Information System</h2>
<p><span class="error">* required field</span></p>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Password: <input type="password" name="password">
  <span class="error">* <?php echo $pwdErr;?></span>
  <br><br>
  Re-enter password: <input type="password" name="cpassword">
  <span class="error">* <?php echo $cnfpwdErr;?></span>
  <br><br>
  Phone number: <input type="text" name="phonenumber">
  <span class="error">* <?php echo $phErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
  <br>
  <a href="signup.php">Sign in</a>
</form>

</body>
</html>
