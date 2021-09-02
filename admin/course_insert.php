<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once ("../head.php"); ?>	

	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.9.2/i18n/jquery.ui.datepicker-zh-TW.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/dmuy/MDTimePicker/mdtimepicker.css">
	<script src="https://cdn.jsdelivr.net/gh/dmuy/MDTimePicker/mdtimepicker.js"></script>
	<script>
		$( function() {
			$( ".sdate" ).datepicker({
				changeMonth:true,
				changeYear:true,
				dateFormat:"mm/dd"	
			});
			$( ".edate" ).datepicker({
				changeMonth:true,
				changeYear:true,
				dateFormat:"mm/dd"			
			});
		} );
		$(document).ready(function(){
			$('.stime').mdtimepicker({ 
				format: 'hh:mm' 
			}).data('mdtimepicker');
			$('.etime').mdtimepicker({ 
				format: 'hh:mm' 
			}).data('mdtimepicker');
		});
	</script>
</head>
<body>
	<style>
		body {
			background-image: url("images/backstage_bg.png");
			background-size:cover;
			text-align: justify;
			text-justify: inter-word;
		}
	</style>
	<?php	include_once ("navbar_backstage.php"); ?>
	
	<div class="container mb-5">
		<?php
		//submit-------------------------------------------------------------------------------------------------------------
			if (isset($_POST['submit'])) {

				require '../db_login.php';		
					
					// Get text
					$name = $_POST['name'];
					$week = $_POST['week'];
					$stime = $_POST['stime'];
					$sdate = $_POST['sdate'];
					$etime = $_POST['etime'];
					$edate = $_POST['edate'];
					$time = $stime.'-'.$etime;
					$date = $sdate.'-'.$edate;
					$course_amount = $_POST['course_amount'];
					$content = $_POST['content'];
					$price = $_POST['price'];
					
					$sql = "INSERT INTO `course`(`name`, `week`, `stime`, `sdate`, `course_amount`, `content`, `price`, exist) VALUES ('$name', '$week', '$time', '$date', '$course_amount', '$content', '$price', '0')";
					//echo $sql;
					if (mysqli_query($db, $sql)) {
						echo '
						<div class="alert alert-info alert-dismissible">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<i class="far fa-check-circle fa-lg pr-3" style="color:red;"></i><strong>新增成功</strong><br>
								
								課程名稱：'.$name.'<br>
								日期：'.$date.'<br>
								時間：'.$time.'<br>
								禮拜：'.$week.'<br>
								課程數：'.$course_amount.'<br>
								價錢：'.$price.'<br>
								內容：'.$content.'<br>
							  </div>';			
					}else{
						echo '<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<i class="fas fa-times fa-lg pr-3" style="color:red;"></i><strong>新增失敗！請重新操作</strong> 
							  </div>';
					}
				
				mysqli_close($db);		
			}		
		//submit-------------------------------------------------------------------------------------------------------------		
		?>
			
		<form action="課程登錄" method="POST">
			<h3 class="mt-5 mb-5 d-flex justify-content-center"><span class="backstage_title">新增課程</span></h3>
			<div class="row text-center">
				<div class="col-sm-12 col-md-12 col-lg-6 mt-2 mb-2">
					<p>課程名稱</p>
					<input type="text" class="form-control" name="name" required>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-2 mt-2 mb-2">
					<p>課程數量</p>
					<input type="text" class="form-control" name="course_amount" required>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-4 mt-2 mb-2">
					<p>價錢</p>
					<input type="text" class="form-control" name="price" required>
				</div>
			</div>
			<div class="row text-center mt-3">
				<div class="col-sm-12 col-md-12 col-lg-3 mt-2 mb-2">
					<p>開始日期</p>
					<input type="text" class="form-control sdate" name="sdate" required>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-2 mt-2 mb-2">
					<p>開始時間</p>
					<input type="text" class="form-control stime" name="stime" required>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-1 mt-2 mb-2"><p class="mt-5">－</p> 	
				</div>
				<div class="col-sm-12 col-md-12 col-lg-3 mt-2 mb-2">
					<p>結束日期</p>
					<input type="text" class="form-control edate" name="edate" required>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-2 mt-2 mb-2">
					<p>結束時間</p>
					<input type="text" class="form-control etime" name="etime" required>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-1 mt-2 mb-2">
					<p>禮拜</p>
					<input type="text" class="form-control" name="week" required>
				</div>
			</div>
			<div class="text-center mt-3">
				<p>課程內容</p>
				<textarea class="form-control" rows="4" name="content" required></textarea>
			</div>
		
			<div class="text-center" style="padding-top:39px;">
				<button type="submit" class="btn btn-primary" name="submit" value="2">送出</button>
			</div>		
		</form>
	</div>
	<?php include_once ("../footer0.php"); ?>	
</body>
</html>