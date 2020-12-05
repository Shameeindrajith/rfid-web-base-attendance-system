




<?php 
if(isset($_POST['but'])){
$name=$_POST['name'];
$id=$_POST['idno'];
$date=$_POST['date'];
$time=$_POST['time'];
$reason=$_POST['reason'];


$conn=new mysqli('localhost','root','','iotproject');

if ($conn->connect_error) {
	die('Connection Faild : '.$conn->connect_error);
}
else{

	$stmt = $conn->prepare("insert into lecfree (name,id,date,time,reason) values(?,?,?,?,?)");
	$stmt->bind_param("sisss",$name,$id,$date,$time,$reason);
	$stmt->execute();
	echo"Registration Successfully";
	header('lecfreeform.html');
	$stmt->close();
	$conn->close();



}
}

?>
