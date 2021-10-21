<?php 
	session_start();
	require 'db_login.php';
    $minute = $_POST["minute"]; 
	$account=$_SESSION['account'];
	
	ini_set('date.timezone','Asia/Taipei');	
	$date = date("Ymd");
	$stime = date("H:i:s");
	$sql_select=mysqli_query($db, "SELECT * FROM online_time where account='$account' and sdate='$date'");
	
	if($minute==1){
		if (mysqli_num_rows($sql_select) > 0) {	
			while($row = mysqli_fetch_array($sql_select)){
				$sumtime = $row['sumtime'] + $minute;
			}
			
			$sql = "UPDATE online_time SET sumtime='$sumtime' WHERE account='$account' and sdate='$date'";	
			echo '3'.$sql.'<br>';
		}else{
			$sql = "INSERT INTO online_time (sdate, stime, sumtime, account)VALUES ('$date', '$stime', '$minute', '$account')";
			echo '1'.$sql.'<br>';
		}
	}else{
		while($row = mysqli_fetch_array($sql_select)){
			$sumtime = $row['sumtime'];
		}
		if($sumtime > $minute){
			$minute = $sumtime + 1;
		}
		$sql = "UPDATE online_time SET sumtime='$minute' WHERE account='$account' and sdate='$date'";
		echo '2'.$sql.'<br>';
	}
	if (mysqli_query($db, $sql)) {
		echo 'ok';
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($db);
	}
// ?> 


