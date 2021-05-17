<?php
require_once("db.php");

$id=$_POST['id'];
$mych=$_POST['mych'];
$sql = "select* from bun where id= '$id' and mych='$mych'";
$q=mysqli_query($db,$sql);
while($e=mysqli_fetch_assoc($q))
$output[]=$e;
print(json_encode($output));
mysqli_close($q);
  
?>