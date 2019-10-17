<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .lbl {
            display: inline-block;
            width: 100px;
            margin-top:10px;
        }
        input,textarea
        {
            margin-top:10px;
        }
        span{
            margin:3px;
            color:red;
            }
    </style>
    <title>Document</title>
</head>
<?php
$nameErr = $mailErr = $genErr = "";
$name = $email = $message = $gender =  "";
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
        if (empty($_POST["name"]))
        {
            $nameErr = "Name is required";
        } else {
            $name =  $_POST["name"];
        }  
        if (empty($_POST["email"]))
        {
            $mailErr = "Mail is required";
        } else {
            $email =  $_POST["email"];
        }  
        if (empty($_POST["gender"]))
        {
            $genErr = "Gender is required";
        } else {
            $gender =  $_POST["gender"];
        }  

        $message = $_POST["msg"];
}
?>
<body>
    <form action="formvalidate.php" method="post">
        <label class="lbl">Name</label>
        <input type="text" name = "name"><span>*<?php echo $nameErr;?></span><br>
        <label class="lbl">Email</label>
        <input type="text" name = "email"><span>*<?php echo $mailErr;?></span><br>
        <label class="lbl">Gender</label>
        <input type="radio" name = "gender" value="Male">Male</input>
        <input type="radio" name = "gender" value="female">Female</input><span>*<?php echo $genErr;?></span>
        <br>
        <label class="lbl">Message</label>
        <textarea type="text"name = "msg"> </textarea><br>

        <button>Submit</button>
    </form>
</body>


<?php

echo $name;
echo "<br>";

echo $email;
echo "<br>";

echo $gender;
echo "<br>";

echo $message;
echo "<br>";

?>
</html>