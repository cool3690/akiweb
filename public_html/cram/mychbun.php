<?php
require_once("db.php");


$sql = "select* from bun order by id DESC LIMIT 0 , 1";
$q=mysqli_query($db,$sql);
while($e=mysqli_fetch_assoc($q))
$output[]=$e;
print(json_encode($output));
mysqli_close($q);
  
?>