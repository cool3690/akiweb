<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once ("head.php"); ?>	
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="http://tony1966.16mb.com/jquery/jquery.ui.datepicker-zh-TW.js"></script>
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
	<style type="text/css">
	   form{
		　width: 50%;
		　margin: 20px auto;
	   }
	   form div{
		　margin-top: 5px;
	   }
	   #img_div{
		　width: 50%;
		　padding: 5px;
		　margin: 15px auto;
		　border: 1px solid #cbcbcb;
	   }
	   #img_div:after{
		　content: "";
		　display: block;
		　clear: both;
	   }
	   img{
		　float: left;
		　margin: 5px;
		　width: 300px;
		　height: 140px;
	   }
	</style>
	<div class="container mb-5">
		<?php include_once ("navbar.php"); ?>
	
		<div class="mt-5" id="content">
			<hr class="mt-5 mb-5">
			<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="POST" enctype="multipart/form-data">
				<h4 class="mb-3 d-flex justify-content-center"><b>新增課程</b></h4>
				<div class="row text-center mt-5">
					<div class="col-sm-12 col-md-12 col-lg-6 mt-3 mb-3">
						<p>課程名稱</p>
						<input type="text" class="form-control" name="name" required>
					</div>
					<div class="col-sm-12 col-md-12 col-lg-2 mt-3 mb-3">
						<p>課程數量</p>
						<input type="text" class="form-control" name="course_amount" required>
					</div>
					<div class="col-sm-12 col-md-12 col-lg-4 mt-3 mb-3">
						<p>價錢</p>
						<input type="text" class="form-control" name="price" required>
					</div>
				</div>
				<div class="row text-center mt-3">
					<div class="col-sm-12 col-md-12 col-lg-3 mt-3 mb-3">
						<p>開始日期</p>
						<input type="text" class="form-control sdate" name="sdate" required>
					</div>
					<div class="col-sm-12 col-md-12 col-lg-2 mt-3 mb-3">
						<p>開始時間</p>
						<input type="text" class="form-control stime" name="stime" required>
					</div>
					<div class="col-sm-12 col-md-12 col-lg-1 mt-3 mb-3"><p class="mt-5">－</p> 	
					</div>
					<div class="col-sm-12 col-md-12 col-lg-3 mt-3 mb-3">
						<p>結束日期</p>
						<input type="text" class="form-control edate" name="edate" required>
					</div>
					<div class="col-sm-12 col-md-12 col-lg-2 mt-3 mb-3">
						<p>結束時間</p>
						<input type="text" class="form-control etime" name="etime" required>
					</div>
					<div class="col-sm-12 col-md-12 col-lg-1 mt-3 mb-3">
						<p>禮拜</p>
						<input type="text" class="form-control" name="week" required>
					</div>
				</div>
				<div class="text-center mt-3">
					<p>課程內容</p>
					<textarea class="form-control" rows="5" name="content" required></textarea>
				</div>
		  
				<div class="mt-3">
					<button type="submit" class="btn btn-primary" name="submit" value="2">送出</button>
				</div>		
			</form>
		</div>
	</div>
	
	<?php include_once ("footer.php"); ?>	
</body>
</html>


<?php
	if (isset($_POST['submit'])) {

		require 'db_login.php';		
			
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
				echo '<script language="javascript">';
				echo 'alert("新增成功！");';
				echo 'window.location.href = "course.php";';
				echo '</script>';				
			}else{
				echo '<script language="javascript">';
				echo 'alert("新增失敗！請重新操作");';
				echo 'window.location.href = "course.php";';
				echo '</script>';
			}
		
		mysqli_close($db);		
	}
?>
