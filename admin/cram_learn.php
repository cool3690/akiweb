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
		@media (min-width: 1000px) and (max-width: 1600px) { 
			.container{
				padding-bottom:170px;
			}
		}
		@media (min-width: 1600px) and (max-width: 2000px) { 
			.container{
				padding-bottom:382px;
			}
		}
	</style>
	<?php include_once ("navbar_cramy.php"); ?>
	<?php
			// if(@$_SESSION['user_authorize']=='2'){
	?>
	<div class="container">
		<h4 class="text-center mt-5 mb-5">學習專區</h4>
		<div class="row text-center bg-info text-white">
			<div class="col-sm-12 col-md-12 col-lg-3 mt-3 mb-3">日期
			</div>			
			<div class="col-sm-12 col-md-12 col-lg-6 mt-3 mb-3">學習內容
			</div>			
			<div class="col-sm-12 col-md-12 col-lg-3 mt-3 mb-3">作業下載
			</div>			
		</div>	
		<div class="row">			
			<div class="col-sm-12 col-md-12 col-lg-3 mt-3 mb-3 text-center">2020/02/20
			</div>			
			<div class="col-sm-12 col-md-12 col-lg-6 mt-3 mb-3">基礎學習
			</div>			
			<div class="col-sm-12 col-md-12 col-lg-3 mt-3 mb-3 text-center">
				<a href="images/study_abroad/file/school2_introduction.pdf" target="_blank" style="color:#000000;"><i class="fas fa-file-alt fa-lg" style="color:green;"></i> </a>		
									
			</div>				
		</div>		
	</div>
	<?php include_once ("footer1.php"); ?>	
</body>
</html>