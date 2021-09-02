 <?php
require_once("db.php");
$id=$_POST['id'];
	
$sql="select* from basic50 where id='$id' ";
$q=mysqli_query($db,$sql);
while($e=mysqli_fetch_assoc($q))
$output[]=$e;
print(json_encode($output));
mysqli_close($q);
  
?>