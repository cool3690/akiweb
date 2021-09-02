<?php 
	require 'db_login.php';
    $value = $_POST["value"];  
    $id = $_POST["id"];  
    $mych = $_POST["mych"];   
    $check = $_POST["check"]; 
    $quiz_Q = $_POST["quiz_Q"]; 
	// echo $value;
	
	$user_answer = str_replace(",", "", $value);
	
	if($check=="1"){
		$nanswer=$user_answer.$quiz_Q;
	}else if($check=="2"){
		$nanswer=$quiz_Q.$user_answer;

	}else{		
		$str_center=explode("_",$quiz_Q);
		$str_center_s=$str_center[0];
		$str_center_e=$str_center[1];
		$nanswer=$str_center_s.$user_answer.$str_center_e;
	}		
	$quiz_sql = mysqli_query($db, "SELECT * FROM bun where id='$id' and mych='$mych'");		
	while ($quiz_row = mysqli_fetch_array($quiz_sql)) {
		$answer = str_replace([",","。"], "", $quiz_row['jp']);
		// echo $nanswer."==".$answer;
		if ($nanswer==$answer){
			echo '  <div class="alert alert-info alert-dismissible mt-5">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<i class="far fa-check-circle fa-lg pr-3" style="color:red;"></i><strong>正確！</strong> 
						<div class="pt-2" style="margin-left:30px;letter-spacing:3px;">'.$quiz_row['jp'].'</div>
						<div class="pt-2" style="margin-left:30px;letter-spacing:3px;">'.$quiz_row['ch'].'</div>
					 </div>
				  ';
		}else{
			echo '
				<div class="alert alert-danger alert-dismissible mt-5">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<i class="fas fa-times fa-lg pr-3" style="color:red;"></i><strong>錯誤！</strong> 
					<div class="pt-2" style="margin-left:50px;letter-spacing:3px;">'.$nanswer.'。</div>
					<div class="pt-2 mt-3" style="margin-left:30px;letter-spacing:3px;"><strong>正確答案為</strong></div>
					<div class="pt-2" style="margin-left:50px;letter-spacing:3px;">'.$quiz_row['jp'].'</div>
					<div class="pt-2" style="margin-left:50px;letter-spacing:3px;">'.$quiz_row['ch'].'</div>
				</div>
			';
		}
	}
?> 


