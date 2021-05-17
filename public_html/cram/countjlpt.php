<?php
require_once("db.php");
//$date=date("Y/m/d");
	//$sign=$_POST['sign'];
//	$date=$_POST['date'];
$sql="select* from cjlpt";
// where sign='$sign' and date='$date'
	$q=mysqli_query($db,$sql);


while($e=mysqli_fetch_assoc($q))
$output[]=$e;
print(json_encode($output));
mysqli_close($q);
  
?>