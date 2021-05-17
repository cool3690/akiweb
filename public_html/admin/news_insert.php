<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once ("../head.php"); ?>	
</head>
<body>
	<style>
		body {
			background-image: url("images/backstage_bg.png");
			background-size:cover;
			text-align: justify;
			text-justify: inter-word;
		}
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

	<?php include_once ("navbar_backstage.php"); ?>
	<div class="container" style="padding-bottom:14px;">
		<?php
			if (isset($_POST['submit'])) {

				require '../db_login.php';		
				$submit=$_POST['submit'];
					// Get text
					$title = $_POST['title'];
					$text = $_POST['text'];
					// Get photo name
					$photo = $_FILES['photo']['name'];
					$course_sql = mysqli_query($db, "SELECT max(news_id) FROM news");
					while ($course_row = mysqli_fetch_array($course_sql)) {
						$max=$course_row[0]; 
					}
					$nmax=$max+1;
					// photo file directory
					$format=substr($photo, -3);
					//echo $format;
					if($format=="jpg"){
						$target = dirname(dirname(__FILE__))."/images/news/".$nmax."-1.jpg";
						$nphoto = $nmax."-1.jpg";
					}else{
						$target = dirname(dirname(__FILE__))."/images/news/".$nmax."-1.png";
						$nphoto = $nmax."-1.png";
					}
					ini_set('date.timezone','Asia/Taipei');	
					$date = date("Y/m/d");
					$sql = "INSERT INTO news (`date`, `title`, `text`, `photo`) VALUES ('$date', '$title', '$text', '$nphoto')";
					echo "INSERT INTO news (`date`, `title`, `text`, `photo`) VALUES ('$date', '$title', '$text', '$nphoto')";
					// execute query
					// echo $_FILES['photo']['tmp_name'], $target;
					echo __FILE__;
					echo dirname(dirname(__FILE__));
					if (move_uploaded_file($_FILES['photo']['tmp_name'], $target)) {
						if (mysqli_query($db, $sql)) {
							echo '<div class="alert alert-info alert-dismissible">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									<i class="far fa-check-circle fa-lg pr-3" style="color:red;"></i><strong>新增成功</strong><br>
									日期：'.$date.'<br>
									標題：'.$title.'<br>
									文字：'.$text.'<br>
									圖片：'.$photo.'<br>
								  </div>';
						} else {
							echo '<div class="alert alert-danger alert-dismissible">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
										<i class="fas fa-times fa-lg pr-3" style="color:red;"></i><strong>錯誤！請正確上傳所有內容資料</strong> 
								  </div>';
						}
					}else{
						echo '<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<i class="fas fa-times fa-lg pr-3" style="color:red;"></i><strong>錯誤！圖片錯誤</strong> 
							  </div>';
					}
				
				
				mysqli_close($db);		
			}
		?>	
			
		<form action="消息登錄" method="POST" enctype="multipart/form-data">
			<h3 class="mt-5 mb-5 d-flex justify-content-center"><span class="backstage_title">新增最新消息</span></h3>
			<input type="hidden" name="size" value="1000000">
			<div class="row">	
				<div class="col-sm-12 col-md-12 col-lg-12" style="padding-bottom:3px;">	
					<p class="text-center">標題</p>
					<input type="text" class="form-control" name="title" required>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-12 mt-3">
					<p class="text-center">內容</p>
					<textarea class="form-control" rows="8" name="text"></textarea>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-12 mt-4">	
					<p>上傳產品照片</p>
						<input type="file" name="photo" required> 
				</div>	
				<div class="col-sm-12 col-md-12 col-lg-12 text-center">	
					<button type="submit" class="btn btn-info mt-3" name="submit" value="3">完成新增</button>
				</div>	
			</div>										
		</form>

	</div>	
	<?php include_once ("../footer0.php"); ?>	
</body>
</html>