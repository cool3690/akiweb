<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once ("head.php"); ?>		
</head>
<body>
	<script>
		$(function(){
			$( "#datepicker0" ).datepicker({
				changeMonth:true,
				changeYear:true,
				dateFormat:"yymmdd",
				timeFormat:  "hh:mm:ss"			
			});
			$( "#datepicker1" ).datepicker({
				changeMonth:true,
				changeYear:true,
				dateFormat:"yymmdd",
				timeFormat:  "hh:mm:ss"			
			});
			$( "#datepicker2" ).datepicker({
				changeMonth:true,
				changeYear:true,
				dateFormat:"yymmdd",
				timeFormat:  "hh:mm:ss"			
			});
		});	
	</script>
	<div class="container">
		<?php 
			include_once ("navbar.php");
			include_once ("db_login.php");	
				echo '<h4 class="text-center mt-5 mb-5" style="letter-spacing:8px;">CLSM報價單</h4>
				<form method="post" action="clsm_connect.php" style="padding-top:2%;padding-bottom:10%;padding-left:2%;padding-right:2%;">
					<div class="text-center mb-5" style="letter-spacing:8px;">
						<div class="form-group row">
							<label class="col-lg-2">客&nbsp;&nbsp;&nbsp;&nbsp;戶：</label>
							<div class="col-lg-4">
								<input type="text" class="form-control" name="customer">
							</div>
							<label class="col-lg-2">聯絡電話：</label>
							<div class="col-lg-4">
								<input type="text" class="form-control" name="ee_phone" >
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-2">業&nbsp;&nbsp;&nbsp;&nbsp;主：</label>
							<div class="col-lg-4">
								<input type="text" class="form-control" name="owner">
							</div>
							<label class="col-lg-2">傳真電話：</label>
							<div class="col-lg-4">
								<input type="text" class="form-control" name="ee_fax" >
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-2">監造單位：</label>
							<div class="col-lg-4">
								<input type="text" class="form-control" name="supervision">
							</div>
							<label class="col-lg-2">報價日期：</label>
							<div class="col-lg-4">
									<input type="text" class="form-control" name="sdate" id="datepicker0">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-2">工程地點：</label>
							<div class="col-lg-4">
								<input type="text" class="form-control" name="ee_address">
							</div>
							<label class="col-lg-2">報價期限：</label>
							<div class="col-lg-4">
									<input type="text" class="form-control" name="edate" id="datepicker1">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-2">工程名稱：</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" name="ee_name">
							</div>
						</div>
						<div class="form-group row text-center">
							<label class="col-lg-2">接 洽 人：</label>
							<div class="col-lg-2">
								<input type="text" class="form-control" name="business_name">
							</div>
							<label class="col-lg-2">聯絡電話：</label>
							<div class="col-lg-2">
								<input type="text" class="form-control" name="business_phone">
							</div>
							<label class="col-lg-2">業務分機：</label>
							<div class="col-lg-2">
								<input type="text" class="form-control" name="extension">
							</div>
						</div>
					</div>
					<h5 class="text-center mt-5 mb-3">控制性低強度回填材料(CLSM) 規  格</h5>
					<div class="row text-center" style="line-height:3;letter-spacing:6px;">
						<div class="col-lg-2">28天抗壓強度<br>kgf/cm²
						</div>
						<div class="col-lg-2">坍流度<br>(cm)
						</div>
						<div class="col-lg-1">骨材<br>(m/m)
						</div>
						<div class="col-lg-2">數量<br>(m³)
						</div>
						<div class="col-lg-1">單價<br>(元/m³)
						</div>
						<div class="col-lg-4">備註
						</div>
						<!--    1  ------------------------------------------------------------------   -->
						';
						
						for($i=1;$i<8 ;$i++){
							$strength = "strength".$i;
							$turbulence = "turbulence".$i;
							$aggregate = "aggregate".$i;
							$number = "number".$i;
							$price = "price".$i;
							$remark = "remark".$i;
							//echo '$turbulence-------------------------'.$turbulence;
							echo '<div class="col-lg-2 mb-3">
								<select class="form-control" name="strength'.$i.'">';
									$strength_sql = mysqli_query($db, "SELECT * FROM clsm_28strength order by snum ASC");
									
									while ($row_strength = mysqli_fetch_array($strength_sql)) {
										echo "<option class='text-center' value=".$row_strength['snum']."-".$row_strength['enum'].">".$row_strength['snum'].'-'.$row_strength['enum']."</option>\n";
									}
								echo '
								</select>
							</div>
							<div class="col-lg-2">
								<input type="text" class="form-control" name="turbulence'.$i.'">
							</div>
							<div class="col-lg-1">
								<input type="text" class="form-control" name="aggregate'.$i.'">
							</div>
							<div class="col-lg-2">
								<input type="text" class="form-control" name="number'.$i.'">
							</div>
							<div class="col-lg-1">
								<input type="text" class="form-control" name="price'.$i.'">
							</div>
							<div class="col-lg-4">
								<select class="form-control" name="remark'.$i.'">';
									$remark_sql = mysqli_query($db, "SELECT * FROM remark");
									while ($row_remark = mysqli_fetch_array($remark_sql)) {
										echo "<option value=".$row_remark['remark'].">".$row_remark['remark']."</option>\n";
									}
							echo'
								</select>
							</div>';
							
						}
						echo '		
						</div>
						<div style="line-height:4;padding-left:20px;letter-spacing:6px;">
							<div class="form-check">
								<label class="form-check-label form-inline">
									<input type="checkbox" class="form-check-input" name="terms1" value="1" checked>1．上列單價如遇原料、燃料、工資等價格波動時，得比照市價調整之。
								</label>
							</div>
							<div class="form-check">
								<label class="form-check-label form-inline">
									<input type="checkbox" class="form-check-input" name="terms2" value="1" checked>2．上述價格係保證強度價格，貴客戶若另有要求時單價另議。
								</label>
							</div>	
							
							<div class="form-check">
								<label class="form-check-label form-inline">
									<input type="radio" class="form-check-input" name="terms3" value="1" checked>3．本報價單未含加值營業稅。&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<input type="radio" class="form-check-input" name="terms3" value="2">．本報價單已含加值營業稅。
								</label>
							</div>	
							<div class="form-check">
								<label class="form-check-label form-inline">
									<input type="radio" class="form-check-input" name="terms4" value="1" checked>4．本報價單未含試體試驗費。&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<input type="radio" class="form-check-input" name="terms4" value="2">．本報價單已含試體試驗費。
								</label>
							</div>
							<div class="form-check">
								<label class="form-check-labe form-inline">
									<input type="checkbox" class="form-check-input" name="terms5" value="1">
									5．依施工規範每&nbsp;<input type="text" class="form-control" name="specimen_m3" maxlength="3" style="width:60px">&nbsp;M<sup>3</sup>&nbsp;加作一組試體，採累進制。每組&nbsp;<input type="text" class="form-control" name="specimen_num" maxlength="2" style="width:50px">&nbsp;顆試體
								</label>
							</div>	
							<div class="form-check">
								<label class="form-check-label form-inline">
									<input type="checkbox" class="form-check-input" name="terms6" value="1">6．夜間施工為19:00起出料，且須協調方可出料，每M<sup>3</sup>&nbsp;加收&nbsp;<input type="text" class="form-control" name="night_price" maxlength="4" style="width:70px">&nbsp;元。
								</label>
							</div>	
							<div class="form-check">
								<label class="form-check-label form-inline">
									<input type="checkbox" class="form-check-input" name="terms7" value="1">7．本報價單不含驗廠試拌、圓柱及粗細骨材試驗費用。
								</label>
							</div>	
						</div>';
				echo '<div class="text-center mt-5"><button type="submit" class="btn btn-primary" name="nsubmit">送出</button></div>
			</form>';
		?>		
	</div>
	
	<?php include_once ("footer.php"); ?>	
</body>
</html>
