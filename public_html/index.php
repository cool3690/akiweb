<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once ("head.php"); ?>			
</head>
<body>
<script id="rendered-js">
      //# sourceURL=pen.js
    </script>
	<div class="container-fluid" style="padding-bottom:100px;">
		<div class="row" style="height:78px;background-color:#FBE2DC">	
			<div class="col-md-12 col-lg-2">	
			</div>
			<div class="col-10 col-sm-6 col-md-12 col-lg-7 align-self-center">	
				<picture>
					<source srcset="images/1906_01.webp" id="logo_index" type="image/webp">
					<img src="images/1906_01.png" id="logo_index" alt="亞紀塾">
				</picture>	
			</div>
			<div class="col-2 col-sm-6 col-md-12 col-lg-3 align-self-center">		
				<a href="https://www.facebook.com/akischool" target="_blank"><img src="images/FB_icon01.png"></a>
				<a href="https://www.instagram.com/explore/locations/1026472874/?hl=zh-tw" target="_blank"><img src="images/ig.png" width="45px"></a>
			</div>
		</div>	
		<div class="layer1 rellax" data-rellax-speed="-2">
			<img src="images/1906_02_2.png" id="layer1_1">
			<picture>
				<source srcset="images/1906_02.webp" id="layer1_2" type="image/webp">
				<img src="images/1906_02.png" id="layer1_2" alt="亞紀塾">
			</picture>
		</div>
		<div class="layer2 rellax" data-rellax-speed="-4">
			<picture>
				<source srcset="images/1906_03_2.webp" id="layer2_1" type="image/webp">
				<img src="images/1906_03_2.png" id="layer2_1" alt="亞紀塾">
			</picture>	
		</div>
		<div class="layer3">
			<picture>
				<source srcset="images/1906_04_3.webp" id="layer3_1" type="image/webp">
				<img src="images/1906_04_3.png" id="layer3_1" alt="亞紀塾">
			</picture>	
		</div>

		<div id="main">
			<div class="col-sm-12 col-md-12 col-lg-12 text-center">	
				<img src="images/1906_05.jpg" width="100%" style="position:absolute;z-index:-3;left:0;">
			</div>		
			<div class="row" id="main_item">
				<div class="col-sm-12 col-md-12 col-lg-4 mt-5 text-center"></a> 
					<picture>
						<a href="日語補習班"><source srcset="images/1906_06.webp" id="home-button1-1" type="image/webp"></a>  
						<a href="日語補習班"><img src="images/1906_06.jpg" width="100%" id="home-button1" alt="亞紀塾"></a>  
					</picture>					
				</div>
				<div class="col-12 col-sm-12 col-md-12 col-lg-4 mt-5 text-center">	
					<picture>
						<a href="課程列表"><source srcset="images/1906_07.webp" id="home-button2-1" type="image/webp"></a>  
						<a href="課程列表"><img src="images/1906_07.jpg" width="100%" id="home-button2" alt="亞紀塾"></a>  
					</picture>						  
				</div>   
				<div class="col-12 col-sm-12 col-md-12 col-lg-4 mt-5 text-center">		
					<picture>
						<a href="直播觀看"><source srcset="images/1906_12.webp" id="home-button3-1" type="image/webp"></a>  
						<a href="直播觀看"><img src="images/1906_12.jpg" width="100%" id="home-button3" alt="亞紀塾"></a>  
					</picture>					  
				</div>   
			</div>
		</div>	
	</div>	

	<!-- Scripts -->
	<script src='https://cdnjs.cloudflare.com/ajax/libs/rellax/1.0.0/rellax.min.js'></script>
	<script>
		var rellax = new Rellax();
		
		$(function () {
			$("#home-button1").on({
				mouseenter: function () {
				$(this).attr('src', 'images/1906_06_h.png');
			},
			mouseleave: function () {
				$(this).attr('src', 'images/1906_06.png');
			} });
			$("#home-button2").on({
				mouseenter: function () {
				$(this).attr('src', 'images/1906_07_h.png');
			},
			mouseleave: function () {
				$(this).attr('src', 'images/1906_07.png');
			} });
			$("#home-button3").on({
				mouseenter: function () {
				$(this).attr('src', 'images/1906_12_h.png');
			},
			mouseleave: function () {
				$(this).attr('src', 'images/1906_12.png');
			} });
			$("#home-button1-1").on({
				mouseenter: function () {
				$(this).attr('src', 'images/1906_06_h.webp');
			},
			mouseleave: function () {
				$(this).attr('src', 'images/1906_06.webp');
			} });
			$("#home-button2-1").on({
				mouseenter: function () {
				$(this).attr('src', 'images/1906_07_h.webp');
			},
			mouseleave: function () {
				$(this).attr('src', 'images/1906_07.webp');
			} });
			$("#home-button3-1").on({
				mouseenter: function () {
				$(this).attr('src', 'images/1906_12_h.webp');
			},
			mouseleave: function () {
				$(this).attr('src', 'images/1906_12.webp');
			} });


		});
	</script>
	<?php include_once ("footer0.php"); ?>
</body>
</html>
