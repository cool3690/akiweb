<?php
require_once("db.php");
$account=$_POST['account'];
$passwd=$_POST['passwd'];
$sql = "select* from user where account= '$account' and passwd='$passwd'";
$q=mysqli_query($db,$sql);
while($e=mysqli_fetch_assoc($q))
$output[]=$e;
print(json_encode($output));
mysqli_close($q);
  
?>