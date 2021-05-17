<!DOCTYPE html>
<html>
<head>
	<?php include_once ("head.php"); ?>	
	<meta http-equiv="refresh" content="300" />			
</head>
 
 </head>
 <body style="overflow: hidden;">
	<?php include_once ("navbar.php"); ?>
	<script>
		$(document).ready(function(){
			$('select').on('change', function() {
				$('#submit').trigger('click');
			});	
		})	
	</script>
	<style>
		body {
			background-image: url("../image/14.jpg");
			background-size:cover;
			text-align: justify;
			text-justify: inter-word;
		}

	@media (min-width: 992px) and (max-width: 2000px) { 
		#page{
			margin-top:60px;
			padding-left:250px;
			padding-right:250px;
			margin-bottom:125px;
		}
	}	
	
	</style>	
	<?php include_once ("navbar.php"); ?>
	<div class="container-fluid" id="page">	
		<div class="row">
			<div class="col-sm-12 col-md-2 col-lg-2">
				<?php
					require '../db_login.php';
						if(isset($_POST['submit']) ){
							$scar = $_POST['car'];
							$_SESSION['car'] = $scar;
						}else{
							$scar = $_SESSION['car'];
							
						}
					$car=[];
					if(@$_SESSION['admin']!="Y"){
						$vendor_id = $_SESSION['vendor_id'];
					}
					echo '
						<form method="post" action="video_select.php" name="form1" class="">
							<select class="form-control" name="car" id="car">
								<option>請選擇車牌</option>';
								if(@$_SESSION['admin']=="Y"){
									$car_sql = mysqli_query($db, "SELECT * FROM permission a left join car b on a.car_id=b.car_id where vendor_id='0' and status='T'");
								}else{
									$car_sql = mysqli_query($db, "SELECT * FROM permission a left join car b on a.car_id=b.car_id where vendor_id=$vendor_id and status='T'");
								}
								
								while ($car_row = mysqli_fetch_array($car_sql)) {
									echo '<option value="'.$car_row['license_plate'].'"';  echo $_SESSION['car'] == $car_row['license_plate'] ? 'selected' : '' ; echo '>'.$car_row['license_plate'].'</option>'; //close your tags!!
								}			
							echo '</select>	
							<button type="submit" class="btn btn-primary" name="submit" id="submit" style="display: none;">完成</button>
						</form>	';
				?>		
			</div>	
			
			<?php	
				echo '	<div class="col-sm-12 col-md-12 col-lg-12 mt-5 mb-5">
							車牌：'.$scar.'<br>
						</div>';
				
				date_default_timezone_set('Asia/Taipei');
				$date=date('Ymd');
				$time=date('Hms');
				$stime1 =str_pad((int)substr($time,0,2),2,'0',STR_PAD_LEFT);
				$stime2 =str_pad((int)substr($time,2,2),2,'0',STR_PAD_LEFT);
				// echo '$date--------'.$date."<br>";

				$fileList = glob('video/'.$scar.'/'.$date.'/*');
				$fileListexist=count(glob('video/'.$scar.'/'.$date.'/*'));
				
				if($fileListexist > 0){
					foreach($fileList as $key => $datetime){
						 // echo $key .'=>'. $datetime.'<br>';
					}
					
					$filecountexist=count(glob($datetime.'/CH1/*'));
					
					if($filecountexist > 0){
						$filecount = count(glob($datetime.'/CH1/*'))-2;
						if($filecount < 0){
							$filecount = 0;
						}
						// echo '$filecount'.$filecount.'<br>';
						
						//CH1------------------------------------------------------------------------------------------------------
						$fileList1 = glob($datetime.'/CH1/*');
						echo '<div class="col-sm-2 col-md-2 col-lg-2"></div>';
						foreach($fileList1 as $key1 => $filename1){
							if($key1 == $filecount){
							// $filename00= substr($filename1, 6,53);
							 // echo $key1.' =>'.$filename1.'<br>'; 
							 // echo $filename00.'<br>';
							echo '	<div class="col-sm-4 col-md-4 col-lg-4">			
										<video width="100%" playsinline autoplay >
										  <source type="video/mp4" src="'.$filename1.'">
										</video>	
									</div>'	;
							}
						}

						//CH2------------------------------------------------------------------------------------------------------
						$fileList5 = glob($datetime.'/CH2/*');
						 
						foreach($fileList5 as $key5 => $filename5){
							if($key5 == $filecount){
							// echo $key5.' =>'.$filename5, '<br>'; 
							echo '	<div class="col-12 col-sm-4 col-md-4 col-lg-4">			
										<video width="100%" playsinline autoplay >
										  <source type="video/mp4" src="'.$filename5.'">
										</video>	
									</div>'	;
							}
						}	
						echo '<div class="col-sm-2 col-md-2 col-lg-2"></div>';	
						echo"
							<div class='col-sm-2 col-md-2 col-lg-2'></div>
							<div class='col-12 col-sm-12 col-md-6 col-lg-4'>
								<iframe id='fp_embed_player' src='https://wcs5-eu.flashphoner.com:8888/embed_player?urlServer=wss://wcs5-eu.flashphoner.com:8443&streamName=rtsp://video:QAZwsx963852@220.130.229.74:554/cam/realmonitor?channel=2%26subtype=1&autoplay=1&mediaProviders=WebRTC,Flash,MSE,WSPlayer' marginwidth='0' marginheight='0' frameborder='0' width='100%' height='300' allowfullscreen='allowfullscreen'></iframe>
							</div>
							<div class='col-12 col-sm-12 col-md-6 col-lg-4'>
								<iframe id='fp_embed_player' src='https://wcs5-eu.flashphoner.com:8888/embed_player?urlServer=wss://wcs5-eu.flashphoner.com:8443&streamName=rtsp://video:QAZwsx963852@220.130.229.74:554/cam/realmonitor?channel=3%26subtype=1&autoplay=1&mediaProviders=WebRTC,Flash,MSE,WSPlayer' marginwidth='0' marginheight='0' frameborder='0' width='100%' height='300' scrolling='no' allowfullscreen='allowfullscreen'></iframe>
							</div>
							<div class='col-sm-2 col-md-2 col-lg-2'></div>";
					}else{
						echo '	<div class="col-sm-12 col-md-12 col-lg-12 mt-3 mb-3">
									<i class="fas fa-exclamation-circle fa-lg ml-5" style="color:green;padding-bottom:270px;"></i>　目前未有資料(#00001)<br>
								</div>';
					}
				}else{
						echo '	<div class="col-sm-12 col-md-12 col-lg-12 mt-3 mb-3">
									<i class="fas fa-exclamation-triangle fa-lg ml-5" style="color:red;padding-bottom:270px;"></i>　目前未有資料(#00002)<br>
								</div>';
					
				}

			
			?>			
		</div>		
	</div>
	
	<?php include_once ("footer.php"); ?>	
</body>
</html>