<?php
require_once("db.php");
$date=date("Y/m/d");
	$code=$_POST['code'];
	
$sql="select* from findjob where code='$code' ";
	$q=mysqli_query($db,$sql);
while($e=mysqli_fetch_assoc($q))
$output[]=$e;
print(json_encode($output));
mysqli_close($q);
?>