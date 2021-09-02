<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once ("head.php"); ?>	
</head>
<body>
	<?php include_once ("navbar_exam.php"); ?>
	<style>
		u{
			padding-left:20px;
		}
	
	</style>
	<div class="container">
	<div id="demo3"></div>
	<span id="demo2"></span>
	<span id="demo"></span>
	<?php
		$amount=0;
		$check=0;
		$optradio="0";
		require 'db_login.php';
		
		$mych=$_POST['mych'];
		if (isset($_POST['submit'])) {
			$id=$_POST['id'];
			$mych=$_POST['mych'];
			$submit=$_POST['submit'];
			$quiz_sql = mysqli_query($db, "SELECT * FROM bun where id='$id'");
			if($submit==1){
					$amount=$id-1;
			}else if($submit==2){
					$amount=$id+1;
			}
		}
		
		$result = mysqli_query( $db,"SELECT * FROM bun");
		$quiz_sql_max = mysqli_fetch_array(mysqli_query($db, "SELECT Max(id) FROM bun where mych='$mych'"));
		$end = $quiz_sql_max[0];
		$quiz_sql_min = mysqli_fetch_array(mysqli_query($db, "SELECT Min(id) FROM bun where mych='$mych'"));
		$id = $quiz_sql_min[0];
		if($amount>=$id){
			$id=$amount;
		}
		
		$quiz_sql = mysqli_query($db, "SELECT * FROM bun where id='$id' and mych='$mych'");			
		
		while ($quiz_row = mysqli_fetch_array($quiz_sql)) {
			$quizall=$quiz_row['contain'];
			$quiz_Qtmp=$quiz_row['Q'];
			$quiz_ch=$quiz_row['ch'];
			$check_quiz=mb_substr ($quiz_Qtmp, 0,1,"utf-8");

			
			if ($check_quiz=="_"){
				$quiz_Qtmp2=str_replace(['_','。'],"",$quiz_Qtmp);
				$check='1';
			}else{
				$quiz_Qtmp2=str_replace('。',"",$quiz_Qtmp);
				$str_left=mb_strlen($quiz_Qtmp2)-1;
				$check_quiz_left=mb_substr ($quiz_Qtmp, $str_left,1,"utf-8");
				if($quiz_Qtmp2=='_'){
					$check='2';
				}else{
					$str_center=explode("_",$quiz_Qtmp2);
					$str_center_s=$str_center[0];
					$str_center_e=$str_center[1];

					$check='3';
				}
			}
			$quiz_Q=str_replace("_"," <u>　　　</u> <u>　　　</u> <u>　　　</u> <u>　　　</u>　",$quiz_Qtmp);
		}	
					
		$quiz = explode(",", $quizall);

echo '	
		<div id="demo2" class="text-center mt-5 mb-4" style="font-size:24px;">'.$quiz_ch.'</div>
		<div id="demo1" class="text-center mt-5 mb-5" style="font-size:24px;">'.$quiz_Q.'</div>
		<div class="text-center"><button class="btn btn-light mt-2 mb-2" id="1" name="1" value="1" style="width:200px;background-color:#FFCC99;">'.$quiz[0].'</button><br></div>
		<div class="text-center"><button class="btn btn-light mt-2 mb-2" id="2" name="2" value="2" style="width:200px;background-color:#FFCC99;">'.$quiz[1].'</button><br></div>	
		<div class="text-center"><button class="btn btn-light mt-2 mb-2" id="3" name="3" value="3" style="width:200px;background-color:#FFCC99;">'.$quiz[2].'</button><br></div>
		<div class="text-center"><button class="btn btn-light mt-2 mb-2" id="4" name="4" value="4" style="width:200px;background-color:#FFCC99;">'.$quiz[3].'</button><br></div>			
		<div class="text-center"><button class="btn btn-outline-info mt-5" id="5" name="5" value="5">確定</button></div>			
		<div>如需修改選項，再次點擊選項即可。</div>	
