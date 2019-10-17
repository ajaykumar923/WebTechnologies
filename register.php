<?php

if(isset($_POST['submit']))
// if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    include 'connect.php';
    $error1 = $error2 =$error3='';
    $un = $_POST['un'];
    $pw = $_POST['pw'];
    $cpw = $_POST['cpw'];

    if(empty($un))
    {
        $error1="empty_u"; 
        
    }
    if(empty($pw))
    {
        $error2="empty_p";
    }
    if(empty($cpw))
    {
        $error3="empty_cp";
    }

    
    if(empty($un) || empty($pw)|| empty($cpw))
    {
      
    header("Location:signup.php?err1=$error1&err2=$error2&err3=$error3");
    exit();
    }
    else
    {
        $q = "SELECT * from login where user =?";

$s = mysqli_prepare($conn,$q);
mysqli_stmt_bind_param($s,'s',$un);
mysqli_stmt_execute($s);
$result = mysqli_stmt_get_result($s);

// echo mysqli_num_rows($result);
if(mysqli_num_rows($result))
{
    header("Location:signup.php?err5=already");
    exit();
}
    }


 

}
else
{
    
    header("Location:signup.php?sfgd=xyz");
    exit();
}

// if($pw != $cpw)
// {
//     header("Location:signup.php");
//     exit();
// }






$q = "insert into login values (?,?,?);";
$s = mysqli_prepare($conn,$q);
mysqli_stmt_bind_param($s,'sss',$un,$pw,$cpw);
mysqli_stmt_execute($s);

echo "You have successfully registered :)";

?>
<a href="login.php"> Sign-in </a> </span>