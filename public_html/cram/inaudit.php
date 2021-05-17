<?php
require_once("db.php");
$date=date("Y/m/d");
	$name=$_POST['name'];
	$phone=$_POST['phone'];
	$choose=$_POST['choose'];
	$remark=$_POST['remark'];
$sql="insert into audit (date,name,phone,choose,remark) values ('$date','$name','$phone','$choose','$remark')";
if($name!=null){
	$q=mysqli_query($db,$sql);
	

		$token = "uatg8slsz0D2Y7XRGml19RoZkZP8E6B1mowh95pzQHj";
		$message ="\r\n日期:".$date."\r\n姓名:". $name."\r\n電話:".$phone."\r\n選擇:".$choose."\r\n備註:".$remark;
		
		$curl = curl_init(); 
		curl_setopt($curl, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0); 
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); 
		curl_setopt($curl, CURLOPT_POST, 1); 
		curl_setopt($curl, CURLOPT_POSTFIELDS, "message=$message"); 
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); 
		$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$token.'',); 
		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers); 
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
		$result = curl_exec($curl); 
	
		curl_close($curl);      
	
	
	
	
	
	
}

while($e=mysqli_fetch_assoc($q))
$output[]=$e;
print(json_encode($output));
mysqli_close($q);
  
?>