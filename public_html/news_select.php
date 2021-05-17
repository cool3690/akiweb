<!DOCTYPE html>
<html>
<head>
	<?php include_once ("head.php"); ?>		
</head>
<body>
	<style>
		body {
			background-image: url("image/cs1-3-2.png");
		}
		.btn-group-xs > .btn, .btn-xs {
			padding  : .25rem .4rem;
			font-size  : .875rem;
			line-height  : 0.5;
			border-radius : .2rem;
		}
		.pressDown {
			padding: 10px 30px;
			color: #fff;
			border-radius: 5px;
			border-right: 3px solid #FFB5B5;
			border-bottom: 4px solid #FFB5B5;
			transition: 0.1s;
		}

		.pressDown:hover{
			border-bottom-width: 0;
			margin-top: 3px;
		}
		
		
	</style>
	
	<?php include_once ("navbar_cramy.php"); ?>
	<script>
	
	</script>
		<div class="layer2 rellax" data-rellax-speed="-9">
			<picture>
				<source srcset="images/1906_03_2.webp" id="layer2_1" type="image/webp">
				<img src="images/1906_03_2.png" id="layer2_1" alt="亞紀塾">
			</picture>	
		</div>
	<div class="container mb-5">
		<div class="row mt-3 mb-3">
		<?php 
			require 'db_login.php';
			
			$news_select = mysqli_query($db, "SELECT * FROM news order by news_id desc");	
			while ($row = mysqli_fetch_array($news_select)) {
			$i = $row['news_id'];		
				$date = $row['date'];		
				$title = $row['title'];	
				$text = $row['text'];
				//		echo $date.'-「'.$title.'」-'.$text;
	
				echo '
					<div class="col-md-12 col-sm-12 col-md-12 col-lg-12" style="margin-top:50px;">
						<div class="row" style="margin-top:1%">';
				//	echo '$i--------------------'.$i;
						$file = 'images/news/'.$i.'-1.png'; // 'images/'.$file (physical path);
						if (file_exists($file)) {
							$imagedetails = getimagesize($file);
							$width = $imagedetails[0];
							$height = $imagedetails[1];		
							// echo $width."<br>"; 				
							// echo $height;
							echo '
							<div class="col-md-12 col-sm-12 col-md-4 col-lg-4 mb-2">
								<div><i class="fas fa-cube mr-3 mb-4" style="margin-left:80px;font-size:20px;color:#FF7575;"></i><span id="news_font">'.$date.'</span></div>	
								<div id="news_text">
									<a data-fancybox="gallery" href="'.$file.'">
										';
										if ($width>$height){
											echo'
												<img src="'.$file.'" class="mx-auto d-block" style="width:80%;height:200px;">
											';
										}else{
											echo'
												<img src="'.$file.'" class="mx-auto d-block" style="width:150px;">
											';
										}
										echo'
									</a>	
								</div>
							</div>
';
								$z=0;
						} else {
							$file2 = 'images/news/'.$i.'-1.jpg'; // 'images/'.$file (physical path);
							$imagedetails = getimagesize($file2);
							$width = $imagedetails[0];
							$height = $imagedetails[1];		
							// echo $width."<br>"; 		
							// echo $height;							
							
							if (file_exists($file2)) {
								echo '<div class="col-md-12 col-sm-12 col-md-4 col-lg-4 mb-2">
									<div><i class="fas fa-cube mr-3 mb-4" style="margin-left:80px;font-size:20px;color:#FF7575;"></i><span id="news_font">'.$date.'</span></div>	
									<div id="news_text">	
										<a data-fancybox="gallery" href="'.$file2.'">
										';
										if ($width>$height){
											echo'
												<img src="'.$file2.'" class="mx-auto d-block" style="width:80%;height:200px;">
											';
										}else{
											echo'
												<img src="'.$file2.'" class="mx-auto d-block" style="width:150px;">
											';
										}
										echo'
										</a>
									</div>
								</div>';
								$z=0;
							} else {
								echo '<div class="col-md-12 col-sm-12 col-md-12 col-lg-12 mb-2">
									<div><i class="fas fa-cube mr-3 mb-4" style="margin-left:80px;font-size:20px;color:#FF7575;"></i><span id="news_font">'.$date.'</span></div>	
								</div>';
								$z=1;
							}
						}
				echo'<hr>';
							if($z!=1){
								echo '<div class="col-sm-12 col-md-9 col-lg-8"  style="padding-top:4%;">';	
							}else{
								echo '<div class="col-sm-12 col-md-12 col-lg-12">';	
								
							}
							echo '<div style="padding-left:80px;"><b style="font-size:20px;">'.$title.'</b></div>';	
							echo '<p class="mt-3" style="line-height:2.5;letter-spacing:2px;padding-left:80px;">';	
							if($z!=1){							
								echo nl2br(mb_substr($text, 0, 60, "utf-8")).'......';
							}else{							
								echo nl2br(mb_substr($text, 0, 200, "utf-8")).'......';
													
							}
							echo '
								</p>	
								<div class="mt-5 mb-5" style="margin-left:80px;">
									<button type="button" class="btn btn-xs pressDown" id="myBtn'.$i.'" style="background-color:#FF7575;color:#ffffff;width:120px;" data-toggle="modal" data-target="#myModal'.$i.'">more　<i class="fas fa-caret-right"></i></button>	
								</div>							
								<!-- The Modal -->
							<div class="modal fade" id="myModal'.$i.'">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
								  
									<!-- Modal Header -->
										<div class="modal-header">
											<div class="row mt-3">';
												$directory = "images/news/";
												$files=glob($directory . ''.$i.'*.{jpg,png}',GLOB_BRACE);
												$filecount = count($files);
												
												//echo $filecount;
												if($filecount<2){
													$x=12;
												}else{
													$x=6;
												}
												
												for($k=1;$k<8;$k++){
													$file3 = 'images/news/'.$i.'-'.$k.'.png'; // 'images/'.$file (physical path);
													if (file_exists($file3)) {
														echo '<div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-'.$x.' mb-2 text-center">';
															if($filecount<2){
																echo '
																	<a data-fancybox="gallery" href="'.$file3.'">
																		<img src="'.$file3.'" class="img-thumbnail mx-auto d-block" style="width:60%;">
																	</a>';
															}else{
																echo '
																	<a data-fancybox="gallery" href="'.$file3.'">
																		<img src="'.$file3.'" class="img-thumbnail mx-auto d-block" style="width:100%;">
																	</a>';																
															}
														echo '</div>';
													} else {
														$file3 = 'images/news/'.$i.'-'.$k.'.jpg'; // 'images/'.$file (physical path);
														if (file_exists($file3)) {
															echo '<div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-'.$x.' mb-2">';
															
															if($filecount<2){
																echo '
																	<a data-fancybox="gallery" href="'.$file3.'">
																		<img src="'.$file3.'" class="img-thumbnail mx-auto d-block" style="width:60%;">
																	</a>';	
															}else{
																echo '
																	<a data-fancybox="gallery" href="'.$file3.'">
																		<img src="'.$file3.'" class="img-thumbnail mx-auto d-block" style="width:100%;">
																	</a>';	
															}
															echo '</div>';
														}else{
															break;
														}
													}
												}
											echo '</div>											
											<button type="button" class="close" data-dismiss="modal">×</button>
										</div>
										
										<!-- Modal body -->
										<div class="modal-body">	
											<h5><b>「'.$title.'」</b></h5>	<br />	
											<p style="line-height:2.5;letter-spacing:2px;">
												'.nl2br($text).'
											</p>
										</div>
										
										<!-- Modal footer -->
										<div class="modal-footer">
											<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
										</div>										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>	';
				$i--;
			}			
		?>		
		</div>
	</div>
	
	<script src='https://cdnjs.cloudflare.com/ajax/libs/rellax/1.0.0/rellax.min.js'></script>
	<script>
		var rellax = new Rellax();
	</script>
	<?php include_once ("footer1.php"); ?>
	
</body>
</html>
