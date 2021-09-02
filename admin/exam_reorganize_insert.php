<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once ("../head.php"); ?>	

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
	<div class="container mb-5">
		<?php
			if (isset($_POST['submit'])) {

				require '../db_login.php';	
					// Get text
					$Q1_tmp = $_POST['Q1'];
					$Q2_1_tmp = $_POST['Q2_1'];
					$Q2_2_tmp = $_POST['Q2_2'];
					$contain1 = $_POST['contain1'];
					$contain2 = $_POST['contain2'];
					$contain3 = $_POST['contain3'];
					$contain4 = $_POST['contain4'];
					$jp = $_POST['jp'].'。';
					$ch = $_POST['ch'].'。';
					$mych = $_POST['mych'];		
					$radio = $_POST['radio'];	
					// echo $radio;
					if($radio==1){
						$Q = '_'.$Q1_tmp.'。';
					}else if($radio==2){
						$Q = $Q1_tmp.'_。';
					}else if($radio==4){
						$Q = '_。';
					}else{
						$Q = $Q2_1_tmp.'_'.$Q2_2_tmp.'。';
					}
					
					$contain=$contain1.','.$contain2.','.$contain3.','.$contain4;
					$sql = "INSERT INTO `bun`(`Q`, `contain`, `jp`, `ch`, `mych`) VALUES ('$Q', '$contain', '$jp', '$ch', '$mych')";
					if (mysqli_query($db, $sql)) {
						echo '  
							<div class="alert alert-primary alert-dismissible fade show">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<strong>新增成功</strong>
								題目：'.$Q.'<br>
								重組內容 '.$contain.'<br>正確答案(日文)：'.$jp.'<br>正確答案(中文)：'.$ch.'<br>第幾課：'.$mych.'
							</div>
						';
					}else{
						echo '<script language="javascript">';
						echo 'alert("新增失敗！請重新操作");';
						echo 'window.location.href = "重組登錄";';
						echo '</script>';
					}
				
				mysqli_close($db);		
			}
		?>		
		<form action="重組登錄" method="POST" enctype="multipart/form-data">
			<h3 class="mt-5 mb-5 d-flex justify-content-center"><span class="backstage_title">新增重組題庫</span></h3>

			<div class="row text-center mt-5">
				<div class="col-sm-12 col-md-12 col-lg-8 mt-3 mb-3">
					<div class="row text-center">
						<div class="col-sm-12 col-md-12 col-lg-12 mb-3">
							<h5 class="">題目類型</h5>
						</div>   
						<div class="col-sm-12 col-md-12 col-lg-2 custom-control custom-radio">
						  <input type="radio" class="custom-control-input" id="customRadio4" name="radio" value="4" required>
						  <label class="custom-control-label pl-3" for="customRadio4"> <u>　　　</u> 。</label>
						</div>   
						<div class="col-sm-12 col-md-12 col-lg-3 custom-control custom-radio">
						  <input type="radio" class="custom-control-input" id="customRadio1" name="radio" value="1" required>
						  <label class="custom-control-label pl-3" for="customRadio1"><u>　　　</u> 〇 〇。</label>
						</div>   
						<div class="col-sm-12 col-md-12 col-lg-3 custom-control custom-radio">
						  <input type="radio" class="custom-control-input" id="customRadio2" name="radio" value="2" required>
						  <label class="custom-control-label pl-3" for="customRadio2">〇 〇 <u>　　　</u>。</label>
						</div>   
						<div class="col-sm-12 col-md-12 col-lg-4 custom-control custom-radio">
						  <input type="radio" class="custom-control-input" id="customRadio3" name="radio" value="3" required>
						  <label class="custom-control-label pl-3" for="customRadio3">〇 〇 <u>　　　</u> 〇 〇。</label>
						</div>   
					</div>   
					<h5 class="mt-3 mb-3">題目內容</h5>
					<textarea class="form-control Q1" rows="3" name="Q1"></textarea>
					<div class="Q2" style="display:none;">
						<div class="row text-center">
							<div class="col-sm-12 col-md-12 col-lg-5">
								<textarea class="form-control" rows="3" name="Q2_1"></textarea>
							</div>   
							<div class="col-sm-12 col-md-12 col-lg-2 align-self-end">
								<u>　　　　　　</u>
							</div>   
							<div class="col-sm-12 col-md-12 col-lg-5">
								<textarea class="form-control" rows="3" name="Q2_2"></textarea>
							</div>   
						</div>   
					</div>   
					<h5 class="mt-3 mb-3">正確答案(日文)</h5>
					<textarea class="form-control" rows="3" name="jp" required></textarea>
					<h5 class="mt-3 mb-3">正確答案(中文)</h5>
					<textarea class="form-control" rows="3" name="ch" required></textarea>
				</div>
						
				<div class="col-sm-12 col-md-12 col-lg-4 mt-1 mb-3 row">
				<div class="col-sm-12 col-md-12 col-lg-12 text-center mt-4 mb-4"><h5>重組選項<h5></div>
					<div class="col-sm-12 col-md-12 col-lg-3 mt-3 mb-3">
						<p>選項1</p>
					</div>
					<div class="col-sm-12 col-md-12 col-lg-9 mt-3 mb-3">
						<input type="text" class="form-control" name="contain1" required>
					</div>
					<div class="col-sm-12 col-md-12 col-lg-3 mt-3 mb-3">
						<p>選項2</p>
					</div>
					<div class="col-sm-12 col-md-12 col-lg-9 mt-3 mb-3">
						<input type="text" class="form-control" name="contain2" required>
					</div>
					<div class="col-sm-12 col-md-12 col-lg-3 mt-3 mb-3">
						<p>選項3</p>
					</div>
					<div class="col-sm-12 col-md-12 col-lg-9 mt-3 mb-3">
						<input type="text" class="form-control" name="contain3" required>
					</div>
					<div class="col-sm-12 col-md-12 col-lg-3 mt-3 mb-3">
						<p>選項4</p>
					</div>
					<div class="col-sm-12 col-md-12 col-lg-9 mt-3 mb-3">
						<input type="text" class="form-control" name="contain4" required>
					</div>	

					<div class="col-sm-12 col-md-12 col-lg-3 mt-3 mb-3">
						<p>第幾課</p>
					</div>
					<div class="col-sm-12 col-md-12 col-lg-9 mt-3 mb-3">
						<select class="form-control" name="mych">
							<?php
								require '../db_login.php';	
								$bun_sql = mysqli_query($db, "SELECT MAX(mych) FROM bun");
								while ($bun_row = mysqli_fetch_array($bun_sql)) {
									$bun_max=$bun_row[0];
								}
								for($i=1;$i<51;$i++){
									echo '
										<option value="'.$i.'"'; echo $bun_max==$i?'selected':''; echo'>'.$i.'</option>
									';
								}
							?>
						</select>
					</div>
				</div>				
				<div class="col-sm-12 col-md-12 col-lg-6 mt-3 mb-3">
				</div>
				<div class="col-sm-12 col-md-12 col-lg-6 mt-3 mb-3">
				</div>
		
			</div>
			<div class="mt-3 text-center">
				<button type="submit" class="btn btn-primary" name="submit" value="2">送出</button>
			</div>		
		</form>
	</div>
		<script>
$(document).ready(function() {
    $('input:radio[name=radio]').change(function() {
				$selectval=this.value;
				if($selectval==1){
					$( ".Q1" ).show( "slow" );
					$( ".Q2" ).hide( "slow" );
				}else if($selectval==2){
					$( ".Q1" ).show( "slow" );
					$( ".Q2" ).hide( "slow" );
				}else if($selectval==4){
					$( ".Q1" ).show( "slow" );
					$( ".Q2" ).hide( "slow" );
				}else{
					$( ".Q2" ).show( "slow" );
					$( ".Q1" ).hide( "slow" );
				}
    });
});
		</script>
	
	<?php include_once ("../footer0.php"); ?>	
</body>
</html>


