<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once ("head.php"); ?>	
</head>
<body>
	<script>
		$(document).ready(function(){
			$(".close").click(function(){
				$("#myAlert").alert("close");
			});
		});


		$(document).ready(function(){
			$('input').on('change', function() {
				$('#submit_check').trigger('click');
			});	
		})	
		
		function play(){
			var audio = document.getElementById("audio");
			audio.play();
		}
		
		function play(){
			var audio = document.getElementById("audio");
			audio.play();
		}
		$(document).ready(function(){
			$('select').on('change', function() {
				$('#selectsubmit').trigger('click');
			});	
		})	
	</script>
	
	<?php include_once ("navbar_exam.php"); ?>
	<div class="container mt-5">
		<h2 class="text-center">線上測驗</h2>
  
		<?php
				$amount=0;
				$check=0;
				$num=0;			
				$amount=1;
				$optradio="0";
				require 'db_login.php';
				include("vendor/src/GifFrameExtractor/GifFrameExtractor.php");
				if (isset($_POST['submit'])) {
					$id=$_POST['id'];
					$submit=$_POST['submit'];
					$quiz_sql = mysqli_query($db, "SELECT * FROM basich where id='$id'");
					if($submit==0){
					$optradio=$_POST['optradio'];
						while ($quiz_row = mysqli_fetch_array($quiz_sql)) {
							if ($optradio==$quiz_row['ans']){
								echo '<div class="alert alert-info alert-dismissible" id="myAlert">
										<button type="button" class="close">&times;</button>
										<i class="far fa-check-circle fa-lg pr-3" style="color:red;"></i><strong>正確！</strong> 
									  </div>';
							}else{
								echo '<div class="alert alert-danger alert-dismissible" id="myAlert">
										<button type="button" class="close">&times;</button>
										<i class="fas fa-times fa-lg pr-3" style="color:red;"></i><strong>錯誤！正確答案為（'.$quiz_row['ans'].'）</strong> 
									  </div>';
							}
						}
								$check=1;
								$amount=$id;
					}else if($submit==1){
							$amount=$id-1;
						
					}else if($submit==2){
							$amount=$id+1;
					}else if($submit==3){
						$fastid=$_POST['fastid'];
							$amount=$fastid;
					}
				}
				$result = mysqli_query( $db,"SELECT * FROM basich");
				$end = mysqli_num_rows($result);
				$id = 1;
				echo '<form action="'.$_SERVER['PHP_SELF'].'"  method="POST" style="font-size:18px;letter-spacing:5px;">';
				if($amount>=$id){
					$id=$amount;
				}
				$quiz_sql = mysqli_query($db, "SELECT * FROM basich where id='$id'");
				echo '
					<div class="row mt-5">
				';
				while ($quiz_row = mysqli_fetch_array($quiz_sql)) {
					if($id==$quiz_row['id']){
						echo '
						<div class="col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4">
							<input type="hidden" name="id" value="'.$quiz_row['id'].'">
								題目：'.$quiz_row['Q1'].'
								<i class="fas fa-play-circle pl-3" onclick="play()" style="color:#0072E3;"></i>
							<audio id="audio" src="images/pronunciation/50/'.$quiz_row['Q1'].'.mp3" ></audio><br>
						';
						for ($i=1;$i<5;$i++){
							$ans='A'.$i;
							echo '<span>('.$i.')：</span>
							<div class="custom-control custom-radio custom-control-inline mt-2 mb-2">
								 <input type="radio" class="custom-control-input" id="radio'.$i.'" name="optradio" value="'.$i.'"'; echo $optradio==$i?'checked':''; echo'>
								 <label class="custom-control-label" for="radio'.$i.'">'.$quiz_row[$ans].'</label>
							</div><br>';
						}  
echo '
						</div>
						<div class="col-12 col-xs-12 col-sm-12 col-md-8 col-lg-8">
';
							$result = mysqli_query($db, "SELECT * FROM basic50 a left join 50k b on a.id=b.id where a.id='$amount'");
							$k = mysqli_query($db, "SELECT * FROM 50k");
							while ($row = mysqli_fetch_array($result)) {
								$pronunciation=$row['pronunciation'];
								$word=$row['word'];
echo '
									<div class="row text-center">
										<div class="col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4">
											<img src="images/drawable/50k/'.$pronunciation.'.gif" height="200" id="gif" style="display:none;">
											<img src="images/drawable/50k/'.$pronunciation.'.png" height="200" width="200" id="img" style="display:none;"><br>
											<i class="far fa-play-circle mt-3" id="replaygif" style="color:#0072E3;display:none;"></i>
										</div>
										<div class="col-12 col-xs-12 col-sm-12 col-md-8 col-lg-5">
											<img src="images/drawable/50k/'.$pronunciation.'_img.png" height="200">
											<input type="hidden" name="num" value="'.$row['id'].'">
											<p style="font-weight:bold;">
												'.$row['nihon'].'<br><br> 
												'.$row['pinyin'].'<br>
												'.$row['ch'].'
											</p>
											<p class="text-right" style="font-size:14px;padding-top:50px;">
												*手寫練習請下載Android版本
											</p>
										</div>
										<div class="col-12 col-xs-12 col-sm-12 col-md-8 col-lg-3">  
												<select class="form-control" id="fastid" name="fastid">
';
													while ($krow = mysqli_fetch_array($k)) {
														echo '<option value="'.$krow['id'].'"'; echo $amount==$krow['id']?'selected':''; echo'>'.$krow['word'].'</option>';
													}
echo '
												</select>
												<button type="submit" class="btn btn-primary" name="submit" id="selectsubmit" value=3 style="display: none;">完成</button>
										</div>
									</div>
';								
								$gifFilePath = 'images/drawable/50k/'.$pronunciation.'.gif';
								if (GifFrameExtractor::isAnimatedGif($gifFilePath)) { // check this is an animated GIF
									
									$gfe = new GifFrameExtractor();
									$gfe->extract($gifFilePath);
									$totalDuration = $gfe->getTotalDuration();
								// echo $totalDuration;
									// Do something with extracted frames ...
								}
								$duration=$totalDuration*10+10;
								echo "
									<script>
										$('#gif').show();
										setTimeout(function() {
											$('#gif').hide();
											$('#img').fadeIn('swing');
											$('#replaygif').fadeIn('swing');
										}, $duration); 
										

										$(document).ready(function(){
											$('#replaygif').click(function(){
												$('#img').hide();
												$('#replaygif').hide();
												$('#gif').show();
												setTimeout(function() {
													$('#gif').hide();
													$('#img').fadeIn('swing');
													$('#replaygif').fadeIn('swing');
												}, $duration); 
											});
										});										
									</script>
								";
							}
						echo'
							</div>
						';						
					}
				}			
				echo '</div>';	
				
				$min=$amount-1;
				$max=$amount+1;
				$word_min_sql = mysqli_query($db, "SELECT * FROM 50k where id='$min'");
				while ($word_min_row = mysqli_fetch_array($word_min_sql)) {
					$word_min=$word_min_row['word'];
				}
				$word_max_sql = mysqli_query($db, "SELECT * FROM 50k where id='$max'");
				while ($word_max_row = mysqli_fetch_array($word_max_sql)) {
					$word_max=$word_max_row['word'];
				}
				echo '
					<div class="row mt-3 mb-1">';
					if($id>1){
				echo '
						<div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4">
							<div class="text-left"><button type="submit" name="submit" class="btn btn-info" value="1">'.$word_min.'</button></div>					
						</div>';
					}else{
						echo '
						<div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4">
							</div>
						';
						
					}
				echo '
						<div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4">
							<div class="text-center"><button type="hidden" name="submit" id="submit_check" class="btn btn-warning" value="0" style="display: none;">確定</button></div>				
						</div>';
					
					if($id<$end){
					echo '	
						<div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4">
							<div class="text-right"><button type="submit" name="submit" class="btn btn-info" value="2">'.$word_max.'</button></div>							
						</div>';
					}else{
					echo '	
						<div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4">
							<div class="text-right"><i class="fas fa-bullhorn fa-lg pr-3" style="color:red;"></i>結束</div>						
						</div>';
					}
				echo '</div></form>';
		?>  

	</div>
</body>
</html>