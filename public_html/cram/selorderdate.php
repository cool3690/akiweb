<?php
require_once("db.php");
//$date=date("Y/m/d");

$sql="select* from aorder order by order_num desc limit 1 ";
	$q=mysqli_query($db,$sql);
while($e=mysqli_fetch_assoc($q))
$output[]=$e;
print(json_encode($output));
mysqli_close($q);
?>