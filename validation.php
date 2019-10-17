

<?php

$nameErr = $emailErr = $pwdErr = $cnfpwdErr = $phErr = "";
$name = $email = $password = $cnfpassword = $phonenumber = "";

if(isset($_POST['Submit'])){

  $emp_name=trim($_POST["emp_name"]);
  $emp_number=trim($_POST["emp_number"]);
  $emp_email=trim($_POST["emp_email"]);

  if($emp_name =="") {
    $errorMsg=  "error : You did not enter a name.";
    $code= "1" ;
  }
  elseif($emp_number == "") {
    $errorMsg=  "error : Please enter number.";
    $code= "2";
  }
  //check if the number field is numeric
  elseif(is_numeric(trim($emp_number)) == false){
    $errorMsg=  "error : Please enter numeric value.";
    $code= "2";
  }
  elseif(strlen($emp_number)<10){
    $errorMsg=  "error : Number should be ten digits.";
    $code= "2";
  }
  //check if email field is empty
  elseif($emp_email == ""){
    $errorMsg=  "error : You did not enter a email.";
    $code= "3";
} //check for valid email 
elseif(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $emp_email)){
  $errorMsg= 'error : You did not enter a valid email.';
  $code= "3";
}
else{
  echo "Success";
  //final code will execute here.
}
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