';	
echo "
		<script>
			function arrtostr(val) {
				var arr_tmp= val.toString();
				var arr_str = arr_tmp.replace(/,/g, '</u><u>');
				return arr_str;
			}
			var arrList = [];
			$('button').click(function() {
				var button = $(this).val();
				var len=arrList.length;
				if(button=='1'){
					for (i = 0; i < arrList.length; i++) {
						if (arrList[i]=='".$quiz[0]."'){
							var check='y';
							var value=arrList[i];
							break;
						}					
					}
					if (check=='y'){
						arrList.splice(jQuery.inArray(value,arrList),1);		
					}else{					
						arrList.push('".$quiz[0]."');
					}
					arr_str = arrtostr(arrList);";
					if($check=="1"){
						echo "document.getElementById('demo1').innerHTML = '<u>'+arr_str + '</u> ".$quiz_Qtmp2."。'";
					}else if($check=="2"){
						echo "document.getElementById('demo1').innerHTML = '".$quiz_Qtmp2."<u>'+arr_str + '</u>。'";
					}else{
						echo "document.getElementById('demo1').innerHTML = '".$str_center_s."<u>'+arr_str + '</u>　".$str_center_e."。'";
					}
echo "
				}else if(button=='2'){
					for (i = 0; i < arrList.length; i++) {
						if (arrList[i]=='".$quiz[1]."'){
							var check='y';
							var value=arrList[i];
							break;
						}					
					}
					if (check=='y'){
						arrList.splice(jQuery.inArray(value,arrList),1);	
					}else{					
						arrList.push('".$quiz[1]."');
					}
					arr_str = arrtostr(arrList);
";
					if($check=="1"){
						echo "document.getElementById('demo1').innerHTML = '<u>'+arr_str + '</u> ".$quiz_Qtmp2."。'";
					}else if($check=="2"){
						echo "document.getElementById('demo1').innerHTML = '".$quiz_Qtmp2."<u>'+arr_str + '</u>。'";
					}else{
						echo "document.getElementById('demo1').innerHTML = '".$str_center_s."<u>'+arr_str + '</u>　".$str_center_e."。'";
					}
echo "
				}else if(button=='3'){
					for (i = 0; i < arrList.length; i++) {
						if (arrList[i]=='".$quiz[2]."'){
							var check='y';
							var value=arrList[i];
							break;
						}					
					}
					if (check=='y'){
						arrList.splice(jQuery.inArray(value,arrList),1);	
					}else{
						arrList.push('".$quiz[2]."');
					}
					arr_str = arrtostr(arrList);
";
					if($check=="1"){
						echo "document.getElementById('demo1').innerHTML = '<u>'+arr_str + '</u> ".$quiz_Qtmp2."。'";
					}else if($check=="2"){
						echo "document.getElementById('demo1').innerHTML = '".$quiz_Qtmp2."<u>'+arr_str + '</u>。'";
					}else{
						echo "document.getElementById('demo1').innerHTML = '".$str_center_s."<u>'+arr_str + '</u>　".$str_center_e."。'";
					}
echo "
				}else if(button=='4'){
					for (i = 0; i < arrList.length; i++) {
						if (arrList[i]=='".$quiz[3]."'){
							var check='y';
							var value=arrList[i];
							break;
						}					
					}
					if (check=='y'){
						arrList.splice(jQuery.inArray(value,arrList),1);
					}else{					
						arrList.push('".$quiz[3]."');
					}
					arr_str = arrtostr(arrList);
";
					if($check=="1"){
						echo "document.getElementById('demo1').innerHTML = '<u>'+arr_str + '</u> ".$quiz_Qtmp2."。'";
					}else if($check=="2"){
						echo "document.getElementById('demo1').innerHTML = '".$quiz_Qtmp2."<u>'+arr_str + '</u>。'";
					}else{
						echo "document.getElementById('demo1').innerHTML = '".$str_center_s."<u>'+arr_str + '</u>　".$str_center_e."。'";
					}
echo "
				}else{
					$.ajax({
						type: 'POST',
						url: 'exam_reorganize_re.php',
						data: {'value': ''+arrList+'','id':'".$id."','mych':'".$mych."','quiz_Q':'".$quiz_Qtmp2."','check':'".$check."'}, 
						dataType: 'text', 
						success: function(data) {
							$('#demo1').before(data);
							arrList = [];
							document.getElementById('demo1').innerHTML = '".$quiz_Q."'+arrList
						}
					});
				}
			});
		</script>	
";

echo '
		<form action="句子重組"  method="POST" style="font-size:18px;letter-spacing:5px;">	
			<input type="hidden" name="id" value="'.$id.'">
			<input type="hidden" name="mych" value="'.$mych.'">
			<div class="row mt-5 mb-5">
';
		if($amount>$quiz_sql_min[0]){
echo '
				<div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4 ">
					<div class="text-left"><button type="submit" name="submit" class="btn btn-info" value="1">上一題</button></div>						
				</div>
';
			$id--;
		}else{
			echo '<div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4 "></div>';
			
		}
echo '
				<div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4 ">
					<div class="text-center">
						<button type="hidden" name="submit" id="submit_check" class="btn btn-warning" value="0" style="display: none;">確定</button>
					</div>				
				</div>
';
		
		if($amount<$end){
echo '	
				<div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4 ">
					<div class="text-right"><button type="submit" name="submit" class="btn btn-info" value="2">下一題</button></div>	
				</div>
';
			$id++;
		}else{
echo '	
				<div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4 ">
					<div class="text-right"><i class="fas fa-bullhorn fa-lg pr-3" style="color:red;"></i>測驗結束</div>	
				</div>
';
		}

echo '
				</div>
				<div class="row mt-3">
					<div class="col-12 col-xs-12 col-sm-12 col-md-5 col-lg-5">
						<p class="text-right" style="font-size:14px;">
							編輯老師：沈佩燕 老師  鄭宇君 老師
						</p>		
					</div>
					<div class="col-12 col-xs-12 col-sm-12 col-md-2 col-lg-2">
						<p class="text-right" style="font-size:14px;">
							編輯協力：杜東晉
						</p>		
					</div>
					<div class="col-12 col-xs-12 col-sm-12 col-md-5 col-lg-5">
						<p class="text-right" style="font-size:14px;">
							版權所有：亞紀塾日本語　
							*非經同意不得轉載
						</p>					
					
					</div>	
				
				</div>
		</form>
';
		?>
	</div>
</body>
</html>
