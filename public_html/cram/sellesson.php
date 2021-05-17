<?php
require_once("db.php");

$lessons=$_POST['lessons'];
$sql = "select* from lesson where lessons= '$lessons' ";
$q=mysqli_query($db,$sql);
while($e=mysqli_fetch_assoc($q))
$output[]=$e;
print(json_encode($output));
mysqli_close($q);
  
?>