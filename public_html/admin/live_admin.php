<html lang="en">
<head>
	<?php include_once ("../head.php"); ?>	
	<script src="https://unpkg.com/@daily-co/daily-js"></script>
</head>
<body>
	<?php include_once ("navbar_backstage.php"); ?>	
	<style>

		@media (min-width: 1000px) and (max-width: 1600px) {	
			#container_bottom{
				padding-bottom:100px;
			}		
			#live_title{
				padding-top:100px;
			}	
			#live_content{
				padding-top:30px;
			}
			#button{
				padding-top:112px;
				padding-bottom:100px;
			}
			
		}
		@media (min-width: 1600px) and (max-width: 2000px) { 	
			#container_bottom{
				padding-bottom:214px;
			}		
			#live_title{
				padding-top:100px;
			}	
			#live_content{
				padding-top:30px;
				padding-bottom:100px;
			}
			#button{
				padding-top:212px;
				padding-bottom:100px;
			}
		}
	</style>
	<div class="container" id="container_bottom">
		<div class="text-center" id="button">
			<?php
					echo'
						<button type="button" class="btn btn-info pl-5 pr-5 pt-2 pb-2 mt-5" style="font-size:28px;"><a class="text-white" id="button" href="https://dashboard.daily.co/" target="_blank">進入直播</a></button>
					';
			?>	
		</div>
	</div>
	<?php include_once ("../footer0.php"); ?>
</body>
</html>
