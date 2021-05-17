<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once ("head.php"); ?>		
</head>
<body>
	<div class="container">
		<?php include_once ("navbar.php"); ?>
		<?php include_once ("db_login.php"); ?>
			
		<h4 class="text-center mt-3">CLSM報價單</h4>
		<form method="post" action="clsm_connect.php" style="padding-top:2%;padding-bottom:10%;padding-left:20%;padding-right:20%;">
			<div class="form-group row">
				<label class="col-lg-3">客&nbsp;&nbsp;&nbsp;戶：</label>
				<div class="col-lg-9">
					<input type="text" class="form-control" name="customer" >
				</div>
			</div>
			<div class="form-group row">
				<label class="col-lg-3">業&nbsp;&nbsp;&nbsp;主：</label>
				<div class="col-lg-9">
					<input type="text" class="form-control" name="owner" >
				</div>
			</div>
			<div class="form-group row">
				<label class="col-lg-3">監造單位：</label>
				<div class="col-lg-9">
					<input type="text" class="form-control" name="supervision" >
				</div>
			</div>
			<div class="form-group row">
				<label class="col-lg-3">工程地點：</label>
				<div class="col-lg-9">
					<input type="text" class="form-control" name="ee_address" >
				</div>
			</div>
			<div class="form-group row">
				<label class="col-lg-3">工程名稱：</label>
				<div class="col-lg-9">
					<input type="text" class="form-control" name="ee_name" >
				</div>
			</div>
			<div class="form-group row">
				<label class="col-lg-3">聯絡電話：</label>
				<div class="col-lg-9">
					<input type="text" class="form-control" name="ee_phone" >
				</div>
			</div>
			<div class="form-group row">
				<label class="col-lg-3">傳真電話：</label>
				<div class="col-lg-9">
					<input type="text" class="form-control" name="ee_fax" >
				</div>
			</div>
			<div class="form-group row">
				<label class="col-lg-3">報價日期：</label>
				<div class="col-lg-9">
					<input type="text" class="form-control" name="sdate" >
				</div>
			</div>
			<div class="form-group row">
				<label class="col-lg-3">報價期限：</label>
				<div class="col-lg-9">
					<input type="text" class="form-control" name="edate" >
				</div>
			</div>
			<h5 class="text-center mt-3">控制性低強度回填材料(CLSM) 規  格</h5>
			<div class="row text-center">
				<div class="col-lg-3">28天抗壓強度
				</div>
				<div class="col-lg-3">坍流度
				</div>
				<div class="col-lg-2">骨材
				</div>
				<div class="col-lg-2">數量
				</div>
				<div class="col-lg-2">單價
				</div>
				<div class="col-lg-3">
					<select class="form-control" name="strength1">
					<?php 		
						$sql = mysqli_query($db, "SELECT * FROM 28strength order by snum ASC");
						
						while ($row = mysqli_fetch_array($sql)) {
							echo "<option value=".$row['snum']."-".$row['enum'].">".$row['snum'].'-'.$row['enum']."</option>\n";
						}
					?>
					</select>
				</div>
				<div class="col-lg-3">
					<input type="text" class="form-control" name="turbulence1" value="40-60" >
				</div>
				<div class="col-lg-2">
					<input type="text" class="form-control" name="aggregate1" >
				</div>
				<div class="col-lg-2">
					<input type="text" class="form-control" name="number1" >
				</div>
				<div class="col-lg-2">
					<input type="text" class="form-control" name="price1" >
				</div>
			</div>
			<div class="form-group row">
				<label class="col-lg-2">28天抗壓強度：</label>
				<div class="col-lg-9">
				<select class="form-control" name="strength1">
				<?php 		
					$sql = mysqli_query($db, "SELECT * FROM 28strength order by snum ASC");
					
					while ($row = mysqli_fetch_array($sql)) {
						echo "<option value=".$row['snum']."-".$row['enum'].">".$row['snum'].'-'.$row['enum']."</option>\n";
					}
				?>
				</select>
			<!--		<input type="text" class="form-control" name="strength1" > -->
				</div>
			</div>
			<div class="form-group row">
				<label class="col-lg-3">坍流度：</label>
				<div class="col-lg-9">
					<input type="text" class="form-control" name="turbulence1" value="40-60" >
				</div>
			</div>
			<div class="form-group row">
				<label class="col-lg-3">骨材：</label>
				<div class="col-lg-9">
					<input type="text" class="form-control" name="aggregate1" >
				</div>
			</div>
			<div class="form-group row">
				<label class="col-lg-3">數量：</label>
				<div class="col-lg-9">
					<input type="text" class="form-control" name="number1" >
				</div>
			</div>
			<div class="form-group row">
				<label class="col-lg-3">單價：</label>
				<div class="col-lg-9">
					<input type="text" class="form-control" name="price1" >
				</div>
			</div>
			<div class="form-group row">
				<label class="col-lg-3">備註：</label>
				<div class="col-lg-9">
					<input type="text" class="form-control" name="remark1" >
				</div>
			</div>
			<div style="line-height:4;">
			<div class="form-check">
				<label class="form-check-label form-inline">
					<input type="checkbox" class="form-check-input" name="terms1" value="1" checked>1．上列單價如遇原料、燃料、工資等價格波動時，得比照市價調整之。
				</label>
			</div>
			<div class="form-check">
				<label class="form-check-label form-inline">
					<input type="checkbox" class="form-check-input" name="terms2" value="terms2" checked>2．上述價格係保證強度價格，貴客戶若另有要求時單價另議。
				</label>
			</div>	
			<div class="form-check">
				<label class="form-check-label form-inline">
					<input type="checkbox" class="form-check-input" name="terms3_1" value="terms3_1">3．本報價單未含加值營業稅。&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="checkbox" class="form-check-input" name="terms3_2" value="terms3_2">．本報價單已含加值營業稅。
				</label>
			</div>	
			<div class="form-check">
				<label class="form-check-label form-inline">
					<input type="checkbox" class="form-check-input" name="terms4_1" value="terms4_1">4．本報價單未含試體試驗費。&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="checkbox" class="form-check-input" name="terms4_2" value="terms4_2">．本報價單已含試體試驗費。
				</label>
			</div>
			<div class="form-check">
				<label class="form-check-labe form-inline">
					<input type="checkbox" class="form-check-input" name="terms5" value="terms5">
					5．依施工規範每&nbsp;&nbsp;<input type="text" class="form-control" name="specimen_m3" maxlength="3" style="width:60px">&nbsp;&nbsp;M<sup>3</sup>&nbsp;加作一組試體，
					採累進制。每組&nbsp;&nbsp;<input type="text" class="form-control" name="specimen_num" maxlength="2" style="width:50px">&nbsp;&nbsp;顆試體
				</label>
			</div>	
			<div class="form-check">
				<label class="form-check-label form-inline">
					<input type="checkbox" class="form-check-input" name="terms6" value="terms6">6．夜間施工為19:00起出料，且須協調方可出料，每M<sup>3</sup>&nbsp;加收&nbsp;&nbsp;<input type="text" class="form-control" name="specimen_num" maxlength="4" style="width:70px">&nbsp;&nbsp;元。
				</label>
			</div>	
			<div class="form-check">
				<label class="form-check-label form-inline">
					<input type="checkbox" class="form-check-input" name="terms7" value="terms7">7．本報價單不含驗廠試拌、圓柱及粗細骨材試驗費用。
				</label>
			</div>	
			</div>
			<div class="form-group row">
				<label class="col-lg-3">接 洽 人  ：</label>
				<div class="col-lg-9">
					<input type="text" class="form-control" name="brand_name" >
				</div>
			</div>
			<div class="form-group row">
				<label class="col-lg-3">聯絡電話：</label>
				<div class="col-lg-9">
					<input type="text" class="form-control" name="brand_name" >
				</div>
			</div>
			<div class="form-group row">
				<label class="col-lg-3">業務分機：</label>
				<div class="col-lg-9">
					<input type="text" class="form-control" name="brand_name" >
				</div>
			</div>
			<div class="text-center mt-5"><button type="submit" class="btn btn-primary">送出</button></div>
		</form>	
	</div>
	
	<?php include_once ("footer.php"); ?>	
</body>
</html>
