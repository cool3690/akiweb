 <?php
require_once("db.php");
$email=$_POST['email'];

$sql = "select* from user where email= '$email'";
$q=mysqli_query($db,$sql);
while($e=mysqli_fetch_assoc($q))
$output[]=$e;
print(json_encode($output));
mysqli_close($q);
  
?>