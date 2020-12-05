<?php
session_start();

$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'webproject');

$name=$_POST['user'];
$pass=$_POST['password'];
$s="select * from register where username='$name' && password='$pass'";
  
$result=mysqli_query($con,$s);
$num=mysqli_num_rows($result);

if($num==1){
	header('location:student.html');
	
}
   else{
	header('location:Login.php');
}
?>