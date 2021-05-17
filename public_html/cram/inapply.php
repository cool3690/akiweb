<?php
require_once("db.php");
$date=date("Y/m/d");
	$account=$_POST['account'];
	$passwd=$_POST['passwd'];
	$name=$_POST['name'];
	$email=$_POST['email'];
	
$sql="insert into user (account,passwd,name,email,user_authorize) values ('$account','$passwd','$name','$email','1')";
if($account!=null){
	$q=mysqli_query($db,$sql);
}

while($e=mysqli_fetch_assoc($q))
$output[]=$e;
print(json_encode($output));
mysqli_close($q);
  
?>