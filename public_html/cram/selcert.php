<?php
require_once("db.php");
$date=date("Y/m/d");
	$account=$_POST['account'];
	$course_num=$_POST['course_num'];
	$unit=1;
$sql="select* from cart where account='$account' and course_num='$course_num'";

	$q=mysqli_query($db,$sql);


while($e=mysqli_fetch_assoc($q))
$output[]=$e;
print(json_encode($output));
mysqli_close($q);
  
?>