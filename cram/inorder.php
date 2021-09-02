<?php
require_once("db.php");
$date=date("Y/m/d");
	$account=$_POST['account'];
	$course_num=$_POST['course_num'];
	$unit=$_POST['unit'];
	$order_id=$_POST['order_id'];
	$order_num=$_POST['order_num'];
$sql="insert into aorder (order_num,order_id,sdate,account,course_num,unit) values ('$order_num','$order_id','$date','$account','$course_num','$unit')";
if($account!=null){
	$q=mysqli_query($db,$sql);
}

while($e=mysqli_fetch_assoc($q))
$output[]=$e;
print(json_encode($output));
mysqli_close($q);
  
?>

