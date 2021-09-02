<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once ("head.php"); ?>		
</head>
<body>
	<div class="container" style="margin-bottom:220px;">	
		<?php include_once ("navbar.php"); ?>
		
		<div class="col-sm-12 col-md-12 col-lg-12" id="carousel1">			
			<div id="carouselExampleIndicators" class="carousel slide"  data-interval="6000" data-ride="carousel" style="z-index:0;">
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
<!-- 					<li data-target="#carouselExampleIndicators" data-slide-to="4"></li> -->
				</ol>
				<div class="carousel-inner">
					<div class="carousel-item active" style="text-align:center"> 
						<!-- <img class="d-block w-100" src="1/01.jpg" alt="Second slide"> -->
						<!-- <img class="d-block" src="image/logo/logo_l.gif" style="width:40.5%;" alt="First slide"> -->
					  <img class="d-block w-100" src="image/bitmap1.png" alt="Second slide">
					</div>
					<div class="carousel-item">
					  <img class="d-block w-100" src="image/bitmap2.png" alt="Third slide">
					</div>
					<div class="carousel-item">
					  <img class="d-block w-100" src="image/bitmap3.png" alt="Third slide">
					</div>
					<div class="carousel-item">
					  <img class="d-block w-100" src="image/bitmap4.png" alt="Third slide">
					</div>
<!--					<div class="carousel-item">
					  <a href="https://www.ibodygo.com.tw/EventTopic.aspx?n=786" target="_blank"><img class="d-block w-100" src="image/bitmap5.jpg" alt="Third slide"></a>
					</div>-->
				</div>
				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
	</div>
	
	<?php include_once ("footer.php"); ?>	
</body>
</html>
