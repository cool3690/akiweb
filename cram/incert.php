<?php
require_once("db.php");
$date=date("Y/m/d");
	$account=$_POST['account'];
	$course_num=$_POST['course_num'];
	$unit=1;
$sql="insert into cart (sdate,account,course_num,quantity) values ('$date','$account','$course_num','$unit')";
if($account!=null){
	$q=mysqli_query($db,$sql);
}

while($e=mysqli_fetch_assoc($q))
$output[]=$e;
print(json_encode($output));
mysqli_close($q);
  
?>