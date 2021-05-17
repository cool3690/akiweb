<?php
require_once("db.php");


$mych=$_POST['mych'];
$sql = "select* from bun where  mych='$mych' order by id ASC";
$q=mysqli_query($db,$sql);
while($e=mysqli_fetch_assoc($q))
$output[]=$e;
print(json_encode($output));
mysqli_close($q);
  
?>