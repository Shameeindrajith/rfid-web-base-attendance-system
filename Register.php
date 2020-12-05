<?php
session_start();

$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'webproject');


if(isset($_POST['logbutten'])){
$name=$_POST['user'];
$pass=$_POST['password'];
$mail=$_POST['email'];

$s="select * from register where username='$name'";
  
$result=mysqli_query($con,$s);
$num=mysqli_num_rows($result);

if($num==1){
	echo"Username Already Taken";
}
   else{
	$reg="insert into register(username,password,email) values ('$name','$pass','$mail')";
	mysqli_query($con,$reg);
	echo"Registration Successful";
}
}
?>