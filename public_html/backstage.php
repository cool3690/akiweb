<!DOCTYPE html>
<html>
<head>
	<?php include_once ("head.php"); ?>		
</head>
<body>
	<?php include_once ("navbar_backstage.php"); ?>
	<style>
		body {
			background-image: url("images/backstage_bg.png");
			background-size:cover;
			text-align: justify;
			text-justify: inter-word;
		}
	</style>
	<?php 

		if(@$_SESSION['admin']=="Y"){	
			echo '
				<div class="container" style="padding-bottom:57px;">
					<div class="text-center mt-5"><h3>公告區</h3></div>
					<div class="row mt-5" id="backstage">
						<div class="col-12 col-xs-12 col-sm-12 col-md-2 col-lg-5 text-center backstage_border pt-3 pb-1">
							<span><i class="fas fa-splotch fa-lg" style="color:#FFBB77"></i>　2019/11/01</span>
						</div>
						<div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-7 backstage_border pt-3 pb-1">
							<p class="text-left">新增直播功能</p>
						</div>
						<div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-5 text-center backstage_border pt-4 pb-1">
							<span><i class="fas fa-splotch fa-lg" style="color:#FFBB77"></i>　2019/10/01</span>
						</div>
						<div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-7 backstage_border pt-4 pb-1">
							<p class="text-left">新增試題功能</p>
						</div>
						<div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-5 text-center backstage_border pt-4 pb-1">
							<span><i class="fas fa-splotch fa-lg" style="color:#FFBB77"></i>　2019/09/20</span>
						</div>
						<div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-7 backstage_border pt-4 pb-1">
							<p class="text-left">商品功能暫時不公開</p>
						</div>
						<div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-5 text-center backstage_border pt-4 pb-1">
							<span><i class="fas fa-splotch fa-lg" style="color:#FFBB77"></i>　2019/08/30</span>
						</div>
						<div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-7 backstage_border pt-4 pb-1">
							<p class="text-left">新增商品功能</p>
						</div>
						<div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-5 text-center backstage_border pt-4 pb-1">
							<span><i class="fas fa-splotch fa-lg" style="color:#FFBB77"></i>　2019/08/15</span>
						</div>
						<div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-7 backstage_border pt-4 pb-1">
							<p class="text-left">新增課程功能</p>
						</div>
						<div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-5 text-center backstage_border pt-4 pb-1">
							<span><i class="fas fa-splotch fa-lg" style="color:#FFBB77"></i>　2019/08/01</span>
						</div>
						<div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-7 backstage_border pt-4 pb-1">
							<p class="text-left">網站開始進行公測</p>
						</div>
					</div>
				</div>
			';
		}
	?>
	<?php include_once ("footer0.php"); ?>
</body>
</html>
