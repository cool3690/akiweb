<?php
require_once("db.php");


$mych=$_POST['mych'];
$sql = "select* from QandA where  mych='$mych' order by num ASC";
$q=mysqli_query($db,$sql);
while($e=mysqli_fetch_assoc($q))
$output[]=$e;
print(json_encode($output));
mysqli_close($q);
  
?>