<?php



$s ="localhost";
$u = "root";
$p ="asish";
$db = "vit";

$con = mysqli_connect($s,$u,$p,$db);
?>
<form action="" method ='post'>
Regno:<input type ="text"  name="xyz">
<input type= "submit" name="sub">
</form>

<?php
if(isset($_POST['sub']))
{
 $v =  $_POST["xyz"];
 $q = "select * from student where regno =?";

 echo $q;
 echo  '<br>';

//  $result = mysqli_query($con,$q);

 $s = mysqli_prepare($con,$q);

 mysqli_stmt_bind_param($s,'i',$v);
 mysqli_stmt_execute($s);

 $result = mysqli_stmt_get_result($s);

if($result)
{

while($r  = mysqli_fetch_assoc($result))
{
    foreach($r as $d)
    {
        echo $d;
        echo  " ";
   }
   echo '<br>';
}

// print_r ($r);

}
}









