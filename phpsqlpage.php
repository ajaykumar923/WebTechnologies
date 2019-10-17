<html>
    <head>
</head>
<body>
<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";
$unmae=$_GET['uname'];
$upass=$_GET['upass'];


$conn = new mysqli($servername, $username, $password);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
    echo "Connected successfully";
    $sql = "SELECT pass from users where id =$uname";
    $result = $conn->query($sql)
    if ($result->num_rows == 1) {
        
        while($row = $result->fetch_assoc()) {
            if($pass ==$row['userpass'])
            {
                echo "login sucessfull"
            }
            else{
                echo " login failed wrong user credentials"
            }
        }
    }

}



?>
<form  action="$_SERVER["PHP_SELF"]" method ="GET">
    <input type="text" value="username" name="uname">
    <input type="text" value="password" name="upass">
    <button type="submit"> login</button>
</form>
</body>
</html>
