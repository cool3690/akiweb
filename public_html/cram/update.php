<?php
require_once("db.php");
$date=date("Y/m/d");
	$account="0912";
	$course_num=$_POST['course_num'];
	$unit=1;
$sql="update user set  account='$account' where account='0911'";

	$q=mysqli_query($db,$sql);


while($e=mysqli_fetch_assoc($q))
$output[]=$e;
print(json_encode($output));
mysqli_close($q);
  
?>