<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once ("head.php"); ?>	
</head>
<body>
	<style>
		body {
			background-image: url("images/00.jpg");
			background-repeat: repeat;
			text-align: justify;
			text-justify: inter-word;
		}
		.link1{
			color:#003366;
			width:120px;
			letter-spacing:5px;
		}
		.link1.active {
			background-color: #0066CC!important;
			color:#FFD2D2 !important;
		}
		.pills1:hover .link1:hover {
			color:#005AB5 !important;
			background-color: #FFECEC!important;
		}
	</style>
	
	<?php include_once ("navbar_cramy.php"); ?>
			
	<div class="container" style="padding-bottom:8%">
		<div class="row justify-content-center mt-5">
			<ul class="nav nav-pills pills1 text-center">
				<li class="nav-item">
					<a class="nav-link active link1" data-toggle="pill" href="#home" style="">活動剪影</a>
				</li>
				<li class="nav-item">
					<a class="nav-link link1" data-toggle="pill" href="#menu1">課程剪影</a>
				</li>
				<!--
				<li class="nav-item">
					<a class="nav-link link1" data-toggle="pill" href="#menu2">進階一</a>
				</li>
				<li class="nav-item">
					<a class="nav-link link1" data-toggle="pill" href="#menu3">進階二</a>
				</li>
				 -->
			</ul>
		</div>
	  <!-- Tab panes -->
		<div class="tab-content">
			<div id="home" class="container tab-pane active">
				<div class="row mt-5">
					<div class="col-sm-12 col-md-12 col-lg-12">
						<div class="text-center"><i class="fas fa-shapes fa-2x" style="color:#0066CC"></i><span class="ml-3 mr-4" style="font-size:26px;font-weight:bold;">活動剪影</span></div>
					</div>

					<?php
						$directory ='images/activity_photo/akky/';
						$filenum=count(glob($directory . "*",GLOB_BRACE))+1;
						for ($i=1;$i<$filenum;$i++){
							$file = $directory.'/'.$i.'/1.jpg';
							if (file_exists($file)) {
								echo '<div class="mr-3 ml-4 mt-5" id="p1_ds">	
										<img src="'.$file.'"  class="mt-4 mr-4 ml-4" style="width:280px;height:200px;">
									<div class="card-body">
										<div class="col-12 col-sm-12 col-md-12 col-lg-12">';
										switch ($i) {
											case 1:
												$text="2019/09/29<br />壽司野餐活動";
												break;
											case 2:
												$text="2020/01/17<br />日本工作講座";
												break;
											case 3:
												$text="2020/02/07<br />日本語福岡旅行";
												break;
											case 4:
												// $text="2019/05/12<br />參訪日本大阪特教學校";
												break;
										}								
										
										echo '
											<h5 class="card-title"><p class="card-text" style="font-size:20px;color:#005ab5;">'.$text.'</p></h5>
									
											<div class="text-right">
												<form method="POST" action="學員活動剪影" enctype="multipart/form-data">
													<input type="hidden" name="id" value="'.$i.'">
													<button type="submit" class="btn" name="submit" value="1" style="color:#019858;">more ></button>
												</form>	
											</div>
										</div>
									</div>
								</div>';
							}else{
								break;
							}
						}			
					?>
				</div>
			</div>
			<div id="menu1" class="container tab-pane fade"><br>
				<div class="row mt-4">
					<div class="col-sm-12 col-md-12 col-lg-12">
						<div class="text-center"><i class="fas fa-shapes fa-2x" style="color:#0066CC"></i><span class="ml-3 mr-4" style="font-size:26px;font-weight:bold;">課程剪影</span></div>
					</div>

					<?php
						$directory ='images/activity_photo/classroom/';
						$filenum=count(glob($directory . "*",GLOB_BRACE))+1;
						for ($i=1;$i<$filenum;$i++){
							echo'
								<div class="col-12 col-sm-12 col-md-12 col-lg-4">
									
							';
							
								echo '<div class="mr-3 ml-4 mt-5" id="p1_ds">';
							$file = $directory.'/'.$i.'/1.jpg';
							$img = imagecreatefromjpeg($file);
							$imgx = imagesx($img);
							$imgy = imagesy($img);	
								
							if (file_exists($file)) {
								if($imgx > $imgy){
									echo '
									<div class="mr-3 ml-4 mt-5" style="height:300px;">
									<img src="'.$file.'"  class="mr-4 ml-4 mx-auto d-block" style="width:250px;height:250px;padding-top:70px;">
									</div>
									';
								}else{
									echo '
									<div class="mr-3 ml-4 mt-5" style="height:300px;">
									<img src="'.$file.'"  class="pt-4 mr-4 ml-4 mx-auto d-block" style="width:200px;height:260px;">
									
									</div>';
								}
								switch ($i) {
									case 1:
										$text="2020/04/23<br />鯉魚旗手作活動";
										break;
									case 2:
										$text="2020/04/23<br />紙芝居";
										break;
									case 3:
										$text="2020/07/30<br />福笑";
										break;
									case 4:
										// $text="2019/05/12<br />參訪日本大阪特教學校";
										break;
								}								
								
							echo'
								<p class="ml-5" style="font-size:20px;color:#005ab5;">'.$text.'</p>
											<div class="text-right pr-4 pb-3">
												<form method="POST" action="學員課程剪影" enctype="multipart/form-data">
													<input type="hidden" name="id" value="'.$i.'">
													<button type="submit" class="btn" name="submit" value="1" style="color:#019858;">more ></button>
												</form>	
											</div>
								</div>
								</div>
							';
							}else{
								break;
							}
						}			
					?>
				</div>
			</div>
<!-- 			<div id="menu2" class="container tab-pane fade"><br>
				<h3>Menu 2</h3>
				<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
			</div>-->
		</div>	
	
	</div>	
	
	<?php include_once ("footer1.php"); ?>
	
</body>
</html>
