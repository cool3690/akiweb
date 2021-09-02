<?php
require_once("db.php");
$date=date("Y/m/d");
	$num=$_POST['num'];
	$mych=$_POST['mych'];
$sql="select* from QandA where num='$num' and mych='$mych'";
//
	$q=mysqli_query($db,$sql);


while($e=mysqli_fetch_assoc($q))
$output[]=$e;
print(json_encode($output));
mysqli_close($q);
  
?>
