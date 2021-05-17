<?php
require_once("db.php");
$date=date("Y/m/d");
	$account=$_POST['account'];
	
$sql="select* from cart where account='$account' ";
	$q=mysqli_query($db,$sql);
while($e=mysqli_fetch_assoc($q))
$output[]=$e;
print(json_encode($output));
mysqli_close($q);
?>