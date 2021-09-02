<html lang="en">
<head>
	<?php include_once ("head.php"); ?>	
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

	<?php include_once ("navbar_backstage.php"); ?>	
	<div class="container" style="padding-top:21px;padding-bottom:114px;">
		<h3 class="mt-5 mb-5 d-flex justify-content-center"><span class="backstage_title">新增直播</span></h3>
		<?php
			require 'db_login.php';	
			if (isset($_POST['submit'])) {
				$video_tmp=$_POST['video'];
				$title=$_POST['title'];
				$video_str=substr($video_tmp, 68, 11);
				$date=date("Y/m/d");
				
				$video='<iframe width="800" height="500" src="https://www.youtube.com/embed/'.$video_str.'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
				// $chat='<iframe src="https://www.youtube.com/live_chat?v='.$video_str.'&embed_domain=localhost" width="300" height="600"></iframe>';
				$chat='<iframe src="https://www.youtube.com/live_chat?v='.$video_str.'&embed_domain=akkyschool.com" width="300" height="600"></iframe>';
				
				$video_sql = "INSERT INTO `live`(`date`,`title`,`video`,`chat`) VALUES ('$date','$title','$video','$chat')";

				if (mysqli_query($db, $video_sql)) {
					echo '<div class="alert alert-info alert-dismissible" id="myAlert">
							<button type="button" class="close">&times;</button>
							<i class="far fa-check-circle fa-lg pr-3" style="color:red;"></i><strong>新增成功</strong><br>
						  </div>';
				} else {
					echo '<div class="alert alert-danger alert-dismissible" id="myAlert">
							<button type="button" class="close">&times;</button>
								<i class="fas fa-times fa-lg pr-3" style="color:red;"></i><strong>錯誤！</strong> 
						  </div>';
				}		
			}
		 ?>
		<form action="新增直播" method="post">
			<div>標題：<input type="text" class="form-control" name="title"></div>
			<div class="mt-5">影像位址：<textarea class="form-control" rows="5" name="video"></textarea></div>
			<div class="text-center"><input type="submit" class="btn btn-info mt-5" name="submit"></div>
		</form>
	</div>
 
	<?php include_once ("footer0.php"); ?>
</body>
</html>