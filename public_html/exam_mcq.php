<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once ("head.php"); ?>	
</head>
<body>
	<script>
		$(document).ready(function(){
			$(".close").click(function(){
				$("#myAlert").alert("close");
			});
		});


		$(document).ready(function(){
			$('input').on('change', function() {
				$('#submit_check').trigger('click');
			});	
		})	
		
history.pushState(null, null, location.href); 
history.back(); 
history.forward();
 window.onpopstate = function () { history.go(1); }; 		
		// window.history.pushState(null, null, "#");

		// window.addEventListener("hashchange", e=> {
			// console.log('Hash 更改後觸發');
		// });

		// window.addEventListener("popstate", e=> {
			// window.location.replace('https://akkyschool.com/%E5%88%9D%E7%B4%9A%E4%B8%80%E7%B7%B4%E7%BF%92');
		// });
	</script>
	<?php include_once ("navbar_exam.php"); ?>
	<div class="container">
	  <h2 class="text-center mt-3 mb-5" id="exam_title">線上測驗</h2>
  
		<?php
			// if(@$_SESSION['account']!=null){
				$amount=0;
				$check=0;
				$optradio=0;
				require 'db_login.php';
					if(@$_POST['mych'] != null){
					$mych=$_POST['mych'];
					$_SESSION['account'] = $_POST['mych'];
					}else{
					$mych=$_SESSION['account'];
					}
				if (isset($_POST['submit'])) {
					$num=$_POST['num'];
					$mych=$_POST['mych'];
					$submit=$_POST['submit'];
					$quiz_sql = mysqli_query($db, "SELECT * FROM QandA where num='$num'");
					if($submit==0){
					$optradio=$_POST['optradio'];
						while ($quiz_row = mysqli_fetch_array($quiz_sql)) {
							if ($optradio==$quiz_row['ans']){
								echo '<div class="alert alert-info alert-dismissible" id="myAlert">
										<button type="button" class="close">&times;</button>
										<i class="far fa-check-circle fa-lg pr-3" style="color:red;"></i><strong>正確！</strong> 
									  </div>
									  ';
								echo"	
									<script>			
									    setTimeout(function () { 
											$('#next_submit').trigger('click');
									    }, 1000);
									</script>
								";
							}else{
								echo '<div class="alert alert-danger alert-dismissible" id="myAlert">
										<button type="button" class="close">&times;</button>
										<i class="fas fa-times fa-lg pr-3" style="color:red;" style="margin-left:30px;letter-spacing:3px;"></i><strong>錯誤！正確答案為（'.$quiz_row['ans'].'）</strong> 
									  </div>';
							}
						}
								$check=1;
								$amount=$num;
					}else if($submit==1){
							$amount=$num-1;
						
					}else if($submit==2){
							$amount=$num+1;
					}
				}
				$result = mysqli_query( $db,"SELECT * FROM QandA");
				$quiz_sql_max = mysqli_fetch_array(mysqli_query($db, "SELECT Max(num) FROM QandA where mych=$mych order by num DESC LIMIT 0 , 1;"));
				$end = $quiz_sql_max[0];
				
				$quiz_sql_min = mysqli_fetch_array(mysqli_query($db, "SELECT Min(num) FROM QandA where mych=$mych order by num DESC LIMIT 0 , 1;"));
				$num = $quiz_sql_min[0];
				echo '<form action="初級練習"  method="POST" style="font-size:18px;letter-spacing:5px;">';
				if($amount>=$num){
					$num=$amount;
				}
				$quiz_sql = mysqli_query($db, "SELECT * FROM QandA where num='$num' and mych=$mych order by num DESC LIMIT 0 , 1;");
				while ($quiz_row = mysqli_fetch_array($quiz_sql)) {
					if($num==$quiz_row['num']){
						
						$quiz_Q=str_replace("_"," <u>　　　　　　</u> ",$quiz_row['Q1']);
						echo '<input type="hidden" name="num" value="'.$quiz_row['num'].'">';
						echo '<input type="hidden" name="mych" value="'.$mych.'">';
						echo '<div style="font-size:18px;">題目：<br><div class="ml-5">'.nl2br($quiz_Q).'</div><div><br>';
						for ($i=1;$i<5;$i++){
							$ans='A'.$i;
							echo '<span>('.$i.')：</span>
							<div class="custom-control custom-radio custom-control-inline mt-2 mb-2">
								<input type="radio" class="custom-control-input" id="radio'.$i.'" name="optradio" value="'.$i.'"'; echo $optradio==$i?'checked':''; echo'>
								<label class="custom-control-label" for="radio'.$i.'">'.$quiz_row[$ans].'</label>
							</div><br>';
						}  
					}
				}
				
				echo '
					<div class="row mt-5">';
					if($amount>$quiz_sql_min[0]){
				echo '
						<div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4 ">
							<div class="text-left"><button type="submit" name="submit" class="btn btn-info" value="1">上一題</button></div>						
						</div>';
					}else{
						echo '<div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4 "></div>';
						
					}
				echo '
						<div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4 ">
							<div class="text-center"><button type="hidden" name="submit" id="submit_check" class="btn btn-warning" value="0" style="display: none;">確定</button></div>				
						</div>';
					
					if($amount<$end){
					echo '	
						<div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4 ">
							 <div class="text-right"><button type="submit" name="submit" id="next_submit" class="btn btn-info" value="2">下一題</button></div>	
						</div>';
					}else{
					echo '	
						<div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4 ">
							<div class="text-right"><i class="fas fa-bullhorn fa-lg pr-3" style="color:red;"></i>測驗結束</div>	
						</div>';
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
			// }
		?>  

	</div>
</body>
</html>